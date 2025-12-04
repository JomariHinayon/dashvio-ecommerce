<footer class="dashvio-demo-footer">
    <div class="dashvio-demo-footer-grid">
        <div>
            <h4>Dashvio Eats</h4>
            <p>Freshly prepared meals delivered with chef-led kitchens and dedicated riders.</p>
        </div>
        <div>
            <h5>Service hours</h5>
            <p>Mon – Sun · 9:00 AM – 11:00 PM</p>
        </div>
        <div>
            <h5>Contact</h5>
            <p>hello@dasheats.com · +1 (312) 555-0135</p>
        </div>
    </div>
</footer>
<div class="dashvio-demo-footer-bottom">
    <p>© <?php echo date('Y'); ?> Dashvio Eats. Crafted for speed.</p>
</div>

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
