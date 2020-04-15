<?php
	require_once "stripe-php-lib/init.php";
	require_once "products.php";

	$stripeDetails = array(
		"secretKey" => "sk_test_A3eyrP2CFFywD0NGlUNpqa5Z00EMsWdRiH",
		"publishableKey" => "pk_test_tmzbM08gNSpRZkxnwgmVPWjc000Y6gWsrm"
	);

	// Set your secret key: remember to change this to your live secret key in production
	// See your keys here: https://dashboard.stripe.com/account/apikeys
	\Stripe\Stripe::setApiKey($stripeDetails['secretKey']);
?>
