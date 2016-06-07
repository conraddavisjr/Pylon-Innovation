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
		<link rel="stylesheet" type="text/css" href="<?php echo $config->urls->site?>compiled-dev/css/base.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $config->urls->site?>compiled-dev/css/intro.css" />
		<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<?php if($page->editable()) echo "<a class=\"admin-edit\" href='$page->editURL'>Edit</a>"; ?>

		<?php include('includes/page-wrapper-top.php');?>

			<button id="showMenu">Show Menu</button> <!-- Nav Button -->

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

			<div id="home-pg">
				<section class="items-wrap">
					<a id="about-link" href="#" class="item">
						<img class="item__image" src="<?php echo $config->urls->assets?>/images/imgIdeas/grpConvoModified.jpg" alt="grpConvoModified"/>
						<h2 class="item__title">About Us</h2>
					</a>
					<a href="#" class="item">
						<img class="item__image" src="<?php echo $config->urls->assets?>/images/imgIdeas/eventsPortal.jpg" alt="item05"/>
						<h2 class="item__title">Events</h2>
					</a>
					<a href="#" class="item">
						<img class="item__image" src="<?php echo $config->urls->assets?>/images/imgIdeas/galleryPortalModified.jpg" alt="item06"/>
						<h2 class="item__title">Gallery</h2>
					</a>
					<a href="#" class="item">
						<img class="item__image" src="<?php echo $config->urls->assets?>/images/imgIdeas/newsPortalModified.jpg" alt="item07"/>
						<h2 class="item__title">News</h2>
					</a>
					<a href="#" class="item">
						<img class="item__image" src="<?php echo $config->urls->assets?>/images/imgIdeas/bpnExp.jpg" alt="bpnExp"/>
						<h2 class="item__title">BPN Experience</h2>
					</a>
				</section>
			</div><!-- /home-pg -->
		<?php include('includes/page-wrapper-bottom.php');?>
	</body>

	<!-- Load in scripts and styles after the HTML -->
	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.4/TweenMax.min.js"></script>

	<script type="text/javascript" src="<?php echo $config->urls->site?>compiled-dev/js/lib/modernizr.js"></script>
	<script type="text/javascript" src="<?php echo $config->urls->site?>compiled-dev/js/lib/classie.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/home-grid.css" />

	<script type="text/javascript" src="<?php echo $config->urls->site?>compiled-dev/js/intro.min.js"></script>
	<script type="text/javascript" src="<?php echo $config->urls->site?>compiled-dev/js/nav.js"></script>
</html>
