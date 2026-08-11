<?php

/**
 * VIGILANT landing page (template/landing-page.php)
 *
 * - loads the scoped Tailwind bundle only on that template
 * - turns the landing form into a real WooCommerce order (cash on delivery)
 *   so it shows up under WooCommerce → Orders, counts in reports, and lets the
 *   Pixel/TikTok plugins fire Purchase on the order-received page
 *
 * @package ArqamWeb
 */

if (! defined('ABSPATH')) {
    exit;
}

define('LEVISAGE_LANDING_TEMPLATE', 'template/landing-page.php');
define('LEVISAGE_LANDING_WHATSAPP', '201004025435');
define('LEVISAGE_LANDING_VERSION', '1.1.2');

/** The VIGILANT Anti Grey serum (600 EGP). */
define('LEVISAGE_LANDING_PRODUCT_ID', 141);

/**
 * The two offers. Prices live here, never in the browser: whatever the form
 * posts, the order is built from these numbers.
 *
 * The bundle is 3 units whose subtotal is 1800 and total 1200 — WooCommerce
 * renders that as a struck-through discount, keeps 3 units in the reports, and
 * nets 1200.
 */
function levisage_landing_packages()
{
    return array(
        'bundle' => array(
            'label'    => 'عرض 2+1 — 3 عبوات',
            'quantity' => 3,
            'subtotal' => 1800,
            'total'    => 1200,
        ),
        'single' => array(
            'label'    => 'عبوة واحدة',
            'quantity' => 1,
            'subtotal' => 600,
            'total'    => 600,
        ),
    );
}

function levisage_landing_whatsapp_url()
{
    return 'https://wa.me/' . LEVISAGE_LANDING_WHATSAPP . '?text=' . rawurlencode('عايز أستفسر عن عرض 2+1 لسيروم VIGILANT');
}

/**
 * The governorate dropdown: WooCommerce state code → Arabic label.
 *
 * Deliberately hard-coded rather than read from WC()->countries->get_states('EG'):
 * WPML translates that list per request locale, and admin-post.php runs in the
 * default language — so matching on the Arabic label posted by the form silently
 * failed there. The form posts the code; the label is only ever for display.
 */
function levisage_landing_governorates()
{
    return array(
        'EGC'   => 'القاهرة',
        'EGGZ'  => 'الجيزة',
        'EGALX' => 'الإسكندرية',
        'EGKB'  => 'القليوبية',
        'EGDK'  => 'الدقهلية',
        'EGSHR' => 'الشرقية',
        'EGGH'  => 'الغربية',
        'EGMNF' => 'المنوفية',
        'EGBH'  => 'البحيرة',
        'EGKFS' => 'كفر الشيخ',
        'EGDT'  => 'دمياط',
        'EGPTS' => 'بورسعيد',
        'EGIS'  => 'الإسماعيلية',
        'EGSUZ' => 'السويس',
        'EGSIN' => 'شمال سيناء',
        'EGJS'  => 'جنوب سيناء',
        'EGFYM' => 'الفيوم',
        'EGBNS' => 'بني سويف',
        'EGMN'  => 'المنيا',
        'EGAST' => 'أسيوط',
        'EGSHG' => 'سوهاج',
        'EGKN'  => 'قنا',
        'EGLX'  => 'الأقصر',
        'EGASN' => 'أسوان',
        'EGBA'  => 'البحر الأحمر',
        'EGMT'  => 'مطروح',
        'EGWAD' => 'الوادي الجديد',
    );
}

/**
 * What WooCommerce would charge to ship to this governorate.
 *
 * Reads the real shipping zones, so changing a rate in WooCommerce → Shipping
 * changes the landing page too. Returns null when no zone covers the state —
 * الشرقية and جنوب سيناء currently have no zone, and silently charging 0 for
 * them would hide a store misconfiguration.
 */
function levisage_landing_shipping_rate($state_code, $contents_cost)
{
    if (! $state_code || ! class_exists('WC_Shipping_Zones')) {
        return null;
    }

    $package = array(
        'contents'      => array(),
        'contents_cost' => $contents_cost,
        'applied_coupons' => array(),
        'user'          => array('ID' => get_current_user_id()),
        'destination'   => array(
            'country'   => 'EG',
            'state'     => $state_code,
            'postcode'  => '',
            'city'      => '',
            'address'   => '',
            'address_1' => '',
            'address_2' => '',
        ),
    );

    $zone = WC_Shipping_Zones::get_zone_matching_package($package);

    if (! $zone || 0 === $zone->get_id()) {
        return null; // "locations not covered by your other zones" has no method here
    }

    foreach ($zone->get_shipping_methods(true) as $method) {
        $rates = $method->get_rates_for_package($package);

        if (! empty($rates)) {
            return reset($rates); // WC_Shipping_Rate
        }
    }

    return null;
}

