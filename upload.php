<?php
// errors
$passworderr = "wrong password";
$directoryerr = "directory already exists";

  if ( !empty($_POST) ) {
    $error=array();
    
    extract($_POST); //What even does this doo...
    $dirname = $_POST['dirname'];
    $dir = 'media/' . $dirname;
    $pass = $_POST['password'];
    $extension=array("jpeg","jpg","png","gif");
    
    // tmp password is "Hello"
    if( md5($pass) == "8b1a9953c4611296a827abf8c47804d7") {
      if( is_dir($dir)) {
        // Then save Files
        foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name){
          $file_name=$_FILES["files"]["name"][$key];
          $file_tmp=$_FILES["files"]["tmp_name"][$key];
          $ext=pathinfo($file_name,PATHINFO_EXTENSION);
          if(in_array($ext,$extension)){
            if(!file_exists($dir."/".$file_name)){
              move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key], $dir."/".$file_name);
            }
          }
        }
        header("Location: gallery.php?gallery=" . $dirname);
      } 
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
