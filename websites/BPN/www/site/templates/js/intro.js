
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
      this.$navMenu = $('#nav-menu');
      this.$navItems = $('#nav-menu a');

      // values
      this.navHeight = this.$navMenu.height();
    },
    introAnimation: function(){
      tl = new TimelineLite;

      tl.to(this.$intro, 1.5, {top:"-100%", ease:Power4.easeInOut, delay:2})
        .fromTo(this.$homePg,1.2, {top:"100%", scale:4}, {top:this.navHeight - 23, scale:1, ease:Power2.easeOut}, "-=1.5")
        .fromTo(this.$navMenu,1, {left:"-100%", opacity:0}, {left:"0%", opacity:1}, "-=0.6")
        .fromTo(this.$navItems,0.5, {top:"-10%", opacity:0}, {top:"50%", opacity:1})
    }
  }

  // initilize this function
  homeIntro.init();
});