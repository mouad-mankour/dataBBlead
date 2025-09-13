/**
 * Databblead Theme JavaScript
 */

(function($) {
    'use strict';

    // DOM Ready
    $(document).ready(function() {
        
        // Initialize all functions
        initSmoothScrolling();
        initBackToTop();
        initHeaderEffects();
        initMobileMenu();
        initFormTracking();
        initAnimations();
        initContactFormEnhancements();
    });

    /**
     * Smooth scrolling for anchor links
     */
    function initSmoothScrolling() {
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            
            const target = $(this.getAttribute('href'));
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 800, 'swing', function() {
                    // Add highlight effect
                    target.addClass('pulse-highlight');
                    setTimeout(function() {
                        target.removeClass('pulse-highlight');
                    }, 2000);
                });
            }
        });
    }

    /**
     * Back to top button functionality
     */
    function initBackToTop() {
        const $backToTop = $('#back-to-top');
        
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 300) {
                $backToTop.css({
                    'opacity': '1',
                    'visibility': 'visible'
                });
            } else {
                $backToTop.css({
                    'opacity': '0',
                    'visibility': 'hidden'
                });
            }
        });
        
        $backToTop.on('click', function() {
            $('html, body').animate({
                scrollTop: 0
            }, 600);
        });
    }

    /**
     * Header scroll effects
     */
    function initHeaderEffects() {
        const $header = $('#masthead');
        let lastScrollY = window.scrollY;
        
        $(window).on('scroll', function() {
            const currentScrollY = window.scrollY;
            
            if (currentScrollY > 100) {
                $header.css({
                    'background': 'rgba(15, 23, 42, 0.98)',
                    'box-shadow': '0 4px 20px rgba(0, 0, 0, 0.1)'
                });
            } else {
                $header.css({
                    'background': 'rgba(15, 23, 42, 0.95)',
                    'box-shadow': 'none'
                });
            }
            
            lastScrollY = currentScrollY;
        });
    }

    /**
     * Mobile menu functionality
     */
    function initMobileMenu() {
        const $menuToggle = $('.menu-toggle');
        const $navigation = $('#site-navigation');
        
        $menuToggle.on('click', function() {
            const isExpanded = $(this).attr('aria-expanded') === 'true';
            $(this).attr('aria-expanded', !isExpanded);
            
            if (isExpanded) {
                $navigation.slideUp(300);
            } else {
                $navigation.slideDown(300);
            }
        });
        
        // Close menu when clicking on links
        $navigation.find('a').on('click', function() {
            if ($(window).width() <= 768) {
                $navigation.slideUp(300);
                $menuToggle.attr('aria-expanded', 'false');
            }
        });
        
        // Close menu on window resize
        $(window).on('resize', function() {
            if ($(window).width() > 768) {
                $navigation.show();
                $menuToggle.attr('aria-expanded', 'false');
            }
        });
    }

    /**
     * Form submission tracking
     */
    function initFormTracking() {
        // Track contact form submissions
        $('form').on('submit', function() {
            const formType = $(this).attr('id') || 'contact-form';
            
            // Facebook Pixel tracking
            if (typeof fbq !== 'undefined') {
                fbq('track', 'Lead', {
                    content_name: 'Contact Form Submission',
                    content_category: 'Lead Generation',
                    form_type: formType
                });
            }
            
            // Google Analytics tracking (if available)
            if (typeof gtag !== 'undefined') {
                gtag('event', 'form_submit', {
                    'form_type': formType,
                    'event_category': 'engagement'
                });
            }
        });
        
        // Track button clicks
        $('.btn, button, [role="button"]').on('click', function() {
            const buttonText = $(this).text().trim();
            const buttonType = $(this).data('cta') || 'button_click';
            
            if (typeof fbq !== 'undefined') {
                fbq('track', 'Lead', {
                    content_name: buttonText,
                    content_category: 'CTA Click',
                    button_type: buttonType
                });
            }
        });
    }

    /**
     * Initialize animations and visual effects
     */
    function initAnimations() {
        // Intersection Observer for fade-in animations
        if ('IntersectionObserver' in window) {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);
            
            // Observe elements that should animate in
            $('.card-float, .bubble, article').each(function() {
                observer.observe(this);
            });
        }
        
        // Parallax effect for hero background
        $(window).on('scroll', function() {
            const scrolled = $(window).scrollTop();
            const parallax = $('.hero-section .absolute:first-child');
            const speed = 0.5;
            
            if (parallax.length) {
                parallax.css('transform', 'translateY(' + (scrolled * speed) + 'px)');
            }
        });
    }

    /**
     * Contact form enhancements
     */
    function initContactFormEnhancements() {
        const $contactForm = $('#contact-form form');
        
        if ($contactForm.length) {
            // Add loading state to submit button
            $contactForm.on('submit', function() {
                const $submitBtn = $(this).find('[type="submit"]');
                const originalText = $submitBtn.html();
                
                $submitBtn.prop('disabled', true);
                $submitBtn.html('<div class="spinner"></div> Envoi en cours...');
                
                // Re-enable after 3 seconds (fallback)
                setTimeout(function() {
                    $submitBtn.prop('disabled', false);
                    $submitBtn.html(originalText);
                }, 3000);
            });
            
            // Form validation feedback
            $contactForm.find('input, textarea').on('blur', function() {
                const $field = $(this);
                const value = $field.val().trim();
                
                // Remove existing validation classes
                $field.removeClass('field-valid field-invalid');
                
                if ($field.prop('required') && !value) {
                    $field.addClass('field-invalid');
                } else if (value) {
                    // Email validation
                    if ($field.attr('type') === 'email') {
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (emailRegex.test(value)) {
                            $field.addClass('field-valid');
                        } else {
                            $field.addClass('field-invalid');
                        }
                    } else {
                        $field.addClass('field-valid');
                    }
                }
            });
        }
    }

    // Utility functions
    window.databbleadTheme = {
        scrollToContact: function() {
            const $contactForm = $('#contact-form');
            if ($contactForm.length) {
                $('html, body').animate({
                    scrollTop: $contactForm.offset().top - 100
                }, 800, function() {
                    $contactForm.addClass('pulse-highlight');
                    setTimeout(function() {
                        $contactForm.removeClass('pulse-highlight');
                    }, 2000);
                });
            }
        },
        
        trackEvent: function(eventName, properties) {
            if (typeof fbq !== 'undefined') {
                fbq('track', eventName, properties);
            }
            
            if (typeof gtag !== 'undefined') {
                gtag('event', eventName, properties);
            }
        }
    };

})(jQuery);

// Vanilla JS for non-jQuery dependent features
document.addEventListener('DOMContentLoaded', function() {
    
    // Add CSS classes for animations
    const style = document.createElement('style');
    style.textContent = `
        .animate-in {
            opacity: 1 !important;
            transform: translateY(0) !important;
            transition: all 0.6s ease !important;
        }
        
        .card-float,
        .bubble,
        article {
            opacity: 0;
            transform: translateY(20px);
        }
        
        .field-valid {
            border-color: #10b981 !important;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1) !important;
        }
        
        .field-invalid {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
        }
        
        .spinner {
            width: 1rem;
            height: 1rem;
            border: 2px solid currentColor;
            border-top: 2px solid transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            display: inline-block;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    `;
    document.head.appendChild(style);
    
    // Performance optimization: Lazy load images
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        observer.unobserve(img);
                    }
                }
            });
        });
        
        document.querySelectorAll('img[data-src]').forEach(function(img) {
            imageObserver.observe(img);
        });
    }
});