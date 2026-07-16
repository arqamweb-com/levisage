<?php

if (!defined('ARQAM_MIN_TOTAL_OUTSIDE_EG_USD')) {
    define('ARQAM_MIN_TOTAL_OUTSIDE_EG_USD', 50);
}

if (!defined('ARQAM_VISA_DISCOUNT_EGP')) {
    define('ARQAM_VISA_DISCOUNT_EGP', 50);
}

if (!defined('ARQAM_INSTAPAY_VODAFONE_DISCOUNT_EGP')) {
    define('ARQAM_INSTAPAY_VODAFONE_DISCOUNT_EGP', 35);
}

/** 
 * Add SVG To WordPress 
 */
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
    $filetype = wp_check_filetype($filename, $mimes);
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
}
add_action('admin_head', 'fix_svg');


// Add WEBP To WordPress
function webp_upload_mimes($existing_mimes)
{
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes');

function webp_is_displayable($result, $path)
{
    if ($result === false) {
        $displayable_image_types = array(IMAGETYPE_WEBP);
        $info = @getimagesize($path);
        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }
    return $result;
}
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);


/** 
 * Remove Postal Code From WooCommerce Checkout 
 */
add_filter('woocommerce_checkout_fields', 'QuadLayers_remove_billing_postcode_checkout');
function QuadLayers_remove_billing_postcode_checkout($fields)
{
    // Make phone field required
    $fields['billing']['billing_phone']['required'] = true;

    // Remove Postal Code 
    unset($fields['billing']['billing_postcode']);
    return $fields;
}

function disable_shipping_calc_on_cart($show_shipping)
{
    if (is_cart()) {
        return false;
    }
    return $show_shipping;
}
add_filter('woocommerce_cart_ready_to_calc_shipping', 'disable_shipping_calc_on_cart', 99);


// Free shipping to specific Category

// Function to check if any product in the cart belongs to a specific category
function is_product_in_category_in_cart($category_id)
{
    $cart = WC()->cart->get_cart();

    foreach ($cart as $cart_item) {
        $product_id = $cart_item['product_id'];
        if (has_term($category_id, 'product_cat', $product_id)) {
            return true;
        }
    }

    return false;
}

// Function to conditionally remove shipping cost if any product belongs to a specific category
function conditionally_remove_shipping_cost_for_category($rates)
{
    $original_category_id = 44; // Original category ID in the default language

    // Get the translated category ID
    if (function_exists('icl_object_id')) {
        $specific_category_id = icl_object_id($original_category_id, 'product_cat', true);
    } else {
        $specific_category_id = $original_category_id; // Fallback if WPML is not active
    }

    if (is_product_in_category_in_cart($specific_category_id)) {
        // Loop through the shipping rates and set the cost to 0
        foreach ($rates as $rate_id => $rate) {
            $rates[$rate_id]->cost = 0;
            if (isset($rates[$rate_id]->taxes) && is_array($rates[$rate_id]->taxes)) {
                foreach ($rates[$rate_id]->taxes as $key => $tax) {
                    $rates[$rate_id]->taxes[$key] = 0;
                }
            }
        }
    }

    return $rates;
}

// Hook into WooCommerce to modify shipping rates
add_filter('woocommerce_package_rates', 'conditionally_remove_shipping_cost_for_category', 10, 2);

/**
 * add Badge 
 * Display Fields
 */

add_action(
    'woocommerce_product_options_general_product_data',
    'woo_add_custom_fields'
);


function woo_add_custom_fields()
{
    global $woocommerce, $post;

    echo '<div class="options_group">';

    // Display Woocommerce product badge box in product edit page
    woocommerce_wp_text_input([
        'id' => '_text_field',
        'label' => __('Badge text', 'woocommerce'),
        'placeholder' => 'Enter your badge text here',
        'desc_tip' => 'true',
        'description' => __('Enter your badge text here', 'woocommerce'),
    ]);
    echo '</div>';
}


// Save Fields
add_action('woocommerce_process_product_meta', 'woo_add_custom_fields_save');


function woo_add_custom_fields_save($post_id)
{
    // Text Field
    $woocommerce_text_field = $_POST['_text_field'];
    if (!empty($woocommerce_text_field)) {
        update_post_meta(
            $post_id,
            '_text_field',
            esc_attr($woocommerce_text_field)
        );
    } else {
        update_post_meta($post_id, '_text_field', '');
    }
}

