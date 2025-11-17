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

