<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['admin'])){
    header("Location:auth/login.php?role=visitor&redirect=../gallery.php?category=" . $category . "&gallery=" . $gallery);
    die();
}

function make_thumb($src, $dest, $desired_width) {
    // This code requires install php-gd
    // and in arch linux, it require commenting out the extension
    // in /etc/php/php.ini
    // https://davidwalsh.name/create-image-thumbnail-php
    /* read the source image */
    $source_image = imagecreatefromjpeg($src);
    $width = imagesx($source_image);
    $height = imagesy($source_image);
    /* find the "desired height" of this thumbnail, relative to the desired width  */
    $desired_height = floor($height * ($desired_width / $width));
    /* create a new, "virtual" image */
    $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
    /* copy source image at a resized size */
    imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
    /* create the physical thumbnail image to its destination */
    imagejpeg($virtual_image, $dest);
}

$category = $_GET['category'];
$overwrite = $_GET['overwrite'];
$galleries = glob('media/'.$category.'/*');
$status = '<ul>';

foreach($galleries as $gallery) {
    $path = 'media/'. $category . '/' . basename($gallery) . '/';
    $images = glob($path."*.{[jJ][pP][gG],gif,jpeg,svg,bmp,png}", GLOB_BRACE);
    $thumbpath = $path . 'thumbnails/';
    $thumbnails = glob($thumbpath."*.{[jJ][pP][gG],gif,jpeg,svg,bmp,png}", GLOB_BRACE);

    $gallery_exists = (file_exists($thumbpath) && (count($thumbnails) > 0));
    if ($gallery_exists && $overwrite != 'true'){
      $status .= '<li>' . basename($gallery) . ' already exists</li>';
      continue;
    }
    mkdir($thumbpath, 0755, true);
    $status .= '<li>' . basename($gallery) . ': ' . count($images) . ' thumbnails created</li>';
    foreach($images as $image) {
        $info = pathinfo($image);
        $thumb = $thumbpath.'thmb-' . $info['filename'] . '.' . $info['extension'];
         make_thumb($image, $thumb, 150);
    }
}
$status = $status . '</ul>';

?><!DOCTYPE html>
<html>
<head>
<title>Wink</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Photo Gallery">
    <meta name="keywords" content="PHP, Photography">
    <meta name="author" content="Fenimore">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
    </head>
    <body>
        <div class="container">
          <h1>Creating Thumbnails for selection</h1>
          <a href="auth/admin.php">Return to Admin Panel</a><br>
          <a href="index.php">Return to Index Page</a>
          <hr>
          <?php echo $status; ?>
        </div>
    </body>
    </html>
