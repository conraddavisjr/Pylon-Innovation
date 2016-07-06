<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BPN - NEWS</title>
  <meta name="description" content="BPN NEWs" />
  <meta name="keywords" content="BPN NEWs, stories, local news, black professionals network" />
  <link rel="shortcut icon" href="favicon.ico">
  <!-- base styles -->
  <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->site?>compiled-dev/css/base.css" />
  <!-- menu styles -->
  <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->site?>compiled-dev/css/news.css" />

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
            $postData .=   "photos:'{$post->photos->url}'";
            $postData .= "},";

            echo $postData;

            $id ++;
          }
      ?>
    ]; 

  </script>
</head>

<body id="news-page">
  <?php if($page->editable()) echo "<a class=\"admin-edit\" href='$page->editURL'>Edit</a>"; ?>

  <!-- Main container -->
  <?php include('includes/page-wrapper-top.php');?>
    <div class="events-container"> 
      <div class="figure-container bounding-container"></div>
      <div class="content">
        <!-- Ajax loaded content here -->
        <!-- article detailed view -->
        <article class="article-details">
          <div class="image-container"><img class="post-image" src=""></div>
          <div class="close-content-btn fa fa-times"></div>
          <div class="article-copy">
            <h2 class="post-title"></h2>
            <h3 class="post-subtitle"></h3>
            <p class="post-details"></p>
          </div>
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

        for (var i = 0; i < postData.length; i++) {
          console.log('i: ', i);
          $('.figure-container').append(
          '<figure class="teaser" content-id="' + postData[i].id + '">' +
            '<img src="' + postData[i].thumbnail + '" alt="' + postData[i].thumbnailAlt + '"/>' +
            '<figcaption>' +
              '<h2>' + postData[i].title + '</h2>' + 
              '<div class="social-sharing"></div>' +
            '</figcaption>' +
          '</figure>');
        }
      }
    })();
  </script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.2.1/jssocials.min.js"></script>
  <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.2.1/jssocials.css" />  
  <script type="text/javascript" src="<?php echo $config->urls->site?>compiled-dev/js/social-sharing.js"></script>
  <script>
    // $("#sharing").jsSocials({
    //     logo: "fa fa-twitter",
    //     shareIn: "popup",
    //     shareUrl: "https://twitter.com/share?url={url}&text={HELLO THERE}&via={via}&hashtags={hashtags}",
    //     countUrl: "https://cdn.api.twitter.com/1/urls/count.json?url={url}&callback=?",
    //     shares: ["twitter"],
    //     getCount: function(data) {
    //         return data.count;
    //     }
    // });
  </script>
</body>

</html>
