<?php



/**

 * ArqamWeb Theme functions and definitions

 *

 * @link https://developer.wordpress.org/themes/basics/theme-functions/

 *

 * @package ArqamWeb

 * @since 1.0.0

 */



/**

 * Define Constants

 */

define('CHILD_THEME_ARQAMWEB_VERSION', '1.0.1');



/**

 * Enqueue styles

 */

function child_enqueue_styles()

{

    wp_enqueue_style(

        'arqamweb-theme-css',

        get_stylesheet_directory_uri() . '/style.css',

        ['astra-theme-css'],

        CHILD_THEME_ARQAMWEB_VERSION,

        'all'

    );

    // Google Fonts used by the custom header & footer.
    wp_enqueue_style(
        'lv-google-fonts',
        'https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&family=Cairo:wght@400;600;700&display=swap',
        array(),
        null
    );

    // Whole-theme stylesheet — bundled from src/theme.css (base + header/footer
    // + inner pages + home) by `npm run build:css`. filemtime busts cache on rebuild.
    $lv_main = get_stylesheet_directory() . '/css/main.min.css';
    wp_enqueue_style(
        'style-css',
        get_stylesheet_directory_uri() . '/css/main.min.css',
        array('astra-theme-css'),
        file_exists($lv_main) ? filemtime($lv_main) : CHILD_THEME_ARQAMWEB_VERSION,
        'all'
    );
}



add_action('wp_enqueue_scripts', 'child_enqueue_styles', 15);



/**

 * Enqueue script

 */

function my_custom_scripts()

{

    wp_enqueue_script(

        'jquery',

        get_stylesheet_directory_uri() . '/js/jquery.min.js',

        ['jquery'],

        '',

        false

    );

    wp_enqueue_script(

        'main-js',

        get_stylesheet_directory_uri() . '/js/main.js',

        ['jquery'],

        '',

        false

    );
}

add_action('wp_enqueue_scripts', 'my_custom_scripts');

/**
 * Load the rtl.css file
 */
function astra_child_enqueue_rtl_styles()
{
    if (is_rtl()) {
        // Load RTL CSS.
        wp_enqueue_style('astra-rtl', get_stylesheet_directory_uri() . '/rtl.css', array('astra-theme-css'), CHILD_THEME_ARQAMWEB_VERSION);
    }
}
add_action('wp_enqueue_scripts', 'astra_child_enqueue_rtl_styles');



require_once(get_stylesheet_directory() . '/inc/features.php');
require_once(get_stylesheet_directory() . '/inc/landing-vigilant.php');
require_once(get_stylesheet_directory() . '/inc/lv-home-helpers.php');

/**
 * Load WooCommerce AJAX add-to-cart + cart fragments on the front page so the
 * home "اطلب الآن" buttons add to the cart without leaving the page.
 */
function lv_enqueue_cart_scripts()
{
    if (is_front_page() && function_exists('WC')) {
        wp_enqueue_script('wc-add-to-cart');
        wp_enqueue_script('wc-cart-fragments');
    }
}
add_action('wp_enqueue_scripts', 'lv_enqueue_cart_scripts', 20);

/**
 * Keep the custom header cart badge in sync after an AJAX add-to-cart.
 */
function lv_cart_count_fragment($fragments)
{
    $count = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;
    ob_start();
    ?>
    <span class="lv-cart-count"><?php if ($count > 0) : ?><span class="lv-nav__badge"><?php echo esc_html($count); ?></span><?php endif; ?></span>
    <?php
    $fragments['span.lv-cart-count'] = ob_get_clean();
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'lv_cart_count_fragment');

/**
 * Ensure the <html> tag always carries an explicit text direction so the
 * theme's logical CSS (text-start/inset-inline/margin-inline …) resolves
 * correctly on every language — LTR on English, RTL on Arabic.
 */
function lv_force_html_dir($output)
{
    if (strpos($output, 'dir=') === false) {
        $output = 'dir="' . (is_rtl() ? 'rtl' : 'ltr') . '" ' . $output;
    }
    return $output;
}
add_filter('language_attributes', 'lv_force_html_dir');

/**
 * Inject the Radiance announcement top bar above the Astra header.
 */
function lv_render_top_bar()
{
    get_template_part('template/components/top-bar');
}
add_action('astra_header_before', 'lv_render_top_bar');

/**
 * Register the menu locations used by the custom LeVisage header & footer.
 * Each footer column is its own location so it can be managed — and translated
 * per language with WPML — from Appearance → Menus.
 */
