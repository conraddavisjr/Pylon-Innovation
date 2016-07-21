$(document).ready(function() {
  // process the form
  $('#reg-form').submit(function(event) {

    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();

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
        dataType    : 'json', // what type of data do we expect back from the server
        encode      : true
    })
    .success(function() {
      console.log('SUCCESS!')
    })
    .fail(function(error) {
      console.log( "error: ", error );
    })
    // using the done promise callback
    .done(function(data) {
      console.log('promise Done');
      // log data to the console so we can see
      console.log('data: ', data); 

      // here we will handle errors and validation messages
    });

  });

});