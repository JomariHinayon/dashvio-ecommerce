<footer class="dashvio-demo-footer">
    <p>&copy; 2024 Furnish. Handcrafted furniture for modern living.</p>
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

