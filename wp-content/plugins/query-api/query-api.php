<?php
/**
 * Plugin Name: Query APIs
 * Plugin URI: localhost:8080/wpsite/plugin/query-api
 * Description: This Plugin working with External API calls
 * Author: Archana Nagrulkar
 * Author URI: https://woocommerce.com/
 * Version:1.0
 * Requires at least:1.0
 * Tested up to:1.0
 * WC requires at least: 2.6
 * WC tested up to: 1.0
 * Text Domain: woocommerce-query-api
 * Domain Path: /languages
 *
 */

defined('ABSPATH') or die( 'Unathorised Access!' );

add_action("admin_init","callback_function_name");

function callback_function_name(){

	echo "Hello World - test admin url external api call here";

//	$url = 'http://jsonplaceholder.typicode.com/users';
//
//    $arguments= array(
//						'method'=>"GET"
//					);

//	$url = 'https://authdev.cloudatron.com/oauthserver/oauth2/token';
//	$body= array(
//		"grant_type" => "authorization_code"
//	);
//	$headers=array(
//		"Accept" => "application/json",
//		"Content-Type" => "application/x-www-form-urlencoded",
//		'Authorization'=> "Basic eXR4YTlwcGF3cGh3eXpyYXhxcm4zdXhnOk4zdDNEbnlLanJuZzl4aGtCbnB3REN3dA=="
//	);
//
//	$arguments= array(
//		'body'        => $body,
//		'method'      => "POST",
//		'headers'     => $headers
//
//	);

	// checking for get URL
//
//	$url = "https://develop-tron-archananagrulkar-php56.cloudatron.com/api/v2/order/98375405";
//	$body= array(
//		"grant_type" => "authorization_code"
//	);
//	$headers=array(
//		"Content-Type" => "application/json",
//		"API-Key" => "ytxa9ppawphwyzraxqrn3uxg",
//		'Authorization'=> "Bearer 1c5c41e7e8364875a7ab918ab9800e45"
//	);
//
//	$arguments= array(
//		'body'        => $body,
//		'method'      => "GET",
//		'headers'     => $headers
//
//	);
//
//    $response = wp_remote_get($url,$arguments);
//
//	if(is_wp_error( $response) ) {
//		$error_message = $response->get_error_message();
//		echo "Something went wrong: $error_message ";
//	   };
//
//	echo '<pre>';
//	var_dump(wp_remote_retrieve_body($response));
//	echo "</pre>";

// post Data Testing

	$data='{
   	"customer": {
        "firstName": "TEST Shopper",
        "lastName": "test",
        "email": "archana.nagrulkar@kibocommerce.com",
        "phone1": "4162200199123"
    },
    "externalOrderID": "02334631_354345",
    "orderComment": "All steps via API",
	"manufacturerID": 15569,
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
                "firstName": "test ",
                "lastName": "etss ",
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

	$url = "https://develop-tron-archananagrulkar-php56.cloudatron.com/api/v2/createOrder/";
	$body= $data;
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