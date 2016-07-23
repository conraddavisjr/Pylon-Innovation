<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BPN - PHOTO GALLERY</title>
  <meta name="description" content="BPN Photo Gallery, photos from prior events" />
  <meta name="keywords" content="black professionals network, Event Photos, BPN Event Photos, Photo Gallery, bay area, Oakland, San Francisco" />
  <link rel="shortcut icon" href="favicon.ico">
  <!-- base styles -->
  <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->site?>compiled-dev/css/base.css" />
  <!-- menu styles -->
  <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->site?>compiled-dev/css/photo-gallery.css" />


  <!-- 
    Gather Data from the server and build it into JSON data 
  -->

  <script type="text/javascript">
    var postData = [ 
      <?php $posts = $page->children();
        // convert the posted event data to a JSON format 
        $id = 0;
        foreach($posts as $post) { 

          // gather location info
          $calendarStartDate = date('D, M j, Y', $post->date);
          $calendarStartTime = date('g a', $post->date);
          $calendarFinishDate = $post->finishdate;
          $calendarFinishTime = $post->finishdate;

          // If there is a finish date, then update the layout
          if($calendarFinishDate != ""){
            $calendarStartDate = date('M j', $post->date);
            $calendarFinishDate = "";
            $calendarFinishDate .= ' - ';
            $calendarFinishDate .= date('M j', $post->finshdate);
            $calendarFinishTime = date(' - g a', $post->finishdate);
          }

          // convert lng/lat to int
          $lngNum = $post->map->lng;
          $latNum = $post->map->lat;

          // $categoryId = $post->category;
          // $postCategory = $pages->get($categoryId)->title;

          // get each photo
          $photoCollection = "[";
          foreach($post->photos as $photo) {
            $photoCollection .= "'{$photo->url}',";
          }
          $photoCollection .= "],";

          $postData =  "{";
          $postData .=   "id:'{$id}',";
          $postData .=   "thumbnail:'{$post->thumbnail->url}',";
          $postData .=   "thumbnailAlt:'{$post->thumbnail}',";
          $postData .=   "title:'{$post->title}',";
          $postData .=   "date:'{$calendarStartDate}',";
          $postData .=   "finishDate:'{$calendarFinishDate}',";
          $postData .=   "startTime:'{$calendarStartTime}',";
          $postData .=   "finishTime:'{$calendarFinishTime}',";
          // $postData .=   "category:'{$postCategory}',";
          $postData .=   "photos:{$photoCollection}";
          $postData .=   "mapAddress:'{$post->map->address}',";
          $postData .=   "mapLat:'{$post->map->lat}',";
          $postData .=   "mapLng:'{$post->map->lng}',";
          $postData .=   "mapZoom:'{$post->map->zoom}'";
          $postData .= "},";

          echo $postData;
          $id ++;
        }
        // echo $jsonData;
      ?>
    ]; 

  </script>
  <!-- Google Maps API -->
  <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6gakQb9yrkZUYE0x7wiskgm4MP2unFgk">
  </script>
</head>

<body class="photoGalleryPg">
  <?php if($page->editable()) echo "<a class=\"admin-edit\" href='$page->editURL'>Edit</a>"; ?>

  <!-- Main container -->
  <?php include('includes/page-wrapper-top.php');?>
    <div class="events-container">
      <div class="figure-container">
        <div class="bounding-container">
          <!-- Ajax loaded content here -->
          
        </div>
      </div>
    </div><!-- /events-container -->
  <?php include('includes/page-wrapper-bottom.php');?>
  <!-- /Main container -->

  <!-- Photo Gallery container -->
  <div class="photo-gallery-perspective">
    <div class="photo-gallery-container">
      <div class="grid-icon"><i class="fa fa-file-image-o"></i>Thumbnail view</div>
      <div class="photo-gallery-close-btn">CLOSE</div>
      <div class="click-fields">
        <div id="left-field" class="fa fa-chevron-left"></div>
        <div id="right-field" class="fa fa-chevron-right"></div>
      </div>
      <div class="thumbnails-group"></div>
      <div class="main-image"><img src=""></div>
    </div>
  </div>
  <!-- /Photo Gallery container -->

  <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->site?>compiled-dev/css/font-awesome.min.css">
  <script type="text/javascript" src="<?php echo $config->urls->site?>compiled-dev/js/lib/modernizr.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
  <script src="<?php echo $config->urls->site?>compiled-dev/js/events.js"></script>
  <script type="text/javascript" src="<?php echo $config->urls->site?>compiled-dev/js/lib/classie.js"></script>
  <script type="text/javascript" src="<?php echo $config->urls->site?>compiled-dev/js/nav.js"></script>

  <script>
    (function() {

      // load the Teaser content

      loadPostData();

      function loadPostData() {
        // output the teasers
        for (var i = 0; i < postData.length; i++) {
          $('.figure-container .bounding-container').append(
          '<figure class="teaser" content-id="' + postData[i].id + '">' +
            '<div class="image-container">' + 
              '<img src="' + postData[i].thumbnail + '" alt="' + postData[i].thumbnailAlt + '"/>' +
              // '<div class="event-category">' + postData[i].category + '</div>' +
            '</div>' +
            '<figcaption>' +
              '<h2>' + postData[i].title + '</h2>' +
              '<p class="date">' + '<i class="fa fa-calendar"></i>' + postData[i].date + postData[i].finishDate + '</p>' +
              '<p class="time">' + '<i class="fa fa-clock-o"></i>' + postData[i].startTime + postData[i].finishTime + '</p>' +
              '<p class="address">' + '<i class="fa fa-map-marker"></i>' + postData[i].mapAddress + '</p>' +
            '</figcaption>' +
          '</figure>');
        }
      }
    })();
  </script>

</body>

</html>