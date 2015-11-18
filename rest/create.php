<?php
  $directoryerr = "directory already exists";

  if ( !empty($_POST) ) {
    $dirname = $_POST['dirname'];
    $dir = '../media/' . $dirname; // change (carefully) to $path
    
    
    if(!is_dir($dir)) {
      mkdir($dir);
      header("Location: ../index.php");
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Photo Gallery">
    <meta name="keywords" content="PHP, Photography">
    <meta name="author" content="Fenimore">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    	<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen"/>
</head>
<body>
<a href="../auth/admin.php">Return to Admin</a>
</body>
</html>
