<?php get_header(); ?>
<?php get_template_part('template-parts/sidebar/left-sidebar'); ?>
<div class="main-content">
    <div class="archive-header">
        <h1>
            <?php
            if (is_category()) {
                printf(__('Category: %s', 'reddit-lite'), single_cat_title('', false));
            } elseif (is_tag()) {
                printf(__('Tag: %s', 'reddit-lite'), single_tag_title('', false));
            } elseif (is_author()) {
                printf(__('Author: %s', 'reddit-lite'), get_the_author());
            } elseif (is_date()) {
                if (is_day()) {
                    printf(__('Daily Archives: %s', 'reddit-lite'), get_the_date());
                } elseif (is_month()) {
                    printf(__('Monthly Archives: %s', 'reddit-lite'), get_the_date('F Y'));
                } elseif (is_year()) {
                    printf(__('Yearly Archives: %s', 'reddit-lite'), get_the_date('Y'));
                }
            } else {
                _e('Archives', 'reddit-lite');
            }
            ?>
        </h1>
        <?php
        // Display the archive description if available (e.g., category description)
        if (is_category() || is_tag()) {
            $description = term_description();
            if ($description) {
                echo '<div class="archive-description">' . $description . '</div>';
            }
        }
        ?>
    </div>

    <?php get_template_part('template-parts/content/sorting-tabs'); ?>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content/reddit-post'); ?>
        <?php endwhile; ?>
        <div class="pagination">
            <?php
            the_posts_pagination(array(
                'prev_text' => '<i class="fas fa-chevron-left"></i> ' . __('Previous', 'reddit-lite'),
                'next_text' => __('Next', 'reddit-lite') . ' <i class="fas fa-chevron-right"></i>',
            ));
            ?>
        </div>
    <?php else : ?>
        <div class="no-results">
            <h2><?php _e('No Posts Found', 'reddit-lite'); ?></h2>
            <p><?php _e('Sorry, there are no posts in this archive.', 'reddit-lite'); ?></p>
        </div>
    <?php endif; ?>
</div>
<?php get_template_part('template-parts/sidebar/right-sidebar'); ?>
<?php get_footer(); ?>