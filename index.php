<?php get_header(); ?>
<?php get_template_part('template-parts/sidebar/left-sidebar'); ?>
<div class="main-content">
    <?php get_template_part('template-parts/content/top-posts'); ?>
    <?php get_template_part('template-parts/content/sorting-tabs'); ?>
    <?php
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 10, // عدد المقالات لكل صفحة
        'paged'          => $paged,
    );
    
    // شرط الفرز حسب votes
    if (isset($_GET['sort']) && $_GET['sort'] === 'everywhere') {
        $args['meta_key'] = 'reddit_votes';
        $args['orderby']  = 'meta_value_num';
        $args['order']    = 'DESC';
    }
    
    $query = new WP_Query($args);
    
    if ( $query->have_posts() ) : ?>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <?php get_template_part('template-parts/content/reddit-post'); ?>
        <?php endwhile; ?>
    
        <div class="pagination">
            <?php
            echo paginate_links( array(
                'total'     => $query->max_num_pages,
                'current'   => $paged,
                'format'    => '?paged=%#%' . (isset($_GET['sort']) ? '&sort=' . $_GET['sort'] : ''),
                'prev_text' => '« السابقة',
                'next_text' => 'التالي »',
            ) );
            ?>
        </div>
    
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p>لا توجد مقالات في هذه الصفحة.</p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="go-back-button">العودة إلى الرئيسية</a>
    <?php endif; ?>
</div>
<?php get_template_part('template-parts/sidebar/right-sidebar'); ?>
<?php get_footer(); ?>
