<?php
/**
 * Announcement / info top bar (Radiance design).
 * Injected above the Astra header via the astra_header_before hook.
 *
 * @package ArqamWeb
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<div class="bg-[var(--navy-deep)] text-white/90 text-sm">
    <div class="container-luxury flex h-11 items-center justify-between">
        <span class="hidden sm:flex items-center gap-2 tracking-wider">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-3.5 w-3.5 text-[color:var(--gold)]" aria-hidden="true"><path d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z"/><path d="M20 2v4"/><path d="M22 4h-4"/><circle cx="4" cy="20" r="2"/></svg>
            <?php echo esc_html(__('شحن مجاني للطلبات فوق ١٫٥٠٠ ج.م', 'arqamweb')); ?>
        </span>
        <div class="flex items-center gap-6">
            <a href="tel:+201004025435" class="hidden md:flex items-center gap-2 text-white/90 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 text-[color:var(--gold)]" aria-hidden="true"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"/></svg>
                <?php echo esc_html(__('استشاري الجلدية', 'arqamweb')); ?> · <span dir="ltr">01004025435</span>
            </a>
            <span class="opacity-90">
                <?php
                // Language switcher from WPML (falls back to plain links if WPML is off).
                $lv_langs = apply_filters('wpml_active_languages', null, 'skip_missing=0');
                if (!empty($lv_langs)) :
                    $lv_labels = array('ar' => 'عربي', 'en' => 'EN');
                    $lv_items  = array();
                    foreach ($lv_langs as $lv_l) {
                        $lv_code  = $lv_l['language_code'];
                        $lv_label = isset($lv_labels[$lv_code]) ? $lv_labels[$lv_code] : strtoupper($lv_code);
                        $lv_cls   = $lv_l['active'] ? 'text-[color:var(--gold)] font-bold' : 'text-white/90 hover:text-white';
                        $lv_items[] = $lv_l['active']
                            ? '<span class="' . $lv_cls . '">' . esc_html($lv_label) . '</span>'
                            : '<a href="' . esc_url($lv_l['url']) . '" class="' . $lv_cls . '">' . esc_html($lv_label) . '</a>';
                    }
                    echo implode('<span class="mx-1 opacity-60">|</span>', $lv_items); // phpcs:ignore WordPress.Security.EscapeOutput
                else : ?>
                    <a href="<?php echo esc_url(home_url('/en/')); ?>" class="<?php echo is_rtl() ? 'text-white/90 hover:text-white' : 'text-[color:var(--gold)] font-bold'; ?>">EN</a>
                    <span class="mx-1">|</span>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="<?php echo is_rtl() ? 'text-[color:var(--gold)] font-bold' : 'text-white/90 hover:text-white'; ?>"><?php esc_html_e('عربي', 'arqamweb'); ?></a>
                <?php endif; ?>
            </span>
        </div>
    </div>
</div>
