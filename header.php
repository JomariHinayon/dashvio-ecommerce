<!DOCTYPE html>
<html <?php language_attributes(); ?> data-theme="light">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container">
        <div class="header-inner">
            <div class="site-branding">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title">
                        <?php bloginfo('name'); ?>
                    </a>
                    <?php
                }
                ?>
            </div>

            <button class="menu-toggle" aria-label="<?php esc_attr_e('Toggle navigation', 'dashvio'); ?>" aria-controls="primary-menu" aria-expanded="false">
                <span class="menu-toggle__bar"></span>
                <span class="menu-toggle__bar"></span>
                <span class="menu-toggle__bar"></span>
            </button>

            <nav class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'menu-primary',
                    'menu_id' => 'primary-menu',
                    'fallback_cb' => false,
                ));
                ?>
            </nav>

            <div class="header-actions">
                <button class="theme-toggle" id="dashvio-theme-toggle" aria-label="Switch to dark mode">
                    <span class="theme-toggle__icon theme-toggle__icon--sun" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 4V2M12 22V20M4 12H2M22 12H20M5.64 5.64L4.22 4.22M19.78 19.78L18.36 18.36M5.64 18.36L4.22 19.78M19.78 4.22L18.36 5.64" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                            <circle cx="12" cy="12" r="4.5" stroke="currentColor" stroke-width="1.6"/>
                        </svg>
                    </span>
                    <span class="theme-toggle__icon theme-toggle__icon--moon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 14.5C19.4 14.7 18.8 14.8 18.2 14.8C14.5 14.8 11.5 11.8 11.5 8.2C11.5 6.4 12.2 4.8 13.3 3.6C13.5 3.3 13.3 2.8 12.9 2.8C7.9 2.8 3.8 6.9 3.8 11.9C3.8 17 8 21.2 13.1 21.2C16.6 21.2 19.7 19.2 21.1 16.2C21.3 15.7 20.7 14.3 20 14.5Z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </button>
                <?php if (class_exists('WooCommerce')) : ?>
                    <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="cart-icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 16C4.9 16 4 16.9 4 18C4 19.1 4.9 20 6 20C7.1 20 8 19.1 8 18C8 16.9 7.1 16 6 16ZM0 0V2H2L5.6 9.6L4.2 12C4.1 12.3 4 12.7 4 13C4 14.1 4.9 15 6 15H18V13H6.4C6.3 13 6.2 12.9 6.2 12.8V12.7L7.1 11H14.5C15.3 11 16 10.6 16.4 10L19.9 3.5C20 3.3 20 3.2 20 3C20 2.4 19.6 2 19 2H4.2L3.3 0H0ZM16 16C14.9 16 14 16.9 14 18C14 19.1 14.9 20 16 20C17.1 20 18 19.1 18 18C18 16.9 17.1 16 16 16Z" fill="currentColor"/>
                        </svg>
                        <span class="cart-count"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

