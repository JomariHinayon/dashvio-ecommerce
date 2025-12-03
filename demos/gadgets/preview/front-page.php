<section class="dashvio-demo-hero--gadgets">
    <div class="dashvio-demo-container--gadgets">
        <h1>Next-Gen Technology</h1>
        <p>Discover the latest innovations in smart gadgets, wearables, and cutting-edge electronics that transform your digital lifestyle.</p>
        <a href="#products" class="dashvio-demo-btn--gadgets">Explore Products</a>
    </div>
</section>

<!-- Animated Stats Section -->
<section class="dashvio-demo-section--gadgets" style="padding: 4rem 2rem; background: linear-gradient(135deg, rgba(0, 102, 255, 0.05), rgba(0, 217, 255, 0.05));">
    <div class="dashvio-demo-container--gadgets">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 3rem; max-width: 1000px; margin: 0 auto;">
            <div class="dashvio-scroll-fade" style="text-align: center;">
                <div class="dashvio-counter" data-target="500" style="color: var(--gadget-primary);">0</div>
                <p style="margin-top: 0.75rem; color: var(--gadget-dark); font-weight: 500;">Products Available</p>
            </div>
            <div class="dashvio-scroll-fade" style="text-align: center;">
                <div class="dashvio-counter" data-target="50" style="color: var(--gadget-primary);">0</div>
                <p style="margin-top: 0.75rem; color: var(--gadget-dark); font-weight: 500;">Premium Brands</p>
            </div>
            <div class="dashvio-scroll-fade" style="text-align: center;">
                <div class="dashvio-counter" data-target="10000" style="color: var(--gadget-primary);">0</div>
                <p style="margin-top: 0.75rem; color: var(--gadget-dark); font-weight: 500;">Happy Customers</p>
            </div>
            <div class="dashvio-scroll-fade" style="text-align: center;">
                <div class="dashvio-counter" data-target="24" style="color: var(--gadget-primary);">0</div>
                <p style="margin-top: 0.75rem; color: var(--gadget-dark); font-weight: 500;">Hours Support</p>
            </div>
        </div>
    </div>
</section>

<section class="dashvio-demo-section--gadgets">
    <div class="dashvio-demo-container--gadgets">
        <h2 class="dashvio-demo-title--gadgets dashvio-scroll-fade">Featured Products</h2>
        <p class="dashvio-demo-subtitle--gadgets dashvio-scroll-fade">Experience innovation at your fingertips with our curated selection of premium tech gadgets</p>
        
        <div class="dashvio-demo-grid--gadgets" id="products">
            <!-- Skeleton Loading Placeholder (hidden by default, shown during loading) -->
            <div class="dashvio-skeleton-card" style="display: none;">
                <div class="dashvio-skeleton" style="width: 100%; height: 250px; border-radius: 12px; margin-bottom: 1rem;"></div>
                <div class="dashvio-skeleton" style="width: 80%; height: 24px; border-radius: 4px; margin-bottom: 0.5rem;"></div>
                <div class="dashvio-skeleton" style="width: 60%; height: 20px; border-radius: 4px;"></div>
            </div>
            
            <div class="dashvio-demo-card--gadgets">
                <img src="<?php echo esc_url($demo_assets . 'smartwatch.webp'); ?>" alt="Smart Watch Pro" class="dashvio-demo-card-img--gadgets">
                <div class="dashvio-demo-card-content--gadgets">
                    <h3>Smart Watch Pro</h3>
                    <p>Advanced health tracking, seamless connectivity, and stunning AMOLED display in a sleek titanium design.</p>
                </div>
            </div>
            
            <div class="dashvio-demo-card--gadgets">
                <img src="<?php echo esc_url($demo_assets . 'earbuds.webp'); ?>" alt="Wireless Earbuds" class="dashvio-demo-card-img--gadgets">
                <div class="dashvio-demo-card-content--gadgets">
                    <h3>Wireless Earbuds</h3>
                    <p>Premium sound quality with active noise cancellation and 30-hour battery life for uninterrupted listening.</p>
                </div>
            </div>
            
            <div class="dashvio-demo-card--gadgets">
                <img src="<?php echo esc_url($demo_assets . 'tablet.webp'); ?>" alt="Ultra Tablet" class="dashvio-demo-card-img--gadgets">
                <div class="dashvio-demo-card-content--gadgets">
                    <h3>Ultra Tablet</h3>
                    <p>12.9-inch Liquid Retina display with M2 chip performance for professional creativity on the go.</p>
                </div>
            </div>
            
            <div class="dashvio-demo-card--gadgets">
                <img src="<?php echo esc_url($demo_assets . 'speaker.webp'); ?>" alt="Smart Speaker" class="dashvio-demo-card-img--gadgets">
                <div class="dashvio-demo-card-content--gadgets">
                    <h3>Smart Speaker</h3>
                    <p>360-degree audio with voice assistant integration and smart home control in premium fabric design.</p>
                </div>
            </div>
            
            <div class="dashvio-demo-card--gadgets">
                <img src="<?php echo esc_url($demo_assets . 'camera.webp'); ?>" alt="Action Camera" class="dashvio-demo-card-img--gadgets">
                <div class="dashvio-demo-card-content--gadgets">
                    <h3>Action Camera</h3>
                    <p>4K60 video recording with advanced stabilization and waterproof design for extreme adventures.</p>
                </div>
            </div>
            
            <div class="dashvio-demo-card--gadgets">
                <img src="<?php echo esc_url($demo_assets . 'drone.webp'); ?>" alt="Mini Drone" class="dashvio-demo-card-img--gadgets">
                <div class="dashvio-demo-card-content--gadgets">
                    <h3>Mini Drone</h3>
                    <p>Compact foldable design with 4K camera, intelligent flight modes, and 31-minute flight time.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Before/After Slider Section -->
