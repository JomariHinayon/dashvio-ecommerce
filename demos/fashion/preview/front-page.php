<?php
$demo_assets = isset($preview_assets) ? $preview_assets : (isset($demo_uri) ? $demo_uri . '/preview/assets' : '');
?>
<section class="dashvio-demo-hero dashvio-demo-hero--fashion">
    <div class="dashvio-demo-hero__content">
        <span class="demo-eyebrow">Spring/Summer 2025</span>
        <h1>Timeless elegance meets modern design</h1>
        <p class="demo-subtitle">Curated collections that transcend trends. Each piece is meticulously crafted to embody sophistication and enduring style.</p>
        <div class="demo-cta-group">
            <a class="demo-btn demo-btn--primary" href="#collection">View Collection</a>
            <a class="demo-btn demo-btn--ghost" href="#philosophy">Our Story</a>
        </div>
        <div class="demo-stats demo-stats--fashion">
            <div class="demo-stat">
                <span class="demo-stat__value">500+</span>
                <span class="demo-stat__label">Exclusive Pieces</span>
            </div>
            <div class="demo-stat">
                <span class="demo-stat__value">24h</span>
                <span class="demo-stat__label">Global Delivery</span>
            </div>
            <div class="demo-stat">
                <span class="demo-stat__value">4.9/5</span>
                <span class="demo-stat__label">Client Rating</span>
            </div>
        </div>
    </div>
    <div class="dashvio-demo-hero__visual">
        <img src="<?php echo esc_url($demo_assets . '/hero-fashion.webp'); ?>" alt="Fashion hero" />
    </div>
</section>

<!-- Animated Stats Section -->
<section class="demo-section--collection" style="padding: 4rem 2rem; background: rgba(0, 0, 0, 0.02);">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 3rem;">
            <div class="dashvio-scroll-fade" style="text-align: center;">
                <div class="dashvio-counter" data-target="500" style="color: #000;">0</div>
                <p style="margin-top: 0.75rem; color: rgba(0, 0, 0, 0.7); font-weight: 500;">Exclusive Pieces</p>
            </div>
            <div class="dashvio-scroll-fade" style="text-align: center;">
                <div class="dashvio-counter" data-target="24" style="color: #000;">0</div>
                <p style="margin-top: 0.75rem; color: rgba(0, 0, 0, 0.7); font-weight: 500;">Hour Delivery</p>
            </div>
            <div class="dashvio-scroll-fade" style="text-align: center;">
                <div class="dashvio-counter" data-target="10000" style="color: #000;">0</div>
                <p style="margin-top: 0.75rem; color: rgba(0, 0, 0, 0.7); font-weight: 500;">Satisfied Clients</p>
            </div>
            <div class="dashvio-scroll-fade" style="text-align: center;">
                <div class="dashvio-counter" data-target="49" style="color: #000;">0</div>
                <p style="margin-top: 0.75rem; color: rgba(0, 0, 0, 0.7); font-weight: 500;">Rating (5.0)</p>
            </div>
        </div>
    </div>
</section>

<section class="demo-section--collection" id="collection">
    <div class="demo-section-header">
        <h2>Featured Collection</h2>
        <p>Discover our carefully curated selection of statement pieces designed for those who appreciate refined aesthetics.</p>
    </div>
    <div class="demo-collection-grid">
        <article class="demo-collection-card">
            <div class="demo-collection-thumb">
                <span class="demo-collection-label">New Arrival</span>
                <img src="<?php echo esc_url($demo_assets . '/collection-1.webp'); ?>" alt="Tailored Blazer" />
            </div>
            <div class="demo-collection-meta">
                <h3>Tailored Wool Blazer</h3>
                <p>Italian wool blend with precision tailoring. A timeless silhouette for any occasion.</p>
                <strong>$895</strong>
            </div>
        </article>
        <article class="demo-collection-card">
            <div class="demo-collection-thumb">
                <span class="demo-collection-label">Bestseller</span>
                <img src="<?php echo esc_url($demo_assets . '/collection-2.webp'); ?>" alt="Silk Dress" />
            </div>
            <div class="demo-collection-meta">
                <h3>Silk Evening Dress</h3>
                <p>Pure silk with hand-finished details. Elegance redefined for modern sophistication.</p>
                <strong>$1,250</strong>
            </div>
        </article>
        <article class="demo-collection-card">
            <div class="demo-collection-thumb">
                <span class="demo-collection-label">Limited</span>
                <img src="<?php echo esc_url($demo_assets . '/collection-3.webp'); ?>" alt="Leather Bag" />
            </div>
            <div class="demo-collection-meta">
                <h3>Structured Leather Tote</h3>
                <p>Full-grain Italian leather. Minimalist design with maximum functionality.</p>
                <strong>$675</strong>
            </div>
        </article>
    </div>
