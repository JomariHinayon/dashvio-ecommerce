<?php
$demo_assets = isset($preview_assets) ? $preview_assets : (isset($demo_uri) ? $demo_uri . '/preview/assets' : '');
?>
<section class="dashvio-demo-hero dashvio-demo-hero--cosmetics">
    <div class="dashvio-demo-hero__content">
        <span class="demo-eyebrow">NEW COLLECTION</span>
        <h1>Discover Your Natural Glow</h1>
        <p class="demo-subtitle">Premium cosmetics crafted with care. Enhance your beauty with products that celebrate your unique radiance.</p>
        <div class="demo-cta-group">
            <a class="demo-btn demo-btn--primary" href="#products">Shop Collection</a>
            <a class="demo-btn demo-btn--ghost" href="#about">Our Story</a>
        </div>
        <div class="demo-stats demo-stats--cosmetics">
            <div class="demo-stat">
                <span class="demo-stat__value">200+</span>
                <span class="demo-stat__label">Premium Products</span>
            </div>
            <div class="demo-stat">
                <span class="demo-stat__value">48h</span>
                <span class="demo-stat__label">Express Delivery</span>
            </div>
            <div class="demo-stat">
                <span class="demo-stat__value">4.8/5</span>
                <span class="demo-stat__label">Customer Rating</span>
            </div>
        </div>
    </div>
    <div class="dashvio-demo-hero__visual">
        <img src="<?php echo esc_url($demo_assets . 'premium-cosmetics.webp'); ?>" alt="Premium Cosmetics" style="width: 100%; height: auto; border-radius: 24px; object-fit: cover;" />
    </div>
</section>

<!-- Featured Products Section -->
<section class="demo-section--products" id="products" style="padding: 5rem 2rem; background: linear-gradient(to bottom, rgba(255, 182, 193, 0.05), transparent);">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div class="dashvio-scroll-fade" style="text-align: center; margin-bottom: 4rem;">
            <span class="demo-eyebrow" style="color: var(--cosmetics-primary);">BESTSELLERS</span>
            <h2 style="font-size: 2.5rem; font-weight: 700; margin: 1rem 0; color: var(--cosmetics-dark);">Featured Collection</h2>
            <p style="color: var(--cosmetics-text); max-width: 600px; margin: 0 auto;">Handpicked favorites from our premium range</p>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem;">
            <div class="demo-product-card demo-product-card--cosmetics dashvio-scroll-fade">
                <div class="demo-product-image" style="background: linear-gradient(135deg, #FFE4E9 0%, #FFD9E3 100%); border-radius: 16px; padding: 20px; aspect-ratio: 1; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                    <img src="<?php echo esc_url($demo_assets . 'lipstick.webp'); ?>" alt="Velvet Matte Lipstick" style="width: 100%; height: 100%; object-fit: contain;" />
                </div>
                <h3 style="margin: 1rem 0 0.5rem; color: var(--cosmetics-dark);">Velvet Matte Lipstick</h3>
                <p style="color: var(--cosmetics-text); font-size: 0.9rem; margin-bottom: 1rem;">Long-lasting, creamy matte finish</p>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-size: 1.5rem; font-weight: 700; color: var(--cosmetics-primary);">$24</span>
                    <button class="demo-btn demo-btn--cosmetics" style="padding: 0.5rem 1.5rem;">Add to Cart</button>
                </div>
            </div>
            
            <div class="demo-product-card demo-product-card--cosmetics dashvio-scroll-fade">
                <div class="demo-product-image" style="background: linear-gradient(135deg, #FFF0F5 0%, #FFE4E9 100%); border-radius: 16px; padding: 20px; aspect-ratio: 1; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                    <img src="<?php echo esc_url($demo_assets . 'foundation.webp'); ?>" alt="Flawless Foundation" style="width: 100%; height: 100%; object-fit: contain;" />
                </div>
                <h3 style="margin: 1rem 0 0.5rem; color: var(--cosmetics-dark);">Flawless Foundation</h3>
                <p style="color: var(--cosmetics-text); font-size: 0.9rem; margin-bottom: 1rem;">Full coverage, natural finish</p>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-size: 1.5rem; font-weight: 700; color: var(--cosmetics-primary);">$32</span>
                    <button class="demo-btn demo-btn--cosmetics" style="padding: 0.5rem 1.5rem;">Add to Cart</button>
                </div>
            </div>
            
            <div class="demo-product-card demo-product-card--cosmetics dashvio-scroll-fade">
                <div class="demo-product-image" style="background: linear-gradient(135deg, #FFD9E3 0%, #FFC0CB 100%); border-radius: 16px; padding: 20px; aspect-ratio: 1; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                    <img src="<?php echo esc_url($demo_assets . 'rose-gold-palette.webp'); ?>" alt="Rose Gold Palette" style="width: 100%; height: 100%; object-fit: contain;" />
                </div>
                <h3 style="margin: 1rem 0 0.5rem; color: var(--cosmetics-dark);">Rose Gold Palette</h3>
                <p style="color: var(--cosmetics-text); font-size: 0.9rem; margin-bottom: 1rem;">12 shades for every occasion</p>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-size: 1.5rem; font-weight: 700; color: var(--cosmetics-primary);">$45</span>
                    <button class="demo-btn demo-btn--cosmetics" style="padding: 0.5rem 1.5rem;">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Beauty Features Section -->
