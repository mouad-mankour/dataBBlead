<?php get_header(); ?>

<main id="main" class="site-main" style="padding: 2rem 0;">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header" style="margin-bottom: 2rem; text-align: center;">
                    <?php the_title('<h1 class="entry-title" style="font-size: 3rem; font-weight: 700; color: #60a5fa; margin-bottom: 1rem;">', '</h1>'); ?>
                    
                    <div class="entry-meta" style="margin-bottom: 1.5rem; font-size: 0.875rem; color: #94a3b8;">
                        <time datetime="<?php echo get_the_date('c'); ?>">
                            <?php echo get_the_date(); ?>
                        </time>
                        <?php if (get_the_author()) : ?>
                            <span style="margin: 0 0.5rem;">•</span>
                            <span><?php the_author(); ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="entry-thumbnail" style="margin-bottom: 2rem;">
                            <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: auto; border-radius: 1rem;')); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <div class="entry-content" style="max-width: 64rem; margin: 0 auto; font-size: 1.125rem; line-height: 1.7; color: #94a3b8;">
                    <?php
                    the_content(sprintf(
                        wp_kses(
                            __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'databblead-theme'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    ));

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'databblead-theme'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>

                <footer class="entry-footer" style="margin-top: 2rem; padding-top: 1rem; border-top: 1px solid rgba(255, 255, 255, 0.1);">
                    <?php
                    $categories_list = get_the_category_list(esc_html__(', ', 'databblead-theme'));
                    if ($categories_list) {
                        printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'databblead-theme') . '</span>', $categories_list);
                    }

                    $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'databblead-theme'));
                    if ($tags_list) {
                        printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'databblead-theme') . '</span>', $tags_list);
                    }

                    if (get_edit_post_link()) {
                        edit_post_link(
                            sprintf(
                                wp_kses(
                                    __('Edit <span class="screen-reader-text">%s</span>', 'databblead-theme'),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                get_the_title()
                            ),
                            '<span class="edit-link">',
                            '</span>'
                        );
                    }
                    ?>
                </footer>
            </article>

            <nav class="post-navigation" style="margin: 2rem 0;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                    <div class="nav-previous">
                        <?php previous_post_link('%link', '<span style="color: #60a5fa;">← Previous</span><br>%title'); ?>
                    </div>
                    <div class="nav-next" style="text-align: right;">
                        <?php next_post_link('%link', '<span style="color: #60a5fa;">Next →</span><br>%title'); ?>
                    </div>
                </div>
            </nav>

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>

        <?php endwhile; ?>
    </div>
</main>

<?php
get_sidebar();
get_footer();
?>