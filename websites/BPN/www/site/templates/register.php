<?php
  $headline = "Registration form";
  // include "./register.inc";
  
  $errorMessage = "";
  if($input->post->register_submit) {
    // process submitted register form
    $first_name = $sanitizer->text($input->post->first_name);
    $last_name = $sanitizer->text($input->post->last_name);
    $user_name = $sanitizer->username($input->post->user_name);
    $facebook_name = $sanitizer->username($input->post->facebook_name);
    $linkedin_name = $sanitizer->username($input->post->linkedin_name);
    $email = $sanitizer->email($input->post->email);
    $password = $input->post->password;
    $password_confirmation = $input->post->password_confirmation;


    // validate the form

    $errors         = array();      // array to hold validation errors
    $data           = array();      // array to pass back data

    // validate the variables ======================================================
        // if any of these variables don't exist, add an error to our $errors array

    if (empty($first_name))
        $errors['first_name'] = 'First name is required.';

    if (empty($last_name))
      $errors['last_name'] = 'Last name is required.';

    if (empty($user_name))
      $errors['user_name'] = 'User name is required.';

    if (empty($_POST['email']))
        $errors['email'] = 'Email is required.';

    if (empty($_POST['superheroAlias']))
        $errors['superheroAlias'] = 'Superhero alias is required.';

// return a response ===========================================================

    // if there are any errors in our errors array, return a success boolean of false
    if ( ! empty($errors)) {

        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {

        // if there are no errors process our form, then return a message

        // DO ALL YOUR FORM PROCESSING HERE
        // THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)

        // show a message of success and provide a true success variable
        $data['success'] = true;
        $data['message'] = 'Success!';
    }

    // return all our data to an AJAX call
    echo json_encode($data);





    $u = $users->add($user_name);
    $u->pass = $password;
    $u->set('facebookName', $facebook_name);
    $u->set('linkedinName', $linkedin_name);
    $u->addRole("pending-approval");
    $u->save();
  }
?>

<form action="./" method="post">
  <label >First Name</label>
  <input name="first_name" placeholder="first Name"></input>
  <label >Last Name</label>
  <input name="last_name"></input>
  <label >Username Name</label>
  <input name="user_name"></input>
  <label >Facebook Name</label>
  <input name="facebook_name"></input>
  <label >LinkedIn Name</label>
  <input name="linkedin_name"></input>
  <label >Email</label>
  <input name="email"></input>
  <label >Password</label>
  <input name="password" type="password"></input>
  <label >Password Confirmation</label>
  <input name="password_confirmation" type="password"></input>
  <input type="submit" value="Submit" name="register_submit"></input>
</form>