// Display Woocommerce product badge with custom text in single product page
add_action(
    'woocommerce_single_product_summary',
    'display_custom_field_value',
    7
);
function display_custom_field_value()
{
    $value = get_post_meta(get_the_ID(), '_text_field', true);
    if (strlen($value) != null && strlen($value) > 0) {
        echo '<div class="custom-badge">' .
            get_post_meta(get_the_ID(), '_text_field', true) .
            '</div>';
    }
}

// New badge for recent products in product shop
add_action('woocommerce_before_shop_loop_item_title', 'display_custom_field_value', 3);

// fix datalayer

function custom_add_to_cart_script()
{
?>
    <script type="text/javascript">
        jQuery(function($) {
            $(document.body).on('added_to_cart', function(event, fragments, cart_hash, $button) {
                var product_id = $button.data('product_id');
                var product_name = $button.data('product_name'); // Ensure this data attribute exists
                var product_price = $button.data('product_price'); // Ensure this data attribute exists

                dataLayer.push({
                    'event': 'addToCart',
                    'ecommerce': {
                        'currencyCode': 'EG', // Use your store currency
                        'add': {
                            'products': [{
                                'name': product_name,
                                'id': product_id,
                                'price': product_price,
                                'quantity': 1
                            }]
                        }
                    }
                });

                console.log('Product added to cart: ', product_id, product_name, product_price);
            });
        });
    </script>
    <?php
}
add_action('wp_footer', 'custom_add_to_cart_script');

function add_custom_data_attributes_to_cart_button($button, $product)
{
    $button = str_replace('data-product_id', 'data-product_id="' . $product->get_id() . '" data-product_name="' . $product->get_name() . '" data-product_price="' . $product->get_price() . '" data-product_id', $button);
    return $button;
}
add_filter('woocommerce_loop_add_to_cart_link', 'add_custom_data_attributes_to_cart_button', 10, 2);
add_filter('woocommerce_product_add_to_cart_url', 'add_custom_data_attributes_to_cart_button', 10, 2);


function track_product_detail_view()
{
    if (is_product()) {
        global $product;
    ?>
        <script type="text/javascript">
            dataLayer.push({
                'event': 'contentView',
                'ecommerce': {
                    'detail': {
                        'products': [{
                            'name': '<?php echo $product->get_name(); ?>',
                            'id': '<?php echo $product->get_id(); ?>',
                            'price': '<?php echo $product->get_price(); ?>',
                            'category': '<?php echo $product->get_category_ids(); ?>'
                        }]
                    }
                }
            });
        </script>
    <?php
    }
}
add_action('wp_footer', 'track_product_detail_view');

function track_view_cart()
{
    if (is_cart()) {
    ?>
        <script type="text/javascript">
            dataLayer.push({
                'event': 'viewCart'
            });
        </script>
    <?php
    }
}
add_action('wp_footer', 'track_view_cart');


function track_initiate_checkout()
{
    if (is_checkout() && !is_order_received_page()) {
    ?>
        <script type="text/javascript">
            dataLayer.push({
                'event': 'initiateCheckout'
            });
        </script>
    <?php
    }
}
add_action('wp_footer', 'track_initiate_checkout');

function track_purchase_event($order_id)
{
    $order = wc_get_order($order_id);
    $items = $order->get_items();
    $products = [];

    foreach ($items as $item) {
        $product = $item->get_product();
        $products[] = [
            'name' => $product->get_name(),
            'id' => $product->get_id(),
            'price' => $product->get_price(),
            'quantity' => $item->get_quantity()
        ];
    }

    ?>
    <script type="text/javascript">
        dataLayer.push({
            'event': 'purchase',
            'ecommerce': {
                'purchase': {
                    'actionField': {
                        'id': '<?php echo $order->get_order_number(); ?>',
                        'affiliation': 'Online Store',
                        'revenue': '<?php echo $order->get_total(); ?>',
                        'tax': '<?php echo $order->get_total_tax(); ?>',
                        'shipping': '<?php echo $order->get_shipping_total(); ?>'
                    },
                    'products': <?php echo json_encode($products); ?>
                }
            }
        });
    </script>
<?php
}
add_action('woocommerce_thankyou', 'track_purchase_event');

