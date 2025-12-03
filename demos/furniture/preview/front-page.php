<section class="furniture-hero">
    <div class="furniture-hero__content">
        <div class="furniture-hero__badge">New Collection</div>
        <h1 class="furniture-hero__title">Design that feels like home</h1>
        <p class="furniture-hero__subtitle">Thoughtfully crafted furniture for modern living. Sustainable materials, timeless design, built to last.</p>
        <div class="furniture-hero__actions">
            <button class="furniture-btn furniture-btn--primary">Explore Collection</button>
            <button class="furniture-btn furniture-btn--secondary">Book Consultation</button>
        </div>
    </div>
    <div class="furniture-hero__visual">
        <div class="furniture-hero__image">
            <img src="<?php echo esc_url($demo_assets . '/hero-furniture.jpg'); ?>" alt="Modern living space" />
        </div>
        <div class="furniture-hero__metrics">
            <div class="furniture-metric">
                <span class="furniture-metric__value">500+</span>
                <span class="furniture-metric__label">Pieces</span>
            </div>
            <div class="furniture-metric">
                <span class="furniture-metric__value">15yr</span>
                <span class="furniture-metric__label">Experience</span>
            </div>
            <div class="furniture-metric">
                <span class="furniture-metric__value">4.8★</span>
                <span class="furniture-metric__label">Rating</span>
            </div>
        </div>
    </div>
</section>

<!-- Animated Stats Section -->
<section class="furniture-features" style="padding: 4rem 2rem; background: rgba(139, 115, 85, 0.05);">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 3rem;">
            <div class="dashvio-scroll-fade" style="text-align: center;">
                <div class="dashvio-counter" data-target="500" style="color: var(--furniture-primary, #8B7355);">0</div>
                <p style="margin-top: 0.75rem; color: var(--furniture-dark, #2C2C2C); font-weight: 500;">Furniture Pieces</p>
            </div>
            <div class="dashvio-scroll-fade" style="text-align: center;">
                <div class="dashvio-counter" data-target="15" style="color: var(--furniture-primary, #8B7355);">0</div>
                <p style="margin-top: 0.75rem; color: var(--furniture-dark, #2C2C2C); font-weight: 500;">Years Experience</p>
            </div>
            <div class="dashvio-scroll-fade" style="text-align: center;">
                <div class="dashvio-counter" data-target="10000" style="color: var(--furniture-primary, #8B7355);">0</div>
                <p style="margin-top: 0.75rem; color: var(--furniture-dark, #2C2C2C); font-weight: 500;">Happy Customers</p>
            </div>
            <div class="dashvio-scroll-fade" style="text-align: center;">
                <div class="dashvio-counter" data-target="48" style="color: var(--furniture-primary, #8B7355);">0</div>
                <p style="margin-top: 0.75rem; color: var(--furniture-dark, #2C2C2C); font-weight: 500;">Rating (5.0)</p>
            </div>
        </div>
    </div>
</section>

<section class="furniture-collections">
    <div class="furniture-section-header">
        <div class="furniture-section-label">Collections</div>
        <h2>Featured pieces for every space</h2>
    </div>
    <div class="furniture-grid">
        <article class="furniture-card">
            <div class="furniture-card__media">
                <img src="<?php echo esc_url($demo_assets . '/collection-sofa.jpg'); ?>" alt="Modern sofa" />
                <div class="furniture-card__tag">Living</div>
            </div>
            <div class="furniture-card__content">
                <h3>Scandinavian Comfort Sofa</h3>
                <p>Premium fabric, solid oak frame</p>
                <div class="furniture-card__footer">
                    <span class="furniture-price">$2,450</span>
                    <button class="furniture-card__cta">View Details</button>
                </div>
            </div>
        </article>
        <article class="furniture-card">
            <div class="furniture-card__media">
                <img src="<?php echo esc_url($demo_assets . '/collection-dining.jpg'); ?>" alt="Dining set" />
                <div class="furniture-card__tag">Dining</div>
            </div>
            <div class="furniture-card__content">
                <h3>Walnut Dining Set</h3>
                <p>Solid walnut, seats 6-8</p>
                <div class="furniture-card__footer">
                    <span class="furniture-price">$3,200</span>
                    <button class="furniture-card__cta">View Details</button>
                </div>
            </div>
        </article>
        <article class="furniture-card">
            <div class="furniture-card__media">
                <img src="<?php echo esc_url($demo_assets . '/collection-bedroom.webp'); ?>" alt="Platform bed" />
                <div class="furniture-card__tag">Bedroom</div>
            </div>
            <div class="furniture-card__content">
                <h3>Platform Bed Frame</h3>
                <p>Sustainable hardwood, integrated storage</p>
                <div class="furniture-card__footer">
                    <span class="furniture-price">$1,850</span>
                    <button class="furniture-card__cta">View Details</button>
                </div>
            </div>
        </article>
    </div>
