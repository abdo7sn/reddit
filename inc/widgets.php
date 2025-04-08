<?php
class Reddit_Lite_Communities_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'reddit_lite_communities_widget',
            'Reddit Lite Communities',
            array('description' => 'Display a list of popular communities.')
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        $communities = !empty($instance['communities']) ? explode("\n", $instance['communities']) : array();
        if (!empty($communities)) {
            echo '<ul>';
            foreach ($communities as $community) {
                $parts = explode('|', $community);
                if (count($parts) >= 3) {
                    $name = trim($parts[0]);
                    $url = trim($parts[1]);
                    $members = trim($parts[2]);
                    echo '<li>';
                    echo '<img src="https://via.placeholder.com/24" alt="Community Icon">';
                    echo '<a href="' . esc_url($url) . '">' . esc_html($name) . '</a>';
                    echo '<span>' . esc_html($members) . ' members</span>';
                    echo '</li>';
                }
            }
            echo '</ul>';
            echo '<a href="#" class="see-more">See more</a>';
        }
        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : 'Popular Communities';
        $communities = !empty($instance['communities']) ? $instance['communities'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('communities'); ?>">Communities (format: name|url|members, one per line):</label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('communities'); ?>" name="<?php echo $this->get_field_name('communities'); ?>" rows="5"><?php echo esc_textarea($communities); ?></textarea>
            <small>Example: r/explainlikeimfive|https://reddit.com/r/explainlikeimfive|23192082</small>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = !empty($new_instance['title']) ? sanitize_text_field($new_instance['title']) : '';
        $instance['communities'] = !empty($new_instance['communities']) ? sanitize_textarea_field($new_instance['communities']) : '';
        return $instance;
    }
}

function reddit_lite_register_widgets() {
    register_widget('Reddit_Lite_Communities_Widget');
}
add_action('widgets_init', 'reddit_lite_register_widgets');