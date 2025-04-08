<?php
class Reddit_Lite_Menu_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $icon_class = '';

        // Map menu item classes to Font Awesome icons
        $icon_map = array(
            'internet-culture' => 'fas fa-globe',
            'games' => 'fas fa-gamepad',
            'q-and-a' => 'fas fa-question-circle',
            'technology' => 'fas fa-laptop',
            'pop-culture' => 'fas fa-users',
            'movies-tv' => 'fas fa-film',
            'about-reddit' => 'fas fa-info-circle',
            'advertise' => 'fas fa-ad',
            'reddit-pro' => 'fas fa-chart-line',
            'help' => 'fas fa-question'
        );

        foreach ($classes as $class) {
            if (isset($icon_map[$class])) {
                $icon_class = $icon_map[$class];
                break;
            }
        }

        $output .= '<li>';
        $attributes = !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $output .= '<a' . $attributes . '>';
        if ($icon_class) {
            $output .= '<i class="' . esc_attr($icon_class) . '"></i> ';
        }
        $output .= esc_html($item->title);
        $output .= '</a>';
    }
}