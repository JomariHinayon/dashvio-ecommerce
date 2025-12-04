<footer class="dashvio-demo-footer--gadgets">
    <div class="dashvio-demo-footer-content--gadgets">
        <div class="dashvio-demo-footer-section--gadgets">
            <h4>TechHub</h4>
            <p>Your destination for cutting-edge technology and innovative gadgets.</p>
        </div>
        <div class="dashvio-demo-footer-section--gadgets">
            <h4>Quick Links</h4>
            <p><a href="<?php echo esc_url(home_url('/demo/gadgets/')); ?>">Home</a></p>
            <p><a href="<?php echo esc_url(home_url('/demo/gadgets/about/')); ?>">About Us</a></p>
            <p><a href="<?php echo esc_url(home_url('/demo/gadgets/contact/')); ?>">Contact Us</a></p>
        </div>
        <div class="dashvio-demo-footer-section--gadgets">
            <h4>Contact</h4>
            <p>Email: hello@techhub.com</p>
            <p>Phone: +1 234 567 8900</p>
        </div>
    </div>
    <div class="dashvio-demo-footer-bottom--gadgets">
        <p>&copy; 2024 TechHub. All rights reserved.</p>
    </div>
</footer>

<script>
(function() {
    // Mobile Menu Toggle
    const menuToggle = document.querySelector('.dashvio-demo-menu-toggle');
    const nav = document.querySelector('.dashvio-demo-nav--gadgets');
    
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