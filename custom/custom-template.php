<?php
/*
 Template Name: Custom Page Template
*/
get_header(); ?>
<div class="main-content">
    <h1><?php the_title(); ?></h1>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="content"><?php the_content(); ?></div>
    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>