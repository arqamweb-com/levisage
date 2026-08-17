<?php /* Template Name: contact */ ?>
<?php get_header(); ?>
<div id="primary" class="lv-page"
     style="margin-top:0;margin-bottom:0;background-color:#fbfaf8" <?php astra_primary_class(); ?>>

    <!-- Hero -->

    <?php

    set_query_var('description', 'نحن هنا لمساعدتك');

    get_template_part('template/components/headers/page', 'header'); ?>


    <!-- Contact -->
    <section class="lv-section">
        <div class="lv-wrap">

            <p class="lv-contact__intro"><?php echo esc_html(__('يمكنك الآن التواصل معنا من خلال نموذج التواصل بإدخال البيانات المطلوبة وكتابة الرسالة والضغط على "إرسال"، وسيقوم أحد ممثلي خدمة العملاء بالتواصل معك في أقرب وقت. كما يمكنك التواصل معنا عن طريق وسائل التواصل الموضحة بالأسفل ومتابعتنا على وسائل التواصل الاجتماعي.', 'arqamweb')); ?></p>

            <div class="lv-contact-grid">

                <!-- Contact form -->
                <div class="lv-card lv-form pb-0">
                    <div class="lv-card__head">
                        <span class="lv-card__icon">
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                               stroke-linecap="round"
                               stroke-linejoin="round"><path d="M22 2 11 13"/><path
                                      d="M22 2 15 22l-4-9-9-4 20-7z"/></svg>
                        </span>
                        <h3 class="lv-card__title"><?php echo esc_html(__('نموذج التواصل', 'arqamweb')); ?></h3>
                    </div>
                    <?php echo do_shortcode('[contact-form-7 id="ce08332" title="Contact us"]'); ?>
                </div>

                <!-- Contact info -->
                <div class="group relative rounded-3xl p-8 md:p-10 bg-gradient-to-br from-[var(--navy-deep)] to-[var(--navy)] text-white overflow-hidden shadow-luxury h-fit">
                    <div class="absolute inset-0 bg-noise opacity-10 pointer-events-none"></div>
                    <div class="absolute -top-10 -start-10 h-40 w-40 rounded-full bg-[color:var(--gold)]/20 blur-2xl pointer-events-none"></div>
                    <div class="relative">
                        <div class="h-14 w-14 rounded-full bg-[color:var(--gold)]/20 flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="lucide lucide-phone h-7 w-7 text-[color:var(--gold)]" aria-hidden="true">
                                <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
                            </svg>
                        </div>
                        <h3 class="text-3xl md:text-4xl font-bold mb-8 text-white"><?php esc_html_e('بيانات التواصل', 'arqamweb'); ?></h3>
                        <div class="space-y-6">
                            <a href="tel:+201004025435"
                               class="flex items-center gap-4 hover:opacity-90 transition-opacity text-white">
                                <span class="h-12 w-12 rounded-full bg-[color:var(--gold)]/10 flex items-center justify-center shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round"
                                         class="lucide lucide-phone h-5 w-5 text-[color:var(--gold)]"
                                         aria-hidden="true"><path
                                                d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path></svg></span>
                                <div>
                                    <span class="block text-sm text-white/60"><?php esc_html_e('هاتف', 'arqamweb'); ?></span>
                                    <span class="font-semibold" dir="ltr">01004025435</span>
                                </div>
                            </a>
                            <a href="https://wa.me/+201004025435" target="_blank" rel="noopener noreferrer"
                               class="flex items-center gap-4 hover:opacity-90 transition-opacity text-white">
                                <span class="h-12 w-12 rounded-full bg-[color:var(--gold)]/10 flex items-center justify-center shrink-0"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="lucide lucide-message-circle h-5 w-5 text-[color:var(--gold)]"
                                            aria-hidden="true"><path
                                                d="M2.992 16.342a2 2 0 0 1 .094 1.167l-1.065 3.29a1 1 0 0 0 1.236 1.168l3.413-.998a2 2 0 0 1 1.099.092 10 10 0 1 0-4.777-4.719"></path></svg></span>
                                <div>
                                    <span class="block text-sm text-white/60"><?php esc_html_e('واتساب', 'arqamweb'); ?></span>
                                    <span class="font-semibold" dir="ltr">01004025435</span>
                                </div>
                            </a>
                            <a href="mailto:Info@levisage-pharma.com"
                               class="flex items-center gap-4 hover:opacity-90 transition-opacity text-white"><span
                                        class="h-12 w-12 rounded-full bg-[color:var(--gold)]/10 flex items-center justify-center shrink-0"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="lucide lucide-mail h-5 w-5 text-[color:var(--gold)]"
                                            aria-hidden="true"><path
                                                d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"></path><rect x="2" y="4"
                                                                                                         width="20"
                                                                                                         height="16"
                                                                                                         rx="2"></rect></svg></span>
                                <div><span class="block text-sm text-white/60"><?php esc_html_e('البريد الإلكتروني', 'arqamweb'); ?></span><span
                                            class="font-semibold">Info@levisage-pharma.com</span></div>
                            </a>
                            <div class="flex items-center gap-4">
                                <span class="h-12 w-12 rounded-full bg-[color:var(--gold)]/10 flex items-center justify-center shrink-0">
                                    <svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="lucide lucide-map-pin h-5 w-5 text-[color:var(--gold)]"
                                            aria-hidden="true"><path
                                                d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                </span>
                                <div>
                                    <span class="block text-sm text-white/60"><?php esc_html_e('العنوان', 'arqamweb'); ?></span>
                                    <span class="font-semibold"><?php esc_html_e('دار مصر - العبور - القليوبية', 'arqamweb'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-10 pt-8 border-t border-white/10">
                            <span class="block text-sm text-white/60 mb-4"><?php esc_html_e('تابعنا', 'arqamweb'); ?></span>
                            <div class="flex items-center gap-3">
                                <a href="https://www.facebook.com/levisagepharma" target="_blank"
                                   rel="noopener noreferrer"
                                   aria-label="<?php echo esc_attr__('فيسبوك', 'arqamweb'); ?>"
                                   class="h-11 w-11 rounded-full bg-[color:var(--gold)]/10 flex items-center justify-center text-[color:var(--gold)] hover:bg-[color:var(--gold)]/20 hover:scale-105 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="lucide lucide-facebook h-5 w-5"
                                         aria-hidden="true">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                    </svg>
                                </a>
                                <a href="https://www.instagram.com/levisage.pharma/"
                                   target="_blank" rel="noopener noreferrer"
                                   aria-label="<?php echo esc_attr__('إنستجرام', 'arqamweb'); ?>"
                                   class="h-11 w-11 rounded-full bg-[color:var(--gold)]/10 flex items-center justify-center text-[color:var(--gold)] hover:bg-[color:var(--gold)]/20 hover:scale-105 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="lucide lucide-instagram h-5 w-5"
                                         aria-hidden="true">
                                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                        <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                                    </svg>
                                </a>
                                <a href="https://www.tiktok.com/@levisage.pharma" target="_blank"
                                   rel="noopener noreferrer" aria-label="<?php echo esc_attr__('تيك توك', 'arqamweb'); ?>"
                                   class="h-11 w-11 rounded-full bg-[color:var(--gold)]/10 flex items-center justify-center text-[color:var(--gold)] hover:bg-[color:var(--gold)]/20 hover:scale-105 transition-all">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div><!-- #primary -->
<?php get_footer(); ?>
