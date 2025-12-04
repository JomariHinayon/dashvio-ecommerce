<header class="dashvio-demo-header">
    <div class="dashvio-demo-brand">
        <div class="dashvio-demo-logo">FURNISH</div>
        <p class="dashvio-demo-tagline">Modern Living Spaces</p>
    </div>
    <button class="dashvio-demo-menu-toggle" aria-label="Toggle menu">
        <span></span>
        <span></span>
        <span></span>
    </button>
    <nav class="dashvio-demo-nav">
        <a href="<?php echo esc_url($demo_base_url); ?>" class="<?php echo ($demo_page === 'home') ? 'is-active' : ''; ?>">Home</a>
        <a href="<?php echo esc_url($demo_about_url); ?>" class="<?php echo ($demo_page === 'about') ? 'is-active' : ''; ?>">About Us</a>
        <a href="<?php echo esc_url($demo_contact_url); ?>" class="<?php echo ($demo_page === 'contact') ? 'is-active' : ''; ?>">Contact Us</a>
    </nav>
    <a href="#" class="dashvio-demo-cta">Shop Collection</a>
</header>

