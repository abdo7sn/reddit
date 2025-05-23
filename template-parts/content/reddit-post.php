<div class="reddit-post">
    <div class="desktop-vote">
        <div class="vote-box">
            <span class="upvote" data-post-id="<?php the_ID(); ?>"><i class="fas fa-arrow-up"></i></span>
            <span class="vote-count"><?php echo get_post_meta(get_the_ID(), 'reddit_votes', true) ?: '0'; ?></span>
            <span class="downvote" data-post-id="<?php the_ID(); ?>"><i class="fas fa-arrow-down"></i></span>
        </div>
    </div>
    <div class="post-content">
        <div class="post-header">
            <div class="meta"> 
                <span class="author-wrapper">
                    <?php
                    // Get the author's avatar
                    $author_id = get_the_author_meta('ID');
                    echo get_avatar($author_id, 24, '', esc_attr__('Author avatar', 'reddit-lite'), array('class' => 'author-avatar'));
                    ?>
                    <a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>" class="author-link"><?php the_author(); ?></a>
                </span> • 
                <a href="<?php echo get_category_link(get_the_category()[0]->term_id); ?>">r/<?php echo get_the_category()[0]->name; ?></a> •
                <?php _e('منذ ', 'reddit-lite'); ?> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')); ?>
            </div>
            <div class="post-actions">
                <a href="<?php echo esc_url(get_category_link(get_the_category()[0]->term_id)); ?>" class="join-btn"><?php _e('Join', 'reddit-lite'); ?></a>
            </div>
        </div>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php if (has_post_thumbnail()) : ?>
            <div class="post-image">
                <img src="<?php the_post_thumbnail_url('large'); ?>">
            </div>
        <?php endif; ?>
        <div class="post-footer">
            <div class="mobile-vote">
                <div class="vote-box">
                    <span class="upvote" data-post-id="<?php the_ID(); ?>"><i class="fas fa-arrow-up"></i></span>
                    <span class="vote-count"><?php echo get_post_meta(get_the_ID(), 'reddit_votes', true) ?: '0'; ?></span>
                    <span class="downvote" data-post-id="<?php the_ID(); ?>"><i class="fas fa-arrow-down"></i></span>
                </div>
            </div>
            <a href="<?php the_permalink(); ?>#comments"><i class="fas fa-comment"></i><span class="icon-spacing"></span><?php comments_number('0', '1', '%'); ?></a>
            <a href="#"><i class="fas fa-share"></i><span class="icon-spacing"></span><?php _e('Share', 'reddit-lite'); ?></a>
            <a href="#" class="more-btn"><i class="fas fa-ellipsis-h"></i></a>
        </div>
    </div>
</div>