<section class="demo-section--features" style="padding: 5rem 2rem; background: var(--cosmetics-bg);">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div class="dashvio-scroll-fade" style="text-align: center; margin-bottom: 4rem;">
            <span class="demo-eyebrow" style="color: var(--cosmetics-primary);">WHY CHOOSE US</span>
            <h2 style="font-size: 2.5rem; font-weight: 700; margin: 1rem 0; color: var(--cosmetics-dark);">Beauty That Cares</h2>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 3rem;">
            <div class="demo-feature dashvio-scroll-fade" style="text-align: center;">
                <div style="width: 80px; height: 80px; margin: 0 auto 1.5rem; background: linear-gradient(135deg, var(--cosmetics-primary), var(--cosmetics-accent)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem;">🌿</div>
                <h4 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--cosmetics-dark);">Natural Ingredients</h4>
                <p style="color: var(--cosmetics-text);">Crafted with premium, cruelty-free ingredients</p>
            </div>
            
            <div class="demo-feature dashvio-scroll-fade" style="text-align: center;">
                <div style="width: 80px; height: 80px; margin: 0 auto 1.5rem; background: linear-gradient(135deg, var(--cosmetics-primary), var(--cosmetics-accent)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                        <path d="M2 17l10 5 10-5"></path>
                        <path d="M2 12l10 5 10-5"></path>
                    </svg>
                </div>
                <h4 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--cosmetics-dark);">Long-Lasting</h4>
                <p style="color: var(--cosmetics-text);">Stay flawless all day with our premium formulas</p>
            </div>
            
            <div class="demo-feature dashvio-scroll-fade" style="text-align: center;">
                <div style="width: 80px; height: 80px; margin: 0 auto 1.5rem; background: linear-gradient(135deg, var(--cosmetics-primary), var(--cosmetics-accent)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                    </svg>
                </div>
                <h4 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--cosmetics-dark);">Expert Curated</h4>
                <p style="color: var(--cosmetics-text);">Selected by professional makeup artists</p>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="demo-section--stats" style="padding: 4rem 2rem; background: linear-gradient(135deg, rgba(255, 182, 193, 0.1), rgba(255, 192, 203, 0.05));">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 3rem;">
            <div class="dashvio-scroll-fade" style="text-align: center;">
                <div class="dashvio-counter" data-target="200" style="color: var(--cosmetics-primary); font-size: 3rem; font-weight: 700;">0</div>
                <p style="margin-top: 0.75rem; color: var(--cosmetics-text); font-weight: 500;">Premium Products</p>
            </div>
            <div class="dashvio-scroll-fade" style="text-align: center;">
                <div class="dashvio-counter" data-target="50000" style="color: var(--cosmetics-primary); font-size: 3rem; font-weight: 700;">0</div>
                <p style="margin-top: 0.75rem; color: var(--cosmetics-text); font-weight: 500;">Happy Customers</p>
            </div>
            <div class="dashvio-scroll-fade" style="text-align: center;">
                <div class="dashvio-counter" data-target="48" style="color: var(--cosmetics-primary); font-size: 3rem; font-weight: 700;">0</div>
                <p style="margin-top: 0.75rem; color: var(--cosmetics-text); font-weight: 500;">Hour Delivery</p>
            </div>
            <div class="dashvio-scroll-fade" style="text-align: center;">
                <div class="dashvio-counter" data-target="48" style="color: var(--cosmetics-primary); font-size: 3rem; font-weight: 700;">0</div>
                <p style="margin-top: 0.75rem; color: var(--cosmetics-text); font-weight: 500;">Countries Served</p>
            </div>
        </div>
    </div>
</section>

