<?php

if (!defined('ABSPATH')) {
    exit;
}

function dashvio_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    
    $time_string = sprintf(
        $time_string,
        esc_attr(get_the_date('c')),
        esc_html(get_the_date())
    );
    
    echo '<span class="posted-on">' . $time_string . '</span>';
}

function dashvio_posted_by() {
    echo '<span class="byline">';
    echo 'by <a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">';
    echo esc_html(get_the_author());
    echo '</a>';
    echo '</span>';
}

function dashvio_entry_footer() {
    $categories_list = get_the_category_list(', ');
    if ($categories_list) {
        echo '<span class="cat-links">' . $categories_list . '</span>';
    }
    
    $tags_list = get_the_tag_list('', ', ');
    if ($tags_list) {
        echo '<span class="tags-links">' . $tags_list . '</span>';
    }
}

function dashvio_get_attachment_image($attachment_id, $size = 'full') {
    $image = wp_get_attachment_image_src($attachment_id, $size);
    
    if (!$image) {
        return '';
    }
    
    return esc_url($image[0]);
}

function dashvio_pagination() {
    if (!isset($GLOBALS['wp_query'])) {
        return;
    }
    
    $total = $GLOBALS['wp_query']->max_num_pages;
    
    if ($total <= 1) {
        return;
    }
    
    $args = array(
        'mid_size' => 2,
        'prev_text' => '&larr; Previous',
        'next_text' => 'Next &rarr;',
        'type' => 'list',
    );
    
    echo '<nav class="pagination">';
    echo paginate_links($args);
    echo '</nav>';
}

function dashvio_breadcrumbs() {
    if (is_front_page()) {
        return;
    }
    
    echo '<nav class="breadcrumbs">';
    echo '<a href="' . esc_url(home_url('/')) . '">Home</a>';
    
    if (is_category() || is_single()) {
        echo ' / ';
        the_category(' / ');
        if (is_single()) {
            echo ' / ';
            the_title();
        }
    } elseif (is_page()) {
        echo ' / ';
        the_title();
    }
    
    echo '</nav>';
}

function dashvio_get_mock_posts() {
    return array(
        array(
            'title' => 'Building a high-performance WooCommerce store',
            'excerpt' => 'Learn the essential strategies and best practices to optimize your online store for speed, conversions, and customer satisfaction.',
            'category' => 'Performance',
            'date' => 'November 15, 2025',
            'featured' => true,
        ),
        array(
            'title' => 'Design trends shaping e-commerce in 2025',
            'excerpt' => 'Explore the latest design patterns, color schemes, and UX principles that modern online shoppers expect from their favorite brands.',
            'category' => 'Design',
            'date' => 'November 12, 2025',
            'featured' => true,
        ),
        array(
            'title' => 'Customer retention strategies that actually work',
            'excerpt' => 'Discover proven tactics to turn one-time buyers into loyal customers with personalized experiences and smart engagement.',
            'category' => 'Marketing',
            'date' => 'November 8, 2025',
            'featured' => true,
        ),
        array(
            'title' => 'Scaling your store: from startup to enterprise',
            'excerpt' => 'A practical roadmap for growing your WooCommerce business while maintaining performance and customer experience.',
            'category' => 'Growth',
            'date' => 'November 5, 2025',
        ),
        array(
            'title' => 'Mobile commerce best practices',
            'excerpt' => 'Optimize your store for mobile users with responsive design, fast checkout, and seamless navigation.',
            'category' => 'Mobile',
            'date' => 'November 1, 2025',
        ),
        array(
            'title' => 'SEO essentials for online stores',
            'excerpt' => 'Master the fundamentals of search optimization to drive organic traffic and increase visibility in search results.',
            'category' => 'SEO',
            'date' => 'October 28, 2025',
        ),
    );
}

function dashvio_generate_placeholder_image($width = 800, $height = 500, $index = 0) {
    $gradients = array(
        'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
        'linear-gradient(135deg, #f093fb 0%, #f5576c 100%)',
        'linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)',
        'linear-gradient(135deg, #43e97b 0%, #38f9d7 100%)',
        'linear-gradient(135deg, #fa709a 0%, #fee140 100%)',
        'linear-gradient(135deg, #30cfd0 0%, #330867 100%)',
    );
    
    $gradient = $gradients[$index % count($gradients)];
    
    $svg = '<svg width="' . esc_attr($width) . '" height="' . esc_attr($height) . '" xmlns="http://www.w3.org/2000/svg">';
    $svg .= '<defs><linearGradient id="grad' . $index . '" x1="0%" y1="0%" x2="100%" y2="100%">';
    
    if (strpos($gradient, '#667eea') !== false) {
        $svg .= '<stop offset="0%" style="stop-color:#667eea;stop-opacity:1" />';
        $svg .= '<stop offset="100%" style="stop-color:#764ba2;stop-opacity:1" />';
    } elseif (strpos($gradient, '#f093fb') !== false) {
        $svg .= '<stop offset="0%" style="stop-color:#f093fb;stop-opacity:1" />';
        $svg .= '<stop offset="100%" style="stop-color:#f5576c;stop-opacity:1" />';
    } elseif (strpos($gradient, '#4facfe') !== false) {
        $svg .= '<stop offset="0%" style="stop-color:#4facfe;stop-opacity:1" />';
        $svg .= '<stop offset="100%" style="stop-color:#00f2fe;stop-opacity:1" />';
    } elseif (strpos($gradient, '#43e97b') !== false) {
        $svg .= '<stop offset="0%" style="stop-color:#43e97b;stop-opacity:1" />';
        $svg .= '<stop offset="100%" style="stop-color:#38f9d7;stop-opacity:1" />';
    } elseif (strpos($gradient, '#fa709a') !== false) {
        $svg .= '<stop offset="0%" style="stop-color:#fa709a;stop-opacity:1" />';
        $svg .= '<stop offset="100%" style="stop-color:#fee140;stop-opacity:1" />';
    } else {
        $svg .= '<stop offset="0%" style="stop-color:#30cfd0;stop-opacity:1" />';
        $svg .= '<stop offset="100%" style="stop-color:#330867;stop-opacity:1" />';
    }
    
    $svg .= '</linearGradient></defs>';
    $svg .= '<rect width="100%" height="100%" fill="url(#grad' . $index . ')" />';
    $svg .= '</svg>';
    
    return 'data:image/svg+xml;base64,' . base64_encode($svg);
}

