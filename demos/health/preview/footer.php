<footer class="dashvio-demo-footer--health">
    <div class="dashvio-demo-footer-content--health">
        <div class="dashvio-demo-footer-section--health">
            <h4>HealthCare+</h4>
            <p>Your trusted partner in health and wellness. Providing comprehensive care for you and your family.</p>
        </div>
        <div class="dashvio-demo-footer-section--health">
            <h4>Quick Links</h4>
            <p><a href="<?php echo esc_url(home_url('/demo/health/')); ?>">Home</a></p>
            <p><a href="<?php echo esc_url(home_url('/demo/health/about/')); ?>">About Us</a></p>
            <p><a href="<?php echo esc_url(home_url('/demo/health/contact/')); ?>">Contact Us</a></p>
        </div>
        <div class="dashvio-demo-footer-section--health">
            <h4>Contact</h4>
            <p>Email: info@healthcareplus.com</p>
            <p>Phone: +1 (555) 123-4567</p>
        </div>
    </div>
    <div class="dashvio-demo-footer-bottom--health">
        <p>&copy; 2024 HealthCare+. All rights reserved.</p>
    </div>
</footer>

<script>
(function() {
    // Mobile Menu Toggle
    const menuToggle = document.querySelector('.dashvio-demo-menu-toggle');
    const nav = document.querySelector('.dashvio-demo-nav--health');
    
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
})();
</script>