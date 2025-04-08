<?php
function reddit_lite_scripts() {
    wp_enqueue_style('reddit-lite-fonts', 'https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600&display=swap');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
    wp_enqueue_style('reddit-lite-style', get_stylesheet_uri(), array(), '1.2');
    wp_enqueue_style('reddit-lite-custom-style', get_template_directory_uri() . '/custom/custom-styles.css', array(), '1.0');
    wp_enqueue_script('reddit-lite-js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.2', true);
    wp_enqueue_script('reddit-lite-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true);
    wp_localize_script('reddit-lite-js', 'redditLiteAjax', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'reddit_lite_scripts');