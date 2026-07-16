<?php /* Template Name: pharmacies */ ?>
<?php get_header(); ?>
<?php
$lv_pharmacies = array(
        array(
                'name' => lv_t('صيدلية كبسولة', 'Capsula Pharmacies'),
                'address' => lv_t('ش الاديب متفرع من ش الترعة - المنصورة', 'El Adeeb St, branching from El Tera\'a St - Mansoura'),
                'phones' => array('01010501112', '01011880055'),
        ),
        array(
                'name' => lv_t('صيدلية الافندي', 'Alafandy Pharmacies'),
                'address' => lv_t('حدائق الاهرام البوابة الثالثة - الهرم', 'Pyramids Gardens, Gate 3 - Al Haram'),
                'phones' => array('01101234518', '01033770015'),
        ),
        array(
                'name' => lv_t('صيدلية وائل سمير', 'Wael Samir Pharmacy'),
                'address' => '',
                'phones' => array('19300'),
        ),
        array(
                'name' => lv_t('صيدليات العماوي', 'El Amawy Pharmacies'),
                'address' => '',
                'phones' => array('15656'),
        ),
        array(
                'name' => lv_t('صيدلية علاء الدين', 'Aladdin Pharmacy'),
                'address' => '',
                'branches' => array(
                        array('label' => lv_t('فرع طوخ', 'Toukh branch'), 'phones' => array('01012358123', '01002825050')),
                        array('label' => lv_t('فرع بنها', 'Banha branch'), 'phones' => array('01029998558', '01091400800')),
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
    <section class="lv-section">
        <div class="lv-wrap">
            <div class="lv-section__head">
                <span class="lv-label"><?php echo esc_html(lv_t('نقاط البيع', 'Points of Sale')); ?></span>
                <h2 class="lv-section__title"><?php echo esc_html(lv_t('تجد منتجات لوفيزاج في الصيدليات التالية', 'Find LeVisage products at the following pharmacies')); ?></h2>
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
