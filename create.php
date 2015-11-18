<?php
  $directoryerr = "directory already exists";

  if ( !empty($_POST) ) {
    $dirname = $_POST['dirname'];
    $dir = 'media/' . $dirname; // change (carefully) to $path
    
    
    if(!is_dir($dir)) {
      mkdir($dir);
      header("Location: index.php");
    } else {
      echo '<script type="text/javascript">alert("'. $directoryerr . '" );</script>';
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
<a href="admin.php">Return to Admin</a>
</body>
</html>
