<?php

if (!defined('ABSPATH')) {
    exit;
}

function dashvio_create_prebuilt_websites_page() {
    $pages = array(
        array(
            'title' => 'Prebuilt Websites',
            'slug' => 'prebuilt-websites',
            'template' => 'page-prebuilt-websites.php',
        ),
        array(
            'title' => 'Demo',
            'slug' => 'demo',
            'template' => 'page-demo.php',
        ),
    );
    
    foreach ($pages as $page_data) {
        $existing_page = get_page_by_path($page_data['slug']);
        
        if (!$existing_page) {
            $new_page_id = wp_insert_post(array(
                'post_title' => $page_data['title'],
                'post_name' => $page_data['slug'],
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_content' => '',
            ));
            
            if ($new_page_id) {
                update_post_meta($new_page_id, '_wp_page_template', $page_data['template']);
            }
        }
    }
}
add_action('after_switch_theme', 'dashvio_create_prebuilt_websites_page');

function dashvio_register_demo_rewrite() {
    add_rewrite_rule('^demo/([^/]+)/?$', 'index.php?demo=1&demo_slug=$matches[1]&demo_page=home', 'top');
    add_rewrite_rule('^demo/([^/]+)/about/?$', 'index.php?demo=1&demo_slug=$matches[1]&demo_page=about', 'top');
    add_rewrite_rule('^demo/([^/]+)/contact/?$', 'index.php?demo=1&demo_slug=$matches[1]&demo_page=contact', 'top');
}
add_action('init', 'dashvio_register_demo_rewrite');

function dashvio_add_demo_query_vars($vars) {
    $vars[] = 'demo';
    $vars[] = 'demo_slug';
    $vars[] = 'demo_page';
    return $vars;
}
add_filter('query_vars', 'dashvio_add_demo_query_vars');

function dashvio_flush_demo_rewrite() {
    dashvio_register_demo_rewrite();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'dashvio_flush_demo_rewrite');

function dashvio_load_demo_template($template) {
    if (get_query_var('demo')) {
        $demo_template = locate_template('page-demo.php');
        if ($demo_template) {
            return $demo_template;
        }
    }
    return $template;
}
add_filter('template_include', 'dashvio_load_demo_template');

function dashvio_demo_body_class($classes) {
    if (get_query_var('demo')) {
        $classes[] = 'dashvio-demo-active';
    }
    return $classes;
}
add_filter('body_class', 'dashvio_demo_body_class');

function dashvio_prebuilt_enqueue() {
    if (is_page('prebuilt-websites') || is_page_template('page-prebuilt-websites.php')) {
        wp_enqueue_style(
            'dashvio-prebuilt',
            DASHVIO_URI . '/assets/css/prebuilt.css',
            array(),
            DASHVIO_VERSION
        );
        
        wp_enqueue_script(
            'dashvio-prebuilt',
            DASHVIO_URI . '/assets/js/prebuilt.js',
            array('jquery'),
            DASHVIO_VERSION,
            true
        );
    }
    
    if (is_page('demo') || is_page_template('page-demo.php') || get_query_var('demo')) {
        wp_enqueue_style(
            'dashvio-demo-shell',
            DASHVIO_URI . '/assets/css/demo.css',
            array(),
            DASHVIO_VERSION
        );
        
        $demo_slug = get_query_var('demo_slug');
        if ($demo_slug) {
            $demo_style_path = DASHVIO_DIR . '/demos/' . $demo_slug . '/style.css';
            if (file_exists($demo_style_path)) {
                wp_enqueue_style(
                    'dashvio-demo-' . $demo_slug,
                    DASHVIO_URI . '/demos/' . $demo_slug . '/style.css',
                    array('dashvio-demo-shell'),
                    DASHVIO_VERSION
                );
            }
        }
    }
}
add_action('wp_enqueue_scripts', 'dashvio_prebuilt_enqueue');

