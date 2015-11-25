<!DOCTYPE html>
<html>
<head>
    <title>Wink</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Photo Gallery">
    <meta name="keywords" content="PHP, Photography">
    <meta name="author" content="Fenimore">
    <link rel="icon" href="favicon.ico">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-12">
    <br>
<?php
// Categories
$spaces = array("-", "_");
$categories = array_filter(glob('media/*'), 'is_dir');
foreach($categories as $category){
  $cat = substr($category, 6);
  echo  $cat; // category header, make h3???
  echo "<br><small>full  | individual</small>";
  $galleries = array_filter(glob($category . '/*'), 'is_dir');
  $galleries = new ArrayIterator(array_reverse($galleries));
  // Reverse order so that most recent are on top
  //for each gallery list the gallery
  echo '<ul class="photo-index list-unstyled">';
  foreach($galleries as $gallery){
    $gall = substr($gallery, strlen($category) + 1); // strip path
    $gall = str_replace($spaces, " ", $gall); // - and _ are spaces
    echo '<li><a href=thumbnail.php?category=' . $cat . '&gallery='.$gall.'>';
    echo '<span class="glyphicon glyphicon-th-large" aria-hidden="true">';
    echo '</span></a> | <a href=gallery.php?category=' . $cat;
    echo '&gallery=' . $gall .' >';
    echo ucfirst($gall) .' </a></li>'; // Capitalize the Gallery?
  }
  echo '</ul>';
}
// Add another set of gallery

?>
    </div>
  </div>
</div>

<footer class="footer">
  <div class="container">
    <p class="text-muted"><a href="http://another.workingagenda.com">Fenimore Love</a> | <a href=auth/login.php><span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span></a> | <a href="https://github.com/polypmer/wink">Source Code</a></p>
  </div>
</footer>

</body>
</html>
