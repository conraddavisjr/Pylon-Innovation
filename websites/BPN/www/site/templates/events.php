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
      <!-- content bucket -->
      <!-- <div class="teaser teaser--current" data-content="content-1">
        <div class="teaser__mover">
          <div class="zoomer flex-center">
            <img class="zoomer__image" src="<?php echo $config->urls->assets?>/images/iphone.png" alt="iPhone" />
            <div class="preview">
              <img src="<?php echo $config->urls->assets?>/images/iphone-content-preview.png" alt="iPhone app preview" />
              <div class="zoomer__area zoomer__area--size-2"></div>
            </div>
          </div>
        </div>
        <h2 class="teaser__title"><span>The Classy</span> iPhone 6</h2>
      </div> -->
      <figure class="effect-terry">
        <img src="<?php echo $config->urls->assets?>/images/16.jpg" alt="img16"/>
        <figcaption>
          <h2>Noisy <span>Terry</span></h2>
          <p>
            <a href="#"><i class="fa fa-fw fa-download"></i></a>
            <a href="#"><i class="fa fa-fw fa-heart"></i></a>
            <a href="#"><i class="fa fa-fw fa-share"></i></a>
            <a href="#"><i class="fa fa-fw fa-tags"></i></a>
          </p>
        </figcaption>     
      </figure>
      <!-- Ajax loaded content here -->
    </div>
  </div>
  <!-- /view -->
  <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->site?>compiled-dev/css/font-awesome.min.css">
  <script type="text/javascript" src="<?php echo $config->urls->site?>compiled-dev/js/lib/modernizr.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
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