function arqam_gateway_groups()
{
    return [
        'visa'              => ['paytabs_all'],
        'instapay_vodafone' => ['instapay', 'vodafone_cash'],
        'cod'               => ['cod'],
    ];
}

function arqam_get_checkout_country()
{
    $country = '';

    if (WC()->customer) {
        $country = WC()->customer->get_billing_country();
        if (!$country) {
            $country = WC()->customer->get_shipping_country();
        }
    }

    if (!$country && !empty($_POST['post_data'])) {
        $posted_data = [];
        parse_str(wp_unslash($_POST['post_data']), $posted_data);

        if (!empty($posted_data['billing_country'])) {
            $country = sanitize_text_field($posted_data['billing_country']);
        } elseif (!empty($posted_data['shipping_country'])) {
            $country = sanitize_text_field($posted_data['shipping_country']);
        }
    }

    if (!$country && !empty($_POST['billing_country'])) {
        $country = sanitize_text_field(wp_unslash($_POST['billing_country']));
    }

    if (!$country && !empty($_POST['shipping_country'])) {
        $country = sanitize_text_field(wp_unslash($_POST['shipping_country']));
    }

    if (!$country && class_exists('WC_Geolocation')) {
        $location = WC_Geolocation::geolocate_ip();
        $country  = $location['country'] ?? '';
    }

    return strtoupper($country);
}

function arqam_get_selected_payment_method()
{
    $method = WC()->session ? WC()->session->get('chosen_payment_method') : '';

    if (!$method && !empty($_POST['payment_method'])) {
        $method = sanitize_text_field(wp_unslash($_POST['payment_method']));
    }

    if (!$method && !empty($_POST['post_data'])) {
        $posted_data = [];
        parse_str(wp_unslash($_POST['post_data']), $posted_data);
        if (!empty($posted_data['payment_method'])) {
            $method = sanitize_text_field($posted_data['payment_method']);
        }
    }

    return $method;
}

function arqam_is_usd_checkout_currency()
{
    return strtoupper(get_woocommerce_currency()) === 'USD';
}


add_filter('woocommerce_available_payment_gateways', 'arqam_filter_payment_gateways_by_country', 20);
function arqam_filter_payment_gateways_by_country($gateways)
{
    if ((is_admin() && !wp_doing_ajax()) || defined('REST_REQUEST')) {
        return $gateways;
    }

    $country = arqam_get_checkout_country();
    if ($country === 'EG' || !$country) {
        return $gateways;
    }

    $groups = arqam_gateway_groups();
    $outside_egypt_hidden_ids = array_merge($groups['cod'], $groups['instapay_vodafone']);

    foreach ($outside_egypt_hidden_ids as $gateway_id) {
        unset($gateways[$gateway_id]);
    }

    return $gateways;
}

add_action('woocommerce_cart_calculate_fees', 'arqam_apply_checkout_discounts', 20);
function arqam_apply_checkout_discounts($cart)
{
    if (is_admin() && !defined('DOING_AJAX')) {
        return;
    }

    $country = arqam_get_checkout_country();
    if ($country !== 'EG') {
        return;
    }

    $payment_method = arqam_get_selected_payment_method();
    if (!$payment_method) {
        return;
    }

    $groups = arqam_gateway_groups();

    if (in_array($payment_method, $groups['visa'], true)) {
        $cart->add_fee(esc_html__('Visa Discount', 'arqam-web'), -ARQAM_VISA_DISCOUNT_EGP);
        return;
    }

    if (in_array($payment_method, $groups['instapay_vodafone'], true)) {
        $cart->add_fee(esc_html__('InstaPay & Vodafone Discount', 'arqam-web'), -ARQAM_INSTAPAY_VODAFONE_DISCOUNT_EGP);
        return;
    }

}

