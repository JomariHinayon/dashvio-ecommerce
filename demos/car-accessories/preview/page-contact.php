<section class="dashvio-demo-section dashvio-demo-section--contact">
    <div class="demo-contact-info">
        <p class="demo-eyebrow">Contact</p>
        <h2>Let’s build your next upgrade</h2>
        <p>Tell us about your vehicle, driving habits, and wishlist. Our specialists will curate a personalized upgrade kit within 24 hours.</p>
        <div class="demo-contact-grid">
            <div class="demo-contact-card">
                <span class="demo-contact-label">Service desk</span>
                <span class="demo-contact-value">garage@dashvio.com</span>
            </div>
            <div class="demo-contact-card">
                <span class="demo-contact-label">Call us</span>
                <span class="demo-contact-value">+1 (415) 555-0149</span>
            </div>
            <div class="demo-contact-card">
                <span class="demo-contact-label">Showroom</span>
                <span class="demo-contact-value">1430 Bryant Street, San Francisco</span>
            </div>
        </div>
        <p class="demo-contact-hours">Mon – Sat · 9:00 AM – 7:00 PM PST</p>
    </div>
    <div class="demo-contact-form">
        <h3>Tell us about your vehicle</h3>
        <form>
            <label>
                Full name
                <input type="text" placeholder="Juan Dela Cruz">
            </label>
            <label>
                Email address
                <input type="email" placeholder="you@example.com">
            </label>
            <label>
                Vehicle model
                <input type="text" placeholder="e.g. 2024 Ford Ranger Wildtrak">
            </label>
            <label>
                Upgrade goals
                <textarea placeholder="Interior refresh, smart cockpit integration, etc."></textarea>
            </label>
            <button type="button" class="demo-btn demo-btn--primary">Send request</button>
        </form>
    </div>
</section>

<!-- Interactive Map Section -->
<section class="dashvio-demo-section" style="padding: 4rem 2rem;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 1rem; color: #fff;">Visit Our Showroom</h2>
        <p style="text-align: center; margin-bottom: 3rem; color: rgba(255, 255, 255, 0.8);">Experience our premium accessories in person</p>
        
        <div class="dashvio-scroll-fade" style="border-radius: 16px; overflow: hidden; height: 400px; background: rgba(255, 107, 53, 0.1); position: relative;">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.835434509041!2d-122.4194154846814!3d37.774929279759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085809c6c8f4459%3A0xb10ed6d9b5050fa5!2sSan%20Francisco%2C%20CA%2C%20USA!5e0!3m2!1sen!2s!4v1234567890123!5m2!1sen!2s" 
                width="100%" 
                height="100%" 
                style="border:0; border-radius: 16px;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

<script>
(function() {
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
    
    document.querySelectorAll('.dashvio-scroll-fade').forEach(el => {
        observer.observe(el);
    });
})();
</script>

