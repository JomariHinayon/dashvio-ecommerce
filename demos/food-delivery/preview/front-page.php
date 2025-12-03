<?php
$demo_assets = isset($preview_assets) ? $preview_assets : (isset($demo_uri) ? $demo_uri . '/preview/assets' : '');
?>
<section class="dashvio-demo-hero dashvio-demo-hero--food">
    <div class="dashvio-demo-hero__content">
        <p class="demo-eyebrow">Daily tasting menu</p>
        <h1>Chef-crafted meals with five-star delivery</h1>
        <p class="demo-subtitle">Partner restaurants prepare seasonal dishes while our logistics network delivers piping hot plates in under 25 minutes.</p>
        <div class="demo-cta-group">
            <a class="demo-btn demo-btn--primary" href="#demo-menu">Browse menu</a>
            <a class="demo-btn demo-btn--ghost" href="#demo-chefs">Meet the chefs</a>
        </div>
        <div class="demo-stats demo-stats--food">
            <div class="demo-stat">
                <span class="demo-stat__value">120+</span>
                <span class="demo-stat__label">Partner kitchens</span>
            </div>
            <div class="demo-stat">
                <span class="demo-stat__value">18 min</span>
                <span class="demo-stat__label">Avg. delivery</span>
            </div>
            <div class="demo-stat">
                <span class="demo-stat__value">4.9/5</span>
                <span class="demo-stat__label">Customer rating</span>
            </div>
        </div>
    </div>
    <div class="dashvio-demo-hero__visual">
        <img src="<?php echo esc_url($demo_assets . '/hero-platter.webp'); ?>" alt="Hero platter" />
        <div class="demo-hero-card demo-hero-card--badge">
            <h3>Tonight's drop</h3>
            <p>Smoked harissa salmon, burnt lemon couscous, charred greens.</p>
            <div class="demo-hero-card__price">$28</div>
        </div>
    </div>
</section>

<!-- Animated Stats Section -->
<section class="dashvio-demo-section" style="padding: 4rem 2rem; background: rgba(230, 57, 70, 0.05);">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 3rem;">
            <div class="dashvio-scroll-fade" style="text-align: center;">
                <div class="dashvio-counter" data-target="120" style="color: var(--food-primary);">0</div>
                <p style="margin-top: 0.75rem; color: var(--food-dark); font-weight: 500;">Partner Kitchens</p>
            </div>
            <div class="dashvio-scroll-fade" style="text-align: center;">
                <div class="dashvio-counter" data-target="18" style="color: var(--food-primary);">0</div>
                <p style="margin-top: 0.75rem; color: var(--food-dark); font-weight: 500;">Min Delivery</p>
            </div>
            <div class="dashvio-scroll-fade" style="text-align: center;">
                <div class="dashvio-counter" data-target="50000" style="color: var(--food-primary);">0</div>
                <p style="margin-top: 0.75rem; color: var(--food-dark); font-weight: 500;">Meals Delivered</p>
            </div>
            <div class="dashvio-scroll-fade" style="text-align: center;">
                <div class="dashvio-counter" data-target="49" style="color: var(--food-primary);">0</div>
                <p style="margin-top: 0.75rem; color: var(--food-dark); font-weight: 500;">Rating (5.0)</p>
            </div>
        </div>
    </div>
</section>

<section class="dashvio-demo-section demo-section--highlights" id="demo-chefs">
    <div class="demo-section-header">
        <h2>Highlights</h2>
        <p>Farm-focused ingredients, sustainable packaging, and obsessive quality control in every route.</p>
    </div>
    <div class="demo-highlight-grid">
        <article class="demo-highlight-card">
            <h3>Chef partnerships</h3>
            <p>We curate menus with Michelin veterans and beloved neighborhood chefs.</p>
        </article>
        <article class="demo-highlight-card">
            <h3>Thermo routing</h3>
            <p>Insulated pods and live route adjustments keep textures perfect.</p>
        </article>
        <article class="demo-highlight-card">
            <h3>Transparent sourcing</h3>
            <p>Every dish lists farms, growers, and roasting partners for full traceability.</p>
        </article>
    </div>
</section>

