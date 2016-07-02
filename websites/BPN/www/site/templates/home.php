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
	<body class="wipe-off">
		<?php if($page->editable()) echo "<a class=\"admin-edit\" href='$page->editURL'>Edit</a>"; ?>

		<?php include('includes/page-wrapper-top.php');?>

			<button id="showMenu">Show Menu</button> <!-- Nav Button -->

			<!-- Intro container -->
			<div class="intro-cover"></div>
			<div class="intro">
				<div class="intro__content">
					<div class="intro__content__loader clearfix">
						<div class="bar orbit"></div>
						<div class="bar bar-rotate rotate-loader"></div>
					</div>
					<!-- BPN LOGO -->
					<div class="intro__content__bpn-logo"><img src="<?php echo $config->urls->assets?>/images/BPN-Logo.png" alt="BPN-logo"/></div>
					<!-- Logo Slogan -->
					<div class="slogan">
						<h2>BLACK PROFESSIONALS NETWORK</h2>
						<h3>Slogan goes here</h3>
						<a href="#<?php //echo $pages->get("/events")->url; ?>"><div class="register">Register for membership</div></a>
					</div>
				</div>		
			</div>
			<!-- Intro container (END)-->

			<div id="home-pg">
				<section id="welcome-frame">
					<video autoplay loop type="video/mp4" src="<?php echo $config->urls->assets?>/videos/SF-bridge.mp4">Your browser does not support the video tag.</video>
				</section>
				<section id="about-frame">
					<div class="copy-container">
						<h2>We All Have Limitless Potential</h2>
						<h3>To Achieve Our Dreams & Change the World</h3>
						<p>BPN or Black Professionals Network is a premier networking platform targeting Silicon Valley’s young top talent of diverse backgrounds, think of us as the Apollo for diverse professional talent. We highlight diverse professionals that are doing great work in Silicon Valley while also combating the negative imagery seen in mainstream media. BPN connects Entrepreneurs with Venture Capitalists, premier tech talent with primer tech companies, and community leaders with like minded individuals. Last year we partnered with leaders at Salesforce, Accenture, Uber, LinkedIn, Visa, Yahoo, Kapor Center, Buildup VC and New York Life to produce this event.</p>
					</div>
				</section>
				<section id="events-frame">
					<div class="section-title"><span class="center-copy">BPN EVENTS</span></div>
					<div class="bounding-container">
						<div class="hp-events-teaser hp-events-teaser--category1">
							<div class="category"><span class="center-copy">Art & <br> culture nights</span></div>
							<div class="image-container"></div>
						</div>
						<div class="hp-events-teaser hp-events-teaser--category2">
							<div class="category"><span class="center-copy">Dinner & <br> cocktail parties</span></div>
							<div class="image-container"></div>
						</div>
						<div class="hp-events-teaser hp-events-teaser--category3">
							<div class="category"><span class="center-copy">Presentations & <br> speaker events</span></div>
							<div class="image-container"></div>
						</div>
						<div class="hp-events-teaser hp-events-teaser--category4">
							<div class="category"><span class="center-copy">Film screenings</span></div>
							<div class="image-container"></div>
						</div>
						<div class="hp-events-teaser hp-events-teaser--category5">
							<div class="category"><span class="center-copy">Health & Wellness</span></div>
							<div class="image-container"></div>
						</div>
						<div class="hp-events-teaser hp-events-teaser--category6">
							<div class="category"><span class="center-copy">Trips & Getaways</span></div>
							<div class="image-container"></div>
						</div>
						<div class="hp-events-teaser hp-events-teaser--category7">
							<div class="category"><span class="center-copy">Theatre & <br> musical performance</span></div>
							<div class="image-container"></div>
						</div>
						<div class="hp-events-teaser hp-events-teaser--category8">
							<div class="category"><span class="center-copy">Outdoor Events</span></div>
							<div class="image-container"></div>
						</div>
					</div> <!-- bounding-container -->
					<a href="<?php echo $pages->get("/events")->url; ?>"><div class="btn-cta">See our events</div></a>
				</section> <!-- events-frame -->

				<!-- photo gallery Frame -->
				<?php include('includes/home-gallery-grid.php');?>
				<!-- /photo gallery-frame -->

				<section id="contact-frame">
					<div class="social-icons-grid">
						<a class="fb"><img src="<?php echo $config->urls->assets?>/images/social-icons-fb.jpg"></a>
						<a class="ig"><img src="<?php echo $config->urls->assets?>/images/social-icons-ig.jpg"></a>
						<a class="in"><img src="<?php echo $config->urls->assets?>/images/social-icons-in.jpg"></a>
						<a class="tw"><img src="<?php echo $config->urls->assets?>/images/social-icons-tw.jpg"></a>
					</div>
					<div class="copy-container">
						<h2>Contact</h2>
						<h3>Lets get in touch</h3>
						
						<!-- Import Contact Form -->
						<?php echo $modules->get('SimpleContactForm')->render(); ?>
					</div>
				</section><!-- /contact-frame -->
			</div><!-- /home-pg -->
		<?php include('includes/page-wrapper-bottom.php');?>
	</body>

	<!-- Load in scripts and styles after the HTML -->
	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.4/TweenMax.min.js"></script>
	<script type="text/javascript" src="<?php echo $config->urls->site?>compiled-dev/js/lib/modernizr.js"></script>
	<script type="text/javascript" src="<?php echo $config->urls->site?>compiled-dev/js/lib/classie.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo $config->urls->site?>compiled-dev/css/homePg.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $config->urls->site?>compiled-dev/css/home-gallery-grid.css" />

	<script type="text/javascript" src="<?php echo $config->urls->site?>compiled-dev/js/intro.min.js"></script>
	<script type="text/javascript" src="<?php echo $config->urls->site?>compiled-dev/js/nav.js"></script>
</html>
