<?php

get_header();

if (function_exists('dashvio_prebuilt_websites_content')) {
    dashvio_prebuilt_websites_content();
} else {
    echo '<div class="container"><p>Prebuilt Websites page content not available.</p></div>';
}

get_footer();

