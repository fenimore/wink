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
    	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
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
		$category = $_REQUEST['category'];
	}
	echo '<h1 class="title"> <a href=index.php>'. ucfirst($gallery) .'</a></h1>';
	echo '<div class="col-md-1 col-md-offset-1">';
	echo '<a href=# onclick="prevSlide()" class="nav-control"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>';
  echo '</div>';
  if(null==$gallery or null==$category) {
    header("Location: index.php");
  } 
  else {
    $path = 'media/'. $category . '/' . $gallery . '/';
    $images = glob($path."*.{[jJ][pP][gG],gif,jpeg,svg,bmp,png}", GLOB_BRACE);
    echo '<div class="col-md-8">';
    echo '  <div id="slider" height="600px">';
    foreach($images as $image) {
      echo '  <img src="'. $image.'" alt="" width="auto" height="auto" class="img-responsive center-block" style="display:none;">';
    }
    echo '  </div>'; // Slider
    echo '</div>'; // Col
    echo '<div class="col-md-1 text-right" style="z-index:100">';
    echo '<a href=# onclick="nextSlide()" class="nav-control"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>';
    echo '</div>';
  }
?>
  </div> <!-- Row -->
</div><!-- Container -->
<script type="text/javascript">
    $(document).ready(function() {
      $('#slider img:first-child').addClass('active').show();
    });

      function nextSlide() {
          console.log('next');
          var $active = $('div#slider IMG.active');
          var $next = $active.next();  
          if($active.is(':last-child')){
            $next = $('#slider img:first-child');
          }  
          $next.addClass('active');
          $next.show();
          $active.hide();
          $active.removeClass('active');
      }
      function prevSlide() {
          var $active = $('div#slider IMG.active');
          var $prev = $active.prev();    
          if($active.is(':first-child')){
            $prev = $('#slider img:last-child');
          }
          $prev.addClass('active');
          $prev.show();
          $active.hide();
          $active.removeClass('active');
      }
</script>
</body>

</html>
