<section class="dashvio-demo-section dashvio-demo-section--contact dashvio-demo-section--food">
    <div class="demo-contact-info">
        <p class="demo-eyebrow">Concierge</p>
        <h2>Plan private tastings or recurring drops</h2>
        <p>Tell us the occasion, headcount, and dietary notes. Our concierge team curates a rotating menu with beverage pairings and plating kits.</p>
        <div class="demo-contact-grid">
            <div class="demo-contact-card">
                <span class="demo-contact-label">Email</span>
                <span class="demo-contact-value">concierge@dasheats.com</span>
            </div>
            <div class="demo-contact-card">
                <span class="demo-contact-label">Phone</span>
                <span class="demo-contact-value">+1 (415) 555-0112</span>
            </div>
            <div class="demo-contact-card">
                <span class="demo-contact-label">Kitchen studio</span>
                <span class="demo-contact-value">143 Market Street, San Francisco</span>
            </div>
        </div>
        <p class="demo-contact-hours">Concierge available daily · 8:00 AM – 10:00 PM PST</p>
    </div>
    <div class="demo-contact-form">
        <h3>Tell us about your event</h3>
        <form>
            <label>
                Full name
                <input type="text" placeholder="Jordan Reyes" />
            </label>
            <label>
                Email address
                <input type="email" placeholder="you@example.com" />
            </label>
            <label>
                Event date
                <input type="text" placeholder="e.g. July 12, 7:00 PM" />
            </label>
            <label>
                Notes
                <textarea placeholder="Dietary requests, vibe, guest count, etc."></textarea>
            </label>
            <button type="button" class="demo-btn demo-btn--primary">Send brief</button>
        </form>
    </div>
</section>

<!-- Interactive Map Section -->
<section class="dashvio-demo-section" style="padding: 4rem 2rem; background: rgba(230, 57, 70, 0.05);">
    <div style="max-width: 1200px; margin: 0 auto;">
        <h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 1rem; color: var(--food-dark);">Find Our Kitchen Studio</h2>
        <p style="text-align: center; margin-bottom: 3rem; color: rgba(43, 45, 66, 0.7);">Visit our culinary workspace</p>
        
        <div class="dashvio-scroll-fade" style="border-radius: 16px; overflow: hidden; height: 400px; background: rgba(230, 57, 70, 0.1); position: relative;">
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
