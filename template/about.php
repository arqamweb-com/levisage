<?php /* Template Name: about */ ?>
<?php get_header(); ?>
<div id="primary" class="lv-page" style="margin-top:0;margin-bottom:0;background-color:#fbfaf8" <?php astra_primary_class(); ?>>

  <!-- Hero -->

    <?php

    set_query_var('description', 'العناية الفاخرة بالعلم');

    get_template_part('template/components/headers/page', 'header');
    ?>


  <!-- Mission -->
    <section class="py-28 bg-background">
        <div class="container-luxury">
            <div class="text-center mb-16"><span class="text-xs tracking-[0.3em] text-[var(--navy)]"><?php esc_html_e('رسالتنا', 'arqamweb'); ?></span>
                <h2 class="mt-3 text-4xl md:text-5xl font-bold text-gradient-brand"><?php esc_html_e('نؤمن بعلم العناية الحقيقي', 'arqamweb'); ?></h2></div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="group relative rounded-3xl p-8 md:p-10 bg-gradient-to-br from-[var(--navy-deep)] to-[var(--navy)] text-white overflow-hidden shadow-luxury transition-transform hover:-translate-y-1">
                    <div class="absolute inset-0 bg-noise opacity-10 pointer-events-none"></div>
                    <div class="absolute -top-10 -right-10 h-40 w-40 rounded-full bg-[color:var(--gold)]/20 blur-2xl pointer-events-none"></div>
                    <div class="relative">
                        <div class="h-14 w-14 rounded-full bg-[color:var(--gold)]/20 flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="lucide lucide-eye h-7 w-7 text-[color:var(--gold)]"
                                 aria-hidden="true">
                                <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </div>
                        <h3 class="text-3xl md:text-4xl font-bold mb-5 text-white"><?php esc_html_e('الرؤية', 'arqamweb'); ?></h3>
                        <p class="text-white/85 leading-[1.9] text-lg"><?php esc_html_e('أن نصبح شركة رائدة في مجال صناعة مستحضرات التجميل
                            ومنتجات المكملات الغذائية عالية الجودة، مما تُمكّن الأفراد من الوصول للصحة والجمال. وكذلك
                            نحن نسعى إلى الابتكار وتطوير منتجات آمنة وفعّالة ومستدامة، مع الحفاظ على التزامنا بالممارسات
                            التجارية الأخلاقية والمسؤولية الاجتماعية.', 'arqamweb'); ?>
                        </p>
                    </div>
                </div>
                <div class="group relative rounded-3xl p-8 md:p-10 bg-white border border-border shadow-soft overflow-hidden transition-transform hover:-translate-y-1">
                    <div class="absolute -top-10 -right-10 h-40 w-40 rounded-full bg-[color:var(--gold)]/20 blur-2xl pointer-events-none"></div>
                    <div class="relative">
                        <div class="h-14 w-14 rounded-full bg-[color:var(--gold)]/20 flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="lucide lucide-target h-7 w-7 text-[color:var(--gold)]"
                                 aria-hidden="true">
                                <circle cx="12" cy="12" r="10"></circle>
                                <circle cx="12" cy="12" r="6"></circle>
                                <circle cx="12" cy="12" r="2"></circle>
                            </svg>
                        </div>
                        <h3 class="text-3xl md:text-4xl font-bold text-[var(--navy-deep)] mb-5"><?php esc_html_e('الهدف', 'arqamweb'); ?></h3>
                        <p class="text-muted-foreground leading-[1.9] text-lg"><?php esc_html_e('رسالتنا هي تطوير وتصنيع منتجات آمنة
                            وفعّالة وبأسعار مناسبة تلبي احتياجات عملائنا. نحن ملتزمون باستخدام أحدث الأبحاث العلمية
                            والتكنولوجيا لصناعة منتجات تخدم تحسين الحياة الصحية، مع الحفاظ على التزامنا بالاستدامة
                            والممارسات التجارية الأخلاقية. نحن نسعى جاهدين إلى تقديم خدمة عملاء استثنائية، وتعزيز ثقافة
                            الابتكار.', 'arqamweb'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div><!-- #primary -->
<?php get_footer(); ?>
