<?php
// errors
$passworderr = "wrong password";
$directoryerr = "directory already exists";

  if ( !empty($_POST) ) {
    $dirname = $_POST['dirname'];
    $dir = 'media/' . $dirname;
    
    $pass = $_POST['password'];
    
    // tmp password is "Hello"
    if( md5($pass) == "8b1a9953c4611296a827abf8c47804d7") {
      if(!is_dir($dir)) {
        mkdir($dir);
        header("Location: index.php");
      } else {
        echo '<script type="text/javascript">alert("'. $directoryerr . '" );</script>';
      }
    } else {
      echo "<script type='text/javascript'>alert('$passworderr');</script>"; 
    } 
  }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Wink - Error</title>
    <meta charset="utf-8">
</head>
<body>
<a href="admin.php">Return to Upload Page</a>
</body>
</html>
