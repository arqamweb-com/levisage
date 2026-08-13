<?php
/**
 * Front page (Home) — LeVisage custom design.
 * Matches the visage-luxe-atelier reference; products pulled from WooCommerce.
 *
 * @package ArqamWeb
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$img_dir = get_stylesheet_directory_uri() . '/img/';
$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
// Category names are passed in both languages so the lookup also works on the
// English site (WPML filters term lookups by the active language).
$hero_img = lv_category_image(array('علاج تساقط الشعر', 'Hair loss'), $img_dir . 'pharm2.webp');
$routine_img = lv_category_image(array('ترطيب الشعر', 'Moisturizing hair'), $img_dir . 'pharm3.webp');
$steps_img = lv_category_image(array('علاج تساقط الشعر', 'Hair loss'), $img_dir . 'pharm4.webp');
$ing_img = lv_category_image(array('Body splash', 'بادي سبلاش'), $img_dir . 'pharm5.webp');
$spot_img = lv_category_image(array('علاج شيب الشعر', 'Gray hair'), $img_dir . 'pharm1.webp');
$sparkle = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l1.9 3.8 4.2.6-3 3 .7 4.2L12 16l-3.8 2 .7-4.2-3-3 4.2-.6L12 3z"/></svg>';
?>
<div id="primary" class="lv-home" style="margin-top:0;margin-bottom:0" <?php astra_primary_class(); ?>>

    <style id="lv-home-typography">
        /* العناوين العربية محتاجة line-height أوسع من افتراضي Tailwind (=1)
           عشان أطراف الحروف (ق/س/ش) والنقط ما تتقصّش. */
        .lv-home h1,
        .lv-home h2 {
            line-height: 1.4;
        }

        .lv-home h3 {
            line-height: 1.5;
        }

        /* النصوص المتدرّجة اللون بتعمل background-clip:text — يعني الحروف
           بتاخد لونها من الجراديينت اللي وراها. النقط العلوية (زي نقط "ش")
           والحروف النازلة بتطلع بره منطقة الجراديينت فبتختفي. نوسّع منطقة
           الجراديينت رأسياً بـ padding عشان تغطّي كل أطراف الحروف. */
        .lv-home .text-gradient-brand,
        .lv-home .text-gradient-luxury {
            line-height: 1.5;
            padding-block: 0.3em;
            -webkit-box-decoration-break: clone;
            box-decoration-break: clone;
        }
    </style>

    <!-- ============ 1. HERO ============ -->
    <?php

    get_template_part('template/front-page/frontpage-slider');

    ?>

    <!-- ============ 2. BEST SELLERS (WooCommerce) ============ -->
    <?php $best = lv_get_best_sellers(4); ?>
    <?php if (!empty($best)) : ?>
        <section id="bestsellers" class="py-28 bg-[color:var(--cream)]">
            <div class="container-luxury">
                <div class="flex flex-wrap items-end justify-between gap-6">
                    <div>
                        <span class="text-xs tracking-[0.3em] text-[var(--navy)]"><?php echo esc_html(__('المنتجات الفردية', 'arqamweb')); ?></span>
                        <h2 class="mt-3 text-4xl md:text-6xl font-bold"><?php echo esc_html(__('الأكثر مبيعاً', 'arqamweb')); ?></h2>
                        <p class="mt-3 text-muted-foreground max-w-md"><?php echo esc_html(__('تركيبة ڤيجيلانت — اختيار +٢٥٠٫٠٠٠ عميل في الشرق الأوسط.', 'arqamweb')); ?></p>
                    </div>
                    <div class="flex flex-wrap items-center gap-3 text-xs">
                        <span class="inline-flex items-center gap-2 rounded-full bg-white px-4 py-2 border border-border shadow-soft">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="h-3.5 w-3.5 text-[var(--leaf)]" aria-hidden="true"><path
                                        d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path
                                        d="m9 12 2 2 4-4"/></svg>
                            <?php echo esc_html(__('مختبر عمليا', 'arqamweb')); ?>
                        </span>
                        <span class="inline-flex items-center gap-2 rounded-full bg-white px-4 py-2 border border-border shadow-soft">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="h-3.5 w-3.5 text-[color:var(--gold)]" aria-hidden="true"><path
                                        d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"/><circle
                                        cx="12" cy="8" r="6"/></svg>
                            <?php echo esc_html(__('توصية أطباء الجلدية', 'arqamweb')); ?>
                        </span>
                    </div>
                </div>
                <div class="mt-14 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-7">
                    <?php
                    $bs_badges = array(__('الأكثر مبيعاً', 'arqamweb'), __('كلاسيكي', 'arqamweb'), '');
                    foreach ($best as $i => $post) {
                        lv_bestseller_card(wc_get_product($post->ID), isset($bs_badges[$i]) ? $bs_badges[$i] : '');
                    }
                    ?>
                </div>
                <div class="mt-14 flex justify-center">
                    <a href="<?php echo esc_url($shop_url); ?>"
                       class="group inline-flex items-center gap-2 rounded-full bg-[var(--navy-deep)] text-white px-10 py-4 text-sm font-bold hover:shadow-glow transition-all">
                        <?php echo esc_html(__('عرض كل المنتجات', 'arqamweb')); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lv-arrow h-4 w-4 shrink-0" aria-hidden="true">
                            <path d="m12 5 7 7-7 7"/>
                            <path d="M5 12h14"/>
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- ============ 3. SPOTLIGHT ============ -->
    <section class="py-28 bg-[var(--navy-deep)] text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-aurora opacity-90"></div>
        <div class="absolute -top-32 -start-32 h-96 w-96 rounded-full bg-[color:var(--leaf)]/30 blur-[140px]"></div>
        <div class="absolute -bottom-32 -end-32 h-96 w-96 rounded-full bg-[color:var(--navy)]/40 blur-[140px]"></div>
        <div class="container-luxury relative">
            <div class="text-center max-w-2xl mx-auto">
                <span class="text-xs tracking-[0.3em] text-[color:var(--gold)]"><?php esc_html_e('المنتج الأيقوني', 'arqamweb'); ?></span>
                <h2 class="mt-3 text-4xl md:text-6xl text-gradient-luxury font-bold"><?php esc_html_e('سيروم علاج الشيب', 'arqamweb'); ?></h2>
                <p class="mt-4 text-white/70"><?php esc_html_e('تجربة بصرية ٣٦٠ لتركيبتنا الرائدة — قوة العلم وأناقة التصميم.', 'arqamweb'); ?></p>
            </div>
            <div class="mt-16 relative h-[520px] flex items-center justify-center">
                <div class="absolute h-[400px] w-[400px] rounded-full border border-white/10 animate-spin"
                     style="animation-duration: 30s;"></div>
                <div class="absolute h-[520px] w-[520px] rounded-full border border-white/5 animate-spin"
                     style="animation-duration: 50s; animation-direction: reverse;"></div>
                <img alt="<?php echo esc_attr__('سيروم ڤيجيلانت', 'arqamweb'); ?>"
                     class="relative h-[480px] object-contain animate-float drop-shadow-[0_30px_80px_rgba(11,113,183,0.5)]"
                     src="<?php echo esc_url('https://levisage-pharma.com/wp-content/uploads/2026/07/serum-laU65o2l.png'); ?>">
                <div class="absolute glass-dark rounded-full px-4 py-2 text-xs tracking-widest"
                     style="left: 10%; top: 20%;">
                    <span class="text-[color:var(--gold)] me-2">●</span><?php esc_html_e('تركيبة أوروبية', 'arqamweb'); ?>
                </div>
                <div class="absolute glass-dark rounded-full px-4 py-2 text-xs tracking-widest"
                     style="left: 78%; top: 15%;">
                    <span class="text-[color:var(--gold)] me-2">●</span><?php esc_html_e('مركّب حصري', 'arqamweb'); ?>
                </div>
                <div class="absolute glass-dark rounded-full px-4 py-2 text-xs tracking-widest"
                     style="left: 12%; top: 75%;">
                    <span class="text-[color:var(--gold)] me-2">●</span><?php esc_html_e('نباتي وآمن', 'arqamweb'); ?>
                </div>
                <div class="absolute glass-dark rounded-full px-4 py-2 text-xs tracking-widest"
                     style="left: 80%; top: 78%;">
                    <span class="text-[color:var(--gold)] me-2">●</span><?php esc_html_e('مختبر جلدياً', 'arqamweb'); ?>
                </div>
            </div>
            <div class="mt-12 flex justify-center">
                <a href="<?php echo esc_url(get_permalink(apply_filters('wpml_object_id', 141, 'product', true))); ?>"
                   class="group inline-flex items-center gap-2 rounded-full bg-[color:var(--gold)] text-[var(--navy-deep)] px-10 py-4 text-sm font-bold hover:shadow-glow transition-all"><?php esc_html_e('اطلبه
                    الآن', 'arqamweb'); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="lucide lucide-arrow-right lv-arrow h-4 w-4 shrink-0"
                         aria-hidden="true">
                        <path d="m12 5 7 7-7 7"></path>
                        <path d="M5 12h14"></path>
                    </svg>
                </a></div>
        </div>
    </section>

    <!-- ============ 4. ROUTINE promo ============ -->
    <section id="story" class="py-28 bg-background">
        <div class="container-luxury grid lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-6 relative">
                <div class="relative aspect-[4/5] rounded-[2rem] shadow-luxury overflow-hidden bg-gradient-to-br from-[var(--navy-deep)] via-[var(--navy)] to-[var(--leaf)]">
                    <div class="absolute inset-0 bg-aurora opacity-80"></div>
                    <img alt="<?php echo esc_attr__('روتين علاج تساقط الشعر', 'arqamweb'); ?>"
                         class="absolute inset-0 h-full w-full object-contain p-10 animate-float"
                         src="https://levisage-pharma.com/wp-content/uploads/2026/08/Anti-hair-loss-bundle-.png">
                    <div class="absolute top-6 start-6 glass-dark rounded-2xl px-4 py-2 text-white text-xs tracking-widest">
                        <?php esc_html_e('عرض متكامل', 'arqamweb'); ?>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-6"><span class="text-xs tracking-[0.3em] text-[var(--navy)]"><?php esc_html_e('روتين العناية', 'arqamweb'); ?></span>
                <h2 class="mt-5 text-4xl md:text-6xl text-foreground leading-[1.15] font-bold"><?php esc_html_e('روتين', 'arqamweb'); ?> <span
                            class="text-gradient-brand"><?php esc_html_e('تساقط الشعر', 'arqamweb'); ?></span></h2>
                <div class="hairline my-8"></div>
                <p class="text-lg text-muted-foreground leading-relaxed"><?php esc_html_e('احصل على علاج متكامل لتساقط الشعر مع أمبولات', 'arqamweb'); ?> <b
                            class="text-foreground">Vigilant</b><?php esc_html_e('، وشامبو', 'arqamweb'); ?> <b class="text-foreground">Vigilant</b>
                    <?php esc_html_e('العلاجي، وبلسم مغذٍّ هدية.', 'arqamweb'); ?></p>
                <p class="mt-4 text-muted-foreground leading-relaxed"><?php esc_html_e('هذا العرض يوفّر لك كل ما تحتاجه للعناية اليومية
                    بشعرك من الجذور حتى الأطراف — لشعر أقوى، أكثف، وأكثر صحّة.', 'arqamweb'); ?></p>
                <div class="mt-10 space-y-4">
                    <div class="flex items-start gap-4 bg-white rounded-2xl p-5 border border-border shadow-soft">
                        <div class="h-10 w-10 rounded-full bg-[var(--leaf)]/15 text-[var(--leaf)] flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="lucide lucide-check h-5 w-5" aria-hidden="true">
                                <path d="M20 6 9 17l-5-5"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="font-bold text-foreground"><?php esc_html_e('أمبولات Vigilant', 'arqamweb'); ?></div>
                            <div class="text-sm text-muted-foreground mt-1"><?php esc_html_e('تعزز نمو الشعر من الجذور.', 'arqamweb'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 bg-white rounded-2xl p-5 border border-border shadow-soft">
                        <div class="h-10 w-10 rounded-full bg-[var(--leaf)]/15 text-[var(--leaf)] flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="lucide lucide-check h-5 w-5" aria-hidden="true">
                                <path d="M20 6 9 17l-5-5"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="font-bold text-foreground"><?php esc_html_e('شامبو Vigilant العلاجي', 'arqamweb'); ?></div>
                            <div class="text-sm text-muted-foreground mt-1"><?php esc_html_e('يقلّل التساقط ويحسّن الدورة الدموية لفروة
                                الرأس.', 'arqamweb'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 bg-white rounded-2xl p-5 border border-border shadow-soft">
                        <div class="h-10 w-10 rounded-full bg-[var(--leaf)]/15 text-[var(--leaf)] flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="lucide lucide-check h-5 w-5" aria-hidden="true">
                                <path d="M20 6 9 17l-5-5"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="font-bold text-foreground"><?php esc_html_e('بلسم مغذّي — هدية', 'arqamweb'); ?></div>
                            <div class="text-sm text-muted-foreground mt-1"><?php esc_html_e('يرطّب ويغذّي الشعر ليتركه ناعمًا ولامعًا.', 'arqamweb'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo esc_url(get_permalink(apply_filters('wpml_object_id', 3177, 'product', true))); ?>"
                   class="group mt-8 inline-flex items-center gap-2 rounded-full bg-[var(--navy-deep)] text-white px-7 py-3.5 text-sm font-bold hover:shadow-glow transition-shadow"><?php esc_html_e('اطلب
                    الروتين الآن', 'arqamweb'); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="lucide lucide-arrow-right lv-arrow h-4 w-4 shrink-0" aria-hidden="true">
                        <path d="m12 5 7 7-7 7"></path>
                        <path d="M5 12h14"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- ============ 5. BUNDLES (WooCommerce) ============ -->
    <?php $bundles = lv_get_bundles(6); ?>
    <?php if (!empty($bundles)) : ?>
        <section class="py-28 bg-[var(--navy-deep)] text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-aurora opacity-60"></div>
            <div class="absolute -top-32 -start-32 h-96 w-96 rounded-full bg-[color:var(--leaf)]/20 blur-[140px]"></div>
            <div class="absolute -bottom-32 -end-32 h-96 w-96 rounded-full bg-[color:var(--navy)]/30 blur-[140px]"></div>
            <div class="container-luxury relative">
                <div class="text-center max-w-2xl mx-auto">
                    <span class="text-xs tracking-[0.3em] text-[color:var(--gold)]"><?php echo esc_html(__('عروض حصرية', 'arqamweb')); ?></span>
                    <h2 class="mt-4 text-4xl md:text-6xl text-gradient-luxury font-bold"><?php echo esc_html(__('البندلات الموفّرة', 'arqamweb')); ?></h2>
                    <p class="mt-4 text-white/70"><?php echo esc_html(__('وفر حتى 30% عند شراء المجموعة كاملة.', 'arqamweb')); ?></p>
                </div>
                <div class="mt-16 grid grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
                    <?php foreach ($bundles as $post) {
                        lv_bundle_card_lux(wc_get_product($post->ID));
                    } ?>
                </div>
                <?php
                // رابط أرشيف كاتيجوري "البندلات" — لو الكاتيجوري مش موجود
                // (أو الكروت جت من fallback العروض) بنرجع لصفحة المتجر.
                $bundles_term_id = lv_term_id_by_names(array('البندلات', 'Bundles'));
                $bundles_link    = $bundles_term_id ? get_term_link($bundles_term_id, 'product_cat') : '';
                if (!$bundles_link || is_wp_error($bundles_link)) {
                    $bundles_link = $shop_url;
                }
                ?>
                <div class="mt-14 flex justify-center">
                    <a href="<?php echo esc_url($bundles_link); ?>"
                       class="group inline-flex items-center gap-2 rounded-full bg-white text-[var(--navy-deep)] px-10 py-4 text-sm font-bold hover:shadow-glow transition-all">
                        <?php echo esc_html(__('All Bundles', 'arqamweb')); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lv-arrow h-4 w-4 shrink-0" aria-hidden="true">
                            <path d="m12 5 7 7-7 7"/>
                            <path d="M5 12h14"/>
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- ============ 6. FEATURES ============ -->
    <section class="py-28 bg-background">
        <div class="container-luxury">
            <div class="max-w-2xl"><span class="text-xs tracking-[0.3em] text-[var(--navy)]"><?php esc_html_e('لماذا لوفيزاج', 'arqamweb'); ?></span>
                <h2 class="mt-3 text-4xl md:text-6xl font-bold leading-tight"><?php esc_html_e('مفهوم جديد', 'arqamweb'); ?>
                    <span
                            class="text-gradient-brand"><?php esc_html_e('فى العناية المتقدمة', 'arqamweb'); ?></span>
                </h2></div>
            <div class="mt-14 grid grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
                <div class="group p-5 sm:p-8 rounded-3xl bg-white border border-border hover:border-[var(--navy)]/30 hover:shadow-luxury transition-all">
                    <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-[var(--navy)] to-[var(--navy-deep)] text-white flex items-center justify-center shadow-soft group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-flask-conical h-6 w-6" aria-hidden="true">
                            <path d="M14 2v6a2 2 0 0 0 .245.96l5.51 10.08A2 2 0 0 1 18 22H6a2 2 0 0 1-1.755-2.96l5.51-10.08A2 2 0 0 0 10 8V2"></path>
                            <path d="M6.453 15h11.094"></path>
                            <path d="M8.5 2h7"></path>
                        </svg>
                    </div>
                    <h3 class="mt-6 font-display text-2xl font-bold"><?php esc_html_e('تركيبات موثوقة', 'arqamweb'); ?></h3>
                    <p class="mt-2 text-muted-foreground leading-relaxed"><?php esc_html_e('مطوّرة بالتعاون مع أطباء الجلدية والكيميائيين
                        الصيدليين.', 'arqamweb'); ?></p></div>
                <div class="group p-5 sm:p-8 rounded-3xl bg-white border border-border hover:border-[var(--navy)]/30 hover:shadow-luxury transition-all">
                    <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-[var(--navy)] to-[var(--navy-deep)] text-white flex items-center justify-center shadow-soft group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-leaf h-6 w-6" aria-hidden="true">
                            <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"></path>
                            <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"></path>
                        </svg>
                    </div>
                    <h3 class="mt-6 font-display text-2xl font-bold"><?php esc_html_e('طبيعية بقوة', 'arqamweb'); ?></h3>
                    <p class="mt-2 text-muted-foreground leading-relaxed"><?php esc_html_e('٪٩٤ من مكونات طبيعية، خالية من القسوة على الشعر.', 'arqamweb'); ?></p>
                </div>
                <div class="group p-5 sm:p-8 rounded-3xl bg-white border border-border hover:border-[var(--navy)]/30 hover:shadow-luxury transition-all">
                    <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-[var(--navy)] to-[var(--navy-deep)] text-white flex items-center justify-center shadow-soft group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-shield-check h-6 w-6" aria-hidden="true">
                            <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                            <path d="m9 12 2 2 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="mt-6 font-display text-2xl font-bold"><?php esc_html_e('مختبرة جلدياً', 'arqamweb'); ?></h3>
                    <p class="mt-2 text-muted-foreground leading-relaxed"><?php esc_html_e('آمنة على فروة الرأس الحساسة والشعر
                        المعالَج.', 'arqamweb'); ?></p></div>
                <div class="group p-5 sm:p-8 rounded-3xl bg-white border border-border hover:border-[var(--navy)]/30 hover:shadow-luxury transition-all">
                    <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-[var(--navy)] to-[var(--navy-deep)] text-white flex items-center justify-center shadow-soft group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-sparkles h-6 w-6" aria-hidden="true">
                            <path d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z"></path>
                            <path d="M20 2v4"></path>
                            <path d="M22 4h-4"></path>
                            <circle cx="4" cy="20" r="2"></circle>
                        </svg>
                    </div>
                    <h3 class="mt-6 font-display text-2xl font-bold"><?php esc_html_e('نتائج ظاهرة وملموسة', 'arqamweb'); ?></h3>
                    <p class="mt-2 text-muted-foreground leading-relaxed"><?php esc_html_e('نتائج تزداد مع روتينك اليومى.', 'arqamweb'); ?></p></div>
                <div class="group p-5 sm:p-8 rounded-3xl bg-white border border-border hover:border-[var(--navy)]/30 hover:shadow-luxury transition-all">
                    <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-[var(--navy)] to-[var(--navy-deep)] text-white flex items-center justify-center shadow-soft group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-award h-6 w-6" aria-hidden="true">
                            <path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"></path>
                            <circle cx="12" cy="8" r="6"></circle>
                        </svg>
                    </div>
                    <h3 class="mt-6 font-display text-2xl font-bold"><?php esc_html_e('جودة بريميوم', 'arqamweb'); ?></h3>
                    <p class="mt-2 text-muted-foreground leading-relaxed"><?php esc_html_e('صنع وفق أعلى معايير الجودة الأوروبية.', 'arqamweb'); ?></p></div>
                <div class="group p-5 sm:p-8 rounded-3xl bg-white border border-border hover:border-[var(--navy)]/30 hover:shadow-luxury transition-all">
                    <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-[var(--navy)] to-[var(--navy-deep)] text-white flex items-center justify-center shadow-soft group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-truck h-6 w-6" aria-hidden="true">
                            <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"></path>
                            <path d="M15 18H9"></path>
                            <path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"></path>
                            <circle cx="17" cy="18" r="2"></circle>
                            <circle cx="7" cy="18" r="2"></circle>
                        </svg>
                    </div>
                    <h3 class="mt-6 font-display text-2xl font-bold"><?php esc_html_e('توصيل لكل المحافظات', 'arqamweb'); ?></h3>
                    <p class="mt-2 text-muted-foreground leading-relaxed"><?php esc_html_e('التوصيل متاح لجميع المحافظات ودفع عند الاستلام.', 'arqamweb'); ?></p></div>
            </div>
        </div>
    </section>

    <!-- ============ 7. STEPS (6-month routine) ============ -->
    <section class="py-28 bg-[color:var(--cream)] relative overflow-hidden">
        <div class="container-luxury">
            <div class="text-center max-w-2xl mx-auto"><span class="text-xs tracking-[0.3em] text-[var(--navy)]"><?php esc_html_e('روتينك المثالي', 'arqamweb'); ?></span>
                <h2 class="mt-3 text-4xl md:text-6xl font-bold"><?php esc_html_e('طقوسٌ مصمَّمة لأهدافك', 'arqamweb'); ?></h2>
                <p class="mt-4 text-muted-foreground"><?php esc_html_e('بروتوكول متكامل لاستعادة كثافة وقوّة شعرك خلال ستة أشهر.', 'arqamweb'); ?></p>
            </div>
            <div class="mt-14 grid lg:grid-cols-12 gap-10 items-center">
                <div class="lg:col-span-7 relative">
                    <div class="relative aspect-[4/3] rounded-[2rem] overflow-hidden bg-gradient-to-br from-white to-[color:var(--cream)] shadow-luxury">
                        <img alt="<?php echo esc_attr__('روتين ٦ شهور', 'arqamweb'); ?>" class="h-full w-full object-contain p-8 fade-up"
                             src="https://levisage-pharma.com/wp-content/uploads/2026/07/routine-6m-DPuX1TUG.png">
                        <div class="absolute top-6 start-6 glass rounded-full px-4 py-2 text-xs font-bold tracking-widest text-[var(--navy-deep)]">
                            <?php esc_html_e('روتين ٦ شهور', 'arqamweb'); ?>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-5"><h3 class="font-display text-3xl md:text-4xl font-bold"><?php esc_html_e('روتين ٦ شهور', 'arqamweb'); ?></h3>
                    <p class="mt-4 text-muted-foreground leading-relaxed text-lg"><?php esc_html_e('بروتوكول متكامل للنتائج العميقة والمتراكمة - لإعادة بناء كثافة الشعر وتقوية البصيلات على مدى ٦ أشهر كاملة..', 'arqamweb'); ?></p>
                    <div class="mt-8 space-y-4">
                        <div class="flex items-start gap-4 bg-white rounded-2xl p-5 border border-border">
                            <div class="h-10 w-10 rounded-full bg-[var(--navy-deep)] text-white font-bold flex items-center justify-center shrink-0">
                                <?php esc_html_e('٠١', 'arqamweb'); ?>
                            </div>
                            <div>
                                <div class="font-bold text-lg"><?php esc_html_e('اغسل', 'arqamweb'); ?></div>
                                <div class="text-sm text-muted-foreground"><?php esc_html_e('بشامبو ڤيجيلانت برفق لتحضير فروة الرأس.', 'arqamweb'); ?></div>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 bg-white rounded-2xl p-5 border border-border">
                            <div class="h-10 w-10 rounded-full bg-[var(--navy-deep)] text-white font-bold flex items-center justify-center shrink-0">
                                <?php esc_html_e('٠٢', 'arqamweb'); ?>
                            </div>
                            <div>
                                <div class="font-bold text-lg"><?php esc_html_e('عالج', 'arqamweb'); ?></div>
                                <div class="text-sm text-muted-foreground"><?php esc_html_e('ضع الأمبول على الجذور مباشرة.', 'arqamweb'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 bg-white rounded-2xl p-5 border border-border">
                            <div class="h-10 w-10 rounded-full bg-[var(--navy-deep)] text-white font-bold flex items-center justify-center shrink-0">
                                <?php esc_html_e('٠٣', 'arqamweb'); ?>
                            </div>
                            <div>
                                <div class="font-bold text-lg"><?php esc_html_e('غذى', 'arqamweb'); ?></div>
                                <div class="text-sm text-muted-foreground"><?php esc_html_e('وَزِّع البلسم على الأطراف لترطيبها وحمايتها.', 'arqamweb'); ?></div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo esc_url(get_permalink(apply_filters('wpml_object_id', 2071, 'product', true))); ?>"
                       class="group mt-8 inline-flex items-center gap-2 rounded-full bg-[var(--navy-deep)] text-white px-7 py-3.5 text-sm font-bold hover:shadow-glow transition-shadow"><?php esc_html_e('اطلب
                        الروتين كاملاً', 'arqamweb'); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-arrow-right lv-arrow h-4 w-4 shrink-0" aria-hidden="true">
                            <path d="m12 5 7 7-7 7"></path>
                            <path d="M5 12h14"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ 8. TESTIMONIALS ============ -->
    <section class="py-28 bg-background">
        <div class="container-luxury">
            <div class="flex flex-wrap items-end justify-between gap-6">
                <div class="max-w-xl"><span class="text-xs tracking-[0.3em] text-[var(--navy)]"><?php esc_html_e('محبوبة من الآلاف', 'arqamweb'); ?></span>
                    <h2 class="mt-3 text-4xl md:text-6xl font-bold"><?php esc_html_e('تقييمات تتحدّث عنّا', 'arqamweb'); ?></h2></div>
                <div class="flex items-center gap-8 text-center">
                    <div>
                        <div class="font-display text-4xl text-[var(--navy-deep)] font-bold"><?php esc_html_e('٤٫٩', 'arqamweb'); ?></div>
                        <div class="text-xs text-muted-foreground tracking-widest"><?php esc_html_e('متوسط التقييم', 'arqamweb'); ?></div>
                    </div>
                    <div class="h-12 w-px bg-border"></div>
                    <div>
                        <div class="font-display text-4xl text-[var(--navy-deep)] font-bold"><?php esc_html_e('+١٢٫٤ك', 'arqamweb'); ?></div>
                        <div class="text-xs text-muted-foreground tracking-widest"><?php esc_html_e('تقييم موثّق', 'arqamweb'); ?></div>
                    </div>
                </div>
            </div>
            <div class="mt-12 grid grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
                <div class="relative p-5 sm:p-8 bg-white rounded-3xl border border-border shadow-soft hover:shadow-luxury transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="lucide lucide-quote h-8 w-8 text-[var(--navy)]/20 scale-x-[-1]" aria-hidden="true">
                        <path d="M16 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"></path>
                        <path d="M5 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"></path>
                    </svg>
                    <div class="flex gap-0.5 mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-star h-4 w-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                             aria-hidden="true">
                            <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-star h-4 w-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                             aria-hidden="true">
                            <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-star h-4 w-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                             aria-hidden="true">
                            <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-star h-4 w-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                             aria-hidden="true">
                            <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-star h-4 w-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                             aria-hidden="true">
                            <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                        </svg>
                    </div>
                    <p class="mt-4 text-lg text-foreground leading-relaxed">
                        <?php esc_html_e('"شعرى اتحسن جدا وبدأت الاحظ بيبى هير بعد 6 اسابيع من استخدام الامبولات"', 'arqamweb'); ?>
                    </p>
                    <div class="mt-6 flex items-center gap-3">
                        <div class="h-10 w-10 rounded-full bg-gradient-to-br from-[var(--navy)] to-[var(--leaf)] text-white flex items-center justify-center font-bold">
                            <?php esc_html_e('م', 'arqamweb'); ?>
                        </div>
                        <div>
                            <div class="font-bold"><?php esc_html_e('م. ع.', 'arqamweb'); ?></div>
                            <div class="text-xs text-muted-foreground"><?php esc_html_e('القاهرة', 'arqamweb'); ?></div>
                        </div>
                    </div>
                </div>
                <div class="relative p-5 sm:p-8 bg-white rounded-3xl border border-border shadow-soft hover:shadow-luxury transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="lucide lucide-quote h-8 w-8 text-[var(--navy)]/20 scale-x-[-1]" aria-hidden="true">
                        <path d="M16 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"></path>
                        <path d="M5 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"></path>
                    </svg>
                    <div class="flex gap-0.5 mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-star h-4 w-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                             aria-hidden="true">
                            <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-star h-4 w-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                             aria-hidden="true">
                            <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-star h-4 w-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                             aria-hidden="true">
                            <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-star h-4 w-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                             aria-hidden="true">
                            <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-star h-4 w-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                             aria-hidden="true">
                            <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                        </svg>
                    </div>
                    <p class="mt-4 text-lg text-foreground leading-relaxed">
                        <?php esc_html_e('"منتج الشيب ممتاز والنتايج ظهرت بعد 4 شهور بس."', 'arqamweb'); ?>
                    </p>
                    <div class="mt-6 flex items-center gap-3">
                        <div class="h-10 w-10 rounded-full bg-gradient-to-br from-[var(--navy)] to-[var(--leaf)] text-white flex items-center justify-center font-bold">
                            <?php esc_html_e('س', 'arqamweb'); ?>
                        </div>
                        <div>
                            <div class="font-bold"><?php esc_html_e('س. ح.', 'arqamweb'); ?></div>
                            <div class="text-xs text-muted-foreground"><?php esc_html_e('الإسكندرية', 'arqamweb'); ?></div>
                        </div>
                    </div>
                </div>
                <div class="relative p-5 sm:p-8 bg-white rounded-3xl border border-border shadow-soft hover:shadow-luxury transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="lucide lucide-quote h-8 w-8 text-[var(--navy)]/20 scale-x-[-1]" aria-hidden="true">
                        <path d="M16 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"></path>
                        <path d="M5 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"></path>
                    </svg>
                    <div class="flex gap-0.5 mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-star h-4 w-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                             aria-hidden="true">
                            <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-star h-4 w-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                             aria-hidden="true">
                            <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-star h-4 w-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                             aria-hidden="true">
                            <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-star h-4 w-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                             aria-hidden="true">
                            <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-star h-4 w-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                             aria-hidden="true">
                            <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                        </svg>
                    </div>
                    <p class="mt-4 text-lg text-foreground leading-relaxed">
                        <?php esc_html_e('"البلسم فرق جدا فى ترطيب شعرى وبقيت استخدمه ليف ان بعد الشاور."', 'arqamweb'); ?></p>
                    <div class="mt-6 flex items-center gap-3">
                        <div class="h-10 w-10 rounded-full bg-gradient-to-br from-[var(--navy)] to-[var(--leaf)] text-white flex items-center justify-center font-bold">
                            <?php esc_html_e('ل', 'arqamweb'); ?>
                        </div>
                        <div>
                            <div class="font-bold"><?php esc_html_e('ل. م.', 'arqamweb'); ?></div>
                            <div class="text-xs text-muted-foreground"><?php esc_html_e('دبي', 'arqamweb'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ 9. INGREDIENTS ============ -->
    <section class="relative overflow-hidden">
        <div class="grid lg:grid-cols-2 min-h-[600px]">
            <div class="relative bg-gradient-to-br from-[color:var(--cream)] via-white to-[color:var(--cream)] flex items-center justify-center overflow-hidden">
                <div class="absolute inset-0 bg-aurora opacity-10"></div>
                <div class="absolute h-[480px] w-[480px] rounded-full border border-[var(--navy)]/10 animate-spin"
                     style="animation-duration: 40s;"></div>
                <div class="absolute h-[380px] w-[380px] rounded-full border border-[var(--navy)]/15 animate-spin"
                     style="animation-duration: 30s; animation-direction: reverse;"></div>
                <img alt="<?php echo esc_attr__('مكونات White Whisper', 'arqamweb'); ?>" class="relative h-[420px] object-contain animate-float drop-shadow-2xl"
                     src="https://levisage-pharma.com/wp-content/uploads/2026/08/Last-slider-.png"></div>
            <div class="bg-[var(--navy-deep)] text-white p-10 md:p-20 flex flex-col justify-center"><span
                        class="text-xs tracking-[0.3em] text-[color:var(--gold)]"><?php esc_html_e('العلم في كل قطرة', 'arqamweb'); ?></span>
                <h2 class="mt-3 text-4xl md:text-6xl text-gradient-luxury font-bold"><?php esc_html_e('مكونات نشطة تُحدث الفرق', 'arqamweb'); ?></h2>
                <p class="mt-5 text-white/70 max-w-md leading-relaxed">
                    <?php esc_html_e('بتركيزات مدروسة وموصى بها لأفضل أداء وأسرع نتيجة.', 'arqamweb'); ?></p>
                <div class="mt-10 space-y-5">
                    <div class="flex items-center gap-5 border-b border-white/10 pb-4">
                        <div class="flex-1">
                            <div class="font-bold"><?php esc_html_e('Darkenyl', 'arqamweb'); ?></div>
                            <div class="text-sm text-white/60"><?php esc_html_e('علاج وتأخير الشيب واستعادة لون الشعر الطبيعي بدون صبغة.', 'arqamweb'); ?></div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-arrow-right lv-arrow h-4 w-4 shrink-0 text-white/40" aria-hidden="true">
                            <path d="m12 5 7 7-7 7"></path>
                            <path d="M5 12h14"></path>
                        </svg>
                    </div>
                    <div class="flex items-center gap-5 border-b border-white/10 pb-4">
                        <div class="flex-1">
                            <div class="font-bold"><?php esc_html_e('procapil', 'arqamweb'); ?></div>
                            <div class="text-sm text-white/60"><?php esc_html_e('لعلاج تساقط الشعر وتقوية البصيلات.', 'arqamweb'); ?></div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-arrow-right lv-arrow h-4 w-4 shrink-0 text-white/40" aria-hidden="true">
                            <path d="m12 5 7 7-7 7"></path>
                            <path d="M5 12h14"></path>
                        </svg>
                    </div>
                    <div class="flex items-center gap-5 border-b border-white/10 pb-4">
                        <div class="flex-1">
                            <div class="font-bold"><?php esc_html_e('anagain', 'arqamweb'); ?></div>
                            <div class="text-sm text-white/60"><?php esc_html_e('لعلاج تساقط الشعر وفراغات الرأس.', 'arqamweb'); ?></div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-arrow-right lv-arrow h-4 w-4 shrink-0 text-white/40" aria-hidden="true">
                            <path d="m12 5 7 7-7 7"></path>
                            <path d="M5 12h14"></path>
                        </svg>
                    </div>
                    <div class="flex items-center gap-5 border-b border-white/10 pb-4">
                        <div class="flex-1">
                            <div class="font-bold"><?php esc_html_e('مزيج الببتيدات', 'arqamweb'); ?></div>
                            <div class="text-sm text-white/60"><?php esc_html_e('ينشّط بصيلات الشعر النائمة.', 'arqamweb'); ?></div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-arrow-right lv-arrow h-4 w-4 shrink-0 text-white/40" aria-hidden="true">
                            <path d="m12 5 7 7-7 7"></path>
                            <path d="M5 12h14"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ 10. FAQ ============ -->
    <section id="faq" class="py-28 bg-background">
        <div class="container-luxury grid lg:grid-cols-12 gap-12">
            <div class="lg:col-span-4">
                <span class="text-xs tracking-[0.3em] text-[var(--navy)]"><?php echo esc_html(__('الدعم', 'arqamweb')); ?></span>
                <h2 class="mt-3 text-4xl md:text-5xl font-bold"><?php echo esc_html(__('الأسئلة الشائعة', 'arqamweb')); ?></h2>
                <p class="mt-4 text-muted-foreground leading-relaxed"><?php echo esc_html(__('تحتاج مساعدة أكثر؟ استشارى لوفيزاج على بعد ضغطة زر.', 'arqamweb')); ?></p>
                <a href="https://wa.me/+201004025435" target="_blank" rel="noopener"
                   class="group mt-6 inline-flex items-center gap-2 rounded-full bg-[var(--navy-deep)] text-white px-5 py-3 text-sm font-bold">
                    <?php echo esc_html(__('تحدّث مع استشاري', 'arqamweb')); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lv-arrow h-4 w-4 shrink-0"
                         aria-hidden="true">
                        <path d="m12 5 7 7-7 7"/>
                        <path d="M5 12h14"/>
                    </svg>
                </a>
            </div>
            <div class="lg:col-span-8 space-y-3">
                <?php
                $faqs = array(
                        array(
                                __('متى تظهر النتائج؟', 'arqamweb'),
                                __('معظم العملاء يلاحظون فرقاً واضحاً خلال 8 أسابيع، والنتائج الكاملة تظهر عادةً بعد 16 أسبوعاً من الاستخدام المنتظم.', 'arqamweb'),
                        ),
                        array(
                                __('هل المنتجات آمنة على الشعر المصبوغ؟', 'arqamweb'),
                                __('نعم — جميع تركيباتنا مختبرة جلدياً وخالية من السلفات القاسية والبارابين، آمنة تماماً على الشعر المصبوغ والمعالَج كيميائياً.', 'arqamweb'),
                        ),
                        array(
                                __('هل يمكنني الجمع بين أكثر من علاج؟', 'arqamweb'),
                                __('بالتأكيد. روتيناتنا مصممة لتعمل معاً بتناغم. تواصل مع استشاري لوفيزاج لتحصل على الخطة المخصصة لك.', 'arqamweb'),
                        ),
                        array(
                                __('هل تشحنون لجميع المحافظات؟', 'arqamweb'),
                                __('نعم، نشحن لكل محافظات مصر،كما نشحن لدول الخليج وشمال إفريقيا.', 'arqamweb'),
                        ),
                );
                foreach ($faqs as $idx => $fq) : ?>
                    <details
                            class="group w-full rounded-2xl border border-border bg-white/60 hover:bg-white transition-all overflow-hidden" <?php echo $idx === 0 ? 'open' : ''; ?>>
                        <summary
                                class="flex items-center justify-between px-6 py-5 cursor-pointer list-none [&::-webkit-details-marker]:hidden">
                            <span class="font-display text-xl font-bold"><?php echo esc_html($fq[0]); ?></span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="h-5 w-5 shrink-0 transition-transform duration-300 group-open:rotate-45"
                                 aria-hidden="true">
                                <path d="M5 12h14"/>
                                <path d="M12 5v14"/>
                            </svg>
                        </summary>
                        <p class="px-6 pb-6 text-muted-foreground leading-relaxed"><?php echo esc_html($fq[1]); ?></p>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ============ 11. ARTICLES (latest blog posts) ============ -->
    <?php
    $posts_q = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 3, 'post_status' => 'publish', 'no_found_rows' => true));
    if ($posts_q->have_posts()) :
        $blog_url = get_option('page_for_posts') ? get_permalink(get_option('page_for_posts')) : home_url('/');
        ?>
        <section class="py-28 bg-background">
            <div class="container-luxury">
                <div class="flex items-end justify-between mb-12">
                    <div>
                        <span class="text-xs tracking-[0.3em] text-[var(--navy)]"><?php echo esc_html(__('المجلة', 'arqamweb')); ?></span>
                        <h2 class="mt-3 text-4xl md:text-6xl font-bold"><?php echo esc_html(__('ثقافة العناية', 'arqamweb')); ?></h2>
                    </div>
                    <a href="<?php echo esc_url($blog_url); ?>"
                       class="group hidden md:inline-flex items-center gap-2 text-sm font-bold">
                        <?php echo esc_html(__('جميع المقالات', 'arqamweb')); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lv-arrow h-4 w-4 shrink-0"
                             aria-hidden="true">
                            <path d="m12 5 7 7-7 7"/>
                            <path d="M5 12h14"/>
                        </svg>
                    </a>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3 sm:gap-7">
                    <?php while ($posts_q->have_posts()) : $posts_q->the_post();
                        $cats = get_the_category();
                        $thumb = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : $spot_img;
                        $wc = count(preg_split('/\s+/u', trim(wp_strip_all_tags(strip_shortcodes(get_the_content()))), -1, PREG_SPLIT_NO_EMPTY));
                        $mins = max(1, (int)ceil($wc / 180));
                        ?>
                        <a href="<?php the_permalink(); ?>" class="group cursor-pointer block">
                            <div class="relative aspect-[4/5] overflow-hidden rounded-3xl bg-gradient-to-br from-[color:var(--cream)] to-white border border-border">
                                <img alt="<?php the_title_attribute(); ?>" loading="lazy"
                                     class="block h-full w-full object-cover transition-transform duration-700 group-hover:scale-110"
                                     src="<?php echo esc_url($thumb); ?>">
                                <?php if (!empty($cats) && $cats[0]->slug !== 'uncategorized') : ?>
                                    <span class="absolute top-4 start-4 rounded-full glass px-3 py-1 text-xs tracking-widest"><?php echo esc_html($cats[0]->name); ?></span>
                                <?php endif; ?>
                            </div>
                            <h3 class="mt-5 font-display text-2xl font-bold group-hover:text-[var(--navy)] transition-colors"><?php the_title(); ?></h3>
                            <div class="mt-2 text-sm text-muted-foreground"><?php printf(esc_html(__('%s دقائق قراءة', 'arqamweb')), esc_html(number_format_i18n($mins))); ?></div>
                        </a>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- ============ 12. CONSULTATION ============ -->
    <section id="contact" class="py-28 bg-[var(--navy-deep)] text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-aurora opacity-70"></div>
        <div class="container-luxury relative grid lg:grid-cols-2 gap-12 items-center">
            <div><span class="text-xs tracking-[0.3em] text-[color:var(--gold)]"><?php esc_html_e('استشارة شخصية', 'arqamweb'); ?></span>
                <h2 class="mt-3 text-4xl md:text-6xl text-gradient-luxury font-bold leading-tight"><?php esc_html_e('احجز استشارة مع خبير
                    العناية', 'arqamweb'); ?></h2>
                <p class="mt-5 text-white/70 max-w-md leading-relaxed"><?php esc_html_e('احجز استشارة مجانية مع نخبة من استشاريي لوفيزاج،
                    واكتشف الروتين المثالي المصمم خصيصاً لشعرك وبشرتك.', 'arqamweb'); ?></p>
                <div class="mt-8 flex flex-wrap gap-3"><a href="#"
                                                          class="inline-flex items-center gap-2 rounded-full bg-[color:var(--leaf)] px-6 py-3.5 text-sm font-bold text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-message-circle h-4 w-4" aria-hidden="true">
                            <path d="M2.992 16.342a2 2 0 0 1 .094 1.167l-1.065 3.29a1 1 0 0 0 1.236 1.168l3.413-.998a2 2 0 0 1 1.099.092 10 10 0 1 0-4.777-4.719"></path>
                        </svg>
                        <?php esc_html_e('تواصل عبر واتساب', 'arqamweb'); ?></a>
                    <a href="#"
                       class="group inline-flex items-center gap-2 rounded-full border border-white/30 px-6 py-3.5 text-sm text-white"><?php esc_html_e('احجز
                        الاستشارة', 'arqamweb'); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-arrow-right lv-arrow h-4 w-4 shrink-0" aria-hidden="true">
                            <path d="m12 5 7 7-7 7"></path>
                            <path d="M5 12h14"></path>
                        </svg>
                    </a></div>
                <div class="mt-12 flex gap-4 text-white/60">
                    <a href="https://www.instagram.com/levisage.pharma/?igshid=MWZjMTM2ODFkZg%3D%3D" target="_blank"
                       class="h-10 w-10 rounded-full border border-white/20 flex items-center justify-center text-white/60 hover:bg-white/10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-instagram h-4 w-4" aria-hidden="true">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                        </svg>
                    </a>
                    <a href="https://www.facebook.com/levisagepharma?mibextid=nW3QTL" target="_blank"
                       class="h-10 w-10 rounded-full border border-white/20 flex items-center justify-center text-white/60 hover:bg-white/10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-facebook h-4 w-4" aria-hidden="true">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                        </svg>
                    </a>
                    <a href="https://wa.me/01004025435" target="_blank"
                       class="h-10 w-10 rounded-full border border-white/20 flex items-center justify-center text-white/60 hover:bg-white/10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-message-circle h-4 w-4" aria-hidden="true">
                            <path d="M2.992 16.342a2 2 0 0 1 .094 1.167l-1.065 3.29a1 1 0 0 0 1.236 1.168l3.413-.998a2 2 0 0 1 1.099.092 10 10 0 1 0-4.777-4.719"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="lv-cf7-glass glass-dark rounded-3xl p-8 md:p-10">
                <?php echo do_shortcode('[contact-form-7 id="ce08332" title="Contact us"]'); ?>
            </div>
        </div>
    </section>

</div><!-- #primary -->
<?php get_footer(); ?>
