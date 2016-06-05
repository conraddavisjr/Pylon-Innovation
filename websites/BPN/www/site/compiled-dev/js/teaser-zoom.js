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
      var $article = $('.content article');
      
      teaserZoom.teaserProperties = teaser.getBoundingClientRect();

      teaserZoom.$teaser.css({
          'display': 'none',
          'left': teaserZoom.teaserProperties.left - ((teaserZoom.teaserProperties.width / 2) + 20), //the 20 is the margin (left and right)
          'top': teaserZoom.teaserProperties.top //the 20 is the margin (left and right)
        });
      $(teaser).addClass('open-up');

      // Run GSAP animation for teaser zoom feature
      teaserZoom.tl = new TimelineLite;
      teaserZoom.tl
        .to($('img', teaser), 0.8, {left:'200%'})
        .fromTo(teaser, 1, {left: teaserZoom.teaserProperties.left, top: 0, width:'30%', height:'100%', scale:1}, {left: 0, top: 100, width:'100vw', height:'100%', scale:2, ease: Power1.easeOut}, "-=0.8")
      //   .to($article, 0.5, {opacity: 1, visibility: 'visible'}, "-=0.3")
      //   .to(teaser, 0, {visibility: 'hidden', display: 'none !important'})

      // // populate the detailed article
      // var teaserId = $(teaser).attr('content-id');

      // $('.post-title').html(eventData[teaserId].title);
      // $('.post-subtitle').html(eventData[teaserId].subtitle);
      // $('.post-details').html(eventData[teaserId].details);
      // teaserZoom.$articleImg.attr('src', eventData[teaserId].thumbnail)

      // // hold off on article view animation until the image loads in
      // teaserZoom.$articleImg.on('load', function() {
      //   // do whatever you want
      //   teaserZoom.$articleImg.addClass('fade-in');
      //   teaserZoom.$articleCopy.addClass('fade-in');
      // });

    },

    closeContent: function(){
      // reverse the animation upon closing the detailed article
      teaserZoom.tl.reverse();

      $(teaserZoom.currentTeaser).removeClass('open-up');
      teaserZoom.$articleImg.removeClass('fade-in');
      teaserZoom.$articleCopy.removeClass('fade-in');

      tl = new TimelineLite;
      tl.fromTo($('.teaser'), 1, {opacity: 0, display: 'block', left: 0}, {opacity: 1, left: 0, delay: 1.1});

      $(teaserZoom.currentTeaser).css('left', 0);
    }
  }
  
  // initilize this function
  teaserZoom.init();
});