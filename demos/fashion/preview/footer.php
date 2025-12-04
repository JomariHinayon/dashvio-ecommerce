<footer class="dashvio-demo-footer">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 48px; margin-bottom: 24px;">
        <div>
            <h4>Atelier</h4>
            <p>Timeless fashion crafted with precision and elegance for the modern connoisseur.</p>
        </div>
        <div>
            <h5>Hours</h5>
            <p>Mon – Sat · 10:00 AM – 8:00 PM<br>Sunday · 12:00 PM – 6:00 PM</p>
        </div>
        <div>
            <h5>Contact</h5>
            <p>info@atelier.com<br>+1 (212) 555-0199</p>
        </div>
    </div>
    <div class="dashvio-demo-footer-bottom">
        © <?php echo date('Y'); ?> Atelier. Crafted with precision.
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
})();
</script>

