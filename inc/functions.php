<?php
function reddit_lite_search_filter($query) {
    if ($query->is_search() && !is_admin()) {
        $query->set('post_type', array('post'));
        
        $exclude_categories = apply_filters('', array());
        if (!empty($exclude_categories)) {
            $query->set('category__not_in', $exclude_categories);
        }
        $query = apply_filters('reddit_lite_search_query', $query);
    }
    return $query;
}
add_action('pre_get_posts', 'reddit_lite_search_filter');

function reddit_lite_highlight_search_terms($text) {
    if (is_search() && !empty(get_search_query())) {
        $search_terms = explode(' ', get_search_query());
        foreach ($search_terms as $term) {
            $term = preg_quote($term, '/');
            $text = preg_replace("/($term)/i", '<span class="highlight">$1</span>', $text);
        }
    }
    return $text;
}
add_filter('the_title', 'reddit_lite_highlight_search_terms');
add_filter('the_excerpt', 'reddit_lite_highlight_search_terms');

function reddit_lite_comment_callback($comment, $args, $depth) {
    ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <div class="comment-body">
            <div class="comment-meta">
            <div class="comment-author">
                <?php
                // Get the comment author's avatar
                echo get_avatar($comment, $args['avatar_size'], '', esc_attr__('Comment author avatar', 'reddit-lite'), array('class' => 'comment-author-avatar'));
                
                // Get the comment author's ID and name
                $comment_author_id = $comment->user_id; // ID of the user who wrote the comment
                $comment_author_name = $comment->comment_author; // Name of the comment author
                ?>
                <a href="<?php echo esc_url(get_author_posts_url($comment_author_id)); ?>" class="author-link"><?php echo esc_html($comment_author_name); ?></a>
            </div>
                <div class="comment-date">
                    <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                        <time datetime="<?php comment_time('c'); ?>">
                            <?php _e('منذ ', 'reddit-lite'); ?> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')); ?>
                        </time>
                    </a>
                </div>
            </div>
            <div class="comment-content">
                <?php if ($comment->comment_approved == '0') : ?>
                    <p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'reddit-lite'); ?></p>
                <?php endif; ?>
                <?php comment_text(); ?>
            </div>
            <div class="comment-actions">
                <?php
                comment_reply_link(array_merge($args, array(
                    'depth' => $depth,
                    'max_depth' => $args['max_depth'],
                    'reply_text' => __('Reply', 'reddit-lite'),
                    'add_below' => 'comment',
                    'before' => '<span class="reply">',
                    'after' => '</span>',
                )));
                ?>
            </div>
        </div>
    <?php
}
