<?php
// errors
$directoryerr = "directory already exists";

  if ( !empty($_POST) ) {
    $error=array();// I should use this?
    
    extract($_POST); //What even does this doo...
    $dirname = $_POST['dirname'];
    $dir = 'media/' . $dirname;
    $extension=array("jpeg","jpg","png","gif");
    
    if( is_dir($dir)) {
      // Then save Files
      foreach($_FILES["files"]["name"] as $key=>$tmp_name){
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

?>
<!DOCTYPE html>
<html>
<head>
    <title>Wink - Error</title>
    <meta charset="utf-8">
</head>
<body>
<a href="admin.php">Return to Admin</a>
Different kinds of errors:
not jpg (TODO)
too big of file (TODO)
file exists (TODO)
</body>
</html>
