<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Theme Color -->
    <meta name="theme-color" content="#1e293b">
    <meta name="msapplication-TileColor" content="#1e293b">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-touch-icon.png">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'databblead-theme'); ?></a>
    
    <header id="masthead" class="site-header" style="position: fixed; top: 0; left: 0; right: 0; z-index: 1000; background: rgba(15, 23, 42, 0.95); backdrop-filter: blur(10px); border-bottom: 1px solid rgba(255, 255, 255, 0.1); transition: all 0.3s ease;">
        <div class="container" style="display: flex; justify-content: space-between; align-items: center; padding: 1rem 2rem;">
            <!-- Logo -->
            <div class="site-branding">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <h1 class="site-title" style="margin: 0; font-size: 1.5rem; font-weight: 700;">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" style="color: #60a5fa; text-decoration: none;">
                            databblead
                        </a>
                    </h1>
                <?php endif; ?>
            </div>

            <!-- Navigation -->
            <nav id="site-navigation" class="main-navigation" style="display: none;">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'primary-menu',
                    'container'      => false,
                    'fallback_cb'    => false,
                ));
                ?>
            </nav>

            <!-- CTA Button -->
            <div class="header-cta">
                <a href="#contact-form" class="btn btn-primary" style="padding: 0.75rem 1.5rem; background: linear-gradient(135deg, #60a5fa, #a855f7); color: white; text-decoration: none; border-radius: 0.5rem; font-weight: 600; transition: all 0.3s ease;">
                    Démarrer mon projet
                </a>
            </div>

            <!-- Mobile menu toggle -->
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" style="display: none; background: none; border: none; color: white; font-size: 1.5rem; cursor: pointer;">
                <span class="sr-only"><?php esc_html_e('Menu', 'databblead-theme'); ?></span>
                ☰
            </button>
        </div>
    </header>

    <div id="content" class="site-content" style="margin-top: 4rem;">