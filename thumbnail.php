<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wink</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Photo Gallery">
    <meta name="keywords" content="PHP, Photography">
    <meta name="author" content="Fenimore">
    <link rel="icon" href="favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen"/>
  <style> 
  </style>
</head>
<body>


<div class="container">
  <div class="row text-center">
<?php
    $gallery = null;
    $category = null;
    $spaces = array("-", "_");
	if ( !empty($_GET['gallery'])) {
		$gallery = $_REQUEST['gallery'];
		$category = $_REQUEST['category'];
	}
	$gallerytitle = str_replace($spaces, " ", $gallery);
	echo '<h1 class="title"> <a href=index.php>'. ucfirst($gallerytitle) .'</a></h1>';
  if(null==$gallery or null==$category) {
    echo 'ERROR: gallery and/or category parameters not specified.';
  } 
  else {
    $path = 'media/'. $category . '/' . $gallery . '/';
    $images = glob($path."*.{[jJ][pP][gG],gif,jpeg,svg,bmp,png}", GLOB_BRACE);
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
$(window).onbeforeload(function(){
//Your code here
})

$(window).load(function(){
//Your code here
});
</script>
</body>

</html>
