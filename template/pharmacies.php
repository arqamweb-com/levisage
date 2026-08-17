<?php /* Template Name: pharmacies */ ?>
<?php get_header(); ?>
<?php
$lv_pharmacies = array(
        array(
                'name' => __('نون', 'arqamweb'),
        ),
        array(
                'name' => __('امازون', 'arqamweb'),
        ),
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
        array(
                'name' => __('صيدلية انس سلام', 'arqamweb'),
                'address' => __('المعادى - القاهرة', 'arqamweb'),
                'phones' => array('01033202699', '01155779311'),
        ),
        array(
                'name' => __('صيدلية عبدالهادى', 'arqamweb'),
                'address' => __('الهضبه الوسطى - المقطم', 'arqamweb'),
                'phones' => array('01102229343', '01014687979'),
        ),
        array(
                'name' => __('صيدلية ايمان سمير', 'arqamweb'),
                'address' => __('حى الواحه - مدينه نصر', 'arqamweb'),
                'phones' => array('01029065018'),
        ),
        array(
                'name' => __('صيدلية هانى نوح', 'arqamweb'),
                'address' => __('الرحاب', 'arqamweb'),
                'phones' => array('01114257889'),
        ),
        array(
                'name' => __('صيدلية سعيد الدفراوى', 'arqamweb'),
                'address' => __('منوف - المنوفية', 'arqamweb'),
                'phones' => array(),
        ),
        array(
                'name' => __('صيدلية ضبش', 'arqamweb'),
                'address' => __('منوف - المنوفية', 'arqamweb'),
                'phones' => array(),
        ),
        array(
                'name' => __('صيدلية طايل', 'arqamweb'),
                'address' => __('منوف - المنوفية', 'arqamweb'),
                'phones' => array(),
        ),
        array(
                'name' => __('صيدلية مكه المكرمه', 'arqamweb'),
                'address' => __('اشمون - المنوفية', 'arqamweb'),
                'phones' => array(),
        ),
        array(
                'name' => __('صيدلية الاسراء', 'arqamweb'),
                'address' => __('منوف - المنوفية', 'arqamweb'),
                'phones' => array(),
        ),
        array(
                'name' => __('صيدلية عمارة', 'arqamweb'),
                'address' => __('الشهداء - المنوفية', 'arqamweb'),
                'phones' => array(),
        ),
        array(
                'name' => __('صيدلية د/ نهى احمد سليمان يوسف', 'arqamweb'),
                'address' => __('الشهداء - المنوفية', 'arqamweb'),
                'phones' => array(),
        ),
        array(
                'name' => __('صيدلية د/ نادر حلمى', 'arqamweb'),
                'address' => __('سرس اليان - المنوفية', 'arqamweb'),
                'phones' => array(),
        ),
        array(
                'name' => __('صيدلية د/ محمد سرور', 'arqamweb'),
                'address' => __('سرس اليان - المنوفية', 'arqamweb'),
                'phones' => array(),
        ),
        array(
                'name' => __('صيدلية السنترال', 'arqamweb'),
                'address' => __('منوف - المنوفية', 'arqamweb'),
                'phones' => array(),
        ),
        array(
                'name' => __('صيدلية الحياه', 'arqamweb'),
                'address' => __('اشمون - المنوفية', 'arqamweb'),
                'phones' => array(),
        ),
        array(
                'name' => __('صيدلية الامانة', 'arqamweb'),
                'address' => __('اشمون - المنوفية', 'arqamweb'),
                'phones' => array(),
        ),
        array(
                'name' => __('صيدلية سامى فراج', 'arqamweb'),
                'address' => __('السادات - المنوفية', 'arqamweb'),
                'phones' => array(),
        ),
        array(
                'name' => __('صيدلية الزهراء', 'arqamweb'),
                'address' => __('الشهداء - المنوفية', 'arqamweb'),
                'phones' => array(),
        ),
        array(
                'name' => __('صيدلية د/ احمد نجيب', 'arqamweb'),
                'address' => __('منوف - المنوفية', 'arqamweb'),
                'phones' => array(),
        ),
        array(
                'name' => __('صيدلية عمر', 'arqamweb'),
                'address' => __('منوف - المنوفية', 'arqamweb'),
                'phones' => array(),
        ),
        array(
                'name' => __('صيدلية د/ محمد عبدالغفار', 'arqamweb'),
                'address' => __('اشمون - المنوفية', 'arqamweb'),
                'phones' => array(),
        ),
        array(
                'name' => __('صيدلية د/ رانيا عبد السلام', 'arqamweb'),
                'address' => __('سرس اليان - المنوفية', 'arqamweb'),
                'phones' => array(),
        ),
        array(
                'name' => __('صيدلية د/ محمد حبش', 'arqamweb'),
                'address' => __('تلا - المنوفية', 'arqamweb'),
                'phones' => array(),
        ),
        array(
                'name' => __('صيدلية د/ محمد دنيا', 'arqamweb'),
                'address' => __('سرس اليان - المنوفية', 'arqamweb'),
                'phones' => array(),
        ),
        array(
                'name' => __('صيدلية د/ ريهام غنيم', 'arqamweb'),
                'address' => __('الباجور - المنوفية', 'arqamweb'),
                'phones' => array(),
        ),
        array(
                'name' => __('صيدلية د/ عاصم', 'arqamweb'),
                'address' => __('منوف - المنوفية', 'arqamweb'),
                'phones' => array(),
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
                    <?php esc_html_e('اماكن تواجد منتجات لوفيزاج', 'arqamweb'); ?>
                </h2>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                $lv_map_pin = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-7 w-7 text-[color:var(--gold)]" aria-hidden="true"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg>';
                $lv_phone_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone h-4 w-4 text-[color:var(--gold)]" aria-hidden="true"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path></svg>';

                // Render a list of phone links.
                $lv_render_phones = function ($phones) use ($lv_phone_icon) {
                    echo '<div class="flex flex-wrap items-center gap-4">';
                    foreach ($phones as $phone) {
                        $tel = preg_replace('/\s+/', '', $phone);
                        $href = (strlen($tel) >= 10) ? '+2' . $tel : $tel;
                        echo '<a href="tel:' . esc_attr($href) . '" class="inline-flex items-center gap-2 text-[var(--navy-deep)] font-semibold hover:text-[var(--leaf)] transition-colors" dir="ltr">' . $lv_phone_icon . esc_html($phone) . '</a>';
                    }
                    echo '</div>';
                };

                foreach ($lv_pharmacies as $pharmacy) :
                    ?>
                    <div class="group relative rounded-3xl p-7 md:p-8 bg-white border border-border shadow-soft overflow-hidden transition-transform hover:-translate-y-1">
                        <div class="absolute -top-10 -start-10 h-40 w-40 rounded-full bg-[color:var(--gold)]/10 blur-2xl pointer-events-none"></div>
                        <div class="relative">
                            <div class="h-14 w-14 rounded-full bg-[color:var(--gold)]/10 flex items-center justify-center mb-6"><?php echo $lv_map_pin; ?></div>
                            <h3 class="text-2xl md:text-3xl font-bold text-[var(--navy-deep)] mb-4"><?php echo esc_html($pharmacy['name']); ?></h3>
                            <?php if (!empty($pharmacy['address'])) : ?>
                                <p class="text-muted-foreground leading-relaxed mb-5"><?php echo esc_html($pharmacy['address']); ?></p>
                            <?php endif; ?>
                            <?php if (!empty($pharmacy['branches'])) : ?>
                                <div class="space-y-4">
                                    <?php foreach ($pharmacy['branches'] as $branch) : ?>
                                        <div class="border-t border-border pt-3 first:border-t-0 first:pt-0">
                                            <span class="block text-sm font-bold text-[var(--navy)] mb-2"><?php echo esc_html($branch['label']); ?></span>
                                            <?php $lv_render_phones($branch['phones']); ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php elseif (!empty($pharmacy['phones'])) : ?>
                                <?php $lv_render_phones($pharmacy['phones']); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</div><!-- #primary -->
<?php get_footer(); ?>
