<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

?>
<?php astra_content_bottom(); ?>
</div> <!-- ast-container -->
</div><!-- #content -->
<?php
astra_content_after();

astra_footer_before();

astra_footer();

astra_footer_after();
?>
</div><!-- #page -->
<!-- Start Footer -->
<footer class="bg-[#0a1a22] text-white/70">
    <div class="container-luxury py-20 grid lg:grid-cols-12 gap-12">
        <div class="lg:col-span-4"><img src="https://levisage-pharma.com/wp-content/uploads/2023/09/logo.svg" alt="<?php echo esc_attr__('لوفيزاج', 'arqamweb'); ?>" class="h-12 brightness-0 invert">
            <p class="mt-5 text-white/60 max-w-sm leading-loose">
                <?php esc_html_e('عناية تجميلة مبتكرة -مهندسة بالعلم ومصممة للثقة', 'arqamweb'); ?>
            </p>
            <div class="mt-7 space-y-3 text-sm">
                <a href="tel:01004025435"
                   class="flex items-center gap-3 text-white/70 hover:text-white transition-colors"><span
                            class="h-9 w-9 rounded-full bg-white/5 border border-white/10 flex items-center justify-center"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-phone h-4 w-4 text-[color:var(--gold)]"
                                aria-hidden="true"><path
                                    d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path></svg></span><span
                            dir="ltr">01004025435</span></a><a href="mailto:Info@levisage-pharma.com"
                                                               class="flex items-center gap-3 text-white/70 hover:text-white transition-colors"><span
                            class="h-9 w-9 rounded-full bg-white/5 border border-white/10 flex items-center justify-center"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-mail h-4 w-4 text-[color:var(--gold)]"
                                aria-hidden="true"><path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"></path><rect x="2"
                                                                                                                  y="4"
                                                                                                                  width="20"
                                                                                                                  height="16"
                                                                                                                  rx="2"></rect></svg></span><span>Info@levisage-pharma.com</span></a>
                <div class="flex items-center gap-3"><span
                            class="h-9 w-9 rounded-full bg-white/5 border border-white/10 flex items-center justify-center"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-map-pin h-4 w-4 text-[color:var(--gold)]"
                                aria-hidden="true"><path
                                    d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle
                                    cx="12" cy="10" r="3"></circle></svg></span><span><?php esc_html_e('دار مصر — العبور، القليوبية', 'arqamweb'); ?></span>
                </div>
            </div>
        </div>
        <?php
        // Link columns come from nav menus (Appearance → Menus). The arrays are
        // only the fallback used until each location has a menu assigned.
        lv_footer_menu_column('footer_shop', __('المتجر', 'arqamweb'), array(
            array('label' => __('علاج التساقط', 'arqamweb'), 'url' => lv_translated_url(40, 'product_cat')),
            array('label' => __('علاج الشيب', 'arqamweb'),   'url' => lv_translated_url(39, 'product_cat')),
            array('label' => __('الترطيب', 'arqamweb'),      'url' => lv_translated_url(36, 'product_cat')),
        ));

        lv_footer_menu_column('footer_company', __('عن الشركة', 'arqamweb'), array(
            array('label' => __('قصتنا', 'arqamweb'), 'url' => lv_translated_url(52)),
        ));

        lv_footer_menu_column('footer_support', __('الدعم', 'arqamweb'), array(
            array('label' => __('تواصل معنا', 'arqamweb'),     'url' => lv_translated_url(58)),
            array('label' => __('الشحن', 'arqamweb'),          'url' => lv_translated_url(577)),
            array('label' => __('الإرجاع', 'arqamweb'),        'url' => lv_translated_url(566)),
            array('label' => __('الأسئلة الشائعة', 'arqamweb'), 'url' => home_url('/#faq')),
        ));

        lv_footer_menu_column('footer_social', __('تواصل', 'arqamweb'), array(
            array('label' => __('إنستجرام', 'arqamweb'), 'url' => 'https://www.instagram.com/levisage.pharma/?igshid=MWZjMTM2ODFkZg%3D%3D', 'target' => true),
            array('label' => __('فيسبوك', 'arqamweb'),   'url' => 'https://www.facebook.com/levisagepharma?mibextid=nW3QTL', 'target' => true),
            array('label' => __('واتساب', 'arqamweb'),   'url' => 'https://wa.me/201004025435', 'target' => true),
            array('label' => __('تيك توك', 'arqamweb'),  'url' => 'https://www.tiktok.com/@levisage.pharma?_r=1&_t=ZS-98DG3DgYNCX', 'target' => true),
        ));
        ?>
    </div>
    <div class="border-t border-white/10">
        <div class="container-luxury py-6 flex flex-wrap items-center justify-between text-xs text-white/40 gap-3">
            <div><?php
                /* translators: %s: current year. */
                printf(esc_html__('© %s لوفيزاج. جميع الحقوق محفوظة.', 'arqamweb'), esc_html(date_i18n('Y')));
            ?></div>
            <div><?php esc_html_e('الموقع من تصميم وبرمجة', 'arqamweb'); ?> <a href="https://www.arqamweb.com"
                                                   target="_blank"
                                                   rel="noopener noreferrer"
                                                   class="text-[color:var(--gold)] hover:text-white transition-colors font-bold"><?php esc_html_e('أرقام ويب', 'arqamweb'); ?></a>
            </div>
            <div class="flex gap-6">
                <a href="<?php echo esc_url(lv_translated_url(572)); ?>" class="text-white/70 hover:text-white"><?php esc_html_e('الخصوصية', 'arqamweb'); ?></a>
                <a href="<?php echo esc_url(lv_translated_url(562)); ?>" class="text-white/70 hover:text-white"><?php esc_html_e('الشروط', 'arqamweb'); ?></a>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->
<?php
astra_body_bottom();
wp_footer();
?>
</body>

</html>