
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
      this.$closeContactForm.on('click', this.closeContactForm);
    },

    // event handlers
    callContactForm: function(){
      $contactOverlay.toggle();
      $contactContainer.toggle('contact-form-in');
    },
    closeContactForm: function(){
      $contactOverlay.toggle();
      $contactContainer.toggle('contact-form-in');
    }
  }

  // initilize this function
  ContactForm.init();
});