<section class="dashvio-demo-section demo-section--menu" id="demo-menu">
    <div class="demo-section-header">
        <h2>Chef tasting menu</h2>
        <p>Signature mains rotate weekly. Tap into curated sets or mix and match favorites.</p>
    </div>
    <div class="demo-menu-grid">
        <article class="demo-menu-card">
            <div class="demo-menu-thumb">
                <img src="<?php echo esc_url($demo_assets . '/dish-bowl.webp'); ?>" alt="Spiced grain bowl" />
            </div>
            <div class="demo-menu-meta">
                <div>
                    <span class="demo-menu-label">Warm</span>
                    <h3>Charred citrus grain bowl</h3>
                    <p>Ancient grains, embered squash, preserved lemon yogurt.</p>
                </div>
                <strong>$22</strong>
            </div>
        </article>
        <article class="demo-menu-card">
            <div class="demo-menu-thumb">
                <img src="<?php echo esc_url($demo_assets . '/fresh-salad.webp'); ?>" alt="Garden salad" />
            </div>
            <div class="demo-menu-meta">
                <div>
                    <span class="demo-menu-label">Fresh</span>
                    <h3>Verdant garden crunch</h3>
                    <p>Shaved roots, pickled grapes, sunflower crumble, miso vinaigrette.</p>
                </div>
                <strong>$18</strong>
            </div>
        </article>
        <article class="demo-menu-card">
            <div class="demo-menu-thumb">
                <img src="<?php echo esc_url($demo_assets . '/dessert-bites.webp'); ?>" alt="Dessert bites" />
            </div>
            <div class="demo-menu-meta">
                <div>
                    <span class="demo-menu-label">Sweet</span>
                    <h3>Midnight dessert flight</h3>
                    <p>Lychee pavlova, cacao tart, brûléed custard bites.</p>
                </div>
                <strong>$16</strong>
            </div>
        </article>
    </div>
</section>

<section class="dashvio-demo-section demo-section--steps">
    <div class="demo-section-header">
        <h2>How it works</h2>
        <p>From craving to doorstep in three obsessive steps.</p>
    </div>
    <div class="demo-steps">
        <div class="demo-step">
            <span>01</span>
            <h4>Pick a chef set</h4>
            <p>Curated menus highlight seasonal pairings and beverage matches.</p>
        </div>
        <div class="demo-step">
            <span>02</span>
            <h4>Live tracking</h4>
            <p>Thermal riders adjust on the fly with predictive ETAs and SMS updates.</p>
        </div>
        <div class="demo-step">
            <span>03</span>
            <h4>Plate and enjoy</h4>
            <p>Sustainable plating kits turn any table into a chef's counter.</p>
        </div>
    </div>
</section>

<section class="dashvio-demo-section demo-section--stories">
    <div class="demo-section-header">
        <h2>Guest stories</h2>
        <p>Food critics, founders, and families dine in with Dashvio Eats.</p>
    </div>
    <div class="demo-stories-grid">
        <article>
            <p>“Textures arrive intact and plating instructions are foolproof. It feels like chef's table without leaving home.”</p>
            <strong>Mae, hospitality editor</strong>
        </article>
        <article>
            <p>“Our teams host client dinners powered entirely by Dashvio Eats. Logistics are seamless every single night.”</p>
            <strong>Lorenzo, agency partner</strong>
        </article>
        <article>
            <p>“The menu transparency is unmatched. Knowing the farms and roasters behind each component builds trust.”</p>
            <strong>Nia, nutrition coach</strong>
        </article>
    </div>
</section>

<!-- Sticky CTA Button -->
<div class="dashvio-sticky-cta">
    <a href="#demo-menu" class="demo-btn demo-btn--primary" style="padding: 1rem 2rem; box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);">
        Order Now
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
    
    document.querySelectorAll('.demo-menu-thumb img, .dashvio-demo-hero__visual img').forEach(img => {
        img.classList.add('dashvio-image-zoom');
        img.addEventListener('click', function() { openLightbox(this.src, this.alt); });
    });
    
    const stickyCTA = document.querySelector('.dashvio-sticky-cta');
    if (stickyCTA) {
        const heroHeight = document.querySelector('.dashvio-demo-hero') ? document.querySelector('.dashvio-demo-hero').offsetHeight : 0;
        window.addEventListener('scroll', function() {
            stickyCTA.classList.toggle('visible', window.scrollY > heroHeight);
        });
    }
    
})();
</script>
