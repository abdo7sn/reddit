<?php get_header(); ?>
<?php get_template_part('template-parts/sidebar/left-sidebar'); ?>
<div class="main-content">
    <div class="error-404">
        <h1><?php _e('404 - الصفحة غير موجودة', 'reddit-lite'); ?></h1>
        <p><?php _e('عذرًا، الصفحة التي تبحث عنها غير موجودة. قد تكون قد تم نقلها أو حذفها.', 'reddit-lite'); ?></p>
        <p><a href="<?php echo esc_url(home_url('/')); ?>" class="button"><?php _e('العودة إلى الرئيسية', 'reddit-lite'); ?></a></p>
        <?php get_search_form(); ?>
    </div>
</div>
<?php get_template_part('template-parts/sidebar/right-sidebar'); ?>
<?php get_footer(); ?>