<section class="dashvio-demo-section--gadgets" style="background: #fff;">
    <div class="dashvio-demo-container--gadgets">
        <h2 class="dashvio-demo-title--gadgets dashvio-scroll-fade">Product Comparison</h2>
        <p class="dashvio-demo-subtitle--gadgets dashvio-scroll-fade">See the difference our premium products make</p>
        
        <div class="dashvio-scroll-fade" style="max-width: 900px; margin: 4rem auto 0;">
            <div class="dashvio-before-after" style="position: relative; width: 100%; height: 500px; border-radius: 16px; overflow: hidden; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);">
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, rgba(0, 102, 255, 0.1), rgba(0, 217, 255, 0.1)); display: flex; align-items: center; justify-content: center; color: var(--gadget-dark); font-size: 1.2rem; font-weight: 600;">
                    <div style="text-align: center;">
                        <div style="margin-bottom: 1rem;">Before: Standard Device</div>
                        <div>After: Premium Upgrade</div>
                    </div>
                </div>
                <div class="dashvio-before-after-slider" style="position: absolute; top: 0; bottom: 0; width: 50%; background: rgba(0, 102, 255, 0.3); cursor: ew-resize; z-index: 10; border-right: 3px solid var(--gadget-primary);">
                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 50px; height: 50px; background: #fff; border-radius: 50%; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3); display: flex; align-items: center; justify-content: center;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--gadget-primary)" stroke-width="2">
                            <path d="M8 12h8M12 8l4 4-4 4"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="dashvio-demo-section--gadgets" style="background: #fff;">
    <div class="dashvio-demo-container--gadgets">
        <h2 class="dashvio-demo-title--gadgets">Why Choose TechHub</h2>
        <p class="dashvio-demo-subtitle--gadgets">We bring you the best in technology with unmatched service and expertise</p>
        
        <div class="dashvio-demo-features--gadgets">
            <div class="dashvio-demo-feature--gadgets">
                <div class="dashvio-demo-feature-icon--gadgets">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 2L3 14H12L11 22L21 10H12L13 2Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h3>Lightning Fast</h3>
                <p>Experience blazing-fast performance with the latest processors and cutting-edge technology.</p>
            </div>
            
            <div class="dashvio-demo-feature--gadgets">
                <div class="dashvio-demo-feature-icon--gadgets">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#fff" stroke-width="2"/>
                        <path d="M12 6V12L16 14" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3>24/7 Support</h3>
                <p>Round-the-clock customer service to help you with any questions or technical issues.</p>
            </div>
            
            <div class="dashvio-demo-feature--gadgets">
                <div class="dashvio-demo-feature-icon--gadgets">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h3>Premium Quality</h3>
                <p>Every product is carefully selected and tested to meet our high standards of excellence.</p>
            </div>
            
            <div class="dashvio-demo-feature--gadgets">
                <div class="dashvio-demo-feature-icon--gadgets">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 11L12 14L22 4" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M21 12V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H16" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h3>Warranty Protection</h3>
                <p>Comprehensive warranty coverage and hassle-free returns for complete peace of mind.</p>
            </div>
        </div>
    </div>
