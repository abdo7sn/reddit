<?php
function reddit_lite_customizer_settings($wp_customize) {
    // Add a section for general settings
    $wp_customize->add_section('reddit_lite_general', array(
        'title' => 'General Settings',
        'priority' => 100,
    ));

    // Add setting for top posts count
    $wp_customize->add_setting('reddit_lite_top_posts_count', array(
        'default' => 4,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('reddit_lite_top_posts_count', array(
        'label' => 'Number of Top Posts',
        'section' => 'reddit_lite_general',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 10,
        ),
    ));

    // Add setting for search placeholder
    $wp_customize->add_setting('reddit_lite_search_placeholder', array(
        'default' => 'Search ' . get_bloginfo('name'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('reddit_lite_search_placeholder', array(
        'label' => 'Search Placeholder Text',
        'section' => 'reddit_lite_general',
        'type' => 'text',
    ));

    // Add setting for logo image
    $wp_customize->add_setting('reddit_lite_logo', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'reddit_lite_logo', array(
        'label' => 'Logo Image',
        'section' => 'reddit_lite_general',
        'mime_type' => 'image',
        'description' => 'Upload a logo image to display in the top navigation (recommended size: 30x30px).',
    )));

    // Add setting for logo text
    $wp_customize->add_setting('reddit_lite_logo_text', array(
        'default' => get_bloginfo('name'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('reddit_lite_logo_text', array(
        'label' => 'Logo Text',
        'section' => 'reddit_lite_general',
        'type' => 'text',
        'description' => 'Set the text to display next to the logo. Defaults to the site name.',
    ));

    // Add a section for login page settings
    $wp_customize->add_section('reddit_lite_login', array(
        'title' => 'Login Page Settings',
        'priority' => 110,
    ));

    // Add setting for login page title
    $wp_customize->add_setting('reddit_lite_login_title', array(
        'default' => 'Log In',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('reddit_lite_login_title', array(
        'label' => 'Login Page Title',
        'section' => 'reddit_lite_login',
        'type' => 'text',
    ));

    // Add setting for login page description
    $wp_customize->add_setting('reddit_lite_login_description', array(
        'default' => 'Enter your credentials to access your account.',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('reddit_lite_login_description', array(
        'label' => 'Login Page Description',
        'section' => 'reddit_lite_login',
        'type' => 'text',
    ));

    // Add setting for login button text
    $wp_customize->add_setting('reddit_lite_login_button_text', array(
        'default' => 'Log In',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('reddit_lite_login_button_text', array(
        'label' => 'Login Button Text',
        'section' => 'reddit_lite_login',
        'type' => 'text',
    ));

    // Add a section for footer settings
    $wp_customize->add_section('reddit_lite_footer', array(
        'title' => 'Footer Settings',
        'priority' => 120,
    ));

    // Add setting for copyright text
    $wp_customize->add_setting('reddit_lite_copyright_text', array(
        'default' => '© ' . date('Y') . ' ' . get_bloginfo('name') . ' | All rights reserved.',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('reddit_lite_copyright_text', array(
        'label' => 'Copyright Text',
        'section' => 'reddit_lite_footer',
        'type' => 'text',
    ));
}
add_action('customize_register', 'reddit_lite_customizer_settings');