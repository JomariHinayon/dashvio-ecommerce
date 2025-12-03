<?php
defined('ABSPATH') || exit;

do_action('woocommerce_before_account_navigation');

$current_user = wp_get_current_user();
?>

<div class="woocommerce-account-wrapper">
    <!-- User Profile Header -->
    <div class="woocommerce-account-header">
        <div class="woocommerce-account-avatar">
            <?php echo get_avatar($current_user->ID, 80); ?>
        </div>
        <div class="woocommerce-account-info">
            <h2 class="woocommerce-account-name"><?php echo esc_html($current_user->display_name); ?></h2>
            <p class="woocommerce-account-email"><?php echo esc_html($current_user->user_email); ?></p>
        </div>
    </div>

    <div class="woocommerce-account-content-wrapper">
        <nav class="woocommerce-MyAccount-navigation">
            <ul>
                <?php 
                $menu_icons = array(
                    'dashboard' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>',
                    'orders' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>',
                    'downloads' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>',
                    'edit-address' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>',
                    'edit-account' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>',
                    'customer-logout' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>',
                );
                
                foreach (wc_get_account_menu_items() as $endpoint => $label) : 
                    $icon = isset($menu_icons[$endpoint]) ? $menu_icons[$endpoint] : '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/></svg>';
                ?>
                    <li class="<?php echo wc_get_account_menu_item_classes($endpoint); ?>">
                        <a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>" class="woocommerce-account-menu-link">
                            <span class="woocommerce-account-menu-icon"><?php echo $icon; ?></span>
                            <span class="woocommerce-account-menu-label"><?php echo esc_html($label); ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <?php do_action('woocommerce_after_account_navigation'); ?>

        <div class="woocommerce-MyAccount-content">
            <?php
            do_action('woocommerce_account_content');
            ?>
        </div>
    </div>
</div>

