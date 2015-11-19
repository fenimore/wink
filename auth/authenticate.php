<?php
if ( !empty($_POST) ) {
    $error=array();// I should use this?
    
    extract($_POST); //What even does this doo...
    $password = $_POST['password'];
    
    // tmp password is "Hello"
    // Put hashed Pass here
    if( md5($password) == "907e131eb3bf6f21292fa1ed16e8b60c"){
      session_start();
      $_SESSION['loggedin'] = true;
      header('Location: admin.php');
      die();
    } else {
      header('Location: login.php');
      echo 'not authenticated';
      die();
    }
}


?>
