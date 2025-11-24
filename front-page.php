<?php get_header(); ?>

<main class="site-main">
    <div class="container">
        <section class="dash-hero">
            <div class="dash-hero__grid">
                <div class="dash-hero__content">
                    <span class="dash-badge"><?php bloginfo('name'); ?> · WooCommerce</span>
                    <h1>Modern commerce experiences built for scaling brands.</h1>
                    <p>Create immersive storefronts, convert more shoppers, and manage your entire catalog with Dashvio’s modular WooCommerce theme.</p>
                    <div class="dash-btn-group">
                        <?php if (function_exists('wc_get_page_id')) :
                            $shop_id = wc_get_page_id('shop');
                            ?>
                            <a class="button button-primary" href="<?php echo esc_url($shop_id > 0 ? get_permalink($shop_id) : home_url('/shop')); ?>">
                                Shop now
                            </a>
                        <?php endif; ?>
                        <a class="button button-outline" href="#dashvio-insights">View insights</a>
                    </div>
                    <div class="dash-hero__stats">
                        <div class="dash-stat">
                            <strong>1200+</strong>
                            <span>Products styled</span>
                        </div>
                        <div class="dash-stat">
                            <strong>24/7</strong>
                            <span>Automated support</span>
                        </div>
                        <div class="dash-stat">
                            <strong>98%</strong>
                            <span>Happier customers</span>
                        </div>
                    </div>
                </div>
                <div class="dash-hero__card glass-card">
                    <h3>Why Dashvio</h3>
                    <ul>
                        <li>- Instant storefront setup with WooCommerce.</li>
                        <li>- Reusable components for every funnel stage.</li>
                        <li>- Optimized for conversion & Core Web Vitals.</li>
                        <li>- Built-in dark & light experiences.</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="dash-section">
            <div class="dash-section__header">
                <div>
                    <h2>Everything you need to launch, iterate, and grow.</h2>
                </div>
                <p>Composable sections, rounded UI, glassmorphism, and reusable flows aligned to the Dashvio brand kit.</p>
            </div>
            <div class="dash-cards">
                <article class="dash-card">
                    <h4>Component Library</h4>
                    <p>Buttons, cards, forms, and tables that keep every page visually cohesive.</p>
                </article>
                <article class="dash-card">
                    <h4>Commerce-ready</h4>
                    <p>Shop, product, cart, checkout, and account templates crafted for WooCommerce.</p>
                </article>
                <article class="dash-card">
                    <h4>Performance focused</h4>
                    <p>Lightweight assets, modern typography, and responsive spacing tokens.</p>
                </article>
            </div>
        </section>

        <?php if (class_exists('WooCommerce')) : ?>
            <section class="dash-section">
                <div class="dash-section__header">
                    <div>
                        <h2>Fresh drops for modern storefronts.</h2>
                    </div>
                    <a class="button button-outline" href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>">Browse catalog</a>
                </div>
                <div class="dash-products">
                    <?php echo do_shortcode('[products limit="4" columns="4" orderby="date" visibility="visible"]'); ?>
                </div>
            </section>
        <?php endif; ?>

        <section class="dash-section" id="dashvio-insights">
            <div class="dash-cta">
                <h3>Launch smarter with Dashvio Insights.</h3>
                <p>Join our weekly digest for product strategy, conversion tips, and theme updates built for serious WooCommerce teams.</p>
                <form class="dash-newsletter">
                    <input type="email" placeholder="you@brand.com" required>
                    <button type="submit" class="button button-primary">Subscribe</button>
                </form>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>

