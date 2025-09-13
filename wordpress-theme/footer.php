    </div><!-- #content -->

    <footer id="colophon" class="site-footer" style="padding: 3rem 0; border-top: 1px solid rgba(255, 255, 255, 0.1); position: relative;">
        <!-- Subtle data line -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 1px; background: linear-gradient(to right, transparent, #60a5fa, transparent); opacity: 0.2;"></div>
        
        <div class="container" style="max-width: 64rem; margin: 0 auto; text-align: center; padding: 0 1.5rem;">
            <div style="margin-bottom: 1.5rem;">
                <!-- Poetic message -->
                <div style="margin-bottom: 1.5rem;">
                    <p style="color: #94a3b8; font-style: italic; font-size: 1.125rem; line-height: 1.6;">
                        "Chaque donnée raconte une histoire.<br>
                        <span style="color: #60a5fa; font-weight: 500;">databblead révèle celle de votre croissance</span> avec intelligence et précision."
                    </p>
                </div>

                <!-- Contact information -->
                <div style="display: flex; flex-direction: column; align-items: center; gap: 1.5rem; margin-bottom: 1.5rem; font-size: 0.875rem; color: #94a3b8;">
                    <a href="mailto:contact@databblead.com" style="color: #94a3b8; text-decoration: none; font-weight: 500; transition: color 0.3s ease;">
                        contact@databblead.com
                    </a>
                    
                    <div style="display: flex; align-items: center; gap: 1.5rem;">
                        <a href="#" style="color: #94a3b8; text-decoration: none; transition: color 0.3s ease;">
                            Mentions légales
                        </a>
                        <a href="#" style="color: #94a3b8; text-decoration: none; transition: color 0.3s ease;">
                            Politique de confidentialité
                        </a>
                    </div>
                </div>

                <!-- Creative signature -->
                <div style="padding-top: 1.5rem; border-top: 1px solid rgba(255, 255, 255, 0.1);">
                    <p style="font-size: 0.875rem; color: #94a3b8;">
                        Fait avec <span style="color: #60a5fa;">♡</span> par{" "}
                        <span style="color: #60a5fa; font-weight: 500;">Databblead</span>
                    </p>
                    <p style="font-size: 0.75rem; color: rgba(148, 163, 184, 0.6); margin-top: 0.5rem;">
                        © <?php echo date('Y'); ?> — databblead, l'intelligence qui transforme vos données en croissance
                    </p>
                </div>
            </div>

            <!-- Footer widgets -->
            <?php if (is_active_sidebar('footer-1')) : ?>
                <div class="footer-widgets">
                    <?php dynamic_sidebar('footer-1'); ?>
                </div>
            <?php endif; ?>
        </div>
    </footer>
</div><!-- #page -->

<!-- Back to top button -->
<button id="back-to-top" style="position: fixed; bottom: 2rem; right: 2rem; background: linear-gradient(135deg, #60a5fa, #a855f7); color: white; border: none; border-radius: 50%; width: 3rem; height: 3rem; cursor: pointer; opacity: 0; visibility: hidden; transition: all 0.3s ease; z-index: 1000; box-shadow: 0 4px 12px rgba(96, 165, 250, 0.3);">
    ↑
</button>

<?php wp_footer(); ?>

<!-- Custom JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
                
                // Add highlight effect
                target.classList.add('pulse-highlight');
                setTimeout(() => {
                    target.classList.remove('pulse-highlight');
                }, 2000);
            }
        });
    });
    
    // Back to top button
    const backToTopButton = document.getElementById('back-to-top');
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > 300) {
            backToTopButton.style.opacity = '1';
            backToTopButton.style.visibility = 'visible';
        } else {
            backToTopButton.style.opacity = '0';
            backToTopButton.style.visibility = 'hidden';
        }
    });
    
    backToTopButton.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // Header scroll effect
    const header = document.getElementById('masthead');
    let lastScrollY = window.scrollY;
    
    window.addEventListener('scroll', function() {
        const currentScrollY = window.scrollY;
        
        if (currentScrollY > 100) {
            header.style.background = 'rgba(15, 23, 42, 0.98)';
            header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
        } else {
            header.style.background = 'rgba(15, 23, 42, 0.95)';
            header.style.boxShadow = 'none';
        }
        
        lastScrollY = currentScrollY;
    });
    
    // Mobile menu toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const navigation = document.getElementById('site-navigation');
    
    if (menuToggle && navigation) {
        menuToggle.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            navigation.style.display = isExpanded ? 'none' : 'block';
        });
    }
    
    // Form submission tracking
    const contactForm = document.querySelector('#contact-form form');
    if (contactForm) {
        contactForm.addEventListener('submit', function() {
            // Facebook Pixel - Track Lead event
            if (typeof fbq !== 'undefined') {
                fbq('track', 'Lead', {
                    content_name: 'Contact Form Submission',
                    content_category: 'Lead Generation'
                });
            }
        });
    }
});
</script>

</body>
</html>