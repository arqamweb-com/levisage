<?php /* Template Name: pharmacies */ ?>
<?php get_header(); ?>
<?php
$lv_pharmacies = array(
        array(
                'name' => __('صيدلية كبسولة', 'arqamweb'),
                'address' => __('ش الاديب متفرع من ش الترعة - المنصورة', 'arqamweb'),
                'phones' => array('01010501112', '01011880055'),
        ),
        array(
                'name' => __('صيدلية الافندي', 'arqamweb'),
                'address' => __('حدائق الاهرام البوابة الثالثة - الهرم', 'arqamweb'),
                'phones' => array('01101234518', '01033770015'),
        ),
        array(
                'name' => __('صيدلية وائل سمير', 'arqamweb'),
                'address' => '',
                'phones' => array('19300'),
        ),
        array(
                'name' => __('صيدليات العماوي', 'arqamweb'),
                'address' => '',
                'phones' => array('15656'),
        ),
        array(
                'name' => __('صيدلية علاء الدين', 'arqamweb'),
                'address' => '',
                'branches' => array(
                        array('label' => __('فرع طوخ', 'arqamweb'), 'phones' => array('01012358123', '01002825050')),
                        array('label' => __('فرع بنها', 'arqamweb'), 'phones' => array('01029998558', '01091400800')),
                ),
        ),
);

$lv_pin = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/></svg>';
$lv_tel = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3-8.6A2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.8.6 2.6a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.5-1.1a2 2 0 0 1 2.1-.5c.8.3 1.7.5 2.6.6a2 2 0 0 1 1.7 2z"/></svg>';

