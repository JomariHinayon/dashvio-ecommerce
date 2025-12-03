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

<!-- Animated Stats Section -->
<section class="dashvio-demo-section" style="padding: 4rem 2rem; background: rgba(255, 107, 53, 0.05);">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 3rem;">
            <div class="dashvio-scroll-fade" style="text-align: center;">
                <div class="dashvio-counter" data-target="150" style="color: #FF6B35;">0</div>
                <p style="margin-top: 0.75rem; color: rgba(255, 255, 255, 0.8); font-weight: 500;">New Arrivals</p>
            </div>
            <div class="dashvio-scroll-fade" style="text-align: center;">
                <div class="dashvio-counter" data-target="20" style="color: #FF6B35;">0</div>
                <p style="margin-top: 0.75rem; color: rgba(255, 255, 255, 0.8); font-weight: 500;">Certified Brands</p>
            </div>
            <div class="dashvio-scroll-fade" style="text-align: center;">
                <div class="dashvio-counter" data-target="5000" style="color: #FF6B35;">0</div>
                <p style="margin-top: 0.75rem; color: rgba(255, 255, 255, 0.8); font-weight: 500;">Garage Upgrades</p>
            </div>
            <div class="dashvio-scroll-fade" style="text-align: center;">
                <div class="dashvio-counter" data-target="98" style="color: #FF6B35;">0</div>
                <p style="margin-top: 0.75rem; color: rgba(255, 255, 255, 0.8); font-weight: 500;">Satisfaction Rate</p>
            </div>
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

<!-- Sticky CTA Button -->
<div class="dashvio-sticky-cta">
    <a href="#demo-products" class="demo-btn demo-btn--primary" style="padding: 1rem 2rem; box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);">
        Shop Now
    </a>
</div>

<!-- Image Lightbox -->
<div class="dashvio-lightbox" onclick="closeLightbox()">
    <span class="dashvio-lightbox-close">&times;</span>
    <img src="" alt="" id="lightbox-image">
</div>

<script>
(function() {
    // Scroll Animations
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
    
    document.querySelectorAll('.dashvio-scroll-fade').forEach(el => {
        observer.observe(el);
    });
    
    // Add scroll fade to hero elements
    document.querySelectorAll('.dashvio-demo-hero__content h1, .dashvio-demo-hero__content p, .demo-section-header h2').forEach(el => {
        el.classList.add('dashvio-scroll-fade');
        observer.observe(el);
    });
    
    // Animated Counters
    function animateCounter(element, target, duration) {
        duration = duration || 2000;
        let start = 0;
        const increment = target / (duration / 16);
        const timer = setInterval(function() {
            start += increment;
            if (start >= target) {
                element.textContent = target.toLocaleString();
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(start).toLocaleString();
            }
        }, 16);
    }
    
    const counterObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                entry.target.classList.add('counted');
                const target = parseInt(entry.target.getAttribute('data-target'));
                animateCounter(entry.target, target);
            }
        });
    }, { threshold: 0.5 });
    
    document.querySelectorAll('.dashvio-counter').forEach(counter => {
        counterObserver.observe(counter);
    });
    
    // Image Lightbox
    window.openLightbox = function(imgSrc, imgAlt) {
        const lightbox = document.querySelector('.dashvio-lightbox');
        const img = document.getElementById('lightbox-image');
        if (lightbox && img) {
            img.src = imgSrc;
            img.alt = imgAlt;
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    };
    
    window.closeLightbox = function() {
        const lightbox = document.querySelector('.dashvio-lightbox');
        if (lightbox) {
            lightbox.classList.remove('active');
            document.body.style.overflow = '';
        }
    };
    
    // Add click handlers to product images
    document.querySelectorAll('.demo-product-thumb img').forEach(img => {
        img.classList.add('dashvio-image-zoom');
        img.addEventListener('click', function() {
            openLightbox(this.src, this.alt);
        });
    });
    
    // Sticky CTA Visibility
    const stickyCTA = document.querySelector('.dashvio-sticky-cta');
    if (stickyCTA) {
        const heroHeight = document.querySelector('.dashvio-demo-hero') ? document.querySelector('.dashvio-demo-hero').offsetHeight : 0;
        window.addEventListener('scroll', function() {
            if (window.scrollY > heroHeight) {
                stickyCTA.classList.add('visible');
            } else {
                stickyCTA.classList.remove('visible');
            }
        });
    }
    
})();
</script>

<style>
body.dark-mode {
    background: #0a0e1a;
    color: #fff;
}
</style>

