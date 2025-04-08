<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php
    // Simplified comment form (above comments)
    comment_form(array(
        'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" placeholder="' . esc_attr__('Write your comment here...', 'reddit-lite') . '" required></textarea></p>',
        'class_submit' => 'submit button',
        'title_reply' => '', // Remove "Leave a Comment" title
        'logged_in_as' => '', // Remove "Logged in as..." text
        'comment_notes_before' => '', // Remove any notes before the form
        'comment_notes_after' => '', // Remove any notes after the form
    ));
    ?>

    <?php if (have_comments()) : ?>
        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style' => 'ol',
                'short_ping' => true,
                'avatar_size' => 40,
                'callback' => 'reddit_lite_comment_callback',
            ));
            ?>
        </ol>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="comment-navigation">
                <div class="nav-previous"><?php previous_comments_link(__('Older Comments', 'reddit-lite')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments', 'reddit-lite')); ?></div>
            </nav>
        <?php endif; ?>

    <?php endif; // have_comments() ?>

    <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <p class="no-comments"><?php _e('Comments are closed.', 'reddit-lite'); ?></p>
    <?php endif; ?>
</div>