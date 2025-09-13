<?php
/**
 * Databblead Theme Functions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup
 */
function databblead_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo');
    add_theme_support('custom-header');
    add_theme_support('custom-background');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'databblead-theme'),
        'footer' => esc_html__('Footer Menu', 'databblead-theme'),
    ));
}
add_action('after_setup_theme', 'databblead_theme_setup');

/**
 * Enqueue scripts and styles
 */
function databblead_theme_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('databblead-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue custom CSS
    wp_enqueue_style('databblead-custom', get_template_directory_uri() . '/assets/css/custom.css', array(), '1.0.0');
    
    // Enqueue JavaScript
    wp_enqueue_script('databblead-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
    
    // Smooth scroll for anchor links
    wp_enqueue_script('databblead-scroll', get_template_directory_uri() . '/assets/js/scroll.js', array('jquery'), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('databblead-main', 'databblead_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('databblead_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'databblead_theme_scripts');

/**
 * Add Facebook Pixel to head
 */
function databblead_facebook_pixel() {
    ?>
    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '935994881952122');
    fbq('track', 'PageView');
    </script>
    <!-- End Facebook Pixel Code -->
    <?php
}
add_action('wp_head', 'databblead_facebook_pixel');

/**
 * Add Facebook Pixel noscript to body
 */
function databblead_facebook_pixel_noscript() {
    ?>
    <!-- Facebook Pixel noscript tag -->
    <noscript>
        <img height="1" width="1" style="display:none"
             src="https://www.facebook.com/tr?id=935994881952122&ev=PageView&noscript=1" />
    </noscript>
    <?php
}
add_action('wp_body_open', 'databblead_facebook_pixel_noscript');

/**
 * Add SEO meta tags
 */
function databblead_seo_meta() {
    if (is_front_page()) {
        ?>
        <meta name="description" content="Databblead transforme vos données en leads qualifiés grâce à l'intelligence artificielle. Services de scraping, enrichissement et vérification de données pour booster vos ventes.">
        <meta name="keywords" content="intelligence artificielle, data, leads, scraping, enrichissement données, vérification, croissance commerciale">
        <meta name="author" content="Databblead">
        <meta name="robots" content="index, follow">
        <meta property="og:title" content="Databblead - De la Data aux Leads Qualifiés">
        <meta property="og:description" content="L'intelligence artificielle au service de votre croissance commerciale. Nous identifions, qualifions et connectons vos futurs clients.">
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?php echo home_url(); ?>">
        <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/og-image.jpg">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Databblead - Intelligence Data et Génération de Leads">
        <meta name="twitter:description" content="Transformez vos données en croissance avec notre intelligence artificielle spécialisée.">
        <link rel="canonical" href="<?php echo home_url(); ?>">
        <?php
    }
}
add_action('wp_head', 'databblead_seo_meta');

/**
 * Handle contact form submission
 */
function databblead_handle_contact_form() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['_wpnonce'], 'databblead_contact_nonce')) {
        wp_die('Security check failed');
    }
    
    // Sanitize form data
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $mission = sanitize_textarea_field($_POST['mission']);
    
    // Validate required fields
    if (empty($name) || empty($email) || empty($mission)) {
        wp_redirect(add_query_arg('contact', 'error', home_url()));
        exit;
    }
    
    // Prepare email
    $to = get_option('admin_email');
    $subject = 'Nouvelle demande de stratégie Databblead';
    $message = "Nom: {$name}\n";
    $message .= "Email: {$email}\n\n";
    $message .= "Défi commercial:\n{$mission}";
    
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . $name . ' <' . $email . '>',
        'Reply-To: ' . $email
    );
    
    // Send email
    $sent = wp_mail($to, $subject, $message, $headers);
    
    // Facebook Pixel - Track Lead event
    ?>
    <script>
    fbq('track', 'Lead', {
        content_name: 'Contact Form Submission',
        content_category: 'Lead Generation'
    });
    </script>
    <?php
    
    // Redirect with success/error message
    if ($sent) {
        wp_redirect(add_query_arg('contact', 'success', home_url()));
    } else {
        wp_redirect(add_query_arg('contact', 'error', home_url()));
    }
    exit;
}
add_action('admin_post_nopriv_databblead_contact', 'databblead_handle_contact_form');
add_action('admin_post_databblead_contact', 'databblead_handle_contact_form');

/**
 * Display contact form messages
 */
function databblead_contact_messages() {
    if (isset($_GET['contact'])) {
        $status = $_GET['contact'];
        if ($status === 'success') {
            echo '<div class="notice notice-success" style="background: #10b981; color: white; padding: 1rem; border-radius: 0.5rem; margin: 1rem 0; text-align: center;">
                <p><strong>Stratégie reçue ✨</strong><br>Votre projet a été transmis à databblead. Nous analysons votre défi et vous recontactons sous 24h.</p>
            </div>';
        } elseif ($status === 'error') {
            echo '<div class="notice notice-error" style="background: #ef4444; color: white; padding: 1rem; border-radius: 0.5rem; margin: 1rem 0; text-align: center;">
                <p><strong>Erreur</strong><br>Une erreur s\'est produite. Veuillez réessayer ou nous contacter directement.</p>
            </div>';
        }
    }
}
add_action('wp_footer', 'databblead_contact_messages');

/**
 * Widget areas
 */
function databblead_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'databblead-theme'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'databblead-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer', 'databblead-theme'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Footer widget area.', 'databblead-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'databblead_widgets_init');

/**
 * Custom excerpt length
 */
function databblead_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'databblead_excerpt_length');

/**
 * Add JSON-LD structured data
 */
function databblead_json_ld() {
    if (is_front_page()) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'Databblead',
            'description' => 'Intelligence artificielle au service de votre croissance commerciale',
            'url' => home_url(),
            'logo' => get_template_directory_uri() . '/assets/images/logo.png',
            'contactPoint' => array(
                '@type' => 'ContactPoint',
                'telephone' => '',
                'contactType' => 'customer service',
                'email' => 'contact@databblead.com'
            ),
            'sameAs' => array(
                // Add social media URLs here
            )
        );
        
        echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES) . '</script>';
    }
}
add_action('wp_head', 'databblead_json_ld');

/**
 * Performance optimizations
 */
function databblead_performance_optimizations() {
    // Preconnect to external domains
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    echo '<link rel="dns-prefetch" href="https://connect.facebook.net">';
}
add_action('wp_head', 'databblead_performance_optimizations', 1);

/**
 * Remove WordPress version from head
 */
remove_action('wp_head', 'wp_generator');

/**
 * Clean up WordPress head
 */
function databblead_cleanup_head() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
}
add_action('init', 'databblead_cleanup_head');
?>