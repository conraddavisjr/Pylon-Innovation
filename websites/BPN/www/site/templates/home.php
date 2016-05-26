<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>BPN - HOME</title>
		<meta name="description" content="A simple grid layout with an initial fullscreen intro" />
		<meta name="keywords" content="fullscreen image, grid layout, flexbox grid, transition" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/normalize.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $config->urls->site?>compiled-dev/css/intro.css" />
		<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<?php if($page->editable()) echo "<p><a href='$page->editURL'>Edit</a></p>"; ?>


		<!-- Intro container -->

		<div class="intro">
			<div class="intro__content">
				<div class="intro__content__loader clearfix">
					<div class="bar orbit"></div>
					<div class="bar bar-rotate rotate-loader"></div>
				</div>
				<div class="intro__content__bpn-logo"><img src="<?php echo $config->urls->assets?>/images/BPN-Logo.png" alt="BPN-logo"/></div>
			</div>		
		</div>

		<!-- Intro container (END)-->

		<div id="home-pg" class="container">
			<section class="items-wrap">
				<a href="#" class="item">
					<img class="item__image" src="<?php echo $config->urls->assets?>/images/item04.jpg" alt="item04"/>
					<h2 class="item__title">Crucial</h2>
				</a>
				<a href="#" class="item">
					<img class="item__image" src="<?php echo $config->urls->assets?>/images/item05.jpg" alt="item05"/>
					<h2 class="item__title">Awe-inspiring</h2>
				</a>
				<a href="#" class="item">
					<img class="item__image" src="<?php echo $config->urls->assets?>/images/item06.jpg" alt="item06"/>
					<h2 class="item__title">Serene</h2>
				</a>
				<a href="#" class="item">
					<img class="item__image" src="<?php echo $config->urls->assets?>/images/item07.jpg" alt="item07"/>
					<h2 class="item__title">Vulnerable</h2>
				</a>
				<a href="#" class="item">
					<img class="item__image" src="<?php echo $config->urls->assets?>/images/item08.jpg" alt="item08"/>
					<h2 class="item__title">Bountiful</h2>
				</a>
				<a href="#" class="item">
					<img class="item__image" src="<?php echo $config->urls->assets?>/images/item09.jpg" alt="item09"/>
					<h2 class="item__title">Endangered</h2>
				</a>
			</section>
		</div><!-- /container -->
	</body>

	<!-- Load in scripts and styles after the HTML -->
	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.4/TweenMax.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/home-grid.css" />
	<script type="text/javascript" src="<?php echo $config->urls->site?>compiled-dev/js/intro.min.js"></script>
</html>