function dashvio_get_prebuilt_demos() {
    return array(
        'car-accessories' => array(
            'id' => 'car-accessories',
            'name' => 'Car Accessories',
            'category' => 'car-accessories',
            'description' => 'Perfect for automotive parts, car accessories, and vehicle-related products.',
            'thumbnail' => DASHVIO_URI . '/assets/images/demos/car-accessories-thumb.png',
            'thumbnail_placeholder' => DASHVIO_URI . '/assets/images/demos/car-accessories-thumb.png',
            'preview_url' => home_url('/demo/car-accessories/'),
            'colors' => array(
                'primary' => '#FF6B35',
                'secondary' => '#F7931E',
                'accent' => '#FFA500',
                'dark' => '#0B0D12',
                'light' => '#F7F6F2',
            ),
            'features' => array(
                'WooCommerce Ready',
                'Responsive Design',
                'Dark Mode Support',
                'Product Catalog',
            ),
            'home' => array(
                'eyebrow' => 'Premium Automotive Gear',
                'title' => 'Drive in Style with Curated Car Accessories',
                'subtitle' => 'Upgrade your ride with leather-crafted interiors, smart devices, and everyday essentials built for performance and comfort.',
                'primary_cta' => 'Shop Accessories',
                'secondary_cta' => 'View Catalogue',
                'stats' => array(
                    array('label' => 'New arrivals', 'value' => '150+'),
                    array('label' => 'Certified brands', 'value' => '20'),
                    array('label' => 'Customer rating', 'value' => '4.9/5'),
                ),
                'collections' => array(
                    array(
                        'title' => 'Smart Cockpit Tech',
                        'description' => 'HUD displays, performance monitors, and voice assistants tailor-fit for every model.',
                    ),
                    array(
                        'title' => 'Comfort Interiors',
                        'description' => 'Premium seat covers, cooling cushions, and protective mats for all weather drives.',
                    ),
                    array(
                        'title' => 'Adventure Ready',
                        'description' => 'Roof racks, modular storage, and rugged lights for off-road journeys.',
                    ),
                ),
                'products' => array(
                    array(
                        'name' => 'Contour Leather Seat Kit',
                        'price' => '$249',
                        'tag' => 'Bestseller',
                        'image' => 'https://via.placeholder.com/420x320/1F1F1F/FFFFFF?text=Leather+Seat+Kit',
                    ),
                    array(
                        'name' => 'Matrix HUD Display',
                        'price' => '$189',
                        'tag' => 'Smart Tech',
                        'image' => 'https://via.placeholder.com/420x320/212733/FFFFFF?text=HUD+Display',
                    ),
                    array(
                        'name' => 'Adaptive Roof Carrier',
                        'price' => '$329',
                        'tag' => 'New',
                        'image' => 'https://via.placeholder.com/420x320/0F1A24/FFFFFF?text=Roof+Carrier',
                    ),
                ),
            ),
            'about' => array(
                'title' => 'Engineered for Drivers Who Demand More',
                'content' => 'Dashvio Garage curates performance-driven accessories for premium and enthusiast vehicles. We collaborate with OEM-certified makers, ensuring every piece meets safety, durability, and style standards.',
                'highlights' => array(
                    'Curated catalog for sedans, SUVs, and sports builds.',
                    'Personalized fitting support with real technicians.',
                    'Nationwide fulfillment with 24/7 after-sales assistance.',
                ),
                'timeline' => array(
                    array('year' => '2015', 'text' => 'Started as a bespoke detailing studio.'),
                    array('year' => '2018', 'text' => 'Launched our first premium accessories line.'),
                    array('year' => '2024', 'text' => 'Powered 5K+ garage upgrades worldwide.'),
                ),
            ),
            'contact' => array(
                'title' => 'Let’s build your next upgrade',
                'description' => 'Tell us about your vehicle, driving habits, and wishlist. Our specialists will curate a personalized upgrade kit within 24 hours.',
                'channels' => array(
                    array('label' => 'Service desk', 'value' => 'garage@dashvio.com'),
                    array('label' => 'Call us', 'value' => '+1 (415) 555-0149'),
                    array('label' => 'Showroom', 'value' => '1430 Bryant Street, San Francisco'),
                ),
                'hours' => 'Mon – Sat · 9:00 AM – 7:00 PM PST',
            ),
        ),
    );
}

function dashvio_get_demo_categories() {
    return array(
        'all' => array(
            'name' => 'All',
            'count' => 1,
        ),
        'car-accessories' => array(
            'name' => 'Car Accessories',
            'count' => 1,
        ),
    );
}

