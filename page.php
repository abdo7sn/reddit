<?php get_header(); ?>
<?php get_template_part('template-parts/sidebar/left-sidebar'); ?>
<div class="main-content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="page-content">
            <h1><?php the_title(); ?></h1>
            <div class="content">
                <?php the_content(); ?>
            </div>
            <?php
            // Display comments if enabled
            if (comments_open() || get_comments_number()) {
                comments_template();
            }
            ?>
        </div>
    <?php endwhile; endif; ?>
</div>
<?php get_template_part('template-parts/sidebar/right-sidebar'); ?>
<?php get_footer(); ?>