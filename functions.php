<?php
// Load core functionality
require_once get_template_directory() . '/inc/theme-setup.php';
require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/voting-system.php';
require_once get_template_directory() . '/inc/menu-walker.php';
require_once get_template_directory() . '/inc/widgets.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/functions.php'; // Add this line

// Load custom functions (for buyers to modify)
if (file_exists(get_template_directory() . '/custom/custom-functions.php')) {
    require_once get_template_directory() . '/custom/custom-functions.php';
}