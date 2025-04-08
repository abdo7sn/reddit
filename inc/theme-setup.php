<?php
function reddit_lite_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary' => 'Primary Menu',
        'top_nav' => 'Top Navigation',
        'topics_menu' => 'Topics Menu',
        'resources_menu' => 'Resources Menu',
        'footer_links' => 'Footer Links Menu',
    ));

    // Register right sidebar widget area
    register_sidebar(array(
        'name' => 'Right Sidebar',
        'id' => 'right-sidebar',
        'description' => 'Add widgets here to appear in the right sidebar.',
        'before_widget' => '<div class="community-box">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}
add_action('after_setup_theme', 'reddit_lite_setup');