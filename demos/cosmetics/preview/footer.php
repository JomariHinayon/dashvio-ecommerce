<footer class="dashvio-demo-footer dashvio-demo-footer--cosmetics">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 48px; margin-bottom: 24px;">
        <div>
            <h4>BEAUTÉ</h4>
            <p>Elevating beauty with premium cosmetics crafted for the modern, confident you.</p>
        </div>
        <div>
            <h5>Hours</h5>
            <p>Mon – Sat · 10:00 AM – 8:00 PM<br>Sunday · 12:00 PM – 6:00 PM</p>
        </div>
        <div>
            <h5>Contact</h5>
            <p>hello@beaute.com<br>+1 (212) 555-0199</p>
        </div>
    </div>
    <div class="dashvio-demo-footer-bottom">
        © <?php echo date('Y'); ?> BEAUTÉ. Beauty redefined.
    </div>
</footer>

<script>
(function() {
    // Mobile Menu Toggle
    const menuToggle = document.querySelector('.dashvio-demo-menu-toggle');
    const nav = document.querySelector('.dashvio-demo-nav');
    
    if (menuToggle && nav) {
        menuToggle.addEventListener('click', function() {
            menuToggle.classList.toggle('active');
            nav.classList.toggle('active');
            document.body.style.overflow = nav.classList.contains('active') ? 'hidden' : '';
        });
        
        // Close menu when clicking on a link
        nav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', function() {
                menuToggle.classList.remove('active');
                nav.classList.remove('active');
                document.body.style.overflow = '';
            });
        });
        
        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!nav.contains(e.target) && !menuToggle.contains(e.target)) {
                menuToggle.classList.remove('active');
                nav.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    }
    
    // Scroll animations
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
    
    document.querySelectorAll('.dashvio-scroll-fade').forEach(el => {
        observer.observe(el);
    });
    
    // Animated counters
    const counters = document.querySelectorAll('.dashvio-counter');
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-target'));
        const duration = 2000;
        const increment = target / (duration / 16);
        let current = 0;
        
        const updateCounter = () => {
            current += increment;
            if (current < target) {
                counter.textContent = Math.floor(current);
                requestAnimationFrame(updateCounter);
            } else {
                counter.textContent = target;
            }
        };
        
        const counterObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting && !counter.classList.contains('counted')) {
                    counter.classList.add('counted');
                    updateCounter();
                }
            });
        }, { threshold: 0.5 });
        
        counterObserver.observe(counter);
    });
})();
</script>

