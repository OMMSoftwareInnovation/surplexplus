<!doctype html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset='utf-8'>

<head>
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

	<!-- META ===================================================== -->
	<title>Smooth Products Demo</title>
	<meta name="description" content="A lightweight and dead simple lightbox script">

	<!-- Favicon  ========================================== -->
	<link rel="icon" href="favicon.ico">

	<!-- CSS ====================================================== -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/smoothproducts.css">
	<!-- Demo CSS (don't use) -->
	<style type="text/css">
	body,
	html {
		padding: 0px;
		margin: 0px;
		background: #fff;
		font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
		font-weight: 300;
	}
	.page {
		padding: 5px 30px 30px 30px;
		max-width: 800px;
		margin: 0 auto;
		font-family: "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
		background: #fff;
		color: #555;
	}
	img {
		border: none;
	}
	a:link,
	a:visited {
		color: #F0353A;
	}
	a:hover {
		color: #8C0B0E;
	}
	ul {
		overflow: hidden;
	}
	pre {
		background: #333;
		padding: 10px;
		overflow: auto;
		color: #BBB7A9;
	}
	.button {
		text-decoration: none;
		color: #F0353A;
		border: 2px solid #F0353A;
		padding: 6px 10px;
		display: inline-block;
		font-size: 18px;
	}
	.button:hover {
		background: #F0353A;
		color: #fff;
	}
	.demo {
		text-align: center;
		padding: 30px 0
	}
	.clear {
		clear: both;
	}
	h1 {
		font-size: 2em;
		line-height: 1.5em;
		margin: 20px 0;
		font-weight: normal;
	}



	</style>

</head>

<body>
	<br>
	<div class="page">

		<h1>Smooth Products</h1>

	
		<div class="sp-wrap">
			<?php
                          $str = $productdata[0]['product_imgs'];
                          $img = explode(",",$str);
                          for ($i=1; $i <count($img) ; $i++)
                          {
                        ?>

			<a href="<?php echo base_url(); ?>files/<?php echo $img[$i]; ?>" target="_blank"><img src="<?php echo base_url(); ?>files/<?php echo $img[$i]; ?>" alt=" " /></a>
<?php }?>
		</div>

		A jQuery product image viewer by <a href="http://kthornbloom.com">Kevin Thornbloom</a>.
		<br><br>
		<ul>
			<li>Easy to use</li>
			<li>Easy to style</li>
			<li>Responsive</li>
			<li>Handles different image sizes</li>
			<li>'Quick zoom' on hover with mouse</li>
			<li>Handles multiple instances on one page</li>
		</ul>

		<a href="http://github.com/kthornbloom/Smoothproducts" class="button" target="_blank">Download & Docs</a>
	</div>
	<br>
	<!-- JS ======================================================= -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/smoothproducts.min.js"></script>
	<script type="text/javascript">
	/* wait for images to load */
	$(window).load(function() {
		$('.sp-wrap').smoothproducts();
	});
	</script>

</body>

</html>
