<?php get_header(); ?>

<main id="main" class="site-main" style="padding: 2rem 0;">
    <div class="container">
        <?php if (have_posts()) : ?>
            <header class="page-header" style="margin-bottom: 3rem; text-align: center;">
                <?php
                the_archive_title('<h1 class="page-title" style="font-size: 3rem; font-weight: 700; color: #60a5fa; margin-bottom: 1rem;">', '</h1>');
                the_archive_description('<div class="archive-description" style="font-size: 1.125rem; color: #94a3b8;">', '</div>');
                ?>
            </header>

            <div style="display: grid; gap: 2rem; max-width: 64rem; margin: 0 auto;">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('card-float'); ?> style="background: rgba(255,255,255,0.05); padding: 2rem; border-radius: 1rem; border: 1px solid rgba(255,255,255,0.1); transition: all 0.3s ease;">
                        <header class="entry-header" style="margin-bottom: 1rem;">
                            <?php
                            if (is_singular()) :
                                the_title('<h1 class="entry-title" style="font-size: 2rem; font-weight: 600; margin-bottom: 0.5rem;">', '</h1>');
                            else :
                                the_title('<h2 class="entry-title" style="font-size: 1.5rem; font-weight: 600; margin-bottom: 0.5rem;"><a href="' . esc_url(get_permalink()) . '" rel="bookmark" style="color: #60a5fa; text-decoration: none;">', '</a></h2>');
                            endif;
                            ?>
                            
                            <div class="entry-meta" style="font-size: 0.875rem; color: #94a3b8;">
                                <time datetime="<?php echo get_the_date('c'); ?>">
                                    <?php echo get_the_date(); ?>
                                </time>
                                <?php if (get_the_author()) : ?>
                                    <span style="margin: 0 0.5rem;">•</span>
                                    <span><?php the_author(); ?></span>
                                <?php endif; ?>
                            </div>
                        </header>

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="entry-thumbnail" style="margin-bottom: 1rem;">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', array('style' => 'width: 100%; height: 200px; object-fit: cover; border-radius: 0.5rem;')); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="entry-summary" style="color: #94a3b8; line-height: 1.6;">
                            <?php the_excerpt(); ?>
                        </div>

                        <footer class="entry-footer" style="margin-top: 1rem;">
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.5rem 1rem; background: linear-gradient(135deg, #60a5fa, #a855f7); color: white; text-decoration: none; border-radius: 0.5rem; font-size: 0.875rem; font-weight: 600;">
                                Lire la suite
                                <span>→</span>
                            </a>
                        </footer>
                    </article>
                <?php endwhile; ?>
            </div>

            <nav class="pagination" style="margin-top: 3rem; text-align: center;">
                <?php
                the_posts_pagination(array(
                    'prev_text' => '<span style="color: #60a5fa;">← Précédent</span>',
                    'next_text' => '<span style="color: #60a5fa;">Suivant →</span>',
                ));
                ?>
            </nav>

        <?php else : ?>
            <section class="no-results not-found" style="text-align: center; padding: 3rem;">
                <header class="page-header">
                    <h1 class="page-title" style="font-size: 2rem; font-weight: 700; color: #60a5fa; margin-bottom: 1rem;">
                        <?php esc_html_e('Nothing here', 'databblead-theme'); ?>
                    </h1>
                </header>

                <div class="page-content" style="color: #94a3b8;">
                    <?php if (is_home() && current_user_can('publish_posts')) : ?>
                        <p><?php
                            printf(
                                wp_kses(
                                    __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'databblead-theme'),
                                    array(
                                        'a' => array(
                                            'href' => array(),
                                        ),
                                    )
                                ),
                                esc_url(admin_url('post-new.php'))
                            );
                            ?></p>
                    <?php elseif (is_search()) : ?>
                        <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'databblead-theme'); ?></p>
                        <?php get_search_form(); ?>
                    <?php else : ?>
                        <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'databblead-theme'); ?></p>
                        <?php get_search_form(); ?>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>
    </div>
</main>

<?php
get_sidebar();
get_footer();
?>