if (!function_exists('lv_phone_link')) {
    function lv_phone_link($num, $icon)
    {
        $tel = preg_replace('/\s+/', '', $num);
        $href = (strlen($tel) >= 10) ? '+2' . $tel : $tel; // EG mobiles get +2, short service lines as-is
        return '<a href="tel:' . esc_attr($href) . '">' . $icon . esc_html($num) . '</a>';
    }
}
?>
<div id="primary" class="lv-page"
     style="margin-top:0;margin-bottom:0;background-color:#fbfaf8" <?php astra_primary_class(); ?>>

    <!-- Hero -->
    <?php

    set_query_var('description', 'أماكن توفّر منتجات لوفيزاج');

    get_template_part('template/components/headers/page', 'header'); ?>


    <!-- Pharmacies list -->

    <section class="py-28 bg-background">
        <div class="container-luxury">
            <div class="text-center mb-16"><span class="lv-label"><?php esc_html_e('نقاط البيع', 'arqamweb'); ?></span>
                <h2 class="mt-3 text-4xl md:text-5xl font-bold text-gradient-brand">
                    <?php esc_html_e('تجد منتجات لوفيزاج في الصيدليات التالية', 'arqamweb'); ?>
                </h2>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="group relative rounded-3xl p-7 md:p-8 bg-white border border-border shadow-soft overflow-hidden transition-transform hover:-translate-y-1">
                    <div class="absolute -top-10 -right-10 h-40 w-40 rounded-full bg-[color:var(--gold)]/10 blur-2xl pointer-events-none"></div>
                    <div class="relative">
                        <div class="h-14 w-14 rounded-full bg-[color:var(--gold)]/10 flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="lucide lucide-map-pin h-7 w-7 text-[color:var(--gold)]"
                                 aria-hidden="true">
                                <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <h3 class="text-2xl md:text-3xl font-bold text-[var(--navy-deep)] mb-4"><?php esc_html_e('صيدلية كبسولة', 'arqamweb'); ?></h3>
                        <p class="text-muted-foreground leading-relaxed mb-5"><?php esc_html_e('ش الاديب متفرع من ش الترعة - المنصورة', 'arqamweb'); ?></p>
                        <div class="flex flex-wrap items-center gap-4"><a href="tel:01010501112"
                                                                          class="inline-flex items-center gap-2 text-[var(--navy-deep)] font-semibold hover:text-[var(--leaf)] transition-colors"
                                                                          dir="ltr">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="lucide lucide-phone h-4 w-4 text-[color:var(--gold)]" aria-hidden="true">
                                    <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
                                </svg>
                                01010501112</a><a href="tel:01011880055"
                                                  class="inline-flex items-center gap-2 text-[var(--navy-deep)] font-semibold hover:text-[var(--leaf)] transition-colors"
                                                  dir="ltr">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="lucide lucide-phone h-4 w-4 text-[color:var(--gold)]" aria-hidden="true">
                                    <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
                                </svg>
                                01011880055</a></div>
                    </div>
                </div>
                <div class="group relative rounded-3xl p-7 md:p-8 bg-white border border-border shadow-soft overflow-hidden transition-transform hover:-translate-y-1">
                    <div class="absolute -top-10 -right-10 h-40 w-40 rounded-full bg-[color:var(--gold)]/10 blur-2xl pointer-events-none"></div>
                    <div class="relative">
                        <div class="h-14 w-14 rounded-full bg-[color:var(--gold)]/10 flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="lucide lucide-map-pin h-7 w-7 text-[color:var(--gold)]"
                                 aria-hidden="true">
                                <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <h3 class="text-2xl md:text-3xl font-bold text-[var(--navy-deep)] mb-4"><?php esc_html_e('صيدلية الافندي', 'arqamweb'); ?></h3>
                        <p class="text-muted-foreground leading-relaxed mb-5"><?php esc_html_e('حدائق الاهرام البوابة الثالثة - الهرم', 'arqamweb'); ?></p>
                        <div class="flex flex-wrap items-center gap-4"><a href="tel:01101234518"
                                                                          class="inline-flex items-center gap-2 text-[var(--navy-deep)] font-semibold hover:text-[var(--leaf)] transition-colors"
                                                                          dir="ltr">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="lucide lucide-phone h-4 w-4 text-[color:var(--gold)]" aria-hidden="true">
                                    <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
                                </svg>
                                01101234518</a><a href="tel:01033770015"
                                                  class="inline-flex items-center gap-2 text-[var(--navy-deep)] font-semibold hover:text-[var(--leaf)] transition-colors"
                                                  dir="ltr">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="lucide lucide-phone h-4 w-4 text-[color:var(--gold)]" aria-hidden="true">
                                    <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
                                </svg>
                                01033770015</a></div>
                    </div>
                </div>
                <div class="group relative rounded-3xl p-7 md:p-8 bg-white border border-border shadow-soft overflow-hidden transition-transform hover:-translate-y-1">
                    <div class="absolute -top-10 -right-10 h-40 w-40 rounded-full bg-[color:var(--gold)]/10 blur-2xl pointer-events-none"></div>
                    <div class="relative">
                        <div class="h-14 w-14 rounded-full bg-[color:var(--gold)]/10 flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="lucide lucide-map-pin h-7 w-7 text-[color:var(--gold)]"
                                 aria-hidden="true">
                                <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <h3 class="text-2xl md:text-3xl font-bold text-[var(--navy-deep)] mb-4"><?php esc_html_e('صيدلية وائل سمير', 'arqamweb'); ?></h3>
                        <div class="flex flex-wrap items-center gap-4"><a href="tel:19300"
                                                                          class="inline-flex items-center gap-2 text-[var(--navy-deep)] font-semibold hover:text-[var(--leaf)] transition-colors"
                                                                          dir="ltr">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="lucide lucide-phone h-4 w-4 text-[color:var(--gold)]" aria-hidden="true">
                                    <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
                                </svg>
                                19300</a></div>
                    </div>
                </div>
                <div class="group relative rounded-3xl p-7 md:p-8 bg-white border border-border shadow-soft overflow-hidden transition-transform hover:-translate-y-1">
                    <div class="absolute -top-10 -right-10 h-40 w-40 rounded-full bg-[color:var(--gold)]/10 blur-2xl pointer-events-none"></div>
                    <div class="relative">
                        <div class="h-14 w-14 rounded-full bg-[color:var(--gold)]/10 flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="lucide lucide-map-pin h-7 w-7 text-[color:var(--gold)]"
                                 aria-hidden="true">
                                <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <h3 class="text-2xl md:text-3xl font-bold text-[var(--navy-deep)] mb-4"><?php esc_html_e('صيدليات العماوي', 'arqamweb'); ?></h3>
                        <div class="flex flex-wrap items-center gap-4"><a href="tel:15656"
                                                                          class="inline-flex items-center gap-2 text-[var(--navy-deep)] font-semibold hover:text-[var(--leaf)] transition-colors"
                                                                          dir="ltr">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="lucide lucide-phone h-4 w-4 text-[color:var(--gold)]" aria-hidden="true">
                                    <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
                                </svg>
                                15656</a></div>
                    </div>
                </div>
                <div class="group relative rounded-3xl p-7 md:p-8 bg-white border border-border shadow-soft overflow-hidden transition-transform hover:-translate-y-1">
                    <div class="absolute -top-10 -right-10 h-40 w-40 rounded-full bg-[color:var(--gold)]/10 blur-2xl pointer-events-none"></div>
                    <div class="relative">
                        <div class="h-14 w-14 rounded-full bg-[color:var(--gold)]/10 flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="lucide lucide-map-pin h-7 w-7 text-[color:var(--gold)]"
                                 aria-hidden="true">
                                <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <h3 class="text-2xl md:text-3xl font-bold text-[var(--navy-deep)] mb-4"><?php esc_html_e('صيدلية علاء الدين', 'arqamweb'); ?></h3>
                        <div class="space-y-4">
                            <div class="border-t border-border pt-3 first:border-t-0 first:pt-0"><span
                                        class="block text-sm font-bold text-[var(--navy)] mb-2"><?php esc_html_e('فرع طوخ', 'arqamweb'); ?></span>
                                <div class="flex flex-wrap items-center gap-4"><a href="tel:01012358123"
                                                                                  class="inline-flex items-center gap-2 text-[var(--navy-deep)] font-semibold hover:text-[var(--leaf)] transition-colors"
                                                                                  dir="ltr">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="lucide lucide-phone h-4 w-4 text-[color:var(--gold)]"
                                             aria-hidden="true">
                                            <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
                                        </svg>
                                        01012358123</a><a href="tel:01002825050"
                                                          class="inline-flex items-center gap-2 text-[var(--navy-deep)] font-semibold hover:text-[var(--leaf)] transition-colors"
                                                          dir="ltr">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="lucide lucide-phone h-4 w-4 text-[color:var(--gold)]"
                                             aria-hidden="true">
                                            <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
                                        </svg>
                                        01002825050</a></div>
                            </div>
                            <div class="border-t border-border pt-3 first:border-t-0 first:pt-0"><span
                                        class="block text-sm font-bold text-[var(--navy)] mb-2"><?php esc_html_e('فرع بنها', 'arqamweb'); ?></span>
                                <div class="flex flex-wrap items-center gap-4"><a href="tel:01029998558"
                                                                                  class="inline-flex items-center gap-2 text-[var(--navy-deep)] font-semibold hover:text-[var(--leaf)] transition-colors"
                                                                                  dir="ltr">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="lucide lucide-phone h-4 w-4 text-[color:var(--gold)]"
                                             aria-hidden="true">
                                            <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
                                        </svg>
                                        01029998558</a><a href="tel:01091400800"
                                                          class="inline-flex items-center gap-2 text-[var(--navy-deep)] font-semibold hover:text-[var(--leaf)] transition-colors"
                                                          dir="ltr">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="lucide lucide-phone h-4 w-4 text-[color:var(--gold)]"
                                             aria-hidden="true">
                                            <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
                                        </svg>
                                        01091400800</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="lv-section">
        <div class="lv-wrap">
            <div class="lv-section__head">
                <span class="lv-label"><?php echo esc_html(__('نقاط البيع', 'arqamweb')); ?></span>
                <h2 class="lv-section__title"><?php echo esc_html(__('تجد منتجات لوفيزاج في الصيدليات التالية', 'arqamweb')); ?></h2>
            </div>

            <div class="lv-pharm-grid">
                <?php foreach ($lv_pharmacies as $ph) : ?>
                    <div class="lv-pharm">
                        <span class="lv-pharm__pin"><?php echo $lv_pin; // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
                        <h3 class="lv-pharm__name"><?php echo esc_html($ph['name']); ?></h3>
                        <?php if (!empty($ph['address'])) : ?>
                            <p class="lv-pharm__addr"><?php echo esc_html($ph['address']); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($ph['branches'])) : ?>
                            <?php foreach ($ph['branches'] as $br) : ?>
                                <span class="lv-pharm__branch"><?php echo esc_html($br['label']); ?></span>
                                <div class="lv-pharm__phones">
                                    <?php foreach ($br['phones'] as $num) {
                                        echo lv_phone_link($num, $lv_tel); // phpcs:ignore WordPress.Security.EscapeOutput
                                    } ?>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="lv-pharm__phones">
                                <?php foreach ($ph['phones'] as $num) {
                                    echo lv_phone_link($num, $lv_tel); // phpcs:ignore WordPress.Security.EscapeOutput
                                } ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</div><!-- #primary -->
<?php get_footer(); ?>
