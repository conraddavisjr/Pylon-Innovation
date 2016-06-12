
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
      this.$introCover = $('.intro-cover');
      this.$loadBar = $('.orbit, .rotate-loader');
      this.$slogan = $('.slogan');
      this.$homePg = $('#home-pg');
      this.$navItems = $('#nav-menu a');

    },
    introAnimation: function(){
      tl = new TimelineLite;

      tl.to(this.$intro, 1, {top:"-20%", delay:2})
        .to(this.$introCover, 1, {top:"-100%", ease:Power4.easeInOut}, "-=1")
        .to(this.$loadBar, 0.1, {scale:5, opacity:0, ease:Power4.easeOut}, "-=1.2")
        .from(this.$homePg, 1.2, {opacity:0, top:"100%", scale:4, ease:Power2.easeOut}, "-=1.5")
        .to(this.$slogan, 1, {opacity:1})
        .fromTo(this.$navItems, 0.5, {opacity:0}, {opacity:1})
    }
  }

  // initilize this function
  homeIntro.init();
});