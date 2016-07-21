<?php
  $headline = "Registration form";
  // include "./register.inc";
  
  $errorMessage = "";
  // if($input->post->register_submit) {
  //   // process submitted register form
  //   $first_name = $sanitizer->text($input->post->first_name);
  //   $last_name = $sanitizer->text($input->post->last_name);
  //   $user_name = $sanitizer->username($input->post->user_name);
  //   $facebook_name = $sanitizer->username($input->post->facebook_name);
  //   $linkedin_name = $sanitizer->username($input->post->linkedin_name);
  //   $email = $sanitizer->email($input->post->email);
  //   $password = $input->post->password;
  //   $password_confirmation = $input->post->password_confirmation;
    if(isset($_POST['user_name'])){ $user_name = $_POST['user_name']; }else{$user_name='';}
    if(isset($_POST['first_name'])){ $first_name = $_POST['first_name']; }else{$first_name='';}
    if(isset($_POST['last_name'])){ $last_name = $_POST['last_name']; }else{$last_name='';}
    if(isset($_POST['password'])){ $password = $_POST['password']; }else{$password='';}
    if(isset($_POST['facebook_name'])){ $facebook_name = $_POST['facebook_name']; }else{$facebook_name='';}
    if(isset($_POST['linkedin_name'])){ $linkedin_name = $_POST['linkedin_name']; }else{$linkedin_name='';}

    $data = array(); // array to pass back data

    // return a response ===========================================================

    $u = $users->add($user_name);
    $u->set('first_name', $first_name);
    $u->set('last_name', $last_name);
    $u->pass = $password;
    $u->set('facebookName', $facebook_name);
    $u->set('linkedinName', $linkedin_name);
    $u->addRole("pending-approval");
    $u->save();

    // show a message of success and provide a true success variable
    $data['success'] = true;
    $data['message'] = 'Success!';

    // return all our data to an AJAX call
    echo json_encode($data);

  // }
?>

<form action="./" method="post" id="reg-form">
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