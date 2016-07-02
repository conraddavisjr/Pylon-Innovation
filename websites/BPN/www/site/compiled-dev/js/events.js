// BPN Teaser Zoom effect
// Author: Conrad Davis Jr
// 
// Description: This file handles events particular to the events page i.e the event image gallery
//

$(function() {

  var Events = {

    init: function(){
      this.elements();
      this.eventListeners();
    },

    // elements
    elements: function(){
      this.$photoGalleryTeaser = $('.photo-gallery-teaser'); 
      this.$photoGalleryContainer = $('.photo-gallery-container'); 
      this.$thumbnailsGroup = $('.thumbnails-group'); 
      this.$thumbnail = $('.thumbnail'); 
      this.$gridIcon = $('.grid-icon');
      this.$clickFields = $('.click-fields');
      this.$mainImage = $('.main-image');
      this.$mainImageSrc = $('.main-image img');
      this.$photoGalleryCloseBtn = $('.photo-gallery-close-btn');
      this.$clickFieldsContainer = $('.click-fields');
      this.$clickFields = $('#left-field, #right-field');

      // var
      this.galleryArrayValue = 0;
    },

    // event listeners
    eventListeners: function(){
      this.$photoGalleryTeaser.on('click', this.openPhotoGallery);
      $(document).on('click', '.thumbnail', this.viewDetailedPic);
      this.$clickFields.on('click', this.galleryNavigation);
      this.$gridIcon.on('click', this.showGridView);
      this.$photoGalleryCloseBtn.on('click', this.closeTheGallery);
    },

    // events
    openPhotoGallery: function(e){
      // if there are no images for this gallery, do nothing
      console.log('this: ', this);
      console.log('e.target: ', e.target);
      if($(this).attr('has-gallery') == 'false'){
        return false;
      }else{
        // reveal the photo gallery
        Events.$photoGalleryContainer.addClass('fade-in');

        // get the gallery id
        var galleryId = Events.$photoGalleryTeaser.attr('id');

        // set array to all images before posting them to the DOM
        Events.galleryArray = [];
        Events.galleryImgSrcArray = [];

        // generate the thumbnails per the PostData JSON
        for (var i = 0; i < postData[galleryId].photos.length; i++) {
          Events.galleryArray.push('<div class="thumbnail" data-thumbnail-id="' + i + '"><img src="' + postData[galleryId].photos[i] + '"></div>');
          Events.galleryImgSrcArray.push(postData[galleryId].photos[i]);
        }

        // create a reference to the thumbnail
        Events.$thumbnail = $('.thumbnail');

        // post the html to the DOM
        Events.$thumbnailsGroup.html(
          Events.galleryArray.join(" ")
        );  
      }
    },

    viewDetailedPic: function(e){
      // define the selected element's scope
      var el = this;

      console.log('el: ', el);

      // announce the selected thumbnail id
      Events.thumbnailId = $(this).data('thumbnail-id');

      console.log('Events.thumbnailId: ', Events.thumbnailId);

      // fade out all of the other thumbnails
      $('.thumbnail').addClass('fade-out');

      // send the selected thumbnail to the center of the page
      $(el).addClass('go-to-center');

      // get the image belonging to the thumbnail
      var selectedImage = $(el).find('img').attr('src');

      // update the img src of the main image
      Events.$mainImageSrc.attr('src', selectedImage);

      setTimeout(function(){
        Events.$mainImage.addClass('fade-in');
        Events.$clickFieldsContainer.addClass('fade-in');
        $(el).addClass('remove-front');
        $(el).removeClass('go-to-center');
      }, 500);

    },

    galleryNavigation: function(e){
      // determine which direction was clicked
      var fieldClicked = $(this).attr('id');
      var pointedImage = '';

      console.log('thumbnailId: ', Events.thumbnailId);

      // call the next or prev image
      switch (fieldClicked){
        case 'left-field':

          // go to the prev image
          Events.thumbnailId = Events.thumbnailId - 1;
          pointedImage = Events.galleryImgSrcArray[Events.thumbnailId];

          // if we reached the edge of an array, loop around it
          if(Events.thumbnailId < 0){
            Events.thumbnailId = Events.galleryImgSrcArray.length - 1;
            pointedImage = Events.galleryImgSrcArray[Events.thumbnailId];
          }
          // update the img src of the main image
          Events.$mainImageSrc.attr('src', pointedImage);
          break;
        case 'right-field':

          // go to the next image
          Events.thumbnailId = Events.thumbnailId + 1;
          pointedImage = Events.galleryImgSrcArray[Events.thumbnailId];

          // if we reached the edge of an array, loop around it
          if(Events.thumbnailId >= Events.galleryImgSrcArray.length){
            Events.thumbnailId = 0;
            pointedImage = Events.galleryImgSrcArray[Events.thumbnailId];
          }

          // update the img src of the main image
          Events.$mainImageSrc.attr('src', pointedImage);
          break;
      }
    },

    showGridView: function(){
      $('.thumbnail').attr('class', 'thumbnail');
      Events.$mainImage.removeClass('fade-in');
      Events.$clickFieldsContainer.removeClass('fade-in');
    },

    closeTheGallery: function(){
      Events.$photoGalleryContainer.removeClass('fade-in');
      Events.$mainImage.removeClass('fade-in');
      Events.$clickFieldsContainer.removeClass('fade-in');
    }
  }

  Events.init(); //init this function
});
