
// BPN Intro
// Author: Conrad Davis Jr
// 
// Description: This file handles the calling and animating in the contact form
// 


$(function() {

  var ContactForm = {

    init: function(){
      this.elements();
      this.eventListeners();
    },

    elements: function(){
      this.$contactBtn = $('.contactBtn');
      this.$contactOverlay = $('.contact-overlay');
      this.$contactContainer = $('.contact-container');
      this.$closeContactForm = $('close-contact-form');

    },
    eventListeners: function(){
      this.$contactBtn.on('click', this.callContactForm);
      this.$contactOverlay.on('click', this.closeContactForm);
      this.$closeContactForm.on('click', this.closeContactForm);
    },

    // event handlers
    callContactForm: function(){
      console.log('callContactForm called');
      ContactForm.$contactOverlay.addClass('contact-overlay-in');
      ContactForm.$contactContainer.addClass('contact-form-in');
    },
    closeContactForm: function(){
      ContactForm.$contactOverlay.removeClass('contact-overlay-in');
      ContactForm.$contactContainer.removeClass('contact-form-in');
    }
  }

  // initilize this function
  ContactForm.init();
});