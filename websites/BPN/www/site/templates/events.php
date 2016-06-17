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

  <script type="text/javascript">
    var postData = [ 
      <?php $posts = $page->children();
          // convert the posted event data to a JSON format 
          $id = 0;
          foreach($posts as $post) { 

            $postDetails = preg_replace( "/\r|\n/", "<br>", $post->details );

            $postData =  "{";
            $postData .=   "id:'{$id}',";
            $postData .=   "thumbnail:'{$post->thumbnail->url}',";
            $postData .=   "thumbnailAlt:'{$post->thumbnail}',";
            $postData .=   "title:'{$post->title}',";
            $postData .=   "subtitle:'{$post->subtitle}',";
            $postData .=   "details:'{$postDetails}',";
            $postData .=   "photos:'{$post->photos->url}',";
            $postData .=   "mapAddress:'{$post->map->address}',";
            $postData .=   "mapLat:'{$post->map->lat}',";
            $postData .=   "mapLng:'{$post->map->lng}',";
            $postData .=   "mapZoom:'{$post->map->zoom}'";
            $postData .= "},";

            $jsonData .= $postData;
            $id ++;
          }
          echo $jsonData;
      ?>
    ]; 

  </script>
  <!-- Google Maps API -->
  <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6gakQb9yrkZUYE0x7wiskgm4MP2unFgk">
  </script>
</head>

<body class="eventsPg">
  <?php if($page->editable()) echo "<a class=\"admin-edit\" href='$page->editURL'>Edit</a>"; ?>

  <!-- Main container -->
  <?php include('includes/page-wrapper-top.php');?>
    <button id="showMenu">Show Menu</button> <!-- Nav Button -->

    <div class="events-container">
      <div id="filter-nav">
        <li>All</li>
        <li>Volunteer Oportunities</li>
        <li>Socials</li>
      </div>  
      <div class="figure-container">
        <div class="bounding-container"></div>
      </div>
      <div class="content">
        <!-- Ajax loaded content here -->
        <!-- article detailed view -->
        <article class="article-details">
          <img class="post-image" src="">
          <div class="close-content-btn"></div>
          <div class="article-copy">
            <h2 class="post-title"></h2>
            <h3 class="post-subtitle"></h3>
            <p class="post-details"></p>
          </div>
          <div id="map"></div>
        </article>
      </div><!-- detailed content -->
    </div><!-- /events-container -->
  <?php include('includes/page-wrapper-bottom.php');?>


  <!-- /view -->
  <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->site?>compiled-dev/css/font-awesome.min.css">
  <script type="text/javascript" src="<?php echo $config->urls->site?>compiled-dev/js/lib/modernizr.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.4/TweenMax.min.js"></script>
  <script src="<?php echo $config->urls->site?>compiled-dev/js/teaser-zoom.js"></script>
  <script type="text/javascript" src="<?php echo $config->urls->site?>compiled-dev/js/lib/modernizr.js"></script>
  <script type="text/javascript" src="<?php echo $config->urls->site?>compiled-dev/js/lib/classie.js"></script>
  <script type="text/javascript" src="<?php echo $config->urls->site?>compiled-dev/js/nav.js"></script>

  <script>
    (function() {

      // load the content

      loadPostData();

      function loadPostData() {
        // output the teasers
        for (var i = 0; i < postData.length; i++) {
          $('.figure-container .bounding-container').append(
          '<figure class="teaser" content-id="' + postData[i].id + '">' +
            '<img src="' + postData[i].thumbnail + '" alt="' + postData[i].thumbnailAlt + '"/>' +
            '<figcaption>' +
              '<h2>' + postData[i].title + '</h2>' + 
              '<p>' + 
                '<a href="#"><i class="fa fa-fw fa-download"></i></a>' + 
                '<a href="#"><i class="fa fa-fw fa-heart"></i></a>' +
                '<a href="#"><i class="fa fa-fw fa-share"></i></a>' +
                '<a href="#"><i class="fa fa-fw fa-tags"></i></a>' +
              '</p>' +
            '</figcaption>' +
          '</figure>');
        }
      }
    })();
  </script>
</body>

</html>
