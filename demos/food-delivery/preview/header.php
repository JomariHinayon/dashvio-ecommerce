<?php
$brand_name = $demo_data['name'] ?? 'Dashvio Eats';
$tagline = 'Gourmet delivery in minutes';
$active_home = $demo_page === 'home' ? 'is-active' : '';
$active_about = $demo_page === 'about' ? 'is-active' : '';
$active_contact = $demo_page === 'contact' ? 'is-active' : '';
?>
<header class="dashvio-demo-header dashvio-demo-header--food">
    <div class="dashvio-demo-brand">
        <span class="dashvio-demo-logo"><?php echo esc_html($brand_name); ?></span>
        <p class="dashvio-demo-tagline"><?php echo esc_html($tagline); ?></p>
    </div>
    <nav class="dashvio-demo-nav">
        <a href="<?php echo esc_url($demo_base_url); ?>" class="<?php echo esc_attr($active_home); ?>">Home</a>
        <a href="<?php echo esc_url($demo_about_url); ?>" class="<?php echo esc_attr($active_about); ?>">About Us</a>
        <a href="<?php echo esc_url($demo_contact_url); ?>" class="<?php echo esc_attr($active_contact); ?>">Contact Us</a>
    </nav>
    <a class="dashvio-demo-cta" href="#demo-menu">Order now</a>
</header>
