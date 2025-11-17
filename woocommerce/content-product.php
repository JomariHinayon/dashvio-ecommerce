<?php
defined('ABSPATH') || exit;

global $product;

if (empty($product) || !$product->is_visible()) {
    return;
}
?>

<li <?php wc_product_class('', $product); ?>>
    <div class="product-inner">
        <div class="product-image">
            <a href="<?php echo esc_url($product->get_permalink()); ?>">
                <?php echo $product->get_image('woocommerce_thumbnail'); ?>
            </a>
            <?php woocommerce_show_product_loop_sale_flash(); ?>
        </div>
        
        <div class="product-info">
            <h2 class="product-title">
                <a href="<?php echo esc_url($product->get_permalink()); ?>">
                    <?php echo esc_html($product->get_name()); ?>
                </a>
            </h2>
            
            <?php if ($price_html = $product->get_price_html()) : ?>
                <span class="price"><?php echo $price_html; ?></span>
            <?php endif; ?>
            
            <?php woocommerce_template_loop_add_to_cart(); ?>
        </div>
    </div>
</li>

