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
    },
    eventListeners: function(){
      this.$teaser.on('click', this.triggerZoom);
    },

    // Events

    // trigger teaser zoom and populate overlay content
    triggerZoom: function(e){
      var teaser = e.currentTarget;
      var $article = $('.content article');
      var $articleImg = $('.content article img');
      var $articleCopy = $('.content article .content-copy');
      
      var teaserProperties = teaser.getBoundingClientRect();

      teaserZoom.$teaser.css({
          'display': 'none',
          'left': teaserProperties.left - (teaserProperties.width - 20) //the 20 is the margin (left and right)
        });
      $(teaser).addClass('open-up');

      tl = new TimelineLite;
      tl.to($('img', teaser), 0.2, {left:'200%'})
        .to(teaser, 0.5, {left: -300, top: 100, width:'100%', height:'100%', scale:2}, "-=0.2")
        .to($article, 0.5, {opacity: 1, visibility: 'visible'}, "-=0.3")
        .fromTo($articleImg, 0.5, {opacity: 0, left: '-100%'}, {opacity: 1, left: 0}, "-=0.3")
        .fromTo($articleCopy, 0.5, {opacity: 0, left: '-100%'}, {opacity: 1, left: 0}, "-=0.3")

    }
  }
  
  // initilize this function
  teaserZoom.init();
});