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
    },

    // Events

    // trigger teaser zoom and populate overlay content
    triggerZoom: function(e){
      teaserZoom.currentTeaser = e.currentTarget;
      var teaser = e.currentTarget;
      var $article = $('.content article');
      var $articleImg = $('.content article img');
      var $articleCopy = $('.content article .content-copy');
      
      teaserZoom.teaserProperties = teaser.getBoundingClientRect();

      teaserZoom.$teaser.css({
          'display': 'none',
          'left': teaserZoom.teaserProperties.left - (teaserZoom.teaserProperties.width - 20) //the 20 is the margin (left and right)
        });
      $(teaser).addClass('open-up');

      // Run GSAP animation for teaser zoom feature
      teaserZoom.tl = new TimelineLite;
      teaserZoom.tl
        .to($('img', teaser), 0.2, {left:'200%'})
        .fromTo(teaser, 0.5, {left: 0, top: 0, width:'33%', height:'100%', scale:1}, {left: -300, top: 100, width:'100%', height:'100%', scale:2}, "-=0.2")
        .to($article, 0.5, {opacity: 1, visibility: 'visible'}, "-=0.3")
        .fromTo($articleImg, 0.5, {opacity: 0, left: '-5%'}, {opacity: 1, left: 0})
        .fromTo($articleCopy, 0.5, {opacity: 0, top: '5%'}, {opacity: 1, top: 0}, "-=0.5")
        .to(teaser, 0, {visibility: 'hidden', display: 'none !important'})

      // populate the detailed article
      var teaserId = $(teaser).attr('content-id');
      $('.post-image').attr('src', eventData[teaserId].thumbnail);
        // '<figure class="teaser" content-id="' + eventData[i].id + '">' +
        //   '<img src="' + eventData[i].thumbnail + '" alt="' + eventData[i].thumbnailAlt + '"/>' +
        //   '<figcaption>' +
        //     '<h2>' + eventData[i].title + '</h2>' + 
        //     '<p>' + 
        //       '<a href="#"><i class="fa fa-fw fa-download"></i></a>' + 
        //       '<a href="#"><i class="fa fa-fw fa-heart"></i></a>' +
        //       '<a href="#"><i class="fa fa-fw fa-share"></i></a>' +
        //       '<a href="#"><i class="fa fa-fw fa-tags"></i></a>' +
        //     '</p>' +
        //   '</figcaption>' +
        // '</figure>');

    },

    closeContent: function(){
      // reverse the animation upon closing the detailed article
      teaserZoom.tl.reverse();

      $(teaserZoom.currentTeaser).removeClass('open-up');

      tl = new TimelineLite;
      tl.fromTo($('.teaser'), 1, {opacity: 0, display: 'block', left: 0}, {opacity: 1, left: 0, delay: 1.1});

      $(teaserZoom.currentTeaser).css('left', 0);
    }
  }
  
  // initilize this function
  teaserZoom.init();
});