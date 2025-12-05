<?php
$brand_name = $demo_data['name'] ?? 'BEAUTÉ';
$active_home = $demo_page === 'home' ? 'is-active' : '';
$active_about = $demo_page === 'about' ? 'is-active' : '';
$active_contact = $demo_page === 'contact' ? 'is-active' : '';
?>
<header class="dashvio-demo-header dashvio-demo-header--cosmetics">
    <div class="dashvio-demo-brand">
        <div class="dashvio-demo-logo"><?php echo esc_html($brand_name); ?></div>
    </div>
    <button class="dashvio-demo-menu-toggle" aria-label="Toggle menu">
        <span></span>
        <span></span>
        <span></span>
    </button>
    <nav class="dashvio-demo-nav">
        <a href="<?php echo esc_url($demo_base_url); ?>" class="<?php echo esc_attr($active_home); ?>">Home</a>
        <a href="<?php echo esc_url($demo_about_url); ?>" class="<?php echo esc_attr($active_about); ?>">About</a>
        <a href="<?php echo esc_url($demo_contact_url); ?>" class="<?php echo esc_attr($active_contact); ?>">Contact</a>
    </nav>
    <a href="#products" class="dashvio-demo-cta">Shop Now</a>
</header>

