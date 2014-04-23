 <?php
	include 'stripe-php-1.13.0/lib/Stripe.php';
	include 'lib/save_user.php';




	// // Get the credit card details submitted by the form
	// $token = $_POST['stripeToken'];
	// $amount = (int) $_POST['amount'];
	// $coupon = false;

	// // Set your secret key: remember to change this to your live secret key in production
	// // See your keys here https://manage.stripe.com/account
	// Stripe::setApiKey("sk_test_49mt7Hf62BECXYbMN9sUCTlw");

	// if(isset($_POST['coupon']) && $_POST['coupon'] !== ''){
	// 	$COUPON_ID = $_POST['coupon'];
		
	// 	if($COUPON_ID)
	// 		$coupon = Stripe_Coupon::retrieve($COUPON_ID);
		

	// 	if($coupon)
	// 		if($coupon->percent_off){
	// 			$percent = $amount * ($coupon->percent_off / 100);
	// 			$amount = $amount - $percent;
	// 		}else if($coupon->amount_off){
	// 			$amount = $amount - $coupon->amount_off;
	// 		}	
	// }
	
	
	// if(isset($_POST['plan'])){
	// 	$cust = array(
	// 	  "card" => $token,
	// 	  "plan" => $_POST['plan'],
	// 	  "email" => $_POST['email'],
	// 	);

	// 	if(isset($_POST['coupon']) && $_POST['coupon'] !== '')
	// 		$cust["coupon"] = $coupon;

	// 	$customer = Stripe_Customer::create($cust);


	// 	header( 'Location: index.php' ) ;
	// 	return;
	// }

	
	// // Create the charge on Stripe's servers - this will charge the user's card
	// try {
	// 	$customer = Stripe_Customer::create(array(
	// 	  "email" => $_POST['email'],
	// 	  "card" => $token 
	// 	));
	// 	$charge = Stripe_Charge::create(array(
	// 	  "amount" => $amount, // amount in cents, again
	// 	  "currency" => "eur",
	// 	  "customer" => $customer->id,
	// 	  "description" => 'Charge for directory'
	// 	));

	// } catch(Stripe_CardError $e) {
	//   echo $e;
	// }
	// // echo $charge;

	// header( 'Location: index.php' ) ;