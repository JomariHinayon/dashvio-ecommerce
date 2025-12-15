<?php

if (!defined('ABSPATH')) {
    exit;
}

define('DASHVIO_VERSION', '1.0.0');
define('DASHVIO_DIR', get_template_directory());
define('DASHVIO_URI', get_template_directory_uri());

require_once DASHVIO_DIR . '/inc/setup.php';
require_once DASHVIO_DIR . '/inc/enqueue.php';
require_once DASHVIO_DIR . '/inc/security.php';
require_once DASHVIO_DIR . '/inc/custom-functions.php';
require_once DASHVIO_DIR . '/inc/template-functions.php';
require_once DASHVIO_DIR . '/inc/woocommerce.php';
require_once DASHVIO_DIR . '/inc/theme-options.php';
require_once DASHVIO_DIR . '/inc/ajax-handlers.php';
require_once DASHVIO_DIR . '/inc/admin-prebuilt.php';

if (did_action('elementor/loaded')) {
    require_once DASHVIO_DIR . '/inc/elementor/elementor.php';
}

