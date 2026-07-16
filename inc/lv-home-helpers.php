<?php
/**
 * LeVisage home page helpers — WooCommerce product rendering for the
 * custom front page (matches the visage-luxe-atelier reference design).
 *
 * @package ArqamWeb
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * First product category name for a product (skips helper/utility cats).
 */
function lv_first_category_name($product)
{
    $skip  = array('uncategorized', 'شحن مجاني', 'أحدث العروض');
    $terms = get_the_terms($product->get_id(), 'product_cat');
    if (empty($terms) || is_wp_error($terms)) {
        return '';
    }
    foreach ($terms as $t) {
        if (!in_array($t->name, $skip, true)) {
            return $t->name;
        }
    }
    return $terms[0]->name;
}

/**
 * Small inline SVG icons used on the cards.
 */
function lv_icon($name)
{
    $icons = array(
        'heart' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1-1.1a5.5 5.5 0 0 0-7.8 7.8l1.1 1L12 21l7.7-7.5 1.1-1a5.5 5.5 0 0 0 0-7.9z"/></svg>',
        'star'  => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l2.9 6.3 6.9.7-5.2 4.6 1.5 6.8L12 17.3 5.9 20.4l1.5-6.8L2.2 9l6.9-.7L12 2z"/></svg>',
        'cart'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>',
        'arrow' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>',
    );
    return isset($icons[$name]) ? $icons[$name] : '';
}

/**
 * Build a WooCommerce add-to-cart link that behaves like the shop/loop button
 * (AJAX add for simple products; links to the product page for variable ones),
 * while keeping our own card styling and label.
 *
 * @param WC_Product $product     The product.
 * @param string     $class       Our CSS class for the button.
 * @param string     $inner_html  Already-safe inner markup (icon + label).
 */
function lv_add_to_cart_link($product, $class, $inner_html)
{
    if (!$product instanceof WC_Product) {
        return '';
    }

    $purchasable = $product->is_purchasable() && $product->is_in_stock();
    $can_ajax    = $purchasable
        && $product->supports('ajax_add_to_cart')
        && 'yes' === get_option('woocommerce_enable_ajax_add_to_cart');

    $classes = array($class, 'product_type_' . $product->get_type());
    if ($purchasable) {
        $classes[] = 'add_to_cart_button';
    }
    if ($can_ajax) {
        $classes[] = 'ajax_add_to_cart';
    }

    return sprintf(
        '<a href="%s" class="%s" data-product_id="%s" data-quantity="1" rel="nofollow">%s</a>',
        esc_url($product->add_to_cart_url()),
        esc_attr(implode(' ', array_filter($classes))),
        esc_attr($product->get_id()),
        $inner_html
    );
}

/**
 * Render a "best seller" style product card from a WC_Product.
 */
function lv_product_card($product, $badge = '')
{
    if (!$product instanceof WC_Product) {
        return;
    }
    $id     = $product->get_id();
    $link   = get_permalink($id);
    $img    = has_post_thumbnail($id) ? get_the_post_thumbnail_url($id, 'woocommerce_thumbnail') : wc_placeholder_img_src();
    $cat    = lv_first_category_name($product);
    $rating = round((float) $product->get_average_rating(), 1);
    ?>
    <div class="lv-prod">
      <div class="lv-prod__media">
        <a class="lv-prod__imglink" href="<?php echo esc_url($link); ?>">
          <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($product->get_name()); ?>" loading="lazy">
        </a>
        <?php if ($badge) : ?><span class="lv-prod__badge"><?php echo esc_html($badge); ?></span><?php endif; ?>
      </div>
      <div class="lv-prod__body">
        <?php if ($cat) : ?><span class="lv-prod__cat"><?php echo esc_html($cat); ?></span><?php endif; ?>
        <h3 class="lv-prod__name"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($product->get_name()); ?></a></h3>
        <div class="lv-prod__meta">
          <span class="lv-prod__price"><?php echo wp_kses_post($product->get_price_html()); ?></span>
          <?php if ($rating > 0) : ?>
            <span class="lv-prod__rating"><?php echo lv_icon('star'); // phpcs:ignore ?><?php echo esc_html(number_format_i18n($rating, 1)); ?></span>
          <?php endif; ?>
        </div>
      </div>
      <?php echo lv_add_to_cart_link($product, 'lv-prod__cta', lv_icon('cart') . esc_html(lv_t('اطلب الآن', 'Order now'))); // phpcs:ignore ?>
    </div>
    <?php
}

