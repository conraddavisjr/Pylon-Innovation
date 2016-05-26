
// BPN Intro
// Author: Conrad Davis Jr
// 
// Description: This file handles the functional animation of the BPN introduction
// 


$(function() {

  var homeIntro = {

    init: function(){
      this.elements();
      this.introAnimation();
    },

    elements: function(){
      this.$intro = $('.intro');
      this.$homePg = $('#home-pg');
    },
    introAnimation: function(){
      tl = new TimelineLite;

      tl.to(this.$intro, 1.5, {top:"-100%", ease:Power4.easeInOut, delay:2})
        .fromTo(this.$homePg,1.5, {top:"100%", scale:1.5}, {top:"0%", scale:1, ease:Power4.easeInOut}, "-=1.5")
    }
  }

  // initilize this function
  homeIntro.init();
});