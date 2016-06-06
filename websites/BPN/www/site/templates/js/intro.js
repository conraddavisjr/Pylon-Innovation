
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
      this.$navLogo = $('.nav-menu__logo');

      // values
      this.navHeight = this.$navMenu.height();
    },
    introAnimation: function(){
      tl = new TimelineLite;

      tl.to(this.$intro, 1.5, {top:"-100%", ease:Power4.easeInOut, delay:2})
        .from(this.$homePg, 1.2, {top:"100%", scale:4, ease:Power2.easeOut}, "-=1.5")
        .fromTo(this.$navMenu, 1, {left:"-100%", backgroundColor: "white", opacity:0}, {left:"0%", backgroundColor: "#f7f7f7",opacity:1}, "-=0.6")
        .fromTo(this.$navItems, 0.5, {top:"35%", opacity:0}, {top:"50%", opacity:1})
        .fromTo(this.$navLogo, 0.5, {left:"0px", opacity:0}, {left:"15px", opacity:1}, "-=0.5")
    }
  }

  // initilize this function
  homeIntro.init();
});