</section>

<section class="furniture-features">
    <div class="furniture-features__grid">
        <div class="furniture-feature">
            <div class="furniture-feature__icon">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <h3>Sustainable sourcing</h3>
            <p>Responsibly harvested materials from certified suppliers</p>
        </div>
        <div class="furniture-feature">
            <div class="furniture-feature__icon">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <h3>Lifetime warranty</h3>
            <p>Comprehensive coverage on all structural components</p>
        </div>
        <div class="furniture-feature">
            <div class="furniture-feature__icon">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 11C11.2091 11 13 9.20914 13 7C13 4.79086 11.2091 3 9 3C6.79086 3 5 4.79086 5 7C5 9.20914 6.79086 11 9 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M23 21V19C22.9993 18.1137 22.7044 17.2528 22.1614 16.5523C21.6184 15.8519 20.8581 15.3516 20 15.13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M16 3.13C16.8604 3.35031 17.623 3.85071 18.1676 4.55232C18.7122 5.25392 19.0078 6.11683 19.0078 7.005C19.0078 7.89318 18.7122 8.75608 18.1676 9.45769C17.623 10.1593 16.8604 10.6597 16 10.88" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <h3>Expert consultation</h3>
            <p>Free design advice from our interior specialists</p>
        </div>
        <div class="furniture-feature">
            <div class="furniture-feature__icon">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 16V8C20.9996 7.64927 20.9071 7.30481 20.7315 7.00116C20.556 6.69751 20.3037 6.44536 20 6.27L13 2.27C12.696 2.09446 12.3511 2.00205 12 2.00205C11.6489 2.00205 11.304 2.09446 11 2.27L4 6.27C3.69626 6.44536 3.44398 6.69751 3.26846 7.00116C3.09294 7.30481 3.00036 7.64927 3 8V16C3.00036 16.3507 3.09294 16.6952 3.26846 16.9988C3.44398 17.3025 3.69626 17.5546 4 17.73L11 21.73C11.304 21.9055 11.6489 21.9979 12 21.9979C12.3511 21.9979 12.696 21.9055 13 21.73L20 17.73C20.3037 17.5546 20.556 17.3025 20.7315 16.9988C20.9071 16.6952 20.9996 16.3507 21 16Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M3.27 6.96L12 12.01L20.73 6.96" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 22.08V12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <h3>White glove delivery</h3>
            <p>Professional assembly and placement included</p>
        </div>
    </div>
</section>

<section class="furniture-showcase">
    <div class="furniture-showcase__image">
        <img src="<?php echo esc_url($demo_assets . '/showcase-craft.jpg'); ?>" alt="Craftsmanship" />
    </div>
    <div class="furniture-showcase__content">
        <div class="furniture-showcase__label">Craftsmanship</div>
        <h2>Built to last generations</h2>
        <p>Every piece begins with carefully selected materials and ends with meticulous hand-finishing. Our artisans bring decades of experience to traditional joinery techniques, ensuring furniture that stands the test of time.</p>
        <ul class="furniture-showcase__list">
            <li>Solid hardwood construction</li>
            <li>Traditional mortise and tenon joints</li>
            <li>Hand-applied natural oil finishes</li>
            <li>Quality inspection at every stage</li>
        </ul>
        <button class="furniture-btn furniture-btn--outline">Learn Our Process</button>
    </div>
</section>

<!-- Sticky CTA Button -->
<div class="dashvio-sticky-cta">
    <a href="#collections" class="furniture-btn furniture-btn--primary" style="padding: 1rem 2rem; box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);">
        Explore Collection
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
    document.querySelectorAll('.furniture-hero__title, .furniture-hero__subtitle, .furniture-section-header h2').forEach(el => {
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
    
    document.querySelectorAll('.furniture-card__media img, .furniture-hero__image img').forEach(img => {
        img.classList.add('dashvio-image-zoom');
        img.addEventListener('click', function() { openLightbox(this.src, this.alt); });
    });
    
    const stickyCTA = document.querySelector('.dashvio-sticky-cta');
    if (stickyCTA) {
        const heroHeight = document.querySelector('.furniture-hero') ? document.querySelector('.furniture-hero').offsetHeight : 0;
        window.addEventListener('scroll', function() {
            stickyCTA.classList.toggle('visible', window.scrollY > heroHeight);
        });
    }
    
})();
</script>
