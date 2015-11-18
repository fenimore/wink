<!DOCTYPE html>
<html>
<head>
    <title>Wink</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css" type="text/css" media="screen"/>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-12">
    <h1>Welcome</h1>
<?php
$dirname = "images/";
$galleries = array_filter(glob('media/*'), 'is_dir');
$reverted = new ArrayIterator(array_reverse($galleries));
echo "Albums:";
echo '<ul class="list-unstyled">';
foreach($reverted as $gallery) {
    $gallery = substr($gallery, 6);
    echo '<li><a href=gallery.php?gallery='.$gallery.' > '. ucfirst($gallery) .' </a> </li>';
    }
echo '</ul>'
?>
<a href=login.php>upload</a>
    </div>
  </div>
</div>

</body>
</html>
