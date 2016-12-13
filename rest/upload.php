<?php
// errors
$error = "";

if ( !empty($_POST) ) {
    // NULLE!
    extract($_POST); //What even does this doo...
    $category = $_POST['category'];
    $dirname = $_POST['gallery'];
    $path = '../media/' . '/'. $category . '/' . $dirname;
    $extension=array("jpeg","jpg","png","gif");

    if( is_dir($path)) {
        foreach($_FILES["files"]["name"] as $key=>$tmp_name){
            $file_name=$_FILES["files"]["name"][$key];
            $file_tmp=$_FILES["files"]["tmp_name"][$key];
            $ext=pathinfo($file_name,PATHINFO_EXTENSION);
            if(in_array($ext,$extension)){
                if(!file_exists($path."/".$file_name)){
                    move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key], $path."/".$file_name);
                } else {
                    $error = "duplicates, change file name";
                }
            } else {
                $error = "extensions are no good";
            }
        }
        header("Location: ../gallery.php?category=" . $category ."&gallery=" . $dirname);
    } else {
        $error = "this is not a directory";
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
<?php

      if(isNotEmpty($error)) {
          echo '<br>ERRROR:' . $error;
      }
      echo '<br>Directory:' . $dirname;
      echo '<br>Path:' . $path;
?>
</body>
</html>
