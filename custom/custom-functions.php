<?php
add_filter('reddit_lite_exclude_search_categories', function($categories) {
    return array(1, 2); // Exclude categories with IDs 1 and 2
});