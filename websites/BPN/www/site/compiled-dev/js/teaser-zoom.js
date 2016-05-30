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
      tl = new TimelineLite;
      var teaser = e.currentTarget;
      var teaserPosition = teaser.getBoundingClientRect();
      // console.log('teaserWidth: ', teaserWidth);

      console.log('teaserPosition: ', teaserPosition);

      teaserZoom.$teaser.css({
          'display': 'none',
          'left': teaserPosition.left - teaserPosition.width
        });
      $(teaser).addClass('open-up');

      tl.to(teaser, 1.5, {left: -300, top: 100, width:'100%', height:'100%', scale:2})
        // .fromTo(this.$homePg, 1.2, {top:"100%", scale:4}, {top:this.navHeight, scale:1, ease:Power2.easeOut}, "-=1.5")
        // .fromTo(this.$navMenu, 1, {left:"-100%", backgroundColor: "white", opacity:0}, {left:"0%", backgroundColor: "#f7f7f7",opacity:1}, "-=0.6")
        // .fromTo(this.$navItems, 0.5, {top:"35%", opacity:0}, {top:"50%", opacity:1})
        // .fromTo(this.$navLogo, 0.5, {left:"0px", opacity:0}, {left:"15px", opacity:1}, "-=0.5")

    }
  }
  

  // initilize this function
  teaserZoom.init();
});