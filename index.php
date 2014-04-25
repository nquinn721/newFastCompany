<!DOCTYPE html>
<?php
session_start();

if(isset($_SESSION['purchased'])){
	?>
	<script type="text/javascript">
	var purchased = true;
	</script>
	<?php
	unset($_SESSION['purchased']);
}else{
	?>
	<script type="text/javascript">
	var purchased = false;
	</script>
	<?php
}

//** clients 
// sk 
// sk_test_49mt7Hf62BECXYbMN9sUCTlw
// pk
// pk_test_skmrPuz95DEWkKuUN7hO8brj
?>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="https://checkout.stripe.com/v2/checkout.js"></script>
</head>
<body>
	<div class="splash none">
		<div class="purchased">
			<h1>Thanks for purchasing Directory!</h1>
			Please Check your email for link to download.
		</div>	
	</div>
	
	<div class="wrapper">
		<div class="top section">
			<div class="head"><h1>New Manufacturing	Research</h1></div>
			<div class="body col-md-8 col-md-offset-2">
				<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium hendrerit elit, nec elementum tortor interdum at. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium hendrerit elit, nec elementum tortor interdum</div>
				<div class="main-image">
					<img src="img/logo-large.jpg">
				</div>
			</div>
		</div>
		<div class="middle-top section" id="nav">
			<div class='mini-logo'>
				<img src="img/logo.jpg">
			</div>
			<div class='twitter'>
				<img src="img/twitter.jpg">
			</div>
		</div>
		<div class="middle-bottom section">
			<div class="col-md-6">
				<img src="img/paper.png" class='paper'>
			</div>
			<div class="col-md-6">
				<div class="title"><h3>Test Title</h3></div>
				<ul>
					<li>Lorem ipsum dolor sit amet</li>
					<li>Lorem ipsum dolor sit amet</li>
					<li>Lorem ipsum dolor sit amet</li>
					<li>Lorem ipsum dolor sit amet</li>
					<li>Lorem ipsum dolor sit amet</li>
					<li>Lorem ipsum dolor sit amet</li>
					<li>Lorem ipsum dolor sit amet</li>
				</ul>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium hendrerit elit, nec elementum tortor interdum at. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium hendrerit elit, nec elementum tortor interdum Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium hendrerit elit, nec elementum tortor interdum at. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium hendrerit elit, nec elementum tortor interdum Lorem ipsum dolor sit amet, consectetur </p>
			</div>	
		</div>
		<div class="bottom section">
			<!-- 4242 4242 4242 4242 -->
			<form action='pay.php' method="POST" class='col-md-12'>
				<div class='coupon row'>
					<div class="col-md-6 col-md-offset-3">
						If you were given a coupon code enter here
						<input name='coupon' placeholder='Coupon...' class='form-control'>	
					</div>
					
				</div>
				
				<div class="col-md-3">
					<div class="col-md-10 col-md-offset-1 package">
						<div class='head'>Directory</div>
						<div class="package-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium hendrerit elit, nec elementum tortor interdum at. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium hendrerit elit, nec elementum tortor interdum</div>
						<div class="package-bottom">
							<button id='directory' price='9500' plan='directory'> EUR &#8364; 95</button>		
						</div>
						
					</div>	
				</div>
				<div class="col-md-3">
					<div class="col-md-10 col-md-offset-1 package">
						<div class='head'>Individual</div>
						<div class="package-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium hendrerit elit, nec elementum tortor interdum at. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium hendrerit elit, nec elementum tortor interdum</div>
						<div class="package-bottom">
							<button id='individual' price='59500' plan='individual'> EUR &#8364; 595/yr</button>	
						</div>
						
					</div>
				</div>
				<div class="col-md-3">
					<div class="col-md-10 col-md-offset-1 package">
						<div class='head'>Company</div>
						<div class="package-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium hendrerit elit, nec elementum tortor interdum at. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium hendrerit elit, nec elementum tortor interdum</div>
						<div class="package-bottom">
							<button id='company' price='159500' plan='company'> EUR &#8364; 1595/yr</button>	
						</div>
						
					</div>
				</div>
				<div class="col-md-3">
					<div class="col-md-10 col-md-offset-1 package">
						<div class='head'>Enterprise</div>
						<div class="package-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium hendrerit elit, nec elementum tortor interdum at. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium hendrerit elit, nec elementum tortor interdum</div>
						<div class="package-bottom">
							<button id='enterprise' price='259500' plan='enterprise'> EUR &#8364; 2595/yr</button>	
						</div>
						
					</div>
				</div>
			</form>
		</div>
		<div class="footer">
			FOOTER
		</div>
	</div>
</body>

		<script type="text/javascript">
				$('button').on('click', function () {
					var price = $(this).attr('price');
					var plan = $(this).attr('plan');

					var token = function (res) {
						console.log(res);
						var token = $('<input>', {type : 'hidden', name : 'stripeToken', val : res.id})
						var p = $('<input>', {type : 'hidden', name : 'amount', val : price})
						var email = $('<input>', {type : 'hidden', name : 'email', val : res.email});
						console.log(email)
						if(plan !== 'directory')
							$('form').append($('<input>', {type : 'hidden', name : 'plan', val : plan}))
						$('form').append(p).append(token).append(email).submit(); 
					}


					StripeCheckout.open({
						key : 'pk_test_SxLXrzbxiAiTwnt8qiOW1agS',
						amount : Number(price),
						currency : 'eur',
						name : 'FastCompany',
						description : plan[0].toUpperCase() + plan.substring(1),
						panelLabel : 'Checkout',
						image : 'img/logo.jpg',
						token : token
					})

					return false;
				})
if(purchased){
	var purchase = $('.purchased');
	var splash = $('.splash');

	splash.css('height', $(document).height());

	purchase.css({
		left : ($(window).width() / 2) - 375,
		top : $(document).scrollTop() + ($(window).height() / 2 - purchase.height() / 2)
	})
	setTimeout(function () {
		splash.show();	
	}, 100)
	
	splash.on('click', function () {
	 	$(this).hide();
	})
}
</script>
<style type="text/css">
	.none{display: none;}
	.splash{
		background: rgba(0, 0 , 0, 0.5);
		position: absolute;
		z-index: 998;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
	}
	.purchased{
		background: white;
		border-radius: 5px;
		padding: 0 50px 50px;
		color: #555;
		position: absolute;
	}
</style>