<?php
defined('ABSPATH') || exit;

get_header('shop');

?>

<div class="woocommerce-products-header">
    <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
        <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
    <?php endif; ?>

    <?php do_action('woocommerce_archive_description'); ?>
</div>

<div class="woocommerce-shop-content">
    <div class="woocommerce-shop-sidebar">
        <?php
        // Product Categories Filter - Same style as prebuilt websites
        $product_categories = get_terms(array(
            'taxonomy' => 'product_cat',
            'hide_empty' => true,
        ));
        
        $current_url = get_permalink(wc_get_page_id('shop'));
        $active_category = is_product_category() ? get_queried_object()->term_id : 'all';
        
        if (!empty($product_categories) && !is_wp_error($product_categories)) :
        ?>
            <div class="dashvio-prebuilt-categories">
                <h4 class="dashvio-prebuilt-categories-title">Categories</h4>
                <ul class="dashvio-prebuilt-categories-list">
                    <li class="dashvio-prebuilt-category-item <?php echo $active_category === 'all' ? 'active' : ''; ?>">
                        <a href="<?php echo esc_url($current_url); ?>" class="dashvio-prebuilt-category-link">
                            <span class="dashvio-prebuilt-category-name">All</span>
                            <span class="dashvio-prebuilt-category-count"><?php echo wp_count_posts('product')->publish; ?></span>
                        </a>
                    </li>
                    <?php foreach ($product_categories as $category) : 
                        $category_link = get_term_link($category);
                        $is_active = is_product_category($category->term_id);
                    ?>
                        <li class="dashvio-prebuilt-category-item <?php echo $is_active ? 'active' : ''; ?>">
                            <a href="<?php echo esc_url($category_link); ?>" class="dashvio-prebuilt-category-link">
                                <span class="dashvio-prebuilt-category-name"><?php echo esc_html($category->name); ?></span>
                                <span class="dashvio-prebuilt-category-count"><?php echo esc_html($category->count); ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
    
    <div class="woocommerce-shop-main">
        <?php
        if (woocommerce_product_loop()) {

            do_action('woocommerce_before_shop_loop');

            woocommerce_product_loop_start();

            if (wc_get_loop_prop('total')) {
                while (have_posts()) {
                    the_post();
                    do_action('woocommerce_shop_loop');
                    wc_get_template_part('content', 'product');
                }
            }

            woocommerce_product_loop_end();

            do_action('woocommerce_after_shop_loop');
        } else {
            do_action('woocommerce_no_products_found');
        }
        ?>
    </div>
</div>

<?php
get_footer('shop');

