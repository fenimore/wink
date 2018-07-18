<?php
if ( !empty($_POST) ) {
    $error=array();// I should use this?

    extract($_POST); //What even does this doo...
    $password = $_POST['password'];
    $redirect = $_POST['redirect'];
    // tmp password is "Hello"
    // Put hashed Pass here
    // Don't check this into git
    if( md5($password) == "907e131eb3bf6f21292fa1ed16e8b60c"){
      session_start();
      $_SESSION['loggedin'] = true;
      header('Location: ' . $redirect);
      die();
    } else {
      header('Location: login.php');
      echo 'Wrong Password';
      die();
    }
}


?>
