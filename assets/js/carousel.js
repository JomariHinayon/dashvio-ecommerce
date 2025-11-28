jQuery(document).ready(function($) {
    const carousel = $('.demo-carousel');
    if (!carousel.length) return;

    const track = carousel.find('.demo-carousel__track');
    const slides = carousel.find('.demo-carousel__slide');
    const dotsContainer = carousel.find('.demo-carousel__dots');
    
    let currentIndex = 0;
    const slideCount = slides.length;
    let autoplayInterval;

    // Create dots
    slides.each(function(index) {
        const dot = $('<button class="demo-carousel__dot"></button>');
        if (index === 0) dot.addClass('active');
        dot.on('click', function() {
            goToSlide(index);
            resetAutoplay();
        });
        dotsContainer.append(dot);
    });

    const dots = dotsContainer.find('.demo-carousel__dot');

    function goToSlide(index) {
        currentIndex = index;
        
        // Update slides
        slides.removeClass('active');
        slides.eq(currentIndex).addClass('active');
        
        // Update dots
        dots.removeClass('active');
        dots.eq(currentIndex).addClass('active');
        
        // Animate
        const offset = -currentIndex * 100;
        track.css('transform', `translateX(${offset}%)`);
    }

    function nextSlide() {
        const next = (currentIndex + 1) % slideCount;
        goToSlide(next);
    }

    function startAutoplay() {
        autoplayInterval = setInterval(nextSlide, 5000); // Change slide every 5 seconds
    }

    function resetAutoplay() {
        clearInterval(autoplayInterval);
        startAutoplay();
    }

    // Initialize
    goToSlide(0);
    startAutoplay();

    // Pause on hover
    carousel.on('mouseenter', function() {
        clearInterval(autoplayInterval);
    });

    carousel.on('mouseleave', function() {
        startAutoplay();
    });
});

