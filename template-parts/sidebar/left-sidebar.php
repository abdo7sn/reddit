<div class="left-sidebar">
    <ul>
        <li><a href="<?php echo home_url(); ?>"><i class="fas fa-home"></i> الرئيسية</a></li>
        <li><a href="?sort=everywhere"><i class="fas fa-fire"></i> الشائع</a></li>
    </ul>

    <h3>المواضيع</h3>
    <?php
    wp_nav_menu(array(
        'theme_location' => 'topics_menu',
        'container' => false,
        'menu_class' => '',
        'items_wrap' => '<ul>%3$s</ul>',
        'fallback_cb' => false,
        'walker' => new Reddit_Lite_Menu_Walker() // Custom walker for adding icons
    ));
    ?>

    <h3>الموارد</h3>
    <?php
    wp_nav_menu(array(
        'theme_location' => 'resources_menu',
        'container' => false,
        'menu_class' => '',
        'items_wrap' => '<ul>%3$s</ul>',
        'fallback_cb' => false,
        'walker' => new Reddit_Lite_Menu_Walker()
    ));
    ?>
</div>
