<?php
/**
 * Plugin Name: Worldline Payment For Woocommerce
 * Plugin URI: https://wordpress.org/plugins/woocommerce-gateway-stripe/
 * Description: This Plugin allows local content for payment
 * Author: WooCommerce
 * Author URI: https://woocommerce.com/
 * Version:1.0
 * Requires at least:1.0
 * Tested up to:1.0
 * WC requires at least: 2.6
 * WC tested up to: 1.0
 * Text Domain: woocommerce-worldline-gateway
 * Domain Path: /languages
 *
 */

if(! in_array('woocommerce/woocommerce.php',apply_filters('active_plugins',get_option('active_plugins'))))
	return;

add_action('plugins_loaded','worldline_payment_init',11);

function worldline_payment_init() {

	if( class_exists("WC_Payment_Gateway") ) {
		class WC_Worldline_pay_Gateway extends WC_Payment_Gateway {
			public function __construct() {
				$this->id = "worldline-payment";
				$this->icon = apply_filters('woocommerce_worldline_icon',plugins_url('/assets/images/icon.png',__FILE__));
				$this->has_fields = false;
				$this->method_title = __('Worldline Payment','woocommerce-worldline-gateway');
				$this->method_description = __('Worldline Local Content Payment System','woocommerce-worldline-gateway');
				$this->title = $this->get_option('title');
				$this->description = $this->get_option('description');
				$this->instructions = $this->get_option('instructions', $this->description);
				$this->init_form_fields();
				$this->init_settings();
				add_action("woocommerce_update_options_payment_gateways_". $this->id, array($this, 'process_admin_options'));
				//add_action("woocommerce_thank_you_".$this->id, array($this))

			}
			public function init_form_fields() {
				$this->form_fields = apply_filters('woo_worldline_payment',array(
					'enabled' => array(
						'title' => __('Enable/Disable',"woocommerce-worldline-gateway"),
						"type" => 'checkbox',
						'label' => __('Enable/Disable',"Enable or Disable worldline-gateway"),
						'default' => 'no'

					),
					'title' => array(
						'title' => __('Worldline Payment Gateway',"woocommerce-worldline-gateway"),
						"type" => 'text',
						'description' => __('Add a new title for the Worldline Payments Gateway when customer go to checkout page',"Enable or Disable worldline-gateway"),
						'default' => __('Worldline Payment Gateway',"woocommerce-worldline-gateway"),
						'desc_tip' => true

					),
					'Description ' => array(
						'title' => __('Worldline Payment Gateway Description',"woocommerce-worldline-gateway"),
						"type" => 'textarea',
						'description' => __('Add a new title for the Worldline Payments Gateway when customer go to checkout page',"Enable or Disable worldline-gateway"),
						'default' => __('Add a new title for the Worldline Payments Gateway when customer go to checkout page',"woocommerce-worldline-gateway"),
						'desc_tip' => true

					),
					'Instructions ' => array(
					'title' => __('Worldline Payment Gateway Description',"woocommerce-worldline-gateway"),
					"type" => 'textarea',
					'description' => __('Default Instructions',"Enable or Disable worldline-gateway"),
					'default' => __('Default Instructions',"woocommerce-worldline-gateway"),
					'desc_tip' => true

				)
				));
			}

			public function process_payment($order_id) {
				$order = wc_get_order($order_id);
				$order->update_status('pending-payment',__('Awaiting Worldline Payment','woocommerce-worldline-gateway'));

				$this->clear_payment_with_api();

				$order->reduce_order_stock();

				WC()->cart->empty_cart();
				//$order->payment_complete();

				// Return thank you page redirect.
				return array(
					'result'   => 'success',
					'redirect' => $this->get_return_url( $order ),
				);

			}

			public function clear_payment_with_api(){

				$url = "https://develop-tron-archananagrulkar-php56.cloudatron.com/api/v2/createOrder/";
				$body= $this->getJson();
				$headers=array(
					"Content-Type" => "application/json",
					"API-Key" => "ytxa9ppawphwyzraxqrn3uxg",
					'Authorization'=> "Bearer 282a6af1f3884ba2bdcddb609639550d"
				);

				$arguments= array(
					'body'        => $body,
					'method'      => "POST",
					'headers'     => $headers

				);

				$response = wp_remote_post($url,$arguments);

				if(is_wp_error( $response) ) {
					$error_message = $response->get_error_message();
					echo "Something went wrong: $error_message ";
				};

				echo '<pre>';
				var_dump(wp_remote_retrieve_body($response));
				echo "</pre>";


			}
			function getJson(){
				$data='{
   	"customer": {
        "firstName": "TEST Shopper",
        "lastName": "test",
        "email": "archana.nagrulkar@kibocommerce.com",
        "phone1": "4162200199123"
    },
    "externalOrderID": "02334631_{{$timestamp}}",
    "orderComment": "All steps via API",
	"manufacturerID": 11569,
    "catalogID": 0,
    "currency": "USD",
    "locale": "en-US",
    "orderItems": [{
        "product": {
            "productID": "S2721950_C128",
            "partNumber": "S2721950_C128_LGE",
            "name": "Lace Strapless Bra",
            "retailPrice": 3.6,
            "offerPrice": 3,
            "averageDealerMargin": 0.35,
            "availability": "Y",
            "imageUrl": "https:\/\/shift.imgix.net\/https%3A%2F%2Fproduction-matalanlive-assets.s3-eu-west-1.amazonaws.com%2Fuploads%2Fasset_file%2Fasset_file%2F228783%2F1560325611.1484973-S2721950_C128_Alt1.jpg?w=45&h=60&ixlib=js-1.1.0&s=d2192df950f3f0d8ae3cf4a59629dd5a"
        },
        "itemSpecifics": {
            "externalItemID": "101780",
            "options": {
                "Colour": "Blue",
                "Size": "Large"
            },
            "actualPrice": 3,
            "quantity": 1,
            "shipping": 4.13,
            "shippingTax": 0.82,
            "itemTaxOverride": 0.6,
            "customItemData": {
                "PRODUCT_IMAGE": "https:\/\/shift.imgix.net\/https%3A%2F%2Fproduction-matalanlive-assets.s3-eu-west-1.amazonaws.com%2Fuploads%2Fasset_file%2Fasset_file%2F228783%2F1560325611.1484973-S2721950_C128_Alt1.jpg?w=45&h=60&ixlib=js-1.1.0&s=d2192df950f3f0d8ae3cf4a59629dd5a",
                "email_iimg": "https:\/\/shift.imgix.net\/https%3A%2F%2Fproduction-matalanlive-assets.s3-eu-west-1.amazonaws.com%2Fuploads%2Fasset_file%2Fasset_file%2F228783%2F1560325611.1484973-S2721950_C128_Alt1.jpg?w=68&h=95&ixlib=js-1.1.0&s=da1e73b6fe354470e2a1cf33b0894403",
                "email_iqty": 1,
                "email_iupr": "3.60",
                "email_isubt": "3.60",
                "REPORTING_PROMOTION_TOTAL": "0.00",
                "REPORTING_MASTER_COLOUR": "Blue",
                "REPORTING_MAJOR_DEPT": "L",
                "REPORTING_DEPARTMENT": "L37",
                "SHIFT_META_PRODUCT_MASTER_COLOUR": "Blue",
                "SHIFT_META_VARIANT_SIZE": "Large",
                "SHIFT_ORDERED_QUANTITY": 1,
                "SHIFT_ORDERED_UNIT_PRICE": 3.6,
                "SHIFT_ORDERED_SUB_TOTAL": 3,
                "SHIFT_ORDERED_TAX": 0.6,
                "SHIFT_ORDERED_TAX_RATE": "20.00",
                "SHIFT_ORDERED_TOTAL": 3.6,
                "SHIFT_ITEM_ADJUSTED": false,
                "image_url": "https:\/\/shift.imgix.net\/https%3A%2F%2Fproduction-matalanlive-assets.s3-eu-west-1.amazonaws.com%2Fuploads%2Fasset_file%2Fasset_file%2F228783%2F1560325611.1484973-S2721950_C128_Alt1.jpg?w=45&h=60&ixlib=js-1.1.0&s=d2192df950f3f0d8ae3cf4a59629dd5a"
            }
        }
    }],
    "orderPayments": [{
        "paymentMethod": {
            "billingAddress": {
                "firstName": "Shannon ",
                "lastName": "Bratton ",
                "addressLine1": "9 Scholars Walk",
                "addressLine2": "",
                "addressLine3": "",
                "phone": "07856920431",
                "city": "Brigg",
                "postalCode": "DN20 8QS",
                "countryCode": "GB"
            },
          "paymentType": "CC",
        "cardIssuer": "VI",
        "cardNumber": "4111111111111111",
        "cardSecurityCode": "111",
        "cardExpiration": "12/2022",
        "paymentClass": "CreditCard"
        },
        "transactionID": "46866409EG237433N",
        "authorizationID": "2-3-19375976",
        "authAmount": 8.55
    }],
    "orderGift": {
        "recipient": "SHIFT_ORDER_STATUS",
        "message": "Submitted"
    },
    "shippingMethod": {
        "shipType": "EXPRESS_1_DAY",
        "deliveryMethod": "SHIP_TO_HOME"
    },
    "shippingAddress": {
        "firstName": "Shannon ",
        "lastName": "Bratton ",
        "addressLine1": "9 Scholars Walk",
        "addressLine2": "",
        "addressLine3": "",
        "phone": "07856920431",
        "city": "Brigg",
        "postalCode": "DN20 8QS",
        "countryCode": "GB"
    },
    "customerIP": "127.0.0.1",
    "forceItemTaxOverride": true,
    "customOrderData": {
        "IsGuestOrder": "No",
        "EMAIL_MARKETING_CONSENT": "No",
        "DM_MARKETING_CONSENT": "No",
        "REWARD_CARD_NUMBER": "",
        "email_ossku": "Next Day",
        "email_oship": "4.95",
        "email_otot": "8.55",
        "email_odisc": "0.00",
        "email_ostot": "3.60",
        "email_shipping_sku": "express_1_day",
        "email_order_timestamp": "2019-08-06T13:06:02Z",
        "website": "app.matalan.co.uk",
        "ORDER_CHANNEL": "WEB",
        "NOVA_GROSS_TOTAL": "8.55",
        "NOVA_TAX": "0.60",
        "NOVA_POSTAGE": "4.95",
        "NOVA_SHIPPING_NET": "4.12",
        "NOVA_SHIPPING_TAX": "0.83",
        "NOVA_SHIPPING_SKU": "NEXT DAY",
        "NOVA_SHIPPING_DESCRIPTION": "NEXT DAY",
        "FLEX_ORDER_DATE": "06\/08\/19 13:06",
        "FLEX_CUSTOMER_ID": "21326670",
        "SHIFT_CUSTOMER_ID": "21326670",
        "SHIFT_CUSTOMER_EMAIL": "archana.nagrulkar@kibocommerce.com",
        "SHIFT_CONTAINER_ID": "57875136",
        "SHIFT_SHIPPING_TOTAL": "4.95",
        "SHIFT_ORDERED_TOTAL": "8.55",
        "SHIFT_ORDERED_TAX": "0.60",
        "SHIFT_ORDERED_SUB_TOTAL": "7.95",
        "PAYMENT_METHOD_DETAIL": "CC",
        "ST_MASKED_PAN": "492181######6413",
        "ST_PAYMENT_TYPE": "DELTA"
    },
    "allowSplit": false,
    "isTestOrder": true,
    "sendEmail": false
}';
				return json_decode($data, true);
			}

		}
	}

}
add_filter("woocommerce_payment_gateways","add_to_woo_worldline_payment_gateway");

function add_to_woo_worldline_payment_gateway($gateways){
	$gateways[]='WC_Worldline_pay_Gateway';
 return $gateways;
}

