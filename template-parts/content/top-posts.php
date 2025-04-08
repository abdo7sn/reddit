<div class="top-posts">
    <?php
    $top_posts_count = get_theme_mod('reddit_lite_top_posts_count', 4);
    $top_posts = new WP_Query(array(
        'posts_per_page' => $top_posts_count,
        'meta_key' => 'reddit_votes',
        'orderby' => 'meta_value_num',
        'order' => 'DESC'
    ));
    if ($top_posts->have_posts()) : while ($top_posts->have_posts()) : $top_posts->the_post(); ?>
        <div class="top-post-card">
            <?php if (has_post_thumbnail()) : ?>
                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
            <?php endif; ?>
            <div class="card-content">
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <p>Posted in <a href="<?php echo get_category_link(get_the_category()[0]->term_id); ?>"><?php echo get_the_category()[0]->name; ?></a></p>
            </div>
        </div>
    <?php endwhile; wp_reset_postdata(); endif; ?>
</div>