</section>

<!-- Sticky CTA Button -->
<div class="dashvio-sticky-cta">
    <a href="#products" class="dashvio-demo-btn--gadgets" style="padding: 1rem 2rem; box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);">
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
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('.dashvio-scroll-fade, .dashvio-scroll-slide-left, .dashvio-scroll-slide-right, .dashvio-timeline-item').forEach(el => {
        observer.observe(el);
    });
    
    // Add scroll fade classes to elements
    document.querySelectorAll('.dashvio-demo-hero--gadgets h1, .dashvio-demo-hero--gadgets p, .dashvio-demo-title--gadgets, .dashvio-demo-subtitle--gadgets').forEach(el => {
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
    document.querySelectorAll('.dashvio-demo-card-img--gadgets').forEach(img => {
        img.classList.add('dashvio-image-zoom');
        img.addEventListener('click', function() {
            openLightbox(this.src, this.alt);
        });
    });
    
    // Sticky CTA Visibility
    const stickyCTA = document.querySelector('.dashvio-sticky-cta');
    if (stickyCTA) {
        const heroHeight = document.querySelector('.dashvio-demo-hero--gadgets') ? document.querySelector('.dashvio-demo-hero--gadgets').offsetHeight : 0;
        window.addEventListener('scroll', function() {
            if (window.scrollY > heroHeight) {
                stickyCTA.classList.add('visible');
            } else {
                stickyCTA.classList.remove('visible');
            }
        });
    }
    
    // Before/After Slider
    const beforeAfterSlider = document.querySelector('.dashvio-before-after-slider');
    if (beforeAfterSlider) {
        const container = beforeAfterSlider.closest('.dashvio-before-after');
        let isDragging = false;
        
        function updateSlider(e) {
            if (!isDragging) return;
            const rect = container.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const percentage = Math.max(0, Math.min(100, (x / rect.width) * 100));
            beforeAfterSlider.style.width = percentage + '%';
        }
        
        beforeAfterSlider.addEventListener('mousedown', function(e) {
            isDragging = true;
            updateSlider(e);
        });
        
        document.addEventListener('mousemove', updateSlider);
        document.addEventListener('mouseup', function() {
            isDragging = false;
        });
        
        // Touch support
        beforeAfterSlider.addEventListener('touchstart', function(e) {
            isDragging = true;
            const touch = e.touches[0];
            const rect = container.getBoundingClientRect();
            const x = touch.clientX - rect.left;
            const percentage = Math.max(0, Math.min(100, (x / rect.width) * 100));
            beforeAfterSlider.style.width = percentage + '%';
        });
        
        document.addEventListener('touchmove', function(e) {
            if (!isDragging) return;
            const touch = e.touches[0];
            const rect = container.getBoundingClientRect();
            const x = touch.clientX - rect.left;
            const percentage = Math.max(0, Math.min(100, (x / rect.width) * 100));
            beforeAfterSlider.style.width = percentage + '%';
        });
        
        document.addEventListener('touchend', function() {
            isDragging = false;
        });
    }
    
})();
</script>

<style>
/* Dark Mode Styles */
body.dark-mode {
    background: #0a0e1a;
    color: #fff;
}

body.dark-mode .dashvio-demo-section--gadgets {
    background: #1a1f2e;
}

body.dark-mode .dashvio-demo-card--gadgets {
    background: rgba(255, 255, 255, 0.05);
    border-color: rgba(255, 255, 255, 0.1);
}
</style>

