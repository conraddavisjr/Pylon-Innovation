$(document).ready(function() {

  $('.register').on('click', function(){
    $(this).addClass('register-open');
  }); 

  // process the form
  $('#reg-form').submit(function(event) {
    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();

    // prevent the form from submitting multiple times
    $('#reg-form').disabled=true;
    $('input[name=register_submit]').val('Submitting...');

    // get the form data
    // there are 
    var formData = {
        'first_name'             : $('input[name=first_name]').val(),
        'last_name'              : $('input[name=last_name]').val(),
        'user_name'              : $('input[name=user_name]').val(),
        'facebook_name'          : $('input[name=facebook_name]').val(),
        'linkedin_name'          : $('input[name=linkedin_name]').val(),
        'email'                  : $('input[name=email]').val(),
        'password'               : $('input[name=password]').val()
    };

    // process the form
    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : './', // the url where we want to POST
        data        : formData, // our data object
        encode      : true
    })
    .success(function() {
      console.log('SUCCESS!');
      $('#reg-form')[0].reset();
      $('.register').addClass('registration-form-success');

      setTimeout(function(){
        $('.register').attr('class', 'register')
        $('#reg-form').disabled=false;
        $('input[name=register_submit]').val('Submit');
      },4000)
    });

  });

});