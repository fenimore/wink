<?php
// errors
$directoryerr = "directory does not exist";

  if ( !empty($_POST) ) {
    $dirname = $_POST['dirname'];
    $path = 'media/' . $dirname;

    

    if(is_dir($path)) {
      $files = glob($path . "/*");
      foreach($files as $file){
        if(is_file($file)){
          unlink($file); //delete file
        }
      }
      rmdir($path);
      // Flash message?
      header("Location: index.php");
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
