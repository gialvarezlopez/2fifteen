<!DOCTYPE html>
<html lang="en">
	<head>


		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

		<?php wp_head(); ?>

		<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.svg">

		<?php echo get_field('ga_head_code', 'option'); // Google Analytics - Head code ?>

		<?php echo get_field('gtm_head', 'option'); //Google tag Manager - Head code?>
		
		<?php echo get_field('sg_content_facebook_verification', 'option')['code']; //Facebook Verification Code -  Head code?>

</head>
<body>
	<?php echo get_field('gtm_body', 'option'); //Google tag Manager - Body code?>
	<div id="overlayLoading">
		<div class="lds-ring"><div></div><div></div><div></div><div></div></div>
	</div>
	
	
	


	

	


	

 	