add_action('woocommerce_checkout_process', 'arqam_validate_outside_egypt_minimum_order');
function arqam_validate_outside_egypt_minimum_order()
{
    $country = arqam_get_checkout_country();
    if ($country === 'EG' || !arqam_is_usd_checkout_currency()) {
        return;
    }

    $cart_total = WC()->cart ? (float) WC()->cart->get_total('edit') : 0;

    if ($cart_total < ARQAM_MIN_TOTAL_OUTSIDE_EG_USD) {
        wc_add_notice(
            sprintf(
                /* translators: 1: minimum amount, 2: currency code */
                esc_html__('Minimum order total outside Egypt is %1$s %2$s.', 'arqam-web'),
                number_format_i18n(ARQAM_MIN_TOTAL_OUTSIDE_EG_USD, 2),
                'USD'
            ),
            'error'
        );
    }
}

function arqam_render_discount_banner()
{
    $country = arqam_get_checkout_country();

    if ($country === 'EG') {
        $visa_discount = number_format_i18n(ARQAM_VISA_DISCOUNT_EGP);
        $instapay_discount = number_format_i18n(ARQAM_INSTAPAY_VODAFONE_DISCOUNT_EGP);
        $message = sprintf(
            /* translators: 1: visa discount amount, 2: instapay/vodafone discount amount */
            esc_html__('Save %1$s EGP on Visa or %2$s EGP on InstaPay & Vodafone.', 'arqam-web'),
            $visa_discount,
            $instapay_discount
        );
    } else {
        $message = sprintf(
            /* translators: 1: minimum order amount */
            esc_html__('Outside Egypt: minimum order total is %1$s USD.', 'arqam-web'),
            number_format_i18n(ARQAM_MIN_TOTAL_OUTSIDE_EG_USD, 2)
        );
    }

    echo '<div class="arqam-discount-banner">' . esc_html($message) . '</div>';
}

add_action('woocommerce_before_cart', 'arqam_render_discount_banner', 5);
add_action('woocommerce_before_checkout_form', 'arqam_render_discount_banner', 5);
add_action('wp_body_open', function () {
    if (is_front_page()) {
        arqam_render_discount_banner();
    }
}, 5);

add_action('woocommerce_review_order_before_payment', 'arqam_checkout_discount_guidance');
function arqam_checkout_discount_guidance()
{
    $country = arqam_get_checkout_country();

    if ($country === 'EG') {
        $payment_method = arqam_get_selected_payment_method();
        $groups = arqam_gateway_groups();

        if (in_array($payment_method, $groups['visa'], true)) {
            $guidance = sprintf(
                /* translators: 1: visa discount amount */
                esc_html__('Visa full payment discount: %1$s EGP.', 'arqam-web'),
                number_format_i18n(ARQAM_VISA_DISCOUNT_EGP)
            );
        } elseif (in_array($payment_method, $groups['instapay_vodafone'], true)) {
            $guidance = sprintf(
                /* translators: 1: instapay/vodafone discount amount */
                esc_html__('InstaPay & Vodafone payment discount: %1$s EGP.', 'arqam-web'),
                number_format_i18n(ARQAM_INSTAPAY_VODAFONE_DISCOUNT_EGP)
            );
        } else {
            $guidance = esc_html__('Select Visa, InstaPay, or Vodafone for exclusive discounts.', 'arqam-web');
        }

        echo '<div class="woocommerce-info arqam-payment-guidance">' . esc_html($guidance) . '</div>';
    } else {
        $guidance = sprintf(
            /* translators: 1: minimum amount */
            esc_html__('For orders outside Egypt, minimum checkout total is %1$s USD.', 'arqam-web'),
            number_format_i18n(ARQAM_MIN_TOTAL_OUTSIDE_EG_USD, 2)
        );

        echo '<div class="woocommerce-info arqam-payment-guidance">' . esc_html($guidance) . '</div>';
    }
}

add_action('wp_head', function () {
?>
    <style>
        .arqam-discount-banner {
            background: #f0f6ff;
            border: 1px solid #c6dbff;
            color: #11356f;
            font-size: 14px;
            font-weight: 600;
            padding: 12px 14px;
            text-align: center;
        }

        .arqam-payment-guidance {
            margin: 0 0 14px;
        }
    </style>
<?php
}, 20);

add_action('woocommerce_review_order_before_payment', function () {
?>
    <script>
        jQuery(function($) {
            $('form.checkout').on('change', 'input[name="payment_method"]', function() {
                $('body').trigger('update_checkout');
            });
        });
    </script>
<?php
});
