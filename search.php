<?php get_header(); ?>
<?php get_template_part('template-parts/sidebar/left-sidebar'); ?>
<div class="main-content">
    <div class="search-header">
        <h1><?php printf(__('Search Results for: %s', 'reddit-lite'), '<span>' . get_search_query() . '</span>'); ?></h1>
        <p>
            <?php
            global $wp_query;
            $total_results = $wp_query->found_posts;
            printf(_n('Found %s result', 'Found %s results', $total_results, 'reddit-lite'), $total_results);
            ?>
        </p>
    </div>
    
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content/reddit-post'); ?>
        <?php endwhile; ?>
        <div class="pagination">
            <?php
            the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => __( '« السابقة', 'textdomain' ),
                'next_text' => __( 'التالي »', 'textdomain' ),
            ) );
            ?>
        </div>
    <?php else : ?>
        <div class="no-results">
            <h2><?php _e('No Results Found', 'reddit-lite'); ?></h2>
            <p><?php _e('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'reddit-lite'); ?></p>
            <?php get_search_form(); ?>
        </div>
    <?php endif; ?>
</div>
<?php get_template_part('template-parts/sidebar/right-sidebar'); ?>
<?php get_footer(); ?>