<section class="dashvio-demo-section dashvio-demo-section--about" id="about" style="padding: 5rem 2rem;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div class="dashvio-scroll-fade" style="text-align: center; margin-bottom: 4rem;">
            <span class="demo-eyebrow" style="color: var(--cosmetics-primary);">OUR STORY</span>
            <h1 style="font-size: 3rem; font-weight: 700; margin: 1rem 0; color: var(--cosmetics-dark);">Beauty Redefined</h1>
        </div>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center; margin-bottom: 5rem;">
            <div class="dashvio-scroll-fade">
                <h2 style="font-size: 2rem; font-weight: 600; margin-bottom: 1.5rem; color: var(--cosmetics-dark);">Crafted with Passion</h2>
                <p style="color: var(--cosmetics-text); line-height: 1.8; margin-bottom: 1.5rem; font-size: 1.1rem;">
                    At BEAUTÉ, we believe that beauty is an expression of confidence. Our mission is to create premium cosmetics that enhance your natural radiance while celebrating your unique style.
                </p>
                <p style="color: var(--cosmetics-text); line-height: 1.8; margin-bottom: 1.5rem; font-size: 1.1rem;">
                    Every product in our collection is carefully formulated with the finest ingredients, tested by professionals, and designed to make you feel beautiful inside and out.
                </p>
            </div>
            <div class="dashvio-scroll-fade" style="border-radius: 24px; overflow: hidden;">
                <?php
                $demo_assets = isset($preview_assets) ? $preview_assets : (isset($demo_uri) ? $demo_uri . '/preview/assets' : '');
                ?>
                <img src="<?php echo esc_url($demo_assets . 'about-page-picture.webp'); ?>" alt="BEAUTÉ Cosmetics" style="width: 100%; height: auto; display: block;" />
            </div>
        </div>
        
        <div style="margin-top: 5rem;">
            <h3 style="font-size: 2rem; font-weight: 600; margin-bottom: 3rem; text-align: center; color: var(--cosmetics-dark);">Our Values</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 3rem;">
                <div class="dashvio-scroll-fade" style="text-align: center; padding: 2rem; background: var(--cosmetics-bg); border-radius: 16px;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🌿</div>
                    <h4 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--cosmetics-dark);">Natural & Safe</h4>
                    <p style="color: var(--cosmetics-text);">Cruelty-free formulas with natural ingredients</p>
                </div>
                <div class="dashvio-scroll-fade" style="text-align: center; padding: 2rem; background: var(--cosmetics-bg); border-radius: 16px;">
                    <div style="margin-bottom: 1rem;">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                            <path d="M2 17l10 5 10-5"></path>
                            <path d="M2 12l10 5 10-5"></path>
                        </svg>
                    </div>
                    <h4 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--cosmetics-dark);">Premium Quality</h4>
                    <p style="color: var(--cosmetics-text);">Professional-grade products for everyday beauty</p>
                </div>
                <div class="dashvio-scroll-fade" style="text-align: center; padding: 2rem; background: var(--cosmetics-bg); border-radius: 16px;">
                    <div style="margin-bottom: 1rem;">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                    </div>
                    <h4 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--cosmetics-dark);">Inclusive Beauty</h4>
                    <p style="color: var(--cosmetics-text);">Shades and formulas for every skin tone</p>
                </div>
            </div>
        </div>
    </div>
</section>

