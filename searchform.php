<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label for="s" class="screen-reader-text"><?php _e('Search for:', 'reddit-lite'); ?></label>
    <input type="search" id="s" name="s" class="search-input" placeholder="<?php echo esc_attr(get_theme_mod('reddit_lite_search_placeholder', 'Search ' . get_bloginfo('name'))); ?>" value="<?php echo get_search_query(); ?>" required />
    <button type="submit" class="search-submit"><i class="fas fa-search"></i></button>
</form>