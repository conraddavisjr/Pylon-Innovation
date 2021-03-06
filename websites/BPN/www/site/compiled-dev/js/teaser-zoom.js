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
      this.$articleDetails = $('.article-details');
      this.$closeContentBtn = $('.close-content-btn, .close-details');

      //post detail elements
      this.$postTitle = $('.post-title', this.$articleDetails);
      this.$postSubtitle = $('.post-subtitle', this.$articleDetails);
      this.$postDetails = $('.post-details', this.$articleDetails);
      this.$photoGalleryTeaserImage = $('.photo-gallery-teaser .image', this.$articleDetails);
      this.$postAddress = $('.address .info', this.$articleDetails);
      this.$postDate = $('.date .info', this.$articleDetails);
      this.$postTime = $('.time .info', this.$articleDetails);
      this.$postPrice = $('.price .info', this.$articleDetails);

      // add to calendar elements
      this.$atcb_item = $('.atcb-item a');
      this.$atc_date_start = $('.atc_date_start');
      this.$atc_date_end = $('.atc_date_end');
      this.$atc_title = $('.atc_title');
      this.$atc_description = $('.atc_description');
      this.$atc_location = $('.atc_location');
      this.$atc_timezone = $('.atc_timezone')
      this.$atc_organizer_email = $('.atc_organizer_email');

      // var
      this.styles = [
        {
          featureType: "all",
          stylers: [
            { hue: "#097ABB" },
            { saturation: 0 }
          ]
        },{
          featureType: "road.arterial",
          elementType: "geometry",
          stylers: [
            { hue: "#00ffee" },
            { saturation: 50 }
          ]
        },{
          featureType: "poi.business",
          elementType: "labels",
          stylers: [
            { visibility: "off" }
          ]
        }
      ];
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
      
      // teaser dimensions
      teaserZoom.teaserProperties = teaser.getBoundingClientRect();
      teaserZoom.innerHeight = $(teaser).innerHeight();
      teaserZoom.innerWidth = $(teaser).innerWidth();

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
        .fromTo(teaser, 1, {left: teaserZoom.teaserProperties.left, top: teaserZoom.teaserProperties.top, width:teaserZoom.innerWidth, height: teaserZoom.teaserProperties.height, scale:1}, {left: 0, top: 0, width:'100vw', height:'100%', scale:2, ease: Power1.easeOut}, "-=0.8")
        .to($article, 0.5, {opacity: 1, visibility: 'visible'}, "-=0.5")
        .to(teaser, 0, {visibility: 'hidden', display: 'none !important', position: 'fixed'})

      // // populate the detailed article
      teaserZoom.teaserId = $(teaser).attr('content-id');

      // populate the map if we're on the events page
      if ($('body').hasClass('eventsPg')){
        teaserZoom.initMap();
      }

      // 
      // Add detailed content to the Overlay
      // 
      teaserZoom.$postTitle.html(postData[teaserZoom.teaserId].title);
      teaserZoom.$postSubtitle.html(postData[teaserZoom.teaserId].subtitle);
      teaserZoom.$postDetails.html(postData[teaserZoom.teaserId].details);

      // check if theres a photo galery for this post
      if (postData[teaserZoom.teaserId].photos.length <= 0){
        // if theres no image, disable the image teaser to set it to upcoming
        $('.photo-gallery-teaser .image').html('<img src="/site/assets/images/BPN-Logo.jpg">' +
          '<h4>' + 'There are no images here yet, check back soon or' + '</h4>' +
          '<p>' + '<div class="sign-up">Sign up</div>' + '</p>' +
          '<h4>' + 'to get an alert when this is posted!' + '</h4>'
        )
        $('.photo-gallery-teaser').attr('has-gallery', 'false');
      }else{
        // post the image and its gallery with an id
        teaserZoom.$photoGalleryTeaserImage.html('<h3>' + 'Photo Gallery' + '</h4>' + 
          '<img src="' + postData[teaserZoom.teaserId].photos[0][1] + '">'
          //'<h4>' + 'View the Photos for this event' + '</h4>'
        )
        $('.photo-gallery-teaser').attr('has-gallery', 'true');

        var $photoGalleryTeaser = $('.photo-gallery-teaser', teaserZoom.$articleDetails);
        $photoGalleryTeaser.attr('id', postData[teaserZoom.teaserId].id);
      }
      teaserZoom.$postDate.html(postData[teaserZoom.teaserId].date + postData[teaserZoom.teaserId].finishDate);
      teaserZoom.$postTime.html(postData[teaserZoom.teaserId].startTime + postData[teaserZoom.teaserId].finishTime);
      teaserZoom.$postAddress.html(postData[teaserZoom.teaserId].mapAddress);
      teaserZoom.$postPrice.html(postData[teaserZoom.teaserId].eventPrice);
      teaserZoom.$articleImg.attr('src', postData[teaserZoom.teaserId].thumbnail)

      // update the add to calender details
      var addCalURL = 'http://addtocalendar.com/atc/ical?utz=-420&uln=en-US&vjs=1.5&e[0]' + 
      '[date_start]=' + postData[teaserZoom.teaserId].calendarDate + '[0]' +
      '[date_end]=' + postData[teaserZoom.teaserId].calendarDate + '[0]' + 
      '[timezone]=' + 'Pacific%2Easter[0]' + 
      '[title]=' + postData[teaserZoom.teaserId].title + '[0]' + 
      '[description]=Summary%20goes%20here&e[0]' + 
      '[location]=San%20Fransisco&e[0]' + 
      '[organizer]=&e[0]' + 
      '[organizer_email]=conraddavisjr%40msn.com'

      teaserZoom.$atcb_item.attr('href', addCalURL);

      // teaserZoom.$atc_date_start.html(postData[teaserZoom.teaserId].calendarDate);
      // teaserZoom.$atc_date_end.html(postData[teaserZoom.teaserId].calendarDate);
      // teaserZoom.$atc_title.html(postData[teaserZoom.teaserId].title);
      // teaserZoom.$atc_description.html(postData[teaserZoom.teaserId].summary);
      // teaserZoom.$atc_location.html(postData[teaserZoom.teaserId].mapAddress);
      // teaserZoom.$atc_timezone.html('Europe/London');
      // teaserZoom.$atc_organizer_email.html('conraddavisjr@msn.com');

      // 
      // /Add detailed content to the Overlay (END)
      // 

      // hold off on article view animation until the image loads in
      teaserZoom.$articleImg.on('load', function() {
        setTimeout(function(){
          teaserZoom.$articleImg.addClass('fade-in');
          teaserZoom.$articleCopy.addClass('fade-in');
        }, 500);
      });

    },

    closeContent: function(){
      // remove the addToCal reference
      // $('.addToCalendarScript').remove();

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
        .to($(teaserZoom.currentTeaser), 0.3, {top: 0, height: teaserZoom.innerHeight}, "-=2");

      $(teaserZoom.currentTeaser).css({'left': 0, 'top': 0});
      teaserZoom.$teaser.css({
          'left': 0,
          'top': 0
        });
    },

    initMap: function(){
      // convert the coords to integers
      var lat = parseFloat(postData[teaserZoom.teaserId].mapLat);
      var lng = parseFloat(postData[teaserZoom.teaserId].mapLng);
      var myLatLng = {lat: lat, lng: lng};

      var map;
      map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 16,
        scrollwheel: false
      });

      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Hello World!'
      });
      map.setOptions({styles: teaserZoom.styles});
    }
  }// teaserZoom Module (END)
  
  // initilize this function
  teaserZoom.init();
});