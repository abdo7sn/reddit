jQuery(document).ready(function($) {
    $('.vote-box').on('click', '.upvote, .downvote', function(e) {
        e.preventDefault();

        var $button = $(this);
        var $voteBox = $button.closest('.vote-box');
        var $voteCount = $voteBox.find('.vote-count');
        var $upvoteBtn = $voteBox.find('.upvote');
        var $downvoteBtn = $voteBox.find('.downvote');
        var post_id = $button.data('post-id');
        var vote_type = $button.hasClass('upvote') ? 'upvote' : 'downvote';

        // Prevent multiple clicks by disabling buttons during the request
        $upvoteBtn.add($downvoteBtn).prop('disabled', true).css('opacity', 0.5);

        // Send AJAX request
        $.ajax({
            url: redditLiteAjax.ajax_url,
            type: 'POST',
            data: {
                action: 'reddit_vote',
                post_id: post_id,
                vote_type: vote_type
            },
            dataType: 'json', // Expect JSON response
            success: function(response) {
                if (response.success) {
                    // Update the vote count
                    $voteCount.text(response.data.votes);

                    // Visually indicate the vote state
                    if (vote_type === 'upvote') {
                        $upvoteBtn.addClass('voted');
                        $downvoteBtn.removeClass('voted');
                    } else {
                        $downvoteBtn.addClass('voted');
                        $upvoteBtn.removeClass('voted');
                    }
                } else {
                    // Show error message
                    alert(response.data.message);
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX error
                console.error('Voting error:', error);
                alert('There was an error processing your vote. Please try again.');
            },
            complete: function() {
                // Re-enable buttons after the request completes
                $upvoteBtn.add($downvoteBtn).prop('disabled', false).css('opacity', 1);
            }
        });
    });
});