<?php
function reddit_lite_save_vote() {
    // Check if the request is valid
    if (!isset($_POST['post_id']) || !isset($_POST['vote_type'])) {
        wp_send_json_error(array('message' => 'Invalid request.'));
    }

    // Ensure the user is logged in
    if (!is_user_logged_in()) {
        wp_send_json_error(array('message' => 'You must be logged in to vote.'));
    }

    $post_id = intval($_POST['post_id']);
    $vote_type = sanitize_text_field($_POST['vote_type']);
    $user_id = get_current_user_id();

    // Validate vote type
    if (!in_array($vote_type, array('upvote', 'downvote'))) {
        wp_send_json_error(array('message' => 'Invalid vote type.'));
    }

    // Get the current vote count for the post
    $votes = get_post_meta($post_id, 'reddit_votes', true) ?: 0;
    $votes = intval($votes);

    // Get the user's previous vote for this post (if any)
    $vote_meta_key = "user_{$user_id}_vote_post_{$post_id}";
    $previous_vote = get_user_meta($user_id, $vote_meta_key, true);

    // Initialize the new vote count and user vote
    $new_vote = $vote_type;
    $vote_change = 0;

    if ($previous_vote) {
        // User has already voted
        if ($previous_vote === $vote_type) {
            // Same vote type clicked again: cancel the vote
            if ($vote_type === 'upvote') {
                $vote_change = -1; // Remove the upvote
            } elseif ($vote_type === 'downvote') {
                $vote_change = 1; // Remove the downvote
            }
            $new_vote = 'none'; // Reset the user's vote
        } else {
            // Opposite vote type clicked: switch the vote
            if ($previous_vote === 'upvote' && $vote_type === 'downvote') {
                $vote_change = -2; // Remove upvote (-1) and apply downvote (-1)
            } elseif ($previous_vote === 'downvote' && $vote_type === 'upvote') {
                $vote_change = 2; // Remove downvote (+1) and apply upvote (+1)
            }
        }
    } else {
        // User hasn't voted yet: apply the new vote
        if ($vote_type === 'upvote') {
            $vote_change = 1;
        } elseif ($vote_type === 'downvote') {
            $vote_change = -1;
        }
    }

    // Update the vote count
    $votes += $vote_change;
    update_post_meta($post_id, 'reddit_votes', $votes);

    // Update the user's vote in user meta
    if ($new_vote === 'none') {
        delete_user_meta($user_id, $vote_meta_key);
    } else {
        update_user_meta($user_id, $vote_meta_key, $new_vote);
    }

    // Send success response with the updated vote count and user's vote state
    wp_send_json_success(array(
        'votes' => $votes,
        'user_vote' => $new_vote, // Send the user's current vote state ('upvote', 'downvote', or 'none')
        'message' => 'Vote updated successfully.'
    ));
}
add_action('wp_ajax_reddit_vote', 'reddit_lite_save_vote');
add_action('wp_ajax_nopriv_reddit_vote', 'reddit_lite_save_vote');