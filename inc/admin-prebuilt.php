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
        
        wp_localize_script('dashvio-prebuilt', 'dashvioPrebuilt', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('dashvio_import_demo_nonce'),
        ));
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
            $demo_style_path = DASHVIO_DIR . '/demos/' . $demo_slug . '/preview/style.css';
            if (file_exists($demo_style_path)) {
                wp_enqueue_style(
                    'dashvio-demo-' . $demo_slug,
                    DASHVIO_URI . '/demos/' . $demo_slug . '/preview/style.css',
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
        'food-delivery' => array(
            'id' => 'food-delivery',
            'name' => 'Food Delivery',
            'category' => 'food',
            'description' => 'Built for restaurant groups, cloud kitchens, and premium food delivery brands.',
            'thumbnail' => DASHVIO_URI . '/assets/images/demos/food-delivery-thumb.png',
            'thumbnail_placeholder' => DASHVIO_URI . '/assets/images/demos/food-delivery-thumb.png',
            'preview_url' => home_url('/demo/food-delivery/'),
            'colors' => array(
                'primary' => '#E63946',
                'secondary' => '#F77F00',
                'accent' => '#FFCD38',
                'dark' => '#2B2D42',
                'light' => '#FFFFFF',
            ),
            'features' => array(
                'Menu showcase',
                'Chef spotlights',
                'Dark mode ready',
                'Logistics CTA',
            ),
        ),
        'fashion' => array(
            'id' => 'fashion',
            'name' => 'Fashion Atelier',
            'category' => 'fashion',
            'description' => 'Minimal luxury design for high-end fashion brands and boutique retailers.',
            'thumbnail' => DASHVIO_URI . '/assets/images/demos/fashion-thumb.png',
            'thumbnail_placeholder' => DASHVIO_URI . '/assets/images/demos/fashion-thumb.png',
            'preview_url' => home_url('/demo/fashion/'),
            'colors' => array(
                'primary' => '#000000',
                'secondary' => '#333333',
                'accent' => '#B4B4B4',
                'dark' => '#000000',
                'light' => '#FFFFFF',
            ),
            'features' => array(
                'Minimal luxury design',
                'Collection showcase',
                'Premium typography',
                'Elegant animations',
            ),
        ),
    );
}

