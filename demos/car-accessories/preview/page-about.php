<section class="dashvio-demo-section dashvio-demo-section--about">
    <div class="demo-about-content">
        <p class="demo-eyebrow">About Dashvio Garage</p>
        <h2>Engineered for drivers who demand more</h2>
        <p>Dashvio Garage curates performance-driven accessories for premium and enthusiast vehicles. We collaborate with OEM-certified makers, ensuring every piece meets safety, durability, and style standards.</p>
        <ul class="demo-bullets">
            <li>Curated catalog for sedans, SUVs, and sports builds.</li>
            <li>Personalized fitting support with real technicians.</li>
            <li>Nationwide fulfillment with 24/7 after-sales assistance.</li>
        </ul>
    </div>
    <div class="demo-timeline">
        <div class="demo-timeline-item dashvio-timeline-item">
            <span class="demo-timeline-year">2015</span>
            <p>Started as a bespoke detailing studio.</p>
        </div>
        <div class="demo-timeline-item dashvio-timeline-item">
            <span class="demo-timeline-year">2018</span>
            <p>Launched our first premium accessories line.</p>
        </div>
        <div class="demo-timeline-item dashvio-timeline-item">
            <span class="demo-timeline-year">2024</span>
            <p>Powered 5K+ garage upgrades worldwide.</p>
        </div>
    </div>
</section>

<!-- Progress Bars Section -->
<section class="dashvio-demo-section" style="padding: 4rem 2rem; background: rgba(255, 107, 53, 0.05);">
    <div style="max-width: 1200px; margin: 0 auto;">
        <h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 1rem; color: #fff;">Our Expertise</h2>
        <p style="text-align: center; margin-bottom: 3rem; color: rgba(255, 255, 255, 0.8);">Specialized knowledge in automotive accessories</p>
        
        <div style="max-width: 800px; margin: 0 auto;">
            <div class="dashvio-scroll-fade" style="margin-bottom: 2rem;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                    <span style="font-weight: 600; color: #fff;">Product Quality</span>
                    <span style="opacity: 0.8; color: #fff;">96%</span>
                </div>
                <div class="dashvio-progress-bar" style="background: rgba(255, 107, 53, 0.2);">
                    <div class="dashvio-progress-fill" data-width="96" style="background: linear-gradient(90deg, #FF6B35, #F7931E);"></div>
                </div>
            </div>
            
            <div class="dashvio-scroll-fade" style="margin-bottom: 2rem;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                    <span style="font-weight: 600; color: #fff;">Customer Satisfaction</span>
                    <span style="opacity: 0.8; color: #fff;">98%</span>
                </div>
                <div class="dashvio-progress-bar" style="background: rgba(255, 107, 53, 0.2);">
                    <div class="dashvio-progress-fill" data-width="98" style="background: linear-gradient(90deg, #FF6B35, #F7931E);"></div>
                </div>
            </div>
            
            <div class="dashvio-scroll-fade" style="margin-bottom: 2rem;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                    <span style="font-weight: 600; color: #fff;">Installation Support</span>
                    <span style="opacity: 0.8; color: #fff;">94%</span>
                </div>
                <div class="dashvio-progress-bar" style="background: rgba(255, 107, 53, 0.2);">
                    <div class="dashvio-progress-fill" data-width="94" style="background: linear-gradient(90deg, #FF6B35, #F7931E);"></div>
                </div>
            </div>
            
            <div class="dashvio-scroll-fade">
                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                    <span style="font-weight: 600; color: #fff;">Brand Partnerships</span>
                    <span style="opacity: 0.8; color: #fff;">90%</span>
                </div>
                <div class="dashvio-progress-bar" style="background: rgba(255, 107, 53, 0.2);">
                    <div class="dashvio-progress-fill" data-width="90" style="background: linear-gradient(90deg, #FF6B35, #F7931E);"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
(function() {
    const progressObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('animated')) {
                entry.target.classList.add('animated');
                const width = entry.target.getAttribute('data-width');
                setTimeout(function() {
                    entry.target.style.width = width + '%';
                }, 100);
            }
        });
    }, { threshold: 0.5 });
    
    document.querySelectorAll('.dashvio-progress-fill').forEach(bar => {
        progressObserver.observe(bar);
    });
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
    
    document.querySelectorAll('.dashvio-scroll-fade, .dashvio-timeline-item').forEach(el => {
        observer.observe(el);
    });
})();
</script>

