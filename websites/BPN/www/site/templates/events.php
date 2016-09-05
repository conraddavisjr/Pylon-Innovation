<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BPN - EVENTS</title>
  <meta name="description" content="BPN EVENTs" />
  <meta name="keywords" content="black professionals network, Events, BPN Events, bay area, Oakland, San Francisco" />
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
          $postSummary = preg_replace( "/\r|\n/", "<br>", $post->summary );
          // Handle calendar dates and times

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

          // determine if the rate is free or charge
          $eventPrice = $post->event_price;
          if($eventPrice == ''){
            $eventPrice = 'FREE';
          }

          // $categoryId = $post->category;
          // $postCategory = $pages->get($categoryId)->title;

          // get each photo
          $photoCollection = "[";
          foreach($post->photos as $photo) {
            $cycledPhoto = "['{$photo->url}',";
            $photoCollection .= $cycledPhoto;
            $photoCollection .= "'{$photo->size(150, 0)->url}',";
            $photoCollection .= "'{$photo->size(400, 0)->url}'],";
          }
          $photoCollection .= "],";

          $postData =  "{";
          $postData .=   "id:'{$id}',";
          $postData .=   "thumbnail:'{$post->thumbnail->url}',";
          $postData .=   "thumbnailAlt:'{$post->thumbnail}',";
          $postData .=   "title:'{$post->title}',";
          $postData .=   "summary:'{$postSummary}',";
          $postData .=   "details:'{$postDetails}',";
          $postData .=   "date:'{$calendarStartDate}',";
          $postData .=   "finishDate:'{$calendarFinishDate}',";
          $postData .=   "startTime:'{$calendarStartTime}',";
          $postData .=   "finishTime:'{$calendarFinishTime}',";
          // $postData .=   "category:'{$postCategory}',";
          $postData .=   "eventPrice:'{$eventPrice}',";
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

<body class="eventsPg">
  <?php if($page->editable()) echo "<a class=\"admin-edit\" href='$page->editURL'>Edit</a>"; ?>

  <!-- Main container -->
  <?php include('includes/page-wrapper-top.php');?>
    <div class="events-container">
      <!-- <div id="filter-nav">
        <li>All</li>
        <li>Volunteer Oportunities</li>
        <li>Socials</li>
      </div>   -->
      <div class="figure-container">
        <div class="bounding-container">
          <!-- <div class="filter">
            <i>Filter Icon</i>
          </div> -->
        </div>
      </div>
      <div class="content">
        <!-- Ajax loaded content here -->
        <!-- article detailed view -->
        <article class="article-details">
          <div class="bounding-container">
            <div class="image-copy-container">
              <div class="close-content-btn fa fa-times"></div>
              <img class="post-image" src="">
              <div class="article-copy">
                <h2 class="post-title"></h2>
                <p class="post-details"></p>
                <div class="post-logistics">
                  <div class="post-date">
                    <p>Date</p>
                    <div class="date"><i class="fa fa-calendar"></i><span class="info"></span></div>
                  </div>
                  <div class="post-time">
                    <div class="time"><i class="fa fa-clock-o"></i><span class="info"></span></div>
                  </div>
                  <div class="post-address">
                    <p>Address</p>
                    <div class="address"><i class="fa fa-map-marker"></i><span class="info"></span></div>
                  </div>
                  <div class="post-price">
                    <div class="price"><span class="info"></span></div>
                  </div>
                  <!-- <div class="add-to-cal">
                    <span class="addtocalendar atc-style-blue">
                      <var class="atc_event">
                        <var class="atc_date_start"></var>
                        <var class="atc_date_end"></var>
                        <var class="atc_timezone"></var>
                        <var class="atc_title"></var>
                        <var class="atc_description">u</var>
                        <var class="atc_location"></var>
                        <var class="atc_organizer"></var>
                        <var class="atc_organizer_email"></var>
                      </var>
                    </span>
                  </div> -->
                </div>
                <div class="photo-gallery-teaser">
                  <div class="image"></div>
                </div>
              </div>
            </div>
            <div id="map"></div>
            <div class="social-sharing-container"><span>SHARE:</span><div class="social-sharing"></div></div>
            <div class="close-details"><i class="fa fa-arrow-left"></i>Back to events listing</div>
          </div>
        </article> <!-- article-details -->
      </div><!-- content -->
    </div><!-- /events-container -->
  <?php include('includes/page-wrapper-bottom.php');?>
  <?php include('includes/contact-form.php');?>
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
  <script type="text/javascript">
    // set fadeIn to global 
    function fadeIn(obj) {
      $(obj).fadeIn(1000);
    }
  </script>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.4/TweenMax.min.js"></script>
  <script src="<?php echo $config->urls->site?>compiled-dev/js/teaser-zoom.js"></script>
  <script src="<?php echo $config->urls->site?>compiled-dev/js/events.js"></script>
  <script type="text/javascript" src="<?php echo $config->urls->site?>compiled-dev/js/lib/classie.js"></script>
  <script type="text/javascript" src="<?php echo $config->urls->site?>compiled-dev/js/nav.js"></script>
  <script type="text/javascript" src="<?php echo $config->urls->site?>compiled-dev/js/contact.js"></script>

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
              '<img src="' + postData[i].photos[i][2] + '" alt="' + postData[i].thumbnailAlt + '"/>' +
              // '<div class="event-category">' + postData[i].category + '</div>' +
            '</div>' +
            '<figcaption>' +
              '<h2>' + postData[i].title + '</h2>' +
              '<p class="summary">' + postData[i].summary + '</p>' +
              '<p class="date">' + '<i class="fa fa-calendar"></i>' + postData[i].date + postData[i].finishDate + '</p>' +
              '<p class="time">' + '<i class="fa fa-clock-o"></i>' + postData[i].startTime + postData[i].finishTime + '</p>' +
              '<p class="address">' + '<i class="fa fa-map-marker"></i>' + postData[i].mapAddress + '</p>' +
              '<p class="event-price">' + postData[i].eventPrice + '</p>' +
            '</figcaption>' +
          '</figure>');
        }
      }
    })();
  </script>

  <!-- Social sharing -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.2.1/jssocials.min.js"></script>
  <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.2.1/jssocials.css" />  
  <script type="text/javascript" src="<?php echo $config->urls->site?>compiled-dev/js/social-sharing.js"></script>

  <!-- Load the Add to Calendar Widget -->
  <!-- <link href="http://addtocalendar.com/atc/1.5/atc-style-blue.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" charset="UTF-8" async="" src="http://addtocalendar.com/atc/1.5/atc.min.js"></script> -->
  
</body>

</html>