/**
 * Shipping cost per governorate, handed to the form so the total updates live.
 */
function levisage_landing_shipping_table()
{
    $packages = levisage_landing_packages();
    $table    = array();

    foreach (array_keys(levisage_landing_governorates()) as $code) {
        $rate         = levisage_landing_shipping_rate($code, $packages['bundle']['total']);
        $table[$code] = $rate ? (float) $rate->get_cost() : null;
    }

    return $table;
}

/* -------------------------------------------------------------------------- */
/* Assets                                                                      */
/* -------------------------------------------------------------------------- */

function levisage_landing_assets()
{
    if (! is_page_template(LEVISAGE_LANDING_TEMPLATE)) {
        return;
    }

    wp_enqueue_style(
        'levisage-landing-fonts',
        'https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&display=swap',
        array(),
        null
    );

    // Built from src/landing.css by `npm run build:css`, scoped under .lv-page.
    wp_enqueue_style(
        'levisage-landing',
        get_stylesheet_directory_uri() . '/css/landing-vigilant.css',
        array(),
        LEVISAGE_LANDING_VERSION
    );

    // Astra/WordPress glue + the native form controls.
    wp_enqueue_style(
        'levisage-landing-wp',
        get_stylesheet_directory_uri() . '/css/landing-vigilant-wp.css',
        array('levisage-landing'),
        LEVISAGE_LANDING_VERSION
    );

    wp_enqueue_script(
        'levisage-landing',
        get_stylesheet_directory_uri() . '/js/landing-vigilant.js',
        array(),
        LEVISAGE_LANDING_VERSION,
        true
    );

    $packages = levisage_landing_packages();

    wp_localize_script(
        'levisage-landing',
        'LV_LANDING',
        array(
            'prices'   => array(
                'bundle' => $packages['bundle']['total'],
                'single' => $packages['single']['total'],
            ),
            'shipping' => levisage_landing_shipping_table(),
            'strings'  => array(
                'pickGovernorate' => 'يتحدد حسب المحافظة',
                'noZone'          => 'يتم تأكيد الشحن بالتليفون',
                'currency'        => 'ج.م',
            ),
        )
    );
}
add_action('wp_enqueue_scripts', 'levisage_landing_assets', 20);

/* -------------------------------------------------------------------------- */
/* Order                                                                       */
/* -------------------------------------------------------------------------- */

/**
 * Re-fill the form after a validation bounce instead of making the customer retype.
 */
function levisage_landing_old_input()
{
    $defaults = array(
        'package'     => 'bundle',
        'name'        => '',
        'phone'       => '',
        'governorate' => '',
        'address'     => '',
    );

    $stored = get_transient(levisage_landing_input_key());

    if (is_array($stored)) {
        delete_transient(levisage_landing_input_key());
        return wp_parse_args($stored, $defaults);
    }

    return $defaults;
}

function levisage_landing_input_key()
{
    $ip = isset($_SERVER['REMOTE_ADDR']) ? sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR'])) : 'anon';
    return 'lv_landing_input_' . md5($ip . wp_salt());
}

/**
 * The form posts back to the landing page itself, not admin-post.php.
 *
 * admin-post.php lives under /wp-admin, so is_admin() is true there and WPML
 * serves every permalink in the *admin* language — an Arabic customer ended up
 * on /en/checkout/order-received with an English confirmation. Handling the post
 * on template_redirect keeps the whole request in the page's language.
 */
function levisage_landing_maybe_handle_order()
{
    if (
        'POST' !== ($_SERVER['REQUEST_METHOD'] ?? '')
        || ! isset($_POST['lv_action'])
        || 'levisage_landing_order' !== $_POST['lv_action']
        || ! is_page_template(LEVISAGE_LANDING_TEMPLATE)
    ) {
        return;
    }

    levisage_landing_handle_order();
}
add_action('template_redirect', 'levisage_landing_maybe_handle_order');

