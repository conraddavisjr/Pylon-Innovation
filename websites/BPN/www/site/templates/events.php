<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blueprint: Multi-Level Menu</title>
  <meta name="description" content="Blueprint: A basic template for a responsive multi-level menu" />
  <meta name="keywords" content="blueprint, template, html, css, menu, responsive, mobile-friendly" />
  <meta name="author" content="Codrops" />
  <link rel="shortcut icon" href="favicon.ico">
  <!-- base styles -->
  <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->site?>compiled-dev/css/base.css" />
  <!-- menu styles -->
  <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->site?>compiled-dev/css/events.css" />
</head>

<body>
  <?php if($page->editable()) echo "<a class=\"admin-edit\" href='$page->editURL'>Edit</a>"; ?>

  <!-- Main container -->
  <div class="container">
    <button class="action action--open" aria-label="Open Menu"><span class="icon icon--menu"></span></button>
    <nav id="ml-menu" class="menu">
      <button class="action action--close" aria-label="Close Menu"><span class="icon icon--cross"></span></button>
      <div class="menu__wrap">
        <ul data-menu="main" class="menu__level">
          <li class="menu__item"><a class="menu__link" data-submenu="submenu-1" href="#">Vegetables</a></li>
          <li class="menu__item"><a class="menu__link" data-submenu="submenu-2" href="#">Fruits</a></li>
          <li class="menu__item"><a class="menu__link" data-submenu="submenu-3" href="#">Grains</a></li>
          <li class="menu__item"><a class="menu__link" data-submenu="submenu-4" href="#">Mylk &amp; Drinks</a></li>
        </ul>
      </div>
    </nav>
    <div class="content">
      <p class="info">Please choose a category</p>
      <section class='slider'><div class='slide slide--current' data-content='content-1'><div class='slide__mover'><div class='zoomer flex-center'><img class='zoomer__image' src='<?php echo $config->urls->assets?>/images/iphone.png' alt='iPhone' /><div class='preview'><img src='<?php echo $config->urls->assets?>/images/iphone-content-preview.png' alt='iPhone app preview' /><div class='zoomer__area zoomer__area--size-2'></div></div></div></div><h2 class='slide__title'><span>The Classy</span> iPhone 6</h2></div><div class='slide' data-content='content-2'><div class='slide__mover'><div class='zoomer flex-center'><img class='zoomer__image' src='<?php echo $config->urls->assets?>/images/ipad.png' alt='iPad Mini' /><div class='preview'><img src='<?php echo $config->urls->assets?>/images/ipad-content-preview.png' alt='iPad Mini app preview' /><div class='zoomer__area zoomer__area--size-4'></div></div></div></div><h2 class='slide__title'><span>The Fantastic</span> iPad Mini</h2></div><div class='slide' data-content='content-3'><div class='slide__mover'><div class='zoomer flex-center'><img class='zoomer__image' src='<?php echo $config->urls->assets?>/images/macbook.png' alt='MacBook' /><div class='preview'><img src='<?php echo $config->urls->assets?>/images/macbook-content-preview.jpg' alt='MacBook app preview' /><div class='zoomer__area zoomer__area--size-3'></div></div></div></div><h2 class='slide__title'><span>The Amazing</span> MacBook</h2></div><div class='slide' data-content='content-4'><div class='slide__mover'><div class='zoomer flex-center'><img class='zoomer__image' src='<?php echo $config->urls->assets?>/images/imac.png' alt='iMac' /><div class='preview'><img src='<?php echo $config->urls->assets?>/images/imac-content-preview.jpg' alt='iMac app preview' /><div class='zoomer__area zoomer__area--size-5'></div></div></div></div><h2 class='slide__title'><span>The Glorious</span> iMac</h2></div><div class='slide' data-content='content-5'><div class='slide__mover'><div class='zoomer flex-center'><img class='zoomer__image' src='<?php echo $config->urls->assets?>/images/apple-watch.png' alt='Apple Watch' /><div class='preview rounded'><img src='<?php echo $config->urls->assets?>/images/apple-watch-content-preview.png' alt='Apple Watch app preview' /><div class='zoomer__area zoomer__area--size-1'></div></div></div></div><h2 class='slide__title'><span>The Fabulous</span> Apple Watch</h2></div><nav class='slider__nav'><button class='button button--nav-prev'><i class='icon icon--arrow-left'></i><span class='text-hidden'>Previous product</span></button><button class='button button--zoom'><i class='icon icon--zoom'></i><span class='text-hidden'>View details</span></button><button class='button button--nav-next'><i class='icon icon--arrow-right'></i><span class='text-hidden'>Next product</span></button></nav></section><!-- /slider--><section class='content'><div class='content__item' id='content-1'><img class='content__item-img rounded-right' src='<?php echo $config->urls->assets?>/images/iphone-content.png' alt='Apple Watch Content' /><div class='content__item-inner'><h2>The iPhone 6</h2><h3>Incredible performance for powerful apps</h3><p>Built on 64-bit desktop-class architecture, the new A8 chip delivers more power, even while driving a larger display. The M8 motion coprocessor efficiently gathers data from advanced sensors and a new barometer. And with increased battery life, iPhone 6 lets you do more, for longer than ever.</p><p><a href='https://www.apple.com/iphone-6/technology/'>Learn more about this technology &xrarr;</a></p></div></div><div class='content__item' id='content-2'><img class='content__item-img rounded-right' src='<?php echo $config->urls->assets?>/images/ipad-content.jpg' alt='iPad Mini Content' /><div class='content__item-inner'><h2>The iPad Mini</h2><h3>Desktop-class architecture without a desktop</h3><p>Don’t let its size fool you. iPad mini 3 is powered by an A7 chip with 64-bit desktop-class architecture. A7 delivers amazing processing power without sacriﬁcing battery life. So you get incredible performance in a device you can take with you wherever you go.</p><p><a href='https://www.apple.com/ipad-mini-3/performance/'>Learn more about Performance &xrarr;</a></p></div></div><div class='content__item' id='content-3'><img class='content__item-img rounded-right' src='<?php echo $config->urls->assets?>/images/macbook-content.jpg' alt='MacBook Content' /><div class='content__item-inner'><h2>The MacBook</h2><h3>It's the future of the notebook</h3><p>With the new MacBook, we set out to do the impossible: engineer a full-size experience into the lightest and most compact Mac notebook ever. That meant reimagining every element to make it not only lighter and thinner but also better. The result is more than just a new notebook. It's the future of the notebook.</p><p><a href='https://www.apple.com/macbook/design/'>Learn more about the design &xrarr;</a></p></div></div><div class='content__item' id='content-4'><img class='content__item-img rounded-right' src='<?php echo $config->urls->assets?>/images/imac-content.jpg' alt='iMac Content' /><div class='content__item-inner'><h2>The iMac</h2><h3>Engineered to the very last detail</h3><p>Every new Mac comes with Photos, iMovie, GarageBand, Pages, Numbers, and Keynote. So you can be creative with your photos, videos, music, documents, spreadsheets, and presentations right from the start. You also get great apps for email, surfing the web, sending texts, and making FaceTime calls — there’s even an app for finding new apps.</p><p><a href='https://www.apple.com/imac/built-in-apps/'>Learn more about the iMac's features &xrarr;</a></p></div></div><div class='content__item' id='content-5'><img class='content__item-img rounded-right' src='<?php echo $config->urls->assets?>/images/apple-watch-content.png' alt='Apple Watch Content' /><div class='content__item-inner'><h2>The Apple Watch</h2><h3>Entirely new ways to stay in touch</h3><p>Apple Watch makes all the ways you're used to communicating more convenient. And because it sits right on your wrist, it can add a physical dimension to alerts and notifications. For example, you’ll feel a gentle tap with each incoming message. Apple Watch also lets you connect with your favorite people in fun, spontaneous ways — like sending a tap, a sketch, or even your heartbeat. </p><p><a href='https://www.apple.com/watch/new-ways-to-connect/'>Learn more about new ways to connect &xrarr;</a></p></div></div><button class='button button--close'><i class='icon icon--circle-cross'></i><span class='text-hidden'>Close content</span></button></section>
      <!-- Ajax loaded content here -->
    </div>
  </div>
  <!-- /view -->
  <script type="text/javascript" src="<?php echo $config->urls->site?>compiled-dev/js/lib/modernizr.js"></script>
  <script src="<?php echo $config->urls->site?>compiled-dev/js/lib/classie.js"></script>
  <script src="<?php echo $config->urls->site?>compiled-dev/js/dummydata.js"></script>
  <script src="<?php echo $config->urls->site?>compiled-dev/js/filter-nav.min.js"></script>
  <script src="<?php echo $config->urls->site?>compiled-dev/js/item-zoom.js"></script>
  <script src="<?php echo $config->urls->site?>compiled-dev/js/lib/dynamics.min.js"></script>
  <script>
    (function() {
      var menuEl = document.getElementById('ml-menu'),
        mlmenu = new MLMenu(menuEl, {
          // breadcrumbsCtrl : true, // show breadcrumbs
          // initialBreadcrumb : 'all', // initial breadcrumb text
          backCtrl : false, // show back button
          // itemsDelayInterval : 60, // delay between each menu item sliding animation
          onItemClick: loadDummyData // callback: item that doesn´t have a submenu gets clicked - onItemClick([event], [inner HTML of the clicked item])
        });

      // mobile menu toggle
      var openMenuCtrl = document.querySelector('.action--open'),
        closeMenuCtrl = document.querySelector('.action--close');

      openMenuCtrl.addEventListener('click', openMenu);
      closeMenuCtrl.addEventListener('click', closeMenu);

      function openMenu() {
        classie.add(menuEl, 'menu--open');
      }

      function closeMenu() {
        classie.remove(menuEl, 'menu--open');
      }

      // simulate grid content loading
      var gridWrapper = document.querySelector('.content');

      function loadDummyData(ev, itemName) {
        ev.preventDefault();

        closeMenu();
        gridWrapper.innerHTML = '';
        classie.add(gridWrapper, 'content--loading');
        setTimeout(function() {
          classie.remove(gridWrapper, 'content--loading');
          gridWrapper.innerHTML = '<ul class="filter-items">' + dummyData[itemName] + '<ul>';
        }, 700);
      }
    })();
  </script>
</body>

</html>