function dashvio_prebuilt_websites_content() {
    $demos = dashvio_get_prebuilt_demos();
    $categories = dashvio_get_demo_categories();
    $active_category = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : 'all';
    
    $current_url = get_permalink();
    ?>
    <div class="container">
        <div class="dashvio-prebuilt-wrap">
            <h1 class="dashvio-prebuilt-title">Prebuilt Websites</h1>
        
        <div class="dashvio-prebuilt-hero">
            <div class="dashvio-prebuilt-hero-content">
                <h2 class="dashvio-prebuilt-hero-number">1+</h2>
                <h3 class="dashvio-prebuilt-hero-text">Prebuilt websites for WooCommerce</h3>
                <p class="dashvio-prebuilt-hero-description">
                    Eager to get your store online? With just one click, you'll be able to import one of these fast, responsive, and beautiful demos into your WooCommerce website.
                </p>
            </div>
        </div>
        
        <div class="dashvio-prebuilt-content">
            <div class="dashvio-prebuilt-sidebar">
                <div class="dashvio-prebuilt-search">
                    <input 
                        type="text" 
                        id="dashvio-demo-search" 
                        class="dashvio-prebuilt-search-input" 
                        placeholder="Search demos by keyword (e.g. 'car')"
                    />
                    <span class="dashvio-prebuilt-search-icon">🔍</span>
                </div>
                
                <div class="dashvio-prebuilt-categories">
                    <h4 class="dashvio-prebuilt-categories-title">Categories</h4>
                    <ul class="dashvio-prebuilt-categories-list">
                        <?php foreach ($categories as $cat_id => $category): ?>
                            <li class="dashvio-prebuilt-category-item <?php echo $active_category === $cat_id ? 'active' : ''; ?>">
                                <a href="<?php echo esc_url(add_query_arg('category', $cat_id, $current_url)); ?>" class="dashvio-prebuilt-category-link">
                                    <span class="dashvio-prebuilt-category-name"><?php echo esc_html($category['name']); ?></span>
                                    <span class="dashvio-prebuilt-category-count"><?php echo esc_html($category['count']); ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            
            <div class="dashvio-prebuilt-main">
                <div class="dashvio-prebuilt-grid" id="dashvio-demo-grid">
                    <?php 
                    $filtered_demos = $demos;
                    if ($active_category !== 'all') {
                        $filtered_demos = array_filter($demos, function($demo) use ($active_category) {
                            return $demo['category'] === $active_category;
                        });
                    }
                    
                    foreach ($filtered_demos as $demo): 
                    ?>
                        <div class="dashvio-prebuilt-demo" data-demo-id="<?php echo esc_attr($demo['id']); ?>" data-category="<?php echo esc_attr($demo['category']); ?>">
                            <div class="dashvio-prebuilt-demo-thumbnail">
                                <?php 
                                $thumbnail_url = isset($demo['thumbnail_placeholder']) ? $demo['thumbnail_placeholder'] : $demo['thumbnail'];
                                ?>
                                <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($demo['name']); ?>" onerror="this.src='<?php echo esc_url($demo['thumbnail_placeholder'] ?? 'https://via.placeholder.com/600x450/FF6B35/FFFFFF?text=' . urlencode($demo['name'])); ?>'" />
                                <a class="dashvio-prebuilt-demo-overlay" href="<?php echo esc_url($demo['preview_url']); ?>" target="_blank" rel="noopener">
                                    <span class="dashvio-prebuilt-import-text">Try Demo</span>
                                </a>
                            </div>
                            <div class="dashvio-prebuilt-demo-info">
                                <h4 class="dashvio-prebuilt-demo-name"><?php echo esc_html($demo['name']); ?></h4>
                                <p class="dashvio-prebuilt-demo-description"><?php echo esc_html($demo['description']); ?></p>
                                <div class="dashvio-prebuilt-demo-features">
                                    <?php foreach ($demo['features'] as $feature): ?>
                                        <span class="dashvio-prebuilt-demo-feature"><?php echo esc_html($feature); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        </div>
    </div>
    <?php
}

