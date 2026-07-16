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
      <?php echo lv_add_to_cart_link($product, 'lv-prod__cta', lv_icon('cart') . esc_html(__('اطلب الآن', 'arqamweb'))); // phpcs:ignore ?>
    </div>
    <?php
}

/**
 * Render a Radiance-style "best seller" card from a WC_Product.
 * Same premium markup as the reference design, but data comes from WooCommerce
 * and the "أضف إلى السلة" button is a real AJAX add-to-cart.
 */
function lv_bestseller_card($product, $badge = '')
{
    if (!$product instanceof WC_Product) {
        return;
    }
    $id      = $product->get_id();
    $link    = get_permalink($id);
    $img     = has_post_thumbnail($id) ? get_the_post_thumbnail_url($id, 'woocommerce_thumbnail') : wc_placeholder_img_src();
    $cat     = lv_first_category_name($product);
    $rating  = round((float) $product->get_average_rating(), 1);
    $on_sale = $product->is_on_sale();

    $cart_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4" aria-hidden="true"><path d="M16 10a4 4 0 0 1-8 0"/><path d="M3.103 6.034h17.794"/><path d="M3.4 5.467a2 2 0 0 0-.4 1.2V20a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6.667a2 2 0 0 0-.4-1.2l-2-2.667A2 2 0 0 0 17 2H7a2 2 0 0 0-1.6.8z"/></svg>';
    $atc = lv_add_to_cart_link(
        $product,
        'w-full rounded-full bg-[var(--navy)] text-white py-3 text-sm font-medium flex items-center justify-center gap-2 hover:bg-[var(--navy-deep)]',
        $cart_svg . esc_html(__('أضف إلى السلة', 'arqamweb'))
    );
    ?>
    <article class="group relative bg-white rounded-3xl overflow-hidden shadow-soft hover:shadow-luxury transition-all duration-500">
      <div class="relative aspect-[4/5] overflow-hidden bg-gradient-to-br from-[color:var(--cream)] to-white">
        <a href="<?php echo esc_url($link); ?>" class="block h-full w-full">
          <img alt="<?php echo esc_attr($product->get_name()); ?>" loading="lazy" class="block h-full w-full object-contain p-6 transition-transform duration-700 group-hover:scale-110" src="<?php echo esc_url($img); ?>">
        </a>
        <?php if ($badge) : ?>
          <span class="absolute top-4 right-4 rounded-full bg-[var(--navy-deep)] text-white text-[10px] tracking-widest px-3 py-1"><?php echo esc_html($badge); ?></span>
        <?php endif; ?>
        <button type="button" class="absolute top-4 left-4 h-9 w-9 rounded-full glass flex items-center justify-center hover:bg-white" aria-label="<?php esc_attr_e('Add to wishlist', 'arqamweb'); ?>">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4" aria-hidden="true"><path d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5"/></svg>
        </button>
        <div class="absolute inset-x-4 bottom-4 translate-y-6 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
          <?php echo $atc; // phpcs:ignore WordPress.Security.EscapeOutput ?>
        </div>
      </div>
      <div class="p-5">
        <?php if ($cat) : ?><div class="text-[11px] tracking-[0.2em] text-muted-foreground"><?php echo esc_html($cat); ?></div><?php endif; ?>
        <h3 class="mt-2 font-display text-xl font-bold leading-snug"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($product->get_name()); ?></a></h3>
        <div class="mt-3 flex items-center justify-between">
          <div class="flex items-baseline gap-2">
            <span class="text-lg font-bold text-foreground"><?php echo wp_kses_post(wc_price($product->get_price())); ?></span>
            <?php if ($on_sale && $product->get_regular_price()) : ?>
              <span class="text-sm text-muted-foreground line-through"><?php echo wp_kses_post(wc_price($product->get_regular_price())); ?></span>
            <?php endif; ?>
          </div>
          <?php if ($rating > 0) : ?>
            <div class="flex items-center gap-1 text-xs text-muted-foreground">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-3.5 w-3.5 fill-[color:var(--gold)] text-[color:var(--gold)]" aria-hidden="true"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg>
              <?php echo esc_html(number_format_i18n($rating, 1)); ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </article>
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
        <span class="lv-bundle__save"><?php echo esc_html(__('وفّر', 'arqamweb') . ' ' . wp_strip_all_tags(wc_price($savings))); ?></span>
      <?php endif; ?>
      <a class="lv-bundle__media" href="<?php echo esc_url($link); ?>">
        <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($product->get_name()); ?>" loading="lazy">
      </a>
      <div class="lv-bundle__body">
        <h3 class="lv-bundle__name"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($product->get_name()); ?></a></h3>
        <?php if ($cat) : ?><p class="lv-bundle__sub"><?php echo esc_html($cat); ?></p><?php endif; ?>
        <div class="lv-bundle__foot">
          <?php echo lv_add_to_cart_link($product, 'lv-bundle__cta', esc_html(__('اطلب الآن', 'arqamweb'))); // phpcs:ignore ?>
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
 * Render a Radiance-style bundle card (dark section) from a WC_Product.
 * Same premium markup as the reference design, data from WooCommerce, and the
 * "اطلب الآن" button is a real AJAX add-to-cart.
 */
function lv_bundle_card_lux($product)
{
    if (!$product instanceof WC_Product) {
        return;
    }
    $id      = $product->get_id();
    $link    = get_permalink($id);
    $img     = has_post_thumbnail($id) ? get_the_post_thumbnail_url($id, 'woocommerce_thumbnail') : wc_placeholder_img_src();
    $reg     = (float) $product->get_regular_price();
    $sale    = (float) $product->get_price();
    $savings = ($product->is_on_sale() && $reg > $sale) ? ($reg - $sale) : 0;

    $sub = wp_strip_all_tags($product->get_short_description());
    $sub = $sub ? wp_trim_words($sub, 10) : lv_first_category_name($product);

    $atc = lv_add_to_cart_link(
        $product,
        'rounded-full bg-white text-[var(--navy-deep)] px-5 py-2.5 text-sm font-bold hover:shadow-glow transition-shadow',
        esc_html(__('اطلب الآن', 'arqamweb'))
    );
    ?>
    <article class="group relative glass-dark rounded-3xl p-6 hover:shadow-luxury transition-all overflow-hidden">
      <?php if ($savings > 0) : ?>
        <div class="absolute top-4 left-4 z-10 rounded-full bg-[color:var(--gold)] text-[var(--navy-deep)] text-[10px] font-bold px-3 py-1 tracking-widest"><?php echo esc_html(__('وفّر', 'arqamweb') . ' ' . wp_strip_all_tags(wc_price($savings))); ?></div>
      <?php endif; ?>
      <a href="<?php echo esc_url($link); ?>" class="block relative aspect-square rounded-2xl bg-gradient-to-br from-white/5 to-transparent overflow-hidden">
        <img alt="<?php echo esc_attr($product->get_name()); ?>" loading="lazy" class="block h-full w-full object-contain p-4 transition-transform duration-700 group-hover:scale-110" src="<?php echo esc_url($img); ?>">
      </a>
      <h3 class="mt-5 font-display text-2xl font-bold"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($product->get_name()); ?></a></h3>
      <?php if ($sub) : ?><p class="text-white/60 text-sm mt-1"><?php echo esc_html($sub); ?></p><?php endif; ?>
      <div class="mt-5 flex items-center justify-between">
        <div class="flex items-baseline gap-2">
          <span class="text-2xl font-bold text-[color:var(--gold)]"><?php echo wp_kses_post(wc_price($sale)); ?></span>
          <?php if ($savings > 0) : ?><span class="text-sm text-white/40 line-through"><?php echo wp_kses_post(wc_price($reg)); ?></span><?php endif; ?>
        </div>
        <?php echo $atc; // phpcs:ignore WordPress.Security.EscapeOutput ?>
      </div>
    </article>
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
