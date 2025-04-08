<div class="top-nav">
    <button class="sidebar-toggle" aria-label="Toggle Sidebar">
        <i class="fas fa-bars"></i> <!-- Font Awesome hamburger icon -->
    </button>
    <span class="mobile-search-icon" aria-label="<?php esc_attr_e('Toggle Search', 'reddit-lite'); ?>" role="button" tabindex="0">
        <i class="fas fa-search"></i>
    </span>
    <div class="logo">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link">
            <?php
            // Get the custom logo URL from the Customizer
            $custom_logo_id = get_theme_mod('reddit_lite_logo');
            $logo_url = wp_get_attachment_image_url($custom_logo_id, 'thumbnail');
            if ($custom_logo_id && $logo_url) {
                echo '<img src="' . esc_url($logo_url) . '" alt="' . esc_attr(get_bloginfo('name')) . '" class="logo-icon">';
            }
            ?>
            <span class="logo-text"><?php echo esc_html(get_theme_mod('reddit_lite_logo_text', get_bloginfo('name'))); ?></span>
        </a>
    </div>
    <!-- Full search form for desktop -->
    <div class="desktop-search">
        <?php get_search_form(); ?>
    </div>
    <!-- Search form for mobile (hidden by default) -->
    <div class="mobile-search-form">
        <?php get_search_form(); ?>
    </div>
    <div class="nav-actions">
        <a href="<?php echo esc_url(get_day_link(date('Y'), date('m'), date('d'))); ?>" class="today-posts" aria-label="<?php esc_attr_e('Today\'s Posts', 'reddit-lite'); ?>">
            <span class="nav-text">منشورات اليوم</span>
            <span class="nav-icon"><i class="fas fa-calendar-day"></i></span>
        </a>
        <a href="#" class="login" aria-label="<?php echo esc_attr(is_user_logged_in() ? __('Log Out', 'reddit-lite') : __('Login', 'reddit-lite')); ?>">
            <span class="nav-text"><?php echo is_user_logged_in() ? __('تسجيل الخروج', 'reddit-lite') : __('تسجيل الدخول', 'reddit-lite'); ?></span>
            <span class="nav-icon"><i class="fas <?php echo is_user_logged_in() ? 'fa-sign-out-alt' : 'fa-sign-in-alt'; ?>"></i></span>
        </a>
    </div>
</div>

<!-- Login Modal -->
<div class="login-modal" id="login-modal" role="dialog" aria-hidden="true">
    <div class="login-modal-content">
        <span class="login-modal-close" role="button" tabindex="0" aria-label="<?php esc_attr_e('Close', 'reddit-lite'); ?>">×</span>
        <div class="login-modal-body">
            <?php if (is_user_logged_in()) : ?>
                <!-- Logout Confirmation -->
                <h2><?php _e('تسجيل الخروج', 'reddit-lite'); ?></h2>
                <p><?php _e('هل أنت متأكد أنك تريد تسجيل الخروج؟', 'reddit-lite'); ?></p>
                <a href="<?php echo wp_logout_url($_SERVER['REQUEST_URI']); ?>" class="logout-btn"><?php _e('تسجيل الخروج', 'reddit-lite'); ?></a>
                <button class="cancel-btn"><?php _e('إلغاء', 'reddit-lite'); ?></button>
            <?php else : ?>
                <!-- Login Form -->
                <h2><?php _e('تسجيل الدخول', 'reddit-lite'); ?></h2>
                <?php
                wp_login_form(array(
                    'label_username' => __('اسم المستخدم أو البريد الإلكتروني', 'reddit-lite'),
                    'label_password' => __('كلمة المرور', 'reddit-lite'),
                    'label_remember' => __('تذكرني', 'reddit-lite'),
                    'label_log_in' => __('تسجيل الدخول', 'reddit-lite'),
                    'redirect' => $_SERVER['REQUEST_URI'], // Redirect to the current page after login
                    'form_id' => 'loginform-modal',
                    'id_username' => 'user_login_modal',
                    'id_password' => 'user_pass_modal',
                    'id_remember' => 'rememberme_modal',
                    'id_submit' => 'wp-submit-modal',
                ));
                ?>
                <p class="register-link">
                    <?php _e('ليس لديك حساب؟', 'reddit-lite'); ?> 
                    <a href="<?php echo wp_registration_url(); ?>"><?php _e('إنشاء حساب', 'reddit-lite'); ?></a>
                </p>
            <?php endif; ?>
        </div>
    </div>
</div>