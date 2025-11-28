<?php
$demo_assets = isset($preview_assets) ? $preview_assets : (isset($demo_uri) ? $demo_uri . '/preview/assets' : '');
?>
<section class="dashvio-demo-hero">
    <div class="dashvio-demo-hero__content">
        <p class="demo-eyebrow">Premium Automotive Gear</p>
        <h1>Drive in style with curated car accessories</h1>
        <p class="demo-subtitle">Upgrade your ride with leather-crafted interiors, smart devices, and everyday essentials built for performance and comfort.</p>
        <div class="demo-cta-group">
            <a class="demo-btn demo-btn--primary" href="#demo-products">Shop Accessories</a>
            <a class="demo-btn demo-btn--ghost" href="#demo-collections">View Catalogue</a>
        </div>
        <div class="demo-stats">
            <div class="demo-stat">
                <span class="demo-stat__value">150+</span>
                <span class="demo-stat__label">New arrivals</span>
            </div>
            <div class="demo-stat">
                <span class="demo-stat__value">20</span>
                <span class="demo-stat__label">Certified brands</span>
            </div>
            <div class="demo-stat">
                <span class="demo-stat__value">4.9/5</span>
                <span class="demo-stat__label">Customer rating</span>
            </div>
        </div>
    </div>
    <div class="dashvio-demo-hero__visual">
        <div class="demo-hero-card">
            <span>Featured drop</span>
            <h3>Urban Touring Kit</h3>
            <p>Includes premium steering cover, adaptive roof carrier, and ambient lighting pack.</p>
            <div class="demo-hero-card__badge">Ships in 24h</div>
        </div>
        <div class="demo-hero-card demo-hero-card--dark">
            <span>Membership</span>
            <h3>Garage Concierge</h3>
            <p>Personal upgrade specialist and seasonal maintenance reminders.</p>
            <div class="demo-hero-card__price">from $39/mo</div>
        </div>
    </div>
</section>

<section class="dashvio-demo-section" id="demo-collections">
    <div class="demo-section-header">
        <h2>Signature Collections</h2>
        <p>Modular kits built to match sedans, SUVs, and performance builds.</p>
    </div>
    <div class="demo-collection-grid">
        <div class="demo-collection-card">
            <h3>Smart Cockpit Tech</h3>
            <p>HUD displays, performance monitors, and voice assistants tailor-fit for every model.</p>
            <button type="button">View set</button>
        </div>
        <div class="demo-collection-card">
            <h3>Comfort Interiors</h3>
            <p>Premium seat covers, cooling cushions, and protective mats for all weather drives.</p>
            <button type="button">View set</button>
        </div>
        <div class="demo-collection-card">
            <h3>Adventure Ready</h3>
            <p>Roof racks, modular storage, and rugged lights for off-road journeys.</p>
            <button type="button">View set</button>
        </div>
    </div>
</section>

<section class="dashvio-demo-section" id="demo-products">
    <div class="demo-section-header">
        <h2>Highlighted Accessories</h2>
        <p>Handpicked accessories engineered for daily comfort and long drives.</p>
    </div>
    <div class="demo-product-grid">
        <article class="demo-product-card">
            <div class="demo-product-thumb">
                <img src="<?php echo esc_url($demo_assets . '/product-seat.jpg'); ?>" alt="Contour Leather Seat Kit">
                <span class="demo-product-tag">Bestseller</span>
            </div>
            <h3>Contour Leather Seat Kit</h3>
            <div class="demo-product-price">$249</div>
            <button type="button" class="demo-btn demo-btn--ghost">Add to build</button>
        </article>
        <article class="demo-product-card">
            <div class="demo-product-thumb">
                <img src="<?php echo esc_url($demo_assets . '/product-hud.jpg'); ?>" alt="Matrix HUD Display">
                <span class="demo-product-tag">Smart Tech</span>
            </div>
            <h3>Matrix HUD Display</h3>
            <div class="demo-product-price">$189</div>
            <button type="button" class="demo-btn demo-btn--ghost">Add to build</button>
        </article>
        <article class="demo-product-card">
            <div class="demo-product-thumb">
                <img src="<?php echo esc_url($demo_assets . '/product-roof.jpg'); ?>" alt="Adaptive Roof Carrier">
                <span class="demo-product-tag">New</span>
            </div>
            <h3>Adaptive Roof Carrier</h3>
            <div class="demo-product-price">$329</div>
            <button type="button" class="demo-btn demo-btn--ghost">Add to build</button>
        </article>
    </div>
</section>

