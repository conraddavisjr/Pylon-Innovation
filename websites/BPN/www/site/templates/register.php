<?php
    $headline = "Registration form";
    include "./register.inc";
    
    $errorMessage = "";
    if($input->post->register_submit) {
  // process submitted register form
  $first_name = $sanitizer->text($input->post->first_name);
  $last_name = $sanitizer->text($input->post->last_name);
  $display_name = $sanitizer->username($input->post->display_name);
  $email = $sanitizer->email($input->post->email);
  $password = $input->post->password;
  $password_confirmation = $input->post->password_confirmation;
        
  if($password!=$password_confirmation)
            $errorMessage = "<br><p class='alert alert-danger alert-error'><strong>Error!</strong> Register failed, please try again.</p>";
  
        $p = new Page();
  $p->of(false); // sets output formatting to false in order to change field values.
  $p->parent = $pages->get("/users");
  $p->template = "users";
  $p->title = $display_name; // sanitized your value from form and sets to title
  //$p->other_field = $sanitizer->text($input->post->other_field);
  $p->save(); // save the new page
        
        $p = new Page();
  $p->of(false); // sets output formatting to false in order to change field values.
  $p->parent = $pages->get("/users/$display_name");
  $p->template = "user_info";
  $p->title = "UserInfo";
  $p->save(); // save the new page
        

        $pui = $pages->get("/users/$display_name/UserInfo");
        foreach($pui->userInfo as $info) {
            $info->of(false); 
            $info->set("firstName", $first_name);
            $info->set("lastName", $last_name);
            $info->set("displayName", $display_name);
            $info->set("dateCreated", date("j F Y H:i:s"));
            $info->set("dateUpdated", date("j F Y H:i:s"));
            $info->set("email", $email);
            $info->save();
            $info->of(true);
        }

  // now add the user
  $u = new User();
        $u->of(false);
        $u->name = $display_name;
        $u->email = $email;
        $u->pass = $password; 
        $u->save();
        $u->of(true);
    }

?>