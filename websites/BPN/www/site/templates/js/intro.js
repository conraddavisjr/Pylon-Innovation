
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
        .fromTo(this.$homePg,0.7, {top:"100%"}, {top:"0%", ease:Power2.easeOut}, "-=1")
    }
  }

  // initilize this function
  homeIntro.init();
});