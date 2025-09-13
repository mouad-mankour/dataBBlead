/**
 * Scroll utilities for Databblead Theme
 */

(function() {
    'use strict';

    /**
     * Smooth scroll to contact form
     */
    window.scrollToContact = function() {
        const contactForm = document.querySelector('#contact-form');
        if (contactForm) {
            contactForm.scrollIntoView({ 
                behavior: 'smooth', 
                block: 'start' 
            });
            
            // Add highlight effect
            contactForm.classList.add('pulse-highlight');
            setTimeout(function() {
                contactForm.classList.remove('pulse-highlight');
            }, 2000);
            
            // Track the scroll action
            if (typeof fbq !== 'undefined') {
                fbq('track', 'ViewContent', {
                    content_name: 'Contact Form',
                    content_category: 'CTA'
                });
            }
        }
    };

    /**
     * Scroll to any element by ID
     */
    window.scrollToElement = function(elementId, offset = 100) {
        const element = document.querySelector(elementId);
        if (element) {
            const elementPosition = element.offsetTop - offset;
            window.scrollTo({
                top: elementPosition,
                behavior: 'smooth'
            });
        }
    };

    /**
     * Get scroll percentage
     */
    window.getScrollPercentage = function() {
        const scrollTop = window.pageYOffset;
        const docHeight = document.body.scrollHeight - window.innerHeight;
        return Math.round((scrollTop / docHeight) * 100);
    };

    /**
     * Throttled scroll handler
     */
    function throttle(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    }

    /**
     * Track scroll depth for analytics
     */
    function trackScrollDepth() {
        const scrollMarks = [25, 50, 75, 100];
        const trackedMarks = new Set();
        
        return throttle(function() {
            const scrollPercentage = getScrollPercentage();
            
            scrollMarks.forEach(function(mark) {
                if (scrollPercentage >= mark && !trackedMarks.has(mark)) {
                    trackedMarks.add(mark);
                    
                    // Track with Facebook Pixel
                    if (typeof fbq !== 'undefined') {
                        fbq('track', 'ViewContent', {
                            content_name: 'Page Scroll',
                            content_category: 'Engagement',
                            scroll_depth: mark + '%'
                        });
                    }
                    
                    // Track with Google Analytics (if available)
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'scroll_depth', {
                            'scroll_depth': mark,
                            'event_category': 'engagement'
                        });
                    }
                }
            });
        }, 500);
    }

    /**
     * Initialize scroll tracking
     */
    function initScrollTracking() {
        const scrollTracker = trackScrollDepth();
        window.addEventListener('scroll', scrollTracker);
        
        // Track time on page
        let startTime = Date.now();
        let timeTracked = false;
        
        // Track 30 second engagement
        setTimeout(function() {
            if (!timeTracked) {
                timeTracked = true;
                if (typeof fbq !== 'undefined') {
                    fbq('track', 'ViewContent', {
                        content_name: 'Page Engagement',
                        content_category: 'Time on Page',
                        engagement_time: '30_seconds'
                    });
                }
            }
        }, 30000);
        
        // Track exit intent (when user moves mouse to top of page)
        let exitIntentTracked = false;
        document.addEventListener('mouseleave', function(e) {
            if (e.clientY <= 0 && !exitIntentTracked) {
                exitIntentTracked = true;
                if (typeof fbq !== 'undefined') {
                    fbq('track', 'ViewContent', {
                        content_name: 'Exit Intent',
                        content_category: 'Engagement'
                    });
                }
            }
        });
    }

    /**
     * Section visibility tracking
     */
    function initSectionTracking() {
        if ('IntersectionObserver' in window) {
            const sectionObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const sectionName = entry.target.id || entry.target.className;
                        
                        if (typeof fbq !== 'undefined') {
                            fbq('track', 'ViewContent', {
                                content_name: 'Section View',
                                content_category: 'Section',
                                section_name: sectionName
                            });
                        }
                    }
                });
            }, {
                threshold: 0.5,
                rootMargin: '0px'
            });
            
            // Observe main sections
            document.querySelectorAll('section, main, .hero-section').forEach(function(section) {
                sectionObserver.observe(section);
            });
        }
    }

    /**
     * Initialize all scroll-related functionality
     */
    document.addEventListener('DOMContentLoaded', function() {
        initScrollTracking();
        initSectionTracking();
        
        // Add smooth scrolling CSS if not present
        if (!document.querySelector('style[data-scroll-behavior]')) {
            const style = document.createElement('style');
            style.setAttribute('data-scroll-behavior', 'true');
            style.textContent = `
                html {
                    scroll-behavior: smooth;
                }
                
                @media (prefers-reduced-motion: reduce) {
                    html {
                        scroll-behavior: auto;
                    }
                }
            `;
            document.head.appendChild(style);
        }
    });

})();