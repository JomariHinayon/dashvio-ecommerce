<?php

if (!defined('ABSPATH')) {
    exit;
}

function dashassist_add_admin_menu() {
    add_menu_page(
        'DashAssist AI',
        'DashAssist AI',
        'manage_options',
        'dashassist-ai',
        'dashassist_admin_page',
        'dashicons-admin-generic',
        30
    );
    
    add_submenu_page(
        'dashassist-ai',
        'Settings',
        'Settings',
        'manage_options',
        'dashassist-ai',
        'dashassist_admin_page'
    );
}
add_action('admin_menu', 'dashassist_add_admin_menu');

function dashassist_enqueue_admin_assets($hook) {
    $enabled = dashvio_get_theme_option('dashassist_enabled', '1');
    if ($enabled !== '1') {
        return;
    }
    
    $is_elementor = (isset($_GET['action']) && $_GET['action'] === 'elementor');
    $screen = get_current_screen();
    $is_editor = ($screen && ($screen->is_block_editor() || $screen->base === 'post'));
    
    if ($is_elementor || $is_editor || $hook === 'toplevel_page_dashassist-ai') {
        wp_enqueue_style(
            'dashassist-admin',
            DASHVIO_URI . '/assets/css/dashassist-admin.css',
            array(),
            DASHVIO_VERSION
        );
        
        wp_enqueue_script(
            'dashassist-admin',
            DASHVIO_URI . '/assets/js/dashassist-admin.js',
            array('jquery', 'elementor-frontend'),
            DASHVIO_VERSION,
            true
        );
        
        wp_localize_script('dashassist-admin', 'dashassistData', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('dashassist-nonce'),
        ));
    }
}
add_action('admin_enqueue_scripts', 'dashassist_enqueue_admin_assets');

function dashassist_enqueue_elementor_assets() {
    $enabled = dashvio_get_theme_option('dashassist_enabled', '1');
    if ($enabled !== '1') {
        return;
    }
    
    wp_enqueue_style(
        'dashassist-admin',
        DASHVIO_URI . '/assets/css/dashassist-admin.css',
        array(),
        DASHVIO_VERSION
    );
    
    wp_enqueue_script(
        'dashassist-admin',
        DASHVIO_URI . '/assets/js/dashassist-admin.js',
        array('jquery'),
        DASHVIO_VERSION,
        true
    );
    
    wp_localize_script('dashassist-admin', 'dashassistData', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('dashassist-nonce'),
    ));
}
add_action('elementor/editor/before_enqueue_scripts', 'dashassist_enqueue_elementor_assets');

function dashassist_admin_page() {
    if (isset($_POST['dashassist_save_settings']) && check_admin_referer('dashassist_save_settings')) {
        $api_key = isset($_POST['openai_api_key']) ? sanitize_text_field($_POST['openai_api_key']) : '';
        dashvio_update_theme_option('dashassist_openai_api_key', $api_key);
        
        $enabled = isset($_POST['dashassist_enabled']) ? '1' : '0';
        dashvio_update_theme_option('dashassist_enabled', $enabled);
        
        echo '<div class="notice notice-success"><p>Settings saved successfully!</p></div>';
    }
    
    $api_key = dashvio_get_theme_option('dashassist_openai_api_key', '');
    $enabled = dashvio_get_theme_option('dashassist_enabled', '1');
    $env_key = defined('OPENAI_API_KEY') ? 'Set in .env file' : 'Not set';
    ?>
    <div class="wrap">
        <h1>DashAssist AI Settings</h1>
        
        <form method="post" action="">
            <?php wp_nonce_field('dashassist_save_settings'); ?>
            
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="dashassist_enabled">Enable DashAssist AI</label>
                    </th>
                    <td>
                        <input type="checkbox" id="dashassist_enabled" name="dashassist_enabled" value="1" <?php checked($enabled, '1'); ?>>
                        <p class="description">Enable AI tools for users</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="openai_api_key">OpenAI API Key</label>
                    </th>
                    <td>
                        <input type="password" id="openai_api_key" name="openai_api_key" value="<?php echo esc_attr($api_key); ?>" class="regular-text">
                        <p class="description">
                            Enter your OpenAI API key here, or set it in the .env file as OPENAI_API_KEY.
                            <?php if (defined('OPENAI_API_KEY')) : ?>
                                <br><strong>Note: API key is currently set in .env file (takes priority).</strong>
                            <?php endif; ?>
                        </p>
                    </td>
                </tr>
            </table>
            
            <?php submit_button('Save Settings'); ?>
        </form>
        
        <div class="card" style="max-width: 800px; margin-top: 20px;">
            <h2>Available AI Tools</h2>
            <ul>
                <li><strong>Rewrite Text:</strong> Improve and rewrite any text in different tones</li>
                <li><strong>Suggest Keywords:</strong> Generate SEO keywords based on your content</li>
                <li><strong>Create SEO Titles/Descriptions:</strong> Generate optimized SEO titles and meta descriptions</li>
            </ul>
            <p>These tools are available in the Elementor editor and WordPress post editor for all logged-in users.</p>
        </div>
    </div>
    <?php
}

