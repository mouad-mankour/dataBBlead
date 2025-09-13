<?php get_header(); ?>

<main id="main" class="site-main">
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden" role="main">
        <!-- Background Image -->
        <div class="absolute inset-0 opacity-30" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/sev-hero-bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
        
        <!-- Overlay gradient -->
        <div class="absolute inset-0" style="background: linear-gradient(to bottom, rgba(0,0,0,0.8), rgba(0,0,0,0.6), rgba(0,0,0,0.9));"></div>
        
        <!-- Floating bubbles -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="bubble absolute" style="top: 5rem; left: 5rem; width: 8rem; height: 8rem;"></div>
            <div class="bubble absolute" style="top: 10rem; right: 8rem; width: 6rem; height: 6rem;"></div>
            <div class="bubble absolute" style="bottom: 8rem; left: 25%; width: 10rem; height: 10rem;"></div>
            <div class="bubble absolute" style="bottom: 5rem; right: 5rem; width: 7rem; height: 7rem;"></div>
        </div>

        <!-- Data lines -->
        <div class="absolute inset-0 opacity-20">
            <div class="data-line absolute" style="top: 25%; left: 0; width: 100%; height: 1px;"></div>
            <div class="data-line absolute" style="top: 50%; left: 0; width: 100%; height: 1px; animation-delay: 1s;"></div>
            <div class="data-line absolute" style="top: 75%; left: 0; width: 100%; height: 1px; animation-delay: 2s;"></div>
        </div>

        <div class="container mx-auto px-6 text-center relative z-10">
            <!-- Badge -->
            <div class="inline-flex items-center gap-3 bg-gradient-to-r from-blue-500/10 to-purple-500/10 border border-blue-400/40 rounded-full px-6 py-3 mb-8 shadow-lg backdrop-blur-sm">
                <span style="color: #60a5fa; font-size: 1.25rem;">✨</span>
                <span style="color: #60a5fa; font-size: 0.875rem; font-weight: 600;">databblead • Data Intelligence</span>
            </div>

            <!-- Main Title -->
            <h1 style="font-size: clamp(2.5rem, 8vw, 5rem); font-weight: 700; margin-bottom: 1.5rem; line-height: 1.1;">
                <span style="display: block; color: #f8fafc;">DE la DATA brute</span>
                <span class="hero-gradient animate-gradient" style="display: block;">aux LEADS qualifiés</span>
            </h1>

            <!-- Subtitle -->
            <p style="font-size: clamp(1.125rem, 3vw, 1.5rem); color: #94a3b8; margin-bottom: 3rem; max-width: 64rem; margin-left: auto; margin-right: auto; line-height: 1.6;">
                L'intelligence artificielle au service de votre croissance commerciale.<br>
                <span style="color: #60a5fa; font-weight: 500;">Nous identifions, qualifions et connectons</span> — 
                vos futurs clients vous attendent.
            </p>

            <!-- CTA Button -->
            <div style="display: flex; justify-content: center;">
                <a href="#contact-form" class="btn btn-hero btn-glow" style="font-size: 1.125rem; padding: 1.5rem 3rem;">
                    Lancer ma stratégie databblead
                    <span style="margin-left: 0.5rem;">→</span>
                </a>
            </div>

            <!-- Scroll indicator -->
            <div class="absolute bottom-8 left-1/2" style="transform: translateX(-50%);">
                <div style="width: 1.5rem; height: 2.5rem; border: 2px solid #60a5fa; border-radius: 9999px; padding: 0.25rem;">
                    <div style="width: 0.25rem; height: 0.75rem; background: #60a5fa; border-radius: 9999px; margin: 0 auto; animation: bounce 2s infinite;"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Sections -->
    <section class="py-20" style="background: linear-gradient(135deg, hsl(var(--card)), hsl(var(--card)/0.8));">
        <div class="container">
            <div class="text-center mb-16">
                <h2 style="font-size: 3rem; font-weight: 700; margin-bottom: 1rem;">Nos Services</h2>
                <p style="font-size: 1.25rem; color: #94a3b8;">Intelligence data pour votre croissance</p>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                <!-- Service cards would go here -->
                <div class="card-float" style="background: rgba(255,255,255,0.05); padding: 2rem; border-radius: 1rem; border: 1px solid rgba(255,255,255,0.1);">
                    <h3 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 1rem; color: #60a5fa;">Scraping de Données</h3>
                    <p style="color: #94a3b8;">Extraction intelligente de données web pour alimenter votre stratégie commerciale.</p>
                </div>
                
                <div class="card-float" style="background: rgba(255,255,255,0.05); padding: 2rem; border-radius: 1rem; border: 1px solid rgba(255,255,255,0.1);">
                    <h3 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 1rem; color: #60a5fa;">Enrichissement de Données</h3>
                    <p style="color: #94a3b8;">Qualification et enrichissement de vos prospects pour maximiser vos conversions.</p>
                </div>
                
                <div class="card-float" style="background: rgba(255,255,255,0.05); padding: 2rem; border-radius: 1rem; border: 1px solid rgba(255,255,255,0.1);">
                    <h3 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 1rem; color: #60a5fa;">Vérification</h3>
                    <p style="color: #94a3b8;">Validation de la qualité et de la fiabilité de vos données prospects.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section id="contact-form" class="py-20 relative">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="bubble absolute" style="top: 2.5rem; left: 2.5rem; width: 5rem; height: 5rem; opacity: 0.3;"></div>
            <div class="bubble absolute" style="bottom: 5rem; right: 5rem; width: 4rem; height: 4rem; opacity: 0.2;"></div>
            <div class="absolute" style="top: 50%; left: 0; width: 100%; height: 1px; background: linear-gradient(to right, transparent, #60a5fa, transparent); opacity: 0.3;"></div>
        </div>

        <div class="container relative z-10">
            <div style="max-width: 64rem; margin: 0 auto;">
                <!-- Title -->
                <div class="text-center mb-12">
                    <div class="inline-flex items-center gap-3 bg-gradient-to-r from-blue-500/10 to-purple-500/10 border border-blue-400/40 rounded-full px-6 py-3 mb-8 shadow-lg backdrop-blur-sm">
                        <span style="color: #60a5fa; font-size: 1.25rem;">✨</span>
                        <span style="color: #60a5fa; font-size: 0.875rem; font-weight: 600;">Prêt à transformer vos données ?</span>
                    </div>
                    
                    <h2 style="font-size: clamp(2rem, 6vw, 3.5rem); font-weight: 700; margin-bottom: 2rem; line-height: 1.2;">
                        Prêt à transformer
                        <span style="color: #60a5fa; margin-left: 0.75rem;">la DATA BUSINESS en LEADS ?</span>
                    </h2>
                    
                    <p style="font-size: 1.25rem; color: #94a3b8; max-width: 64rem; margin: 0 auto; line-height: 1.6;">
                        Partagez-nous vos défis commerciaux. Nous concevrons une stratégie data sur-mesure.<br>
                        <em style="color: #60a5fa;">Votre pipeline de demain se construit aujourd'hui.</em>
                    </p>
                </div>

                <!-- Contact Form -->
                <div style="background: linear-gradient(135deg, rgba(255,255,255,0.05), rgba(255,255,255,0.02)); backdrop-filter: blur(12px); border: 1px solid rgba(96,165,250,0.3); border-radius: 2rem; padding: 4rem; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);" class="card-float">
                    <?php echo do_shortcode('[contact-form-7 id="1" title="Contact form"]'); ?>
                    
                    <!-- Fallback HTML form if Contact Form 7 is not available -->
                    <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="display: grid; gap: 2rem;">
                        <input type="hidden" name="action" value="databblead_contact">
                        <?php wp_nonce_field('databblead_contact_nonce'); ?>
                        
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                            <div>
                                <label for="name" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Votre nom</label>
                                <input type="text" id="name" name="name" required style="width: 100%; padding: 1rem 1.5rem; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); border-radius: 0.75rem; color: white; font-size: 1rem;" placeholder="Prénom et nom de famille">
                            </div>
                            
                            <div>
                                <label for="email" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Votre email professionnel</label>
                                <input type="email" id="email" name="email" required style="width: 100%; padding: 1rem 1.5rem; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); border-radius: 0.75rem; color: white; font-size: 1rem;" placeholder="prenom@entreprise.com">
                            </div>
                        </div>

                        <div>
                            <label for="mission" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Votre défi commercial</label>
                            <textarea id="mission" name="mission" required rows="5" style="width: 100%; padding: 1rem 1.5rem; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); border-radius: 0.75rem; color: white; font-size: 1rem; resize: none;" placeholder="Décrivez vos objectifs de croissance, vos défis actuels, vos cibles prioritaires..."></textarea>
                            <p style="font-size: 0.875rem; color: #94a3b8; margin-top: 0.5rem;">
                                Plus vous détaillez votre contexte, plus nous pourrons personnaliser notre approche.
                            </p>
                        </div>

                        <div style="padding-top: 1.5rem;">
                            <button type="submit" class="btn btn-hero" style="width: 100%; font-size: 1.25rem; padding: 1.5rem 2.5rem;">
                                Lancer ma stratégie databblead
                                <span style="margin-left: 0.5rem;">📧</span>
                            </button>
                        </div>

                        <div style="padding-top: 1.5rem; border-top: 1px solid rgba(255,255,255,0.1);">
                            <p style="font-size: 0.875rem; color: #94a3b8; text-align: center;">
                                <span style="color: #60a5fa; font-weight: 600;">Confidentialité totale.</span> 
                                Vos données stratégiques restent protégées.<br>
                                Analyse personnalisée sous 24h, sans engagement de votre part.
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>