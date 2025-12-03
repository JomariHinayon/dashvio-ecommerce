<section class="dashvio-demo-section dashvio-demo-section--about dashvio-demo-section--food">
    <div class="demo-about-content">
        <p class="demo-eyebrow">About Dashvio Eats</p>
        <h2>Food studios and delivery scientists working together</h2>
        <p>We embed culinary teams inside boutique restaurants, handle procurement, and oversee each dish from prep table to dining table with proprietary routing software.</p>
        <ul class="demo-bullets">
            <li>Menu labs in Chicago, Austin, and Los Angeles.</li>
            <li>Thermal riders trained in plating and guest experience.</li>
            <li>Ingredient mapping that highlights regenerative farms.</li>
        </ul>
    </div>
    <div class="demo-timeline">
        <div class="demo-timeline-item dashvio-timeline-item">
            <span class="demo-timeline-year">2019</span>
            <p>Launched our first chef collective with three pop-up kitchens.</p>
        </div>
        <div class="demo-timeline-item dashvio-timeline-item">
            <span class="demo-timeline-year">2021</span>
            <p>Expanded cold-chain routing and dessert labs.</p>
        </div>
        <div class="demo-timeline-item dashvio-timeline-item">
            <span class="demo-timeline-year">2024</span>
            <p>Serving 18 cities with 120+ partnerships.</p>
        </div>
    </div>
</section>

<!-- Progress Bars Section -->
<section class="dashvio-demo-section" style="padding: 4rem 2rem; background: rgba(230, 57, 70, 0.05);">
    <div style="max-width: 1200px; margin: 0 auto;">
        <h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 1rem; color: var(--food-dark);">Our Performance</h2>
        <p style="text-align: center; margin-bottom: 3rem; color: rgba(43, 45, 66, 0.7);">Excellence metrics across all operations</p>
        
        <div style="max-width: 800px; margin: 0 auto;">
            <div class="dashvio-scroll-fade" style="margin-bottom: 2rem;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                    <span style="font-weight: 600; color: var(--food-dark);">Delivery Speed</span>
                    <span style="opacity: 0.8; color: var(--food-dark);">95%</span>
                </div>
                <div class="dashvio-progress-bar" style="background: rgba(230, 57, 70, 0.1);">
                    <div class="dashvio-progress-fill" data-width="95" style="background: linear-gradient(90deg, var(--food-primary), var(--food-secondary));"></div>
                </div>
            </div>
            
            <div class="dashvio-scroll-fade" style="margin-bottom: 2rem;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                    <span style="font-weight: 600; color: var(--food-dark);">Food Quality</span>
                    <span style="opacity: 0.8; color: var(--food-dark);">98%</span>
                </div>
                <div class="dashvio-progress-bar" style="background: rgba(230, 57, 70, 0.1);">
                    <div class="dashvio-progress-fill" data-width="98" style="background: linear-gradient(90deg, var(--food-primary), var(--food-secondary));"></div>
                </div>
            </div>
            
            <div class="dashvio-scroll-fade" style="margin-bottom: 2rem;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                    <span style="font-weight: 600; color: var(--food-dark);">Customer Satisfaction</span>
                    <span style="opacity: 0.8; color: var(--food-dark);">96%</span>
                </div>
                <div class="dashvio-progress-bar" style="background: rgba(230, 57, 70, 0.1);">
                    <div class="dashvio-progress-fill" data-width="96" style="background: linear-gradient(90deg, var(--food-primary), var(--food-secondary));"></div>
                </div>
            </div>
            
            <div class="dashvio-scroll-fade">
                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                    <span style="font-weight: 600; color: var(--food-dark);">Chef Partnerships</span>
                    <span style="opacity: 0.8; color: var(--food-dark);">92%</span>
                </div>
                <div class="dashvio-progress-bar" style="background: rgba(230, 57, 70, 0.1);">
                    <div class="dashvio-progress-fill" data-width="92" style="background: linear-gradient(90deg, var(--food-primary), var(--food-secondary));"></div>
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
