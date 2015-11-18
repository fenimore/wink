<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wink</title>
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
    <link rel="stylesheet" href="style.css" type="text/css" media="screen"/>
  <style> 
  </style>
</head>
<body>


<div class="container">
  <div class="row text-center">
<?php
    $gallery = null;
	if ( !empty($_GET['gallery'])) {
		$gallery = $_REQUEST['gallery'];
	}
	echo '<h1 class="title"> <a href=index.php>'. ucfirst($gallery) .'</a></h1>';
  if(null==$gallery) {
    header("Location: index.php");
  } 
  else {
    $dirname = "media/";
    $dirname = $dirname . '/' . $gallery . '/';
    $images = glob($dirname."*.[jJ][pP][gG]"); //only jpg?
    //GLOB_BRACE not necessary?
    echo '<div class="col-md-9">';
    foreach($images as $image) {
      echo '  <img src="'. $image.'" alt="" width="300px" height="auto" class="img-responsive wink">';
    }
    echo '</div>'; // Col
  }
?>
  </div> <!-- Row -->
</div><!-- Container -->
<script type="text/javascript">
</script>
</body>

</html>
