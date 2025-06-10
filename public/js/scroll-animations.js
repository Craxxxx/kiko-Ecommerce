// Scroll Animation Handler
document.addEventListener('DOMContentLoaded', function() {
    // Automatically add scroll animation classes to product cards
    const productCards = document.querySelectorAll('.product-card');
    productCards.forEach((card, index) => {
        // Add different animation classes to alternate between left and right animations
        if (index % 2 === 0) {
            card.classList.add('scroll-animate-left');
        } else {
            card.classList.add('scroll-animate-right');
        }
        
        // Add staggered delays based on row position
        const delay = Math.floor(index / 3) * 0.1; // Assuming 3 cards per row
        card.style.transitionDelay = delay + 's';
    });
    
    // Get all elements with scroll animation classes
    const scrollElements = document.querySelectorAll('.scroll-animate, .scroll-animate-left, .scroll-animate-right');
    
    // Check if element is in viewport
    const isElementInViewport = (el) => {
        const rect = el.getBoundingClientRect();
        return (
            rect.top <= (window.innerHeight || document.documentElement.clientHeight) * 0.8
        );
    };
    
    // Add animated class to elements in viewport
    const displayScrollElement = (element) => {
        element.classList.add('animated');
    };
    
    // Hide elements that are not in viewport
    const hideScrollElement = (element) => {
        element.classList.remove('animated');
    };
    
    // Check all elements
    const handleScrollAnimation = () => {
        scrollElements.forEach((el) => {
            if (isElementInViewport(el)) {
                displayScrollElement(el);
            } else {
                hideScrollElement(el);
            }
        });
    };
    
    // Throttle function to limit how often the scroll event fires
    const throttle = (callback, delay) => {
        let throttleTimeout = null;
        return (...args) => {
            if (!throttleTimeout) {
                throttleTimeout = setTimeout(() => {
                    callback.apply(this, args);
                    throttleTimeout = null;
                }, delay);
            }
        };
    };
    
    // Add scroll event listener with throttling
    window.addEventListener('scroll', throttle(handleScrollAnimation, 100));
    
    // Initial check on page load
    handleScrollAnimation();
}); 