function dashvio_get_demo_categories() {
    return array(
        'all' => array(
            'name' => 'All',
            'count' => 3,
        ),
        'car-accessories' => array(
            'name' => 'Car Accessories',
            'count' => 1,
        ),
        'food' => array(
            'name' => 'Food & Beverage',
            'count' => 1,
        ),
        'fashion' => array(
            'name' => 'Fashion',
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
                                <div class="dashvio-prebuilt-demo-actions">
                                    <a href="<?php echo esc_url($demo['preview_url']); ?>" target="_blank" rel="noopener" class="dashvio-prebuilt-btn dashvio-prebuilt-btn--preview">Try Demo</a>
                                    <button type="button" class="dashvio-prebuilt-btn dashvio-prebuilt-btn--import" data-demo-id="<?php echo esc_attr($demo['id']); ?>" data-demo-name="<?php echo esc_attr($demo['name']); ?>">Import Demo</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        </div>
    </div>
    
    <div class="dashvio-modal" id="dashvio-import-modal">
        <div class="dashvio-modal-overlay"></div>
        <div class="dashvio-modal-content">
            <div class="dashvio-modal-header">
                <h3 class="dashvio-modal-title">Import Demo</h3>
                <button type="button" class="dashvio-modal-close" aria-label="Close">&times;</button>
            </div>
            <div class="dashvio-modal-body">
                <p class="dashvio-modal-message"></p>
                <div class="dashvio-modal-pages" style="display: none;">
                    <p class="dashvio-modal-subtitle">Pages created:</p>
                    <ul class="dashvio-modal-pages-list"></ul>
                </div>
            </div>
            <div class="dashvio-modal-footer">
                <button type="button" class="dashvio-modal-btn dashvio-modal-btn--cancel">Cancel</button>
                <button type="button" class="dashvio-modal-btn dashvio-modal-btn--confirm">Confirm</button>
            </div>
        </div>
    </div>
    
    <div class="dashvio-modal" id="dashvio-success-modal">
        <div class="dashvio-modal-overlay"></div>
        <div class="dashvio-modal-content">
            <div class="dashvio-modal-header">
                <h3 class="dashvio-modal-title">Success!</h3>
                <button type="button" class="dashvio-modal-close" aria-label="Close">&times;</button>
            </div>
            <div class="dashvio-modal-body">
                <p class="dashvio-modal-message"></p>
                <div class="dashvio-modal-pages">
                    <p class="dashvio-modal-subtitle">Pages created:</p>
                    <ul class="dashvio-modal-pages-list"></ul>
                </div>
            </div>
            <div class="dashvio-modal-footer">
                <button type="button" class="dashvio-modal-btn dashvio-modal-btn--secondary dashvio-modal-btn--close">Close</button>
                <button type="button" class="dashvio-modal-btn dashvio-modal-btn--primary dashvio-modal-btn--edit">Open in Elementor</button>
            </div>
        </div>
    </div>
    
    <div class="dashvio-modal" id="dashvio-error-modal">
        <div class="dashvio-modal-overlay"></div>
        <div class="dashvio-modal-content">
            <div class="dashvio-modal-header">
                <h3 class="dashvio-modal-title">Error</h3>
                <button type="button" class="dashvio-modal-close" aria-label="Close">&times;</button>
            </div>
            <div class="dashvio-modal-body">
                <p class="dashvio-modal-message"></p>
            </div>
            <div class="dashvio-modal-footer">
                <button type="button" class="dashvio-modal-btn dashvio-modal-btn--primary dashvio-modal-btn--close">Close</button>
            </div>
        </div>
    </div>
    
    <?php
}

function dashvio_import_demo_ajax() {
    check_ajax_referer('dashvio_import_demo_nonce', 'nonce');
    
    if (!current_user_can('edit_pages')) {
        wp_send_json_error('Insufficient permissions.');
        return;
    }
    
    $demo_id = isset($_POST['demo_id']) ? sanitize_text_field($_POST['demo_id']) : '';
    
    if (empty($demo_id)) {
        wp_send_json_error('Demo ID is required.');
        return;
    }
    
    $demos = dashvio_get_prebuilt_demos();
    
    if (!isset($demos[$demo_id])) {
        wp_send_json_error('Demo not found.');
        return;
    }
    
    $demo = $demos[$demo_id];
    $demo_dir = DASHVIO_DIR . '/demos/' . $demo_id;
    $elementor_dir = trailingslashit($demo_dir) . 'elementor';
    
    if (!is_dir($elementor_dir)) {
        wp_send_json_error('Elementor data folder not found.');
        return;
    }
    
    if (!did_action('elementor/loaded')) {
        wp_send_json_error('Elementor plugin is not active. Please install and activate Elementor first.');
        return;
    }
    
    $pages_created = array();
    $page_map = array(
        'home' => array('file' => 'home.json', 'title' => 'Home - ' . $demo['name'], 'slug' => 'home-' . $demo_id),
        'about' => array('file' => 'about.json', 'title' => 'About Us - ' . $demo['name'], 'slug' => 'about-' . $demo_id),
        'contact' => array('file' => 'contact.json', 'title' => 'Contact - ' . $demo['name'], 'slug' => 'contact-' . $demo_id),
    );
    
    $first_page_id = null;
    
    foreach ($page_map as $page_key => $page_data) {
        $preview_file_map = array(
            'home' => 'front-page.php',
            'about' => 'page-about.php',
            'contact' => 'page-contact.php',
        );
        
        $preview_filename = isset($preview_file_map[$page_key]) ? $preview_file_map[$page_key] : '';
        if (empty($preview_filename)) {
            continue;
        }
        
        $preview_file = trailingslashit($demo_dir) . 'preview/' . $preview_filename;
        
        if (!file_exists($preview_file)) {
            continue;
        }
        
        $demo_assets_uri = trailingslashit(DASHVIO_URI) . 'demos/' . $demo_id . '/preview/assets';
        
        ob_start();
        $preview_assets = $demo_assets_uri;
        $demo_uri = trailingslashit(DASHVIO_URI) . 'demos/' . $demo_id;
        
        if (!is_readable($preview_file)) {
            ob_end_clean();
            continue;
        }
        
        $old_error_level = error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
        include $preview_file;
        error_reporting($old_error_level);
        $html_content = ob_get_clean();
        
        $html_content = str_replace('<?php', '', $html_content);
        $html_content = preg_replace('/<\?php.*?\?>/s', '', $html_content);
        
        if (empty(trim($html_content))) {
            continue;
        }
        
        $elementor_data = dashvio_convert_html_to_elementor($html_content);
        
        if (empty($elementor_data) || !is_array($elementor_data) || count($elementor_data) === 0) {
            continue;
        }
        
        $page_id = wp_insert_post(array(
            'post_title' => $page_data['title'],
            'post_name' => $page_data['slug'],
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_content' => '',
        ));
        
        if (is_wp_error($page_id)) {
            continue;
        }
        
        if (!$first_page_id) {
            $first_page_id = $page_id;
        }
        
        $demo_css_path = trailingslashit($demo_dir) . 'preview/style.css';
        $demo_css = '';
        if (file_exists($demo_css_path)) {
            $demo_css = file_get_contents($demo_css_path);
            $demo_css_uri = trailingslashit(DASHVIO_URI) . 'demos/' . $demo_id . '/preview/assets';
            $demo_css = str_replace('/preview/assets', $demo_css_uri, $demo_css);
            $demo_css = str_replace('url(preview/assets/', 'url(' . $demo_css_uri . '/', $demo_css);
        }
        
        $demo_css_link = '<link rel="stylesheet" href="' . esc_url(trailingslashit(DASHVIO_URI) . 'demos/' . $demo_id . '/preview/style.css') . '?v=' . time() . '">';
        $demo_css_inline = $demo_css ? '<style id="dashvio-demo-' . $demo_id . '-css">' . $demo_css . '</style>' : '';
        
        update_post_meta($page_id, '_elementor_edit_mode', 'builder');
        update_post_meta($page_id, '_elementor_template_type', 'wp-page');
        update_post_meta($page_id, '_elementor_version', ELEMENTOR_VERSION);
        update_post_meta($page_id, '_elementor_pro_version', defined('ELEMENTOR_PRO_VERSION') ? ELEMENTOR_PRO_VERSION : '');
        update_post_meta($page_id, '_elementor_data', wp_slash(wp_json_encode($elementor_data)));
        update_post_meta($page_id, '_elementor_css', wp_slash($demo_css));
        update_post_meta($page_id, '_dashvio_demo_id', $demo_id);
        update_post_meta($page_id, '_dashvio_demo_css', wp_slash($demo_css));
        
        $page_settings = array(
            'custom_css' => $demo_css,
        );
        update_post_meta($page_id, '_elementor_page_settings', $page_settings);
        
        if (function_exists('\\Elementor\\Plugin::$instance')) {
            \Elementor\Plugin::$instance->files_manager->clear_cache();
        }
        
        $pages_created[] = $page_data['title'] . ' (ID: ' . $page_id . ')';
    }
    
    if (empty($pages_created)) {
        $error_msg = 'No pages were created. ';
        $error_msg .= 'Preview files checked: ';
        foreach ($page_map as $page_key => $page_data) {
            $preview_file_map = array(
                'home' => 'front-page.php',
                'about' => 'page-about.php',
                'contact' => 'page-contact.php',
            );
            $preview_filename = isset($preview_file_map[$page_key]) ? $preview_file_map[$page_key] : '';
            if ($preview_filename) {
                $preview_file = trailingslashit($demo_dir) . 'preview/' . $preview_filename;
                $error_msg .= $preview_filename . ' (' . (file_exists($preview_file) ? 'exists' : 'missing') . '), ';
            }
        }
        wp_send_json_error($error_msg);
        return;
    }
    
    $edit_url = $first_page_id ? admin_url('post.php?post=' . $first_page_id . '&action=elementor') : '';
    
    wp_send_json_success(array(
        'pages' => $pages_created,
        'edit_url' => $edit_url,
        'message' => 'Demo imported successfully!',
    ));
}
add_action('wp_ajax_dashvio_import_demo', 'dashvio_import_demo_ajax');

function dashvio_convert_html_to_elementor($html) {
    $sections = array();
    
    preg_match_all('/<section[^>]*class="([^"]*)"[^>]*>(.*?)<\/section>/s', $html, $section_matches, PREG_SET_ORDER);
    
    if (empty($section_matches)) {
        $sections[] = array(
            'id' => 'el' . wp_generate_password(7, false),
            'elType' => 'section',
            'settings' => array(
                'layout' => 'boxed',
            ),
            'elements' => array(
                array(
                    'id' => 'el' . wp_generate_password(7, false),
                    'elType' => 'column',
                    'settings' => array(
                        '_column_size' => 100,
                    ),
                    'elements' => array(
                        array(
                            'id' => 'el' . wp_generate_password(7, false),
                            'elType' => 'widget',
                            'widgetType' => 'html',
                            'settings' => array(
                                'html' => $html,
                            ),
                        ),
                    ),
                ),
            ),
        );
        return $sections;
    }
    
    foreach ($section_matches as $section_match) {
        $section_class = $section_match[1];
        $section_content = $section_match[2];
        
        $section_id = 'el' . wp_generate_password(7, false);
        $column_id = 'el' . wp_generate_password(7, false);
        $widget_id = 'el' . wp_generate_password(7, false);
        
        $sections[] = array(
            'id' => $section_id,
            'elType' => 'section',
            'settings' => array(
                'layout' => 'boxed',
                'padding' => array(
                    'unit' => 'px',
                    'top' => '80',
                    'right' => '20',
                    'bottom' => '80',
                    'left' => '20',
                ),
            ),
            'elements' => array(
                array(
                    'id' => $column_id,
                    'elType' => 'column',
                    'settings' => array(
                        '_column_size' => 100,
                    ),
                    'elements' => array(
                        array(
                            'id' => $widget_id,
                            'elType' => 'widget',
                            'widgetType' => 'html',
                            'settings' => array(
                                'html' => '<section class="' . esc_attr($section_class) . '">' . wp_kses_post($section_content) . '</section>',
                            ),
                        ),
                    ),
                ),
            ),
        );
    }
    
    return $sections;
}

add_action('elementor/frontend/after_enqueue_styles', 'dashvio_enqueue_demo_css_in_elementor');
function dashvio_enqueue_demo_css_in_elementor() {
    if (!is_page()) {
        return;
    }
    
    $page_id = get_the_ID();
    $demo_id = get_post_meta($page_id, '_dashvio_demo_id', true);
    
    if ($demo_id) {
        $demo_css_path = DASHVIO_DIR . '/demos/' . $demo_id . '/preview/style.css';
        if (file_exists($demo_css_path)) {
            wp_enqueue_style(
                'dashvio-demo-elementor-' . $demo_id,
                DASHVIO_URI . '/demos/' . $demo_id . '/preview/style.css',
                array(),
                DASHVIO_VERSION
            );
        }
    }
}

add_action('elementor/editor/wp_head', 'dashvio_inject_demo_css_in_editor');
function dashvio_inject_demo_css_in_editor() {
    if (!isset($_GET['post'])) {
        return;
    }
    
    $page_id = intval($_GET['post']);
    $demo_id = get_post_meta($page_id, '_dashvio_demo_id', true);
    
    if ($demo_id) {
        $demo_css_path = DASHVIO_DIR . '/demos/' . $demo_id . '/preview/style.css';
        if (file_exists($demo_css_path)) {
            $demo_css = file_get_contents($demo_css_path);
            $demo_css_uri = trailingslashit(DASHVIO_URI) . 'demos/' . $demo_id . '/preview/assets';
            $demo_css = str_replace('/preview/assets', $demo_css_uri, $demo_css);
            $demo_css = str_replace('url(preview/assets/', 'url(' . $demo_css_uri . '/', $demo_css);
            
            $demo_shell_css = DASHVIO_DIR . '/assets/css/demo.css';
            if (file_exists($demo_shell_css)) {
                $shell_css = file_get_contents($demo_shell_css);
                $demo_css = $shell_css . "\n\n" . $demo_css;
            }
            
            echo '<link rel="stylesheet" href="' . esc_url(DASHVIO_URI . '/demos/' . $demo_id . '/preview/style.css') . '?v=' . time() . '">';
            echo '<link rel="stylesheet" href="' . esc_url(DASHVIO_URI . '/assets/css/demo.css') . '?v=' . time() . '">';
            echo '<style id="dashvio-demo-editor-css">' . wp_strip_all_tags($demo_css) . '</style>';
        }
    }
}

add_action('elementor/frontend/before_enqueue_styles', 'dashvio_enqueue_demo_css_before_elementor');
function dashvio_enqueue_demo_css_before_elementor() {
    if (!is_page()) {
        return;
    }
    
    $page_id = get_the_ID();
    $demo_id = get_post_meta($page_id, '_dashvio_demo_id', true);
    
    if ($demo_id) {
        wp_enqueue_style(
            'dashvio-demo-shell',
            DASHVIO_URI . '/assets/css/demo.css',
            array(),
            DASHVIO_VERSION
        );
        
        wp_enqueue_style(
            'dashvio-demo-' . $demo_id,
            DASHVIO_URI . '/demos/' . $demo_id . '/preview/style.css',
            array('dashvio-demo-shell'),
            DASHVIO_VERSION
        );
    }
}

