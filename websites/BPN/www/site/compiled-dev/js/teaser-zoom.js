// BPN Teaser Zoom effect
// Author: Conrad Davis Jr
// 
// Description: This file handles the Zoom effect of teasers on a page when they are clicked
// 

$(function() {

  var teaserZoom = {

    init: function(){
      this.elements();
      this.eventListeners();
    },

    elements: function(){
      this.$teaser = $('.teaser');
      this.$closeContentBtn = $('.close-content-btn');

      //post detail elements
      this.$postTitle = $('.post-title');
      this.$postSubtitle = $('.post-subtitle');
      this.$postDetails = $('.post-details');
      this.$photoGalleryTeaser = $('.photo-gallery-teaser .image');
      this.$postAddress = $('.address');
      this.$postDate = $('.date');
    },
    eventListeners: function(){
      this.$teaser.on('click', this.triggerZoom);
      this.$closeContentBtn.on('click', this.closeContent);
      this.$articleImg = $('.post-image');
      this.$articleCopy = $('.article-copy');
    },

    // Events

    // trigger teaser zoom and populate overlay content
    triggerZoom: function(e){
      teaserZoom.currentTeaser = e.currentTarget;
      var teaser = e.currentTarget;
      var $article = $('.article-details');
      
      teaserZoom.teaserProperties = teaser.getBoundingClientRect();

      teaserZoom.$teaser.css({
          'display': 'none',
          'left': teaserZoom.teaserProperties.left - ((teaserZoom.teaserProperties.width / 2) + 20), //the 20 is the margin (left and right)
          'top': teaserZoom.teaserProperties.top //the 20 is the margin (left and right)
        });
      $(teaser).addClass('open-up');

      // Run GSAP animation for teaser zoom feature
      // first fade the navigation menu out
      $('#nav-menu').fadeOut(500);
      teaserZoom.tl = new TimelineLite;
      teaserZoom.tl
        .to($('img', teaser), 0.8, {left:'200%'})
        .fromTo(teaser, 1, {left: teaserZoom.teaserProperties.left, top: teaserZoom.teaserProperties.top, width:'30%', height:'100%', scale:1}, {left: 0, top: 0, width:'100vw', height:'100%', scale:2, ease: Power1.easeOut}, "-=0.8")
        .to($article, 0.5, {opacity: 1, visibility: 'visible'}, "-=0.5")
        .to(teaser, 0, {visibility: 'hidden', display: 'none !important', position: 'fixed'})

      // // populate the detailed article
      var teaserId = $(teaser).attr('content-id');

      // populate the map if we're on the events page
      if ($('body').hasClass('eventsPg')){
        teaserZoom.initMap();
      }

      teaserZoom.$postTitle.html(postData[teaserId].title);
      teaserZoom.$postSubtitle.html(postData[teaserId].subtitle);
      teaserZoom.$postDetails.html(postData[teaserId].details);

      // check if theres a photo galery for this post
      if (postData[teaserId].photos.length <= 0){
        // if theres no image, disable the image teaser to set it to upcoming
        $('.photo-gallery-teaser .image').html('<img src="/lab/Pylon-Innovation/websites/BPN/www/site/assets/images/BPN-Logo.jpg">' +
          '<h4>' + 'There are no images here yet, check back soon or' + '</h4>' +
          '<p>' + '<div class="sign-up">Sign up</div>' + '</p>' +
          '<h4>' + 'to get an alert when this is posted!' + '</h4>'
        );
      }else{
        // post the image and its gallery
        teaserZoom.$photoGalleryTeaser.html('<img src="' + postData[teaserId].photos[0] + '">' +
          '<h4>' + 'View the Photo Gallery for this event' + '</h4>'
        );
      }
      teaserZoom.$postAddress.html(postData[teaserId].mapAddress);
      teaserZoom.$postDate.html(postData[teaserId].date);
      teaserZoom.$articleImg.attr('src', postData[teaserId].thumbnail)

      // hold off on article view animation until the image loads in
      teaserZoom.$articleImg.on('load', function() {
        setTimeout(function(){
          teaserZoom.$articleImg.addClass('fade-in');
          teaserZoom.$articleCopy.addClass('fade-in');
        }, 500);
      });

    },

    closeContent: function(){
      // reverse the animation upon closing the detailed article
      teaserZoom.tl.reverse();

      $(teaserZoom.currentTeaser).removeClass('open-up');
      teaserZoom.$articleImg.removeClass('fade-in');
      teaserZoom.$articleCopy.removeClass('fade-in');

      // fade the navigation menu back in
      $('#nav-menu').fadeIn(500);

      // animate the other teasers in after the article is closed
      tl = new TimelineLite;
      tl.fromTo($('.teaser'), 1, {opacity: 0, display: 'block', left: 0}, {opacity: 1, left: 0, delay: 1.1})
        .to($(teaserZoom.currentTeaser), 0.3, {top: 0}, "-=2");


      $(teaserZoom.currentTeaser).css({'left': 0, 'top': 0});
      teaserZoom.$teaser.css({
          'left': 0,
          'top': 0
        });
    },

    initMap: function(){
      var map;
      map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -34.397, lng: 150.644},
        zoom: 8,
        scrollwheel: false
      });
    }
  }// teaserZoom Module (END)
  
  // initilize this function
  teaserZoom.init();
});