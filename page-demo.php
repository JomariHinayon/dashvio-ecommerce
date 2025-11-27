<?php

get_header();

$demos = function_exists('dashvio_get_prebuilt_demos') ? dashvio_get_prebuilt_demos() : array();
$demo_slug = get_query_var('demo_slug');
$demo_page = get_query_var('demo_page');
$allowed_pages = array('home', 'about', 'contact');

if (!$demo_slug || !isset($demos[$demo_slug])) {
    ?>
    <section class="dashvio-demo-shell dashvio-demo-shell--fallback">
        <div class="dashvio-demo-fallback">
            <p>No demo selected. Please go back to the <a href="<?php echo esc_url(home_url('/prebuilt-websites/')); ?>">Prebuilt Websites</a> page.</p>
        </div>
    </section>
    <?php
    get_footer();
    return;
}

$demo = $demos[$demo_slug];
$demo_page = in_array($demo_page, $allowed_pages, true) ? $demo_page : 'home';
$base_url = trailingslashit(home_url('/demo/' . $demo_slug . '/'));
$about_url = trailingslashit(home_url('/demo/' . $demo_slug . '/about/'));
$contact_url = trailingslashit(home_url('/demo/' . $demo_slug . '/contact/'));
$demo_dir = DASHVIO_DIR . '/demos/' . $demo_slug;
$demo_uri = DASHVIO_URI . '/demos/' . $demo_slug;

if (!is_dir($demo_dir)) {
    ?>
    <section class="dashvio-demo-shell dashvio-demo-shell--fallback">
        <div class="dashvio-demo-fallback">
            <p>The demo folder <strong><?php echo esc_html($demo_slug); ?></strong> is missing. Expected path: <code>wp-content/themes/dashvio/demos/<?php echo esc_html($demo_slug); ?>/</code></p>
        </div>
    </section>
    <?php
    get_footer();
    return;
}

$colors = isset($demo['colors']) ? $demo['colors'] : array();
$primary = $colors['primary'] ?? '#FFA733';
$secondary = $colors['secondary'] ?? '#F7931E';
$accent = $colors['accent'] ?? '#F56102';
$dark = $colors['dark'] ?? '#0E0E0E';
$light = $colors['light'] ?? '#F7F7F7';

$demo_base_url = $base_url;
$demo_about_url = $about_url;
$demo_contact_url = $contact_url;
$demo_data = $demo;

$page_map = array(
    'home' => 'front-page.php',
    'about' => 'page-about.php',
    'contact' => 'page-contact.php',
);

$page_file = $page_map[$demo_page];
$page_path = trailingslashit($demo_dir) . $page_file;
$header_path = trailingslashit($demo_dir) . 'header.php';
$footer_path = trailingslashit($demo_dir) . 'footer.php';
?>

<section class="dashvio-demo-shell" style="--demo-primary: <?php echo esc_attr($primary); ?>; --demo-secondary: <?php echo esc_attr($secondary); ?>; --demo-accent: <?php echo esc_attr($accent); ?>; --demo-dark: <?php echo esc_attr($dark); ?>; --demo-light: <?php echo esc_attr($light); ?>;">
    <?php
    if (file_exists($header_path)) {
        include $header_path;
    }
    
    if (file_exists($page_path)) {
        include $page_path;
    } else {
        ?>
        <section class="dashvio-demo-section">
            <p>Missing template file: <code><?php echo esc_html($page_file); ?></code> inside <code>demos/<?php echo esc_html($demo_slug); ?>/</code></p>
        </section>
        <?php
    }
    
    if (file_exists($footer_path)) {
        include $footer_path;
    }
    ?>
</section>

<?php
get_footer();