function lv_register_menus()
{
    register_nav_menus(array(
        'primary'        => __('Primary Menu', 'arqamweb'),
        'footer_shop'    => __('Footer — Shop', 'arqamweb'),
        'footer_company' => __('Footer — Company', 'arqamweb'),
        'footer_support' => __('Footer — Support', 'arqamweb'),
        'footer_social'  => __('Footer — Social', 'arqamweb'),
    ));
}
add_action('after_setup_theme', 'lv_register_menus');

/**
 * Style the footer menu links like the rest of the footer.
 * wp_nav_menu() has no argument for the <a> class, so it goes through a filter.
 */
function lv_footer_menu_link_attributes($atts, $item, $args)
{
    if (isset($args->theme_location) && 0 === strpos($args->theme_location, 'footer_')) {
        $atts['class'] = 'text-white/70 hover:text-white transition-colors';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'lv_footer_menu_link_attributes', 10, 3);

/**
 * Permalink of a page / term, resolved to the CURRENT language (WPML-safe).
 * Hard-coded IDs point at one language only; WPML maps them to the other.
 *
 * @param int    $id   Object ID in any language.
 * @param string $type 'page', 'post', 'product', or a taxonomy name.
 * @return string URL, or '' when the object no longer exists.
 */
function lv_translated_url($id, $type = 'page')
{
    $id = (int) apply_filters('wpml_object_id', (int) $id, $type, true);
    if (!$id) {
        return '';
    }
    if (taxonomy_exists($type)) {
        $link = get_term_link($id, $type);
        return is_wp_error($link) ? '' : $link;
    }
    $link = get_permalink($id);
    return $link ? $link : '';
}

/**
 * Render one footer link column from a nav menu location.
 *
 * Until a menu is assigned in Appearance → Menus the column falls back to the
 * links it shipped with, so the footer never renders empty on a live site.
 *
 * @param string $location Registered menu location.
 * @param string $title    Column heading (already translated).
 * @param array  $fallback Items: array( 'label' => .., 'url' => .., 'target' => bool ).
 */
function lv_footer_menu_column($location, $title, $fallback = array())
{
    if (!has_nav_menu($location) && empty($fallback)) {
        return;
    }
    ?>
    <div class="lg:col-span-2">
        <div class="text-xs tracking-[0.3em] text-white/40 mb-4"><?php echo esc_html($title); ?></div>
        <?php if (has_nav_menu($location)) : ?>
            <?php
            wp_nav_menu(array(
                'theme_location' => $location,
                'container'      => false,
                'menu_class'     => 'space-y-2.5',
                'depth'          => 1,
                'fallback_cb'    => false,
            ));
            ?>
        <?php else : ?>
            <ul class="space-y-2.5">
                <?php foreach ($fallback as $item) : ?>
                    <?php if (empty($item['url'])) { continue; } ?>
                    <li>
                        <a href="<?php echo esc_url($item['url']); ?>"
                           class="text-white/70 hover:text-white transition-colors"
                            <?php if (!empty($item['target'])) : ?>target="_blank" rel="noopener noreferrer"<?php endif; ?>><?php echo esc_html($item['label']); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <?php
}

/**
 * Fallback header menu — shown when no menu is assigned to the "primary"
 * location. Mirrors the reference design's navigation.
 */
function lv_header_fallback_menu()
{
    $base  = 'https://levisage-pharma.com';
    $items = array(
        array('label' => __('Home', 'arqamweb'),        'url' => home_url('/')),
        array('label' => __('Hair Care', 'arqamweb'),    'url' => $base . '/shop/'),
        array('label' => __('Body Care', 'arqamweb'),    'url' => $base . '/shop/'),
        array('label' => __('Bundles', 'arqamweb'),      'url' => $base . '/shop/'),
        array('label' => __('Routines', 'arqamweb'),     'url' => $base . '/shop/'),
        array('label' => __('About us', 'arqamweb'),     'url' => $base . '/about-us/'),
        array('label' => __('Pharmacies', 'arqamweb'),   'url' => $base . '/pharmacies/'),
        array('label' => __('Contact us', 'arqamweb'),   'url' => $base . '/contact-us/'),
    );

    echo '<ul>';
    $current = home_url(add_query_arg(array(), $GLOBALS['wp']->request ?? ''));
    foreach ($items as $item) {
        $active = (untrailingslashit($item['url']) === untrailingslashit($current)) ? ' class="current-menu-item"' : '';
        printf(
            '<li%s><a href="%s">%s</a></li>',
            $active,
            esc_url($item['url']),
            esc_html($item['label'])
        );
    }
    echo '</ul>';
}