function levisage_landing_handle_order()
{
    $back = get_permalink();

    if (
        ! isset($_POST['levisage_landing_nonce'])
        || ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['levisage_landing_nonce'])), 'levisage_landing_order')
    ) {
        levisage_landing_bounce($back, 'error');
    }

    // honeypot: humans never fill this
    if (! empty($_POST['lv_website'])) {
        levisage_landing_bounce($back, 'error');
    }

    if (! function_exists('wc_create_order')) {
        levisage_landing_bounce($back, 'error');
    }

    $packages = levisage_landing_packages();
    $key      = isset($_POST['lv_package']) ? sanitize_key(wp_unslash($_POST['lv_package'])) : 'bundle';
    $key      = isset($packages[$key]) ? $key : 'bundle';
    $package  = $packages[$key];

    $governorates = levisage_landing_governorates();

    $name       = isset($_POST['lv_name']) ? sanitize_text_field(wp_unslash($_POST['lv_name'])) : '';
    $phone      = isset($_POST['lv_phone']) ? sanitize_text_field(wp_unslash($_POST['lv_phone'])) : '';
    $state_code = isset($_POST['lv_governorate']) ? sanitize_text_field(wp_unslash($_POST['lv_governorate'])) : '';
    $address    = isset($_POST['lv_address']) ? sanitize_textarea_field(wp_unslash($_POST['lv_address'])) : '';

    $phone = preg_replace('/\D/', '', $phone);
    $gov   = isset($governorates[$state_code]) ? $governorates[$state_code] : '';

    $valid = (
        mb_strlen($name) >= 3
        && preg_match('/^01[0-9]{9}$/', $phone)
        && '' !== $gov
        && mb_strlen($address) >= 10
    );

    if (! $valid) {
        set_transient(
            levisage_landing_input_key(),
            array(
                'package'     => $key,
                'name'        => $name,
                'phone'       => $phone,
                'governorate' => $state_code,
                'address'     => $address,
            ),
            HOUR_IN_SECONDS
        );
        levisage_landing_bounce($back, 'error');
    }

    $product = wc_get_product(LEVISAGE_LANDING_PRODUCT_ID);

    if (! $product) {
        levisage_landing_bounce($back, 'error');
    }

    $order = wc_create_order(array('created_via' => 'levisage-landing'));

    if (is_wp_error($order)) {
        levisage_landing_bounce($back, 'error');
    }

    // one line: 3 × serum, 1800 struck through → 1200
    $item = new WC_Order_Item_Product();
    $item->set_product($product);
    $item->set_quantity($package['quantity']);
    $item->set_subtotal($package['subtotal']);
    $item->set_total($package['total']);
    $order->add_item($item);

    $names = explode(' ', $name, 2);

    $fields = array(
        'first_name' => $names[0],
        'last_name'  => isset($names[1]) ? $names[1] : '',
        'address_1'  => $address,
        'city'       => $gov,
        'state'      => $state_code,
        'country'    => 'EG',
    );

    $order->set_address($fields + array('phone' => $phone), 'billing');
    $order->set_address($fields, 'shipping');

    $rate = levisage_landing_shipping_rate($state_code, $package['total']);

    if ($rate) {
        $shipping = new WC_Order_Item_Shipping();
        $shipping->set_method_title($rate->get_label() ? $rate->get_label() : 'الشحن');
        $shipping->set_method_id($rate->get_method_id());
        $shipping->set_instance_id($rate->get_instance_id());
        $shipping->set_total($rate->get_cost());
        $order->add_item($shipping);
    } else {
        $order->add_order_note('لا توجد منطقة شحن مضبوطة لمحافظة ' . $gov . ' — الشحن غير محسوب، يرجى تأكيده مع العميل.');
    }

    $gateways = WC()->payment_gateways() ? WC()->payment_gateways->payment_gateways() : array();
    $cod      = isset($gateways['cod']) ? $gateways['cod'] : null;

    $order->set_payment_method($cod ? $cod : 'cod');
    $order->set_payment_method_title($cod ? $cod->get_title() : 'الدفع عند الاستلام');
    $order->set_customer_note('طلب من صفحة VIGILANT — ' . $package['label']);

    $order->calculate_totals(false); // taxes are off in this store; keep our line totals
    $order->update_status('processing', 'طلب من لاندنج VIGILANT (دفع عند الاستلام).');

    wc_reduce_stock_levels($order->get_id());

    if (function_exists('WC') && WC()->cart) {
        WC()->cart->empty_cart();
    }

    wp_safe_redirect($order->get_checkout_order_received_url());
    exit;
}
function levisage_landing_bounce($back, $status)
{
    $url = add_query_arg('order', $status, remove_query_arg('order', $back)) . '#order';
    wp_safe_redirect($url);
    exit;
}

/**
 * Mark landing orders in the WooCommerce list so the team can tell them apart.
 */
function levisage_landing_order_origin_note($order)
{
    if ('levisage-landing' === $order->get_created_via()) {
        echo '<div style="margin-top:4px"><span style="background:#e8be62;color:#002332;padding:1px 6px;border-radius:10px;font-size:11px">لاندنج VIGILANT</span></div>';
    }
}
add_action('woocommerce_admin_order_preview_end', 'levisage_landing_order_origin_note');
