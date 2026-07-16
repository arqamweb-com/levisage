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
$hero_img = lv_category_image('علاج تساقط الشعر', $img_dir . 'pharm2.webp');
$routine_img = lv_category_image('ترطيب الشعر', $img_dir . 'pharm3.webp');
$steps_img = lv_category_image('علاج تساقط الشعر', $img_dir . 'pharm4.webp');
$ing_img = lv_category_image('Body splash', $img_dir . 'pharm5.webp');
$spot_img = lv_category_image('علاج شيب الشعر', $img_dir . 'pharm1.webp');
$sparkle = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l1.9 3.8 4.2.6-3 3 .7 4.2L12 16l-3.8 2 .7-4.2-3-3 4.2-.6L12 3z"/></svg>';
?>
<div id="primary" class="lv-home" style="margin-top:0;margin-bottom:0" <?php astra_primary_class(); ?>>

    <!-- ============ 1. HERO ============ -->
    <section class="lv-hhero">
        <div class="lv-hhero__decor" aria-hidden="true">
            <span class="lv-hhero__glow lv-hhero__glow--leaf"></span>
            <span class="lv-hhero__glow lv-hhero__glow--navy"></span>
            <span class="lv-hhero__glow lv-hhero__glow--gold"></span>
            <svg class="lv-hhero__lines" viewBox="0 0 1440 800" preserveAspectRatio="none">
                <path d="M-50 100 C 300 220, 600 60, 900 200 S 1500 320, 1500 320" stroke="#fff" stroke-width="0.6"
                      fill="none"/>
                <path d="M-50 240 C 280 360, 620 200, 920 360 S 1500 460, 1500 460" stroke="#fff" stroke-width="0.5"
                      fill="none"/>
                <path d="M-50 420 C 320 540, 660 380, 980 540 S 1500 640, 1500 640" stroke="#fff" stroke-width="0.5"
                      fill="none"/>
                <path d="M-50 600 C 340 720, 700 560, 1020 720 S 1500 820, 1500 820" stroke="#fff" stroke-width="0.4"
                      fill="none"/>
            </svg>
            <svg class="lv-hhero__ring" viewBox="0 0 200 200" fill="none">
                <circle cx="100" cy="100" r="80" stroke="currentColor" stroke-width="0.8"/>
                <circle cx="100" cy="100" r="50" stroke="currentColor" stroke-width="0.8"/>
                <circle cx="100" cy="20" r="4" fill="currentColor"/>
                <circle cx="180" cy="100" r="4" fill="currentColor"/>
                <circle cx="100" cy="180" r="4" fill="currentColor"/>
                <circle cx="20" cy="100" r="4" fill="currentColor"/>
            </svg>
            <div class="lv-hhero__particles">
                <?php
                $lv_dots = array(
                        array(6, 8, 2, 0, 6), array(53, 37, 3, 0.4, 7), array(12, 74, 4, 0.8, 8), array(59, 11, 5, 1.2, 9),
                        array(18, 48, 2, 1.6, 10), array(65, 85, 3, 2, 6), array(24, 22, 4, 2.4, 7), array(71, 59, 3, 0.2, 8),
                        array(30, 70, 4, 0.6, 9), array(83, 17, 3, 1, 10), array(42, 44, 2, 1.4, 8), array(89, 81, 3, 1.8, 9),
                        array(48, 92, 4, 0.3, 7), array(7, 29, 3, 0.9, 8),
                );
                foreach ($lv_dots as $d) {
                    printf(
                            '<span style="top:%d%%;left:%d%%;width:%dpx;height:%dpx;animation-delay:%ss;animation-duration:%ss"></span>',
                            $d[0], $d[1], $d[2], $d[2], $d[3], $d[4]
                    );
                }
                ?>
            </div>
            <svg class="lv-hhero__wave" viewBox="0 0 1440 320" preserveAspectRatio="none">
                <defs>
                    <linearGradient id="lvWaveG" x1="0" x2="1">
                        <stop offset="0%" stop-color="#0b71b7" stop-opacity="0"/>
                        <stop offset="50%" stop-color="#2b9822" stop-opacity="0.6"/>
                        <stop offset="100%" stop-color="#0b71b7" stop-opacity="0"/>
                    </linearGradient>
                </defs>
                <path fill="url(#lvWaveG)"
                      d="M0,160 C320,240 720,80 1100,170 C1280,210 1380,180 1440,160 L1440,320 L0,320 Z"/>
            </svg>
        </div>

        <span class="lv-hhero__side lv-hhero__side--r">EST · 2018 — PHARMA · GRADE</span>
        <span class="lv-hhero__side lv-hhero__side--l">LEVISAGE · LUXURY · HAIR · CARE</span>

        <div class="lv-wrap">
            <div class="lv-hhero__grid">
                <div class="lv-hhero__content">
                    <span class="lv-badge"><?php echo $sparkle; // phpcs:ignore ?><?php echo esc_html(lv_t('عناية متطوّرة بمعايير احترافية', 'Advanced care, professional standards')); ?></span>
                    <h1 class="lv-hhero__title"><?php echo esc_html(lv_t('لوفيزاج — عناية متكاملة لبشرةٍ أكثر إشراقاً وشعرٍ أكثر حيويّة', 'LeVisage — complete care for more radiant skin and more vital hair')); ?></h1>
                    <div class="lv-hhero__subrow">
                        <span class="lv-hairline"></span>
                        <p class="lv-hhero__sub"><?php echo esc_html(lv_t('منتجات علاجية فاخرة', 'Luxury therapeutic products')); ?></p>
                        <span class="lv-hairline"></span>
                    </div>
                    <p class="lv-hhero__text"><?php echo esc_html(lv_t('من علاج تساقط الشعر إلى استعادة لونه الطبيعي — تركيبات LeVisage مختبرة سريرياً ومصنّعة وفق أعلى المعايير الصيدلانية في العالم.', 'From hair-loss treatment to restoring natural colour — LeVisage formulas are clinically tested and manufactured to the highest pharmaceutical standards.')); ?></p>
                    <div class="lv-hhero__btns">
                        <a class="lv-btn lv-btn--light"
                           href="<?php echo esc_url($shop_url); ?>"><?php echo esc_html(lv_t('تسوّق المجموعة', 'Shop the collection')); ?><?php echo lv_icon('arrow'); // phpcs:ignore ?></a>
                        <a class="lv-btn lv-btn--ghost"
                           href="#lv-routine"><?php echo esc_html(lv_t('اكتشف روتينك', 'Discover your routine')); ?></a>
                    </div>
                </div>
                <div class="lv-hhero__visual">
                    <span class="lv-hhero__vglow"></span>
                    <span class="lv-hhero__spin lv-hhero__spin--1"></span>
                    <span class="lv-hhero__spin lv-hhero__spin--2"></span>
                    <img class="lv-hhero__prod" src="<?php echo esc_url($hero_img); ?>" alt="LeVisage">
                    <span class="lv-hchip lv-hchip--tl">Pharma Grade</span>
                    <span class="lv-hchip lv-hchip--br">Clinically Tested</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ 2. BEST SELLERS (WooCommerce) ============ -->
    <?php $best = lv_get_best_sellers(4); ?>
    <?php if (!empty($best)) : ?>
        <section class="lv-section">
            <div class="lv-wrap">
                <div class="lv-section__head">
                    <span class="lv-label"><?php echo esc_html(lv_t('المنتجات الفردية', 'Individual products')); ?></span>
                    <h2 class="lv-section__title"><?php echo esc_html(lv_t('الأكثر مبيعاً', 'Best Sellers')); ?></h2>
                </div>
                <div class="lv-prod-grid">
                    <?php foreach ($best as $i => $post) {
                        $product = wc_get_product($post->ID);
                        lv_product_card($product, $i === 0 ? lv_t('الأكثر مبيعاً', 'Best seller') : '');
                    } ?>
                </div>
                <div class="lv-center-cta">
                    <a class="lv-btn lv-btn--blue"
                       href="<?php echo esc_url($shop_url); ?>"><?php echo lv_icon('arrow'); // phpcs:ignore ?><?php echo esc_html(lv_t('عرض كل المنتجات', 'View all products')); ?></a>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- ============ 3. ROUTINE promo ============ -->
    <section class="lv-section" id="lv-routine">
        <div class="lv-wrap">
            <div class="lv-routine__grid">
                <div class="lv-routine__content">
                    <span class="lv-label"><?php echo esc_html(lv_t('روتين العناية', 'Care routine')); ?></span>
                    <h2 class="lv-routine__title"><?php echo wp_kses_post(lv_t('روتين <em>تساقط الشعر</em>', 'The <em>hair-loss</em> routine')); ?></h2>
                    <p class="lv-routine__text"><?php echo esc_html(lv_t('احصل على علاج متكامل لتساقط الشعر مع أمبولات Vigilant، وشامبو Vigilant العلاجي، وبلسم مغذٍّ هدية.', 'Get complete hair-loss care with Vigilant ampoules, the Vigilant treatment shampoo, and a nourishing conditioner as a gift.')); ?></p>
                    <ul class="lv-checklist">
                        <?php
                        $routine_items = array(
                                array(lv_t('أمبولات Vigilant', 'Vigilant Ampoules'), lv_t('تعزز نمو الشعر وتقوّي البصيلات من العمق.', 'Boost hair growth and strengthen follicles from within.')),
                                array(lv_t('شامبو Vigilant العلاجي', 'Vigilant Treatment Shampoo'), lv_t('يقلّل التساقط ويحسّن الدورة الدموية لفروة الرأس.', 'Reduces shedding and improves scalp circulation.')),
                                array(lv_t('بلسم مغذٍّ — هدية', 'Nourishing Conditioner — gift'), lv_t('يرطّب ويغذّي الشعر لتركه ناعمًا ولامعًا.', 'Hydrates and nourishes hair, leaving it soft and shiny.')),
                        );
                        foreach ($routine_items as $it) : ?>
                            <li>
                                <span class="lv-checklist__ic"><svg viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="3"
                                                                    stroke-linecap="round" stroke-linejoin="round"><path
                                                d="M20 6 9 17l-5-5"/></svg></span>
                                <span><h4><?php echo esc_html($it[0]); ?></h4><p><?php echo esc_html($it[1]); ?></p></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <a class="lv-btn lv-btn--dark"
                       href="<?php echo esc_url($shop_url); ?>"><?php echo lv_icon('arrow'); // phpcs:ignore ?><?php echo esc_html(lv_t('اطلب الروتين الآن', 'Order the routine now')); ?></a>
                </div>
                <div class="lv-routine__media"><img src="<?php echo esc_url($routine_img); ?>"
                                                    alt="<?php esc_attr_e('Routine', 'arqamweb'); ?>"></div>
            </div>
        </div>
    </section>

    <!-- ============ 4. BUNDLES (WooCommerce on-sale) ============ -->
    <?php $bundles = lv_get_bundles(6); ?>
    <?php if (!empty($bundles)) : ?>
        <section class="lv-bundles">
            <div class="lv-wrap">
                <div class="lv-section__head">
                    <span class="lv-label"><?php echo esc_html(lv_t('عروض حصرية', 'Exclusive offers')); ?></span>
                    <h2 class="lv-section__title lv-section__title--grad"><?php echo esc_html(lv_t('البندلات الموفرة', 'Money-saving Bundles')); ?></h2>
                    <p class="lv-section__sub"><?php echo esc_html(lv_t('وفّر حتى ٣٠٪ عند اقتناء التركيبة كاملة، وابدأ رحلة تحوّل شعرك اليوم.', 'Save up to 30% with the full set and start your hair transformation today.')); ?></p>
                </div>
                <div class="lv-bundle-grid">
                    <?php foreach ($bundles as $post) {
                        lv_bundle_card(wc_get_product($post->ID));
                    } ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- ============ 5. FEATURES ============ -->
    <section class="lv-section">
        <div class="lv-wrap">
            <div class="lv-section__head">
                <span class="lv-label"><?php echo esc_html(lv_t('لماذا لوفيزاج', 'Why LeVisage')); ?></span>
                <h2 class="lv-section__title"><?php echo esc_html(lv_t('معيار جديد في العناية الصيدلانية', 'A new standard in pharmaceutical care')); ?></h2>
            </div>
            <div class="lv-feat-grid">
                <?php
                $features = array(
                        array('<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/>', lv_t('مختبرة جلدياً', 'Dermatologically tested'), lv_t('آمنة على فروة الرأس الحساسة والشعر المعالج.', 'Safe for sensitive scalps and treated hair.')),
                        array('<path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10z"/><path d="M2 21c0-3 1.85-5.36 5.08-6"/>', lv_t('طبيعية بقوة', 'Powerfully natural'), lv_t('٩٤٪ من مكونات طبيعية، خالية من القسوة على الشعر.', '94% natural ingredients, gentle on hair.')),
                        array('<circle cx="12" cy="8" r="6"/><path d="M15.5 13.5 17 22l-5-3-5 3 1.5-8.5"/>', lv_t('تركيبات موثوقة', 'Trusted formulas'), lv_t('مطوّرة بالتعاون مع أطباء الجلدية والكيميائيين الصيدليين.', 'Developed with dermatologists and pharmaceutical chemists.')),
                        array('<path d="M10 17h4V5H2v12h3"/><path d="M20 17h2v-3.34a4 4 0 0 0-1.17-2.83L19 9h-5v8h1"/><circle cx="7.5" cy="17.5" r="2.5"/><circle cx="17.5" cy="17.5" r="2.5"/>', lv_t('توصيل فاخر مجاني', 'Free premium delivery'), lv_t('لطلبات +١٥٠٠ ج.م في جميع المحافظات.', 'On orders over 1,500 EGP across all governorates.')),
                        array('<circle cx="12" cy="8" r="6"/><path d="M15.5 13.5 17 22l-5-3-5 3 1.5-8.5"/>', lv_t('جودة بريميوم', 'Premium quality'), lv_t('معايير تصنيع صيدلانية معتمدة.', 'Certified pharmaceutical manufacturing standards.')),
                        array('<path d="M12 3l1.9 3.8 4.2.6-3 3 .7 4.2L12 16l-3.8 2 .7-4.2-3-3 4.2-.6L12 3z"/>', lv_t('نتائج سريعة وملموسة', 'Fast, visible results'), lv_t('فرق واضح خلال ١٤ يوماً من الاستخدام.', 'A clear difference within 14 days of use.')),
                );
                foreach ($features as $f) : ?>
                    <div class="lv-feat">
                        <span class="lv-feat__ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                       stroke-width="2" stroke-linecap="round"
                                                       stroke-linejoin="round"><?php echo $f[0]; // phpcs:ignore ?></svg></span>
                        <h3><?php echo esc_html($f[1]); ?></h3>
                        <p><?php echo esc_html($f[2]); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ============ 6. STEPS (6-month routine) ============ -->
    <section class="lv-section">
        <div class="lv-wrap">
            <div class="lv-section__head">
                <span class="lv-label"><?php echo esc_html(lv_t('خطوات بسيطة', 'Simple steps')); ?></span>
                <h2 class="lv-section__title"><?php echo esc_html(lv_t('خطوات بسيطة لنتائج مذهلة', 'Simple steps for amazing results')); ?></h2>
            </div>
            <div class="lv-steps__grid">
                <div>
                    <h3 class="lv-steps__title"><?php echo esc_html(lv_t('روتين ٦ شهور', 'The 6-month routine')); ?></h3>
                    <p class="lv-steps__text"><?php echo esc_html(lv_t('بروتوكول طويل المدى للنتائج العميقة والمتراكمة — مصمَّم لإعادة بناء كثافة الشعر وتقوية البصيلات على مدى ٦ أشهر كاملة.', 'A long-term protocol for deep, cumulative results — designed to rebuild hair density and strengthen follicles over a full 6 months.')); ?></p>
                    <?php
                    $steps = array(
                            array('٠١', lv_t('اغسل', 'Wash'), lv_t('بشامبو Vigilant برفق لتحضير فروة الرأس.', 'Gently with Vigilant shampoo to prep the scalp.')),
                            array('٠٢', lv_t('عالج', 'Treat'), lv_t('ضع الأمبول أو السيروم على الجذور مباشرة.', 'Apply the ampoule or serum directly to the roots.')),
                            array('٠٣', lv_t('غذِّ', 'Nourish'), lv_t('أنهِ بالبلسم لترطيب وحماية الأطراف.', 'Finish with conditioner to hydrate and protect ends.')),
                    );
                    foreach ($steps as $s) : ?>
                        <div class="lv-step">
                            <span class="lv-step__num"><?php echo esc_html($s[0]); ?></span>
                            <span><h4><?php echo esc_html($s[1]); ?></h4><p><?php echo esc_html($s[2]); ?></p></span>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="lv-steps__media"><img src="<?php echo esc_url($steps_img); ?>"
                                                  alt="<?php esc_attr_e('6-month routine', 'arqamweb'); ?>"></div>
            </div>
        </div>
    </section>

    <!-- ============ 7. TESTIMONIALS ============ -->
    <section class="lv-section">
        <div class="lv-wrap">
            <div class="lv-testi__head">
                <div>
                    <span class="lv-label"><?php echo esc_html(lv_t('محبوبة من الآلاف', 'Loved by thousands')); ?></span>
                    <h2 class="lv-section__title"
                        style="text-align:start"><?php echo esc_html(lv_t('تقييمات تتحدّث عنّا', 'Reviews that speak for us')); ?></h2>
                </div>
                <div class="lv-testi__stats">
                    <div>
                        <div class="lv-stat__num">٤٫٩</div>
                        <div class="lv-stat__lbl"><?php echo esc_html(lv_t('متوسط التقييم', 'Average rating')); ?></div>
                    </div>
                    <div>
                        <div class="lv-stat__num">+١٢٬٤ك</div>
                        <div class="lv-stat__lbl"><?php echo esc_html(lv_t('تقييم موثّق', 'Verified reviews')); ?></div>
                    </div>
                </div>
            </div>
            <div class="lv-testi__grid">
                <?php
                $testi = array(
                        array(lv_t('البلسم أنقذ شعري الجاف تماماً. ترطيب عميق ولمعان طبيعي من أول استخدام.', 'The conditioner completely saved my dry hair. Deep hydration and natural shine from the first use.'), lv_t('ل. م.', 'L. M.'), lv_t('دبي', 'Dubai'), 'ل'),
                        array(lv_t('علاج الشيب من فيجيلانت رائع. النتائج تظهر تدريجياً وبدون أي مواد كيميائية ضارة.', 'The Vigilant grey-hair treatment is excellent. Results appear gradually and without harmful chemicals.'), lv_t('س. ح.', 'S. H.'), lv_t('الإسكندرية', 'Alexandria'), 'س'),
                        array(lv_t('شعري لم يكن بهذه الصحة من قبل. لاحظت نمو جديد بعد ٦ أسابيع فقط من استخدام الأمبولات!', 'My hair has never been this healthy. I noticed new growth after just 6 weeks of using the ampoules!'), lv_t('م. ع.', 'M. A.'), lv_t('القاهرة', 'Cairo'), 'م'),
                );
                foreach ($testi as $t) : ?>
                    <div class="lv-testi__card">
                        <div class="lv-testi__quote">&#8220;</div>
                        <div class="lv-testi__stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                        <p class="lv-testi__text"><?php echo esc_html($t[0]); ?></p>
                        <div class="lv-testi__author">
                            <span class="lv-testi__avatar"><?php echo esc_html($t[3]); ?></span>
                            <span><span class="lv-testi__name"><?php echo esc_html($t[1]); ?></span><br><span
                                        class="lv-testi__city"><?php echo esc_html($t[2]); ?></span></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ============ 8. INGREDIENTS ============ -->
    <section class="lv-ingredients">
        <div class="lv-wrap">
            <div class="lv-ing__grid">
                <div>
                    <span class="lv-label"><?php echo esc_html(lv_t('العلم في كل قطرة', 'Science in every drop')); ?></span>
                    <h2 class="lv-ing__title"><?php echo esc_html(lv_t('مكونات نشطة تحدث الفرق', 'Active ingredients that make the difference')); ?></h2>
                    <p class="lv-ing__text"><?php echo esc_html(lv_t('كل تركيبة مبنية على مكونات نشطة مدعومة سريرياً، بتركيزات مدروسة لنتائج بدون أي تنازل.', 'Every formula is built on clinically backed actives at studied concentrations — results without compromise.')); ?></p>
                    <div class="lv-ing__list">
                        <?php
                        $ings = array(
                                array('٥٪', lv_t('مركّب البيوتين', 'Biotin complex'), lv_t('يقوّي الجذور ويزيد كثافة الشعر.', 'Strengthens roots and boosts density.')),
                                array('١٢٪', lv_t('زيت الأرغان والحبة السوداء', 'Argan & black-seed oil'), lv_t('تغذية عميقة ولمعان مستعاد.', 'Deep nourishment and restored shine.')),
                                array('١٠٪', lv_t('النياسيناميد', 'Niacinamide'), lv_t('توحيد لون فروة الرأس وتنقيتها.', 'Evens and purifies the scalp.')),
                        );
                        foreach ($ings as $g) : ?>
                            <div class="lv-ing__row">
                                <span class="lv-ing__pct"><?php echo esc_html($g[0]); ?></span>
                                <span class="lv-ing__info"><h4><?php echo esc_html($g[1]); ?></h4><p><?php echo esc_html($g[2]); ?></p></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="lv-ing__media"><img src="<?php echo esc_url($ing_img); ?>"
                                                alt="<?php esc_attr_e('Active ingredients', 'arqamweb'); ?>"></div>
            </div>
        </div>
    </section>

    <!-- ============ 9. SPOTLIGHT ============ -->
    <section class="lv-spot">
        <div class="lv-wrap">
            <span class="lv-badge"><?php echo $sparkle; // phpcs:ignore ?><?php echo esc_html(lv_t('المنتج الأيقوني', 'The iconic product')); ?></span>
            <h2 class="lv-spot__title"><?php echo esc_html(lv_t('سيروم علاج الشيب', 'Anti-grey hair serum')); ?></h2>
            <p class="lv-spot__sub"><?php echo esc_html(lv_t('تجربة بصرية ٣٦٠ لتركيبتنا الرائدة — قوة العلم وأناقة التصميم.', 'A 360° visual experience of our flagship formula — the power of science and the elegance of design.')); ?></p>
            <div class="lv-spot__media">
                <span class="lv-spot__chip lv-spot__chip--l"><?php echo esc_html(lv_t('تركيبة نظيفة', 'Clean formula')); ?></span>
                <img src="<?php echo esc_url($spot_img); ?>" alt="<?php esc_attr_e('Anti-grey serum', 'arqamweb'); ?>">
                <span class="lv-spot__chip lv-spot__chip--r"><?php echo esc_html(lv_t('مركّب حصري', 'Exclusive complex')); ?></span>
            </div>
        </div>
    </section>

    <!-- ============ 10. FAQ ============ -->
    <section class="lv-section">
        <div class="lv-wrap">
            <div class="lv-faq__grid">
                <div class="lv-faq__aside">
                    <span class="lv-label"><?php echo esc_html(lv_t('الدعم', 'Support')); ?></span>
                    <h2 class="lv-section__title"><?php echo esc_html(lv_t('الأسئلة الشائعة', 'Frequently asked questions')); ?></h2>
                    <p class="lv-faq__intro"><?php echo esc_html(lv_t('تحتاج مساعدة أكثر؟ استشاريو لوفيزاج على بعد ضغطة زر.', 'Need more help? LeVisage consultants are one click away.')); ?></p>
                    <a class="lv-btn lv-btn--dark" href="https://wa.me/+201004025435" target="_blank"
                       rel="noopener"><?php echo lv_icon('arrow'); // phpcs:ignore ?><?php echo esc_html(lv_t('تحدّث مع استشاري', 'Talk to a consultant')); ?></a>
                </div>
                <div class="lv-acc">
                    <?php
                    $faqs = array(
                            array(lv_t('متى تظهر النتائج؟', 'When do results show?'), lv_t('معظم العملاء يلاحظون فرقاً واضحاً خلال ٢-٤ أسابيع، والنتائج الكاملة تظهر عادةً بعد ١٢ أسبوعاً من الاستخدام المنتظم.', 'Most customers notice a clear difference within 2–4 weeks, with full results usually after 12 weeks of regular use.')),
                            array(lv_t('هل المنتجات آمنة على الشعر المصبوغ؟', 'Are the products safe for coloured hair?'), lv_t('نعم، تركيباتنا خالية من الكبريتات والمواد القاسية وآمنة تماماً على الشعر المصبوغ والمعالج.', 'Yes, our formulas are sulphate-free and gentle, completely safe for coloured and treated hair.')),
                            array(lv_t('هل يمكنني الجمع بين أكثر من علاج؟', 'Can I combine more than one treatment?'), lv_t('بالتأكيد، صُممت منتجاتنا لتعمل معاً ضمن روتين متكامل لأفضل النتائج.', 'Absolutely — our products are designed to work together in one complete routine for the best results.')),
                            array(lv_t('هل تشحنون لجميع المحافظات؟', 'Do you ship to all governorates?'), lv_t('نعم، نشحن لجميع محافظات مصر، والشحن مجاني للطلبات فوق ١٥٠٠ ج.م.', 'Yes, we ship to all governorates of Egypt, with free shipping on orders over 1,500 EGP.')),
                    );
                    foreach ($faqs as $idx => $fq) : ?>
                        <details class="lv-acc__item" <?php echo $idx === 0 ? 'open' : ''; ?>>
                            <summary><?php echo esc_html($fq[0]); ?></summary>
                            <div class="lv-acc__body"><?php echo esc_html($fq[1]); ?></div>
                        </details>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ 11. ARTICLES (latest blog posts) ============ -->
    <?php
    $posts_q = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 3, 'post_status' => 'publish', 'no_found_rows' => true));
    if ($posts_q->have_posts()) : ?>
        <section class="lv-section">
            <div class="lv-wrap">
                <div class="lv-section__head">
                    <span class="lv-label"><?php echo esc_html(lv_t('المدونة', 'Journal')); ?></span>
                    <h2 class="lv-section__title"><?php echo esc_html(lv_t('نصائح وعلم العناية', 'Tips & the science of care')); ?></h2>
                </div>
                <div class="lv-art-grid">
                    <?php while ($posts_q->have_posts()) : $posts_q->the_post();
                        $cats = get_the_category();
                        $thumb = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : $spot_img; ?>
                        <a class="lv-art" href="<?php the_permalink(); ?>">
                            <div class="lv-art__media">
                                <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>">
                                <?php if (!empty($cats) && $cats[0]->slug !== 'uncategorized') : ?><span
                                        class="lv-art__tag"><?php echo esc_html($cats[0]->name); ?></span><?php endif; ?>
                            </div>
                            <div class="lv-art__body">
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 18)); ?></p>
                            </div>
                        </a>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- ============ 12. CONSULTATION ============ -->
    <section class="lv-consult">
        <div class="lv-wrap">
            <div class="lv-consult__grid">
                <div>
                    <span class="lv-label"><?php echo esc_html(lv_t('استشارة شخصية', 'Personal consultation')); ?></span>
                    <h2 class="lv-consult__title"><?php echo esc_html(lv_t('احجز استشارة مع خبير العناية', 'Book a consultation with a care expert')); ?></h2>
                    <p class="lv-consult__text"><?php echo esc_html(lv_t('احجز استشارة مجانية مع نخبة من استشاريي لوفيزاج، واكتشف الروتين المثالي المصمم خصيصاً لشعرك وبشرتك.', 'Book a free consultation with LeVisage experts and discover the perfect routine tailored to your hair and skin.')); ?></p>
                    <div class="lv-consult__btns">
                        <a class="lv-btn lv-btn--wa" href="https://wa.me/+201004025435" target="_blank" rel="noopener">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2 22l5.25-1.38a9.9 9.9 0 0 0 4.79 1.21c5.46 0 9.91-4.45 9.91-9.91S17.5 2 12.04 2zm5.8 14.09c-.25.7-1.44 1.33-1.99 1.36-.53.03-1.02.22-3.42-.72-2.89-1.14-4.73-4.1-4.87-4.29-.14-.19-1.17-1.56-1.17-2.97 0-1.41.74-2.1 1-2.39.26-.29.57-.36.76-.36.19 0 .38 0 .55.01.18.01.42-.07.65.5.25.6.85 2.07.92 2.22.07.15.12.33.02.52-.34.68-.7.65-.42 1.13.28.48 1.24 2.05 2.66 2.79.99.52 1.38.47 1.66.28.28-.19.69-.8.87-1.08.18-.28.36-.23.61-.14.25.09 1.6.75 1.87.89.28.14.46.21.53.32.07.11.07.65-.18 1.35z"/>
                            </svg><?php echo esc_html(lv_t('تواصل عبر واتساب', 'Chat on WhatsApp')); ?></a>
                        <a class="lv-btn lv-btn--ghost"
                           href="#lv-consult-form"><?php echo esc_html(lv_t('احجز الاستشارة', 'Book the consultation')); ?></a>
                    </div>
                    <div class="lv-consult__social">
                        <a href="https://wa.me/+201004025435" target="_blank" rel="noopener" aria-label="WhatsApp">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2 22l5.25-1.38a9.9 9.9 0 0 0 4.79 1.21c5.46 0 9.91-4.45 9.91-9.91S17.5 2 12.04 2z"/>
                            </svg>
                        </a>
                        <a href="https://www.facebook.com/levisagepharma" target="_blank" rel="noopener"
                           aria-label="Facebook">
                            <svg viewBox="0 0 32 32" fill="currentColor">
                                <path d="M21.95 5l-3.3-.004c-3.2 0-5.28 2.124-5.28 5.415v2.495H10.05v4.515h3.32L13.36 27H18l.004-9.575h3.806L21.807 12.9H18v-2.117c0-1.018.24-1.533 1.566-1.533h2.366L21.95 5z"/>
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/levisage.pharma/" target="_blank" rel="noopener"
                           aria-label="Instagram">
                            <svg viewBox="0 0 32 32" fill="currentColor">
                                <path d="M20.4 5h-8.8A6.56 6.56 0 0 0 5 11.55v8.9A6.56 6.56 0 0 0 11.55 27h8.9A6.56 6.56 0 0 0 27 20.45v-8.9A6.56 6.56 0 0 0 20.4 5zm4.4 15.45a4.34 4.34 0 0 1-4.35 4.34h-8.9a4.34 4.34 0 0 1-4.34-4.34v-8.9a4.34 4.34 0 0 1 4.34-4.34h8.9a4.34 4.34 0 0 1 4.34 4.34v8.9zM16 10.3A5.7 5.7 0 1 0 21.7 16 5.7 5.7 0 0 0 16 10.3zm0 9.2a3.48 3.48 0 1 1 0-6.95 3.48 3.48 0 0 1 0 6.95zm5.7-9.16a1.36 1.36 0 1 1-1.36-1.35 1.37 1.37 0 0 1 1.36 1.35z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <form class="lv-consult__form" id="lv-consult-form"
                      onsubmit="event.preventDefault();var f=this;var m='<?php echo esc_js(lv_t('طلب استشارة', 'Consultation request')); ?>%0A<?php echo esc_js(lv_t('الاسم', 'Name')); ?>: '+encodeURIComponent(f.lvname.value)+'%0A<?php echo esc_js(lv_t('الهاتف', 'Phone')); ?>: '+encodeURIComponent(f.lvphone.value)+'%0A<?php echo esc_js(lv_t('البريد', 'Email')); ?>: '+encodeURIComponent(f.lvemail.value)+'%0A<?php echo esc_js(lv_t('المشكلة', 'Concern')); ?>: '+encodeURIComponent(f.lvproblem.value)+'%0A'+encodeURIComponent(f.lvmsg.value);window.open('https://wa.me/+201004025435?text='+m,'_blank');">
                    <div class="lv-form-row">
                        <input type="text" name="lvname" placeholder="<?php echo esc_attr(lv_t('الاسم', 'Name')); ?>"
                               required>
                        <input type="tel" name="lvphone"
                               placeholder="<?php echo esc_attr(lv_t('رقم الهاتف', 'Phone number')); ?>" required>
                    </div>
                    <input type="email" name="lvemail"
                           placeholder="<?php echo esc_attr(lv_t('البريد الإلكتروني', 'Email')); ?>">
                    <select name="lvproblem">
                        <option value="<?php echo esc_attr(lv_t('تساقط الشعر', 'Hair loss')); ?>"><?php echo esc_html(lv_t('مشكلة تساقط الشعر', 'Hair-loss concern')); ?></option>
                        <option value="<?php echo esc_attr(lv_t('شيب الشعر', 'Grey hair')); ?>"><?php echo esc_html(lv_t('علاج الشيب', 'Grey-hair concern')); ?></option>
                        <option value="<?php echo esc_attr(lv_t('ترطيب الشعر', 'Hydration')); ?>"><?php echo esc_html(lv_t('ترطيب ولمعان', 'Hydration & shine')); ?></option>
                        <option value="<?php echo esc_attr(lv_t('العناية بالجسم', 'Body care')); ?>"><?php echo esc_html(lv_t('العناية بالجسم', 'Body care')); ?></option>
                    </select>
                    <textarea name="lvmsg"
                              placeholder="<?php echo esc_attr(lv_t('أخبرنا عن حالة شعرك وأهدافك...', 'Tell us about your hair and goals...')); ?>"></textarea>
                    <button type="submit"
                            class="lv-btn lv-btn--light lv-btn--block"><?php echo esc_html(lv_t('اطلب الاستشارة الآن', 'Request consultation now')); ?></button>
                </form>
            </div>
        </div>
    </section>

</div><!-- #primary -->
<?php get_footer(); ?>
