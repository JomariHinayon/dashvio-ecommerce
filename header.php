<!DOCTYPE html>
<html <?php language_attributes(); ?>>
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

            <nav class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'menu-primary',
                    'fallback_cb' => false,
                ));
                ?>
            </nav>

            <div class="header-actions">
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

