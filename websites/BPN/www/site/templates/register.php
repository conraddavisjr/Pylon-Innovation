<?php
  
  $errorMessage = "";
    if(isset($_POST['user_name'])){ $user_name = $_POST['user_name']; }else{$user_name='';}
    if(isset($_POST['first_name'])){ $first_name = $_POST['first_name']; }else{$first_name='';}
    if(isset($_POST['last_name'])){ $last_name = $_POST['last_name']; }else{$last_name='';}
    if(isset($_POST['email'])){ $email = $_POST['email']; }else{$email='';}
    if(isset($_POST['password'])){ $password = $_POST['password']; }else{$password='';}
    if(isset($_POST['facebook_name'])){ $facebook_name = $_POST['facebook_name']; }else{$facebook_name='';}
    if(isset($_POST['linkedin_name'])){ $linkedin_name = $_POST['linkedin_name']; }else{$linkedin_name='';}

    // Add a new user ===========================================================

    $u = $users->add($user_name);
    $u->set('first_name', $first_name);
    $u->set('last_name', $last_name);

    $u->pass = $password;
    $u->set('facebookName', $facebook_name);
    $u->set('linkedinName', $linkedin_name);
    $u->addRole("pending-approval");
    $u->save();

    // Notify the Admin of a new user request via email =========================
    // Set the recipient email address.
    $recipient = "c.pridgen87@gmail.com, cdj@pyloninnovation.com";
    // Set the email subject.
    $subject = "New request for BPN membership from $first_name $last_name";
    // Build the email content.
    $email_content = "Username: $user_name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Facebook Name: $facebook_name\n\n";
    $email_content .= "LinkedIn Name: $linkedin_name\n\n";
    // Build the email headers.
    $email_headers = "From: $first_name <$email>";
    // Send the email.
    mail($recipient, $subject, $email_content, $email_headers);


  // }
?>

<form action="./" method="post" id="reg-form">
  <input name="first_name" placeholder="first Name"></input>
  <input name="last_name" placeholder="Last Name"></input>
  <input name="user_name" placeholder="User Name"></input>
  <input name="facebook_name" placeholder="Facebook Name"></input>
  <input name="linkedin_name" placeholder="LinkedIn Name"></input>
  <input name="email" placeholder="Email"></input>
  <input name="password" type="password" placeholder="Password"></input>
  <input name="password_confirmation" type="password" placeholder="Password Confirmation"></input>
  <input type="submit" value="Submit" name="register_submit"></input>
</form>