/**
 * Render a "bundle / offer" style card (dark section) with savings.
 */
function lv_bundle_card($product)
{
    if (!$product instanceof WC_Product) {
        return;
    }
    $id      = $product->get_id();
    $link    = get_permalink($id);
    $img     = has_post_thumbnail($id) ? get_the_post_thumbnail_url($id, 'woocommerce_thumbnail') : wc_placeholder_img_src();
    $cat     = lv_first_category_name($product);
    $reg     = (float) $product->get_regular_price();
    $sale    = (float) $product->get_price();
    $savings  = ($product->is_on_sale() && $reg > $sale) ? ($reg - $sale) : 0;
    ?>
    <div class="lv-bundle">
      <?php if ($savings > 0) : ?>
        <span class="lv-bundle__save"><?php echo esc_html(lv_t('وفّر', 'Save') . ' ' . wp_strip_all_tags(wc_price($savings))); ?></span>
      <?php endif; ?>
      <a class="lv-bundle__media" href="<?php echo esc_url($link); ?>">
        <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($product->get_name()); ?>" loading="lazy">
      </a>
      <div class="lv-bundle__body">
        <h3 class="lv-bundle__name"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($product->get_name()); ?></a></h3>
        <?php if ($cat) : ?><p class="lv-bundle__sub"><?php echo esc_html($cat); ?></p><?php endif; ?>
        <div class="lv-bundle__foot">
          <?php echo lv_add_to_cart_link($product, 'lv-bundle__cta', esc_html(lv_t('اطلب الآن', 'Order now'))); // phpcs:ignore ?>
          <span class="lv-bundle__price">
            <?php echo wp_kses_post(wc_price($sale)); ?>
            <?php if ($savings > 0) : ?><del><?php echo wp_kses_post(wc_price($reg)); ?></del><?php endif; ?>
          </span>
        </div>
      </div>
    </div>
    <?php
}

/**
 * Query best-selling products (falls back to recent when no sales data).
 */
function lv_get_best_sellers($limit = 4)
{
    $q = new WP_Query(array(
        'post_type'           => 'product',
        'post_status'         => 'publish',
        'posts_per_page'      => $limit,
        'meta_key'            => 'total_sales',
        'orderby'             => array('meta_value_num' => 'DESC', 'date' => 'DESC'),
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
        'tax_query'           => array(array(
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => array('uncategorized'),
            'operator' => 'NOT IN',
        )),
    ));
    return $q->posts;
}

/**
 * Query bundle / offer products. Prefers the "أحدث العروض" (offers) category
 * — where the real bundles live — and falls back to any on-sale products.
 */
function lv_get_bundles($limit = 6)
{
    $q = new WP_Query(array(
        'post_type'           => 'product',
        'post_status'         => 'publish',
        'posts_per_page'      => $limit,
        'orderby'             => 'date',
        'order'               => 'DESC',
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
        'tax_query'           => array(array(
            'taxonomy' => 'product_cat',
            'field'    => 'name',
            'terms'    => array('أحدث العروض'),
        )),
    ));
    if (!empty($q->posts)) {
        return $q->posts;
    }

    // Fallback: any on-sale products.
    $ids = wc_get_product_ids_on_sale();
    if (empty($ids)) {
        return array();
    }
    $q2 = new WP_Query(array(
        'post_type'           => 'product',
        'post_status'         => 'publish',
        'posts_per_page'      => $limit,
        'post__in'            => $ids,
        'orderby'             => 'post__in',
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
    ));
    return $q2->posts;
}

/**
 * Get a representative product image URL from a category name (for spotlights).
 * Uses field "name" which is more robust than URL-encoded Arabic slugs.
 */
function lv_category_image($cat_name, $fallback = '')
{
    $q = new WP_Query(array(
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'posts_per_page' => 1,
        'no_found_rows'  => true,
        'meta_query'     => array(array('key' => '_thumbnail_id', 'compare' => 'EXISTS')),
        'tax_query'      => array(array(
            'taxonomy' => 'product_cat',
            'field'    => 'name',
            'terms'    => array($cat_name),
        )),
    ));
    if (!empty($q->posts) && has_post_thumbnail($q->posts[0]->ID)) {
        return get_the_post_thumbnail_url($q->posts[0]->ID, 'large');
    }
    return $fallback;
}