</section>

<section class="demo-section--featured">
    <div class="demo-featured-grid">
        <article class="demo-featured-card">
            <div class="demo-featured-icon">✦</div>
            <h3>Premium Materials</h3>
            <p>Only the finest fabrics sourced from renowned mills in Italy, France, and Japan.</p>
        </article>
        <article class="demo-featured-card">
            <div class="demo-featured-icon">◆</div>
            <h3>Expert Craftsmanship</h3>
            <p>Each piece is meticulously constructed by master artisans with decades of experience.</p>
        </article>
        <article class="demo-featured-card">
            <div class="demo-featured-icon">◇</div>
            <h3>Timeless Design</h3>
            <p>Collections that transcend seasonal trends, designed to remain elegant for years.</p>
        </article>
    </div>
</section>

<section class="demo-section--philosophy" id="philosophy">
    <div class="demo-philosophy-content">
        <h2>Our Philosophy</h2>
        <p>At Atelier, we believe in the power of simplicity. Our design philosophy centers on clean lines, impeccable tailoring, and the highest quality materials.</p>
        <p>Every garment tells a story of dedication to craft, attention to detail, and respect for timeless elegance. We create pieces that become wardrobe staples, not fleeting trends.</p>
        <p>Sustainability and ethical production are at the heart of everything we do. We work exclusively with certified suppliers and ensure fair practices throughout our supply chain.</p>
    </div>
    <div class="demo-philosophy-visual">
        <img src="<?php echo esc_url($demo_assets . '/philosophy.webp'); ?>" alt="Atelier philosophy" />
    </div>
</section>

<section class="demo-section--testimonials">
    <div class="demo-section-header">
        <h2>What Clients Say</h2>
        <p>Trusted by discerning individuals who value quality and timeless style.</p>
    </div>
    <div class="demo-testimonials-grid">
        <article>
            <p>The attention to detail is unparalleled. Every piece I own from Atelier has become a wardrobe essential.</p>
            <strong>Sophia Chen, Creative Director</strong>
        </article>
        <article>
            <p>Finally, a brand that understands the balance between modern aesthetics and classic elegance. Simply exceptional.</p>
            <strong>Marcus Reid, Architect</strong>
        </article>
        <article>
            <p>The quality speaks for itself. These are investment pieces that will last a lifetime with proper care.</p>
            <strong>Isabella Laurent, Editor</strong>
        </article>
    </div>
</section>

<!-- Sticky CTA Button -->
<div class="dashvio-sticky-cta">
    <a href="#collection" class="demo-btn demo-btn--primary" style="padding: 1rem 2rem; box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);">
        Shop Collection
    </a>
</div>

<!-- Image Lightbox -->
<div class="dashvio-lightbox" onclick="closeLightbox()">
    <span class="dashvio-lightbox-close">&times;</span>
    <img src="" alt="" id="lightbox-image">
</div>

<script>
(function() {
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
    
    document.querySelectorAll('.dashvio-scroll-fade').forEach(el => observer.observe(el));
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
    
    document.querySelectorAll('.demo-collection-thumb img, .dashvio-demo-hero__visual img').forEach(img => {
        img.classList.add('dashvio-image-zoom');
        img.addEventListener('click', function() { openLightbox(this.src, this.alt); });
    });
    
    const stickyCTA = document.querySelector('.dashvio-sticky-cta');
    if (stickyCTA) {
        const heroHeight = document.querySelector('.dashvio-demo-hero--fashion') ? document.querySelector('.dashvio-demo-hero--fashion').offsetHeight : 0;
        window.addEventListener('scroll', function() {
            stickyCTA.classList.toggle('visible', window.scrollY > heroHeight);
        });
    }
    
})();
</script>
