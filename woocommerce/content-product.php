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
            <button type="button" class="dashvio-quick-view-btn" data-product-id="<?php echo esc_attr($product->get_id()); ?>" aria-label="<?php esc_attr_e('Quick view', 'dashvio'); ?>">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                </svg>
                <span>Quick View</span>
            </button>
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
            
            <?php if ($product->is_type('simple') && $product->is_purchasable() && $product->is_in_stock()) : ?>
                <form class="dashvio-loop-cart" action="<?php echo esc_url($product->add_to_cart_url()); ?>" method="post">
                    <div class="dashvio-qty-control">
                        <button type="button" class="dashvio-qty__btn" data-type="minus" aria-label="<?php esc_attr_e('Decrease quantity', 'dashvio'); ?>">-</button>
                        <?php
                        echo woocommerce_quantity_input(
                            array(
                                'input_name'  => 'quantity',
                                'input_value' => 1,
                                'min_value'   => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
                                'max_value'   => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
                                'step'        => apply_filters('woocommerce_quantity_input_step', 1, $product),
                            ),
                            $product,
                            false
                        );
                        ?>
                        <button type="button" class="dashvio-qty__btn" data-type="plus" aria-label="<?php esc_attr_e('Increase quantity', 'dashvio'); ?>">+</button>
                    </div>
                    <button type="submit" class="dashvio-loop-cart__btn">
                        <?php echo esc_html($product->add_to_cart_text()); ?>
                    </button>
                    <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>">
                </form>
            <?php else : ?>
                <?php woocommerce_template_loop_add_to_cart(); ?>
            <?php endif; ?>
        </div>
    </div>
</li>

