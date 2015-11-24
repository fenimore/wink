<?php
  $directoryerr = "directory already exists";

  if ( !empty($_POST) ) {
    $category = $_POST['category'];
    $path = '../media/' . $category;     
    
    if(!is_dir($path)) {
      mkdir($path);
      header("Location: ../index.php");
    } else {
      echo '<script type="text/javascript">alert("'. $directoryerr . '" );</script>';
    }
  }

?>
