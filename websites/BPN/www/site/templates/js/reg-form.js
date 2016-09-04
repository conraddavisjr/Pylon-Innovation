$(document).ready(function() {

  var valid = false;
  var $requiredField = $('input[required]');
  var $humanField = $('input[humanField]');

  // animate the registration form in upon clicking the CTA
  $('.register').on('click', function(){
    $(this).addClass('register-open');
  });

  // if a field is empty after leaving it, 
  // trigger an error response
  $requiredField.blur(function(){
    var $thisField = $(this).val();
    if ($thisField == '' || $thisField == ' '){
      $(this).addClass('field-error');
    }
    else{
      $(this).removeClass('field-error');
    }
  });

  // process the form
  $('#reg-form').submit(function(event) {
    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();

    // get the required form data
    var formData = [
        $('input[name=first_name]').val(),
        $('input[name=last_name]').val(),
        $('input[name=user_name]').val()
    ];

    // FE form validation
    function charValidator(fields){
      $(formData).each(function (index, field){
        console.log('field value: ', field);
        if(field == "" || field == " "){
          valid = false;
          console.log('we have an empty field. NOT valid');
        }else{
          valid = true;
          console.log('All fields are good! Submit!');
        }
      });
    }

    charValidator();

    function humanValidator(){
      console.log('$humanField: ', $humanField);
      console.log('$humanField val: ', $humanField.val());
      // check if they're a human. Basic math problem
      // 1 + 2
      console.log('before valid: ', valid);
      valid = $humanField.val() == 3 ? true : false;
      console.log('after valid: ', valid);
    }

    humanValidator();

    // process the form
    // if all of the required fields are valid, submit
    if(valid) {
      console.log('The form IS valid!')
      // prevent the form from submitting multiple times
      $('#reg-form').disabled=true;
      $('input[name=register_submit]').val('Submitting...');

      // AJAX req
      $.ajax({
          type        : 'POST', // define the type of HTTP we want to use (POST for our form)
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
    }

  });

});