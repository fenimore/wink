<?php
session_start();
if(!isset($_SESSION['loggedin'])){
    header("Location:login.php");
    return;
}
// https://davidwalsh.name/create-image-thumbnail-php
function make_thumb($src, $dest, $desired_width) {
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

echo '<h1>Making thumbnails for selected category</h1>';

$category = $_REQUEST['category'];
$overwrite = $_REQUEST['over'];
$galleries = glob('media/'.$category.'/*');
$status = '';

foreach($galleries as $gallery) {
    $path = 'media/'. $category . '/' . basename($gallery) . '/';
    $images = glob($path."*.{[jJ][pP][gG],gif,jpeg,svg,bmp,png}", GLOB_BRACE);
    $thumbpath = $path . 'thumbnails/';
if (file_exists($thumbpath) && $overwrite != 'true'){
    $status = $status . '<h2>gallery: '.basename($gallery).' Already Exists</h2>';
    continue;
}
    mkdir($thumbpath, 0777, true);
    $status = $status . '<h2>gallery: '.basename($gallery).'</h2>';
    foreach($images as $image) {
        $info = pathinfo($image);
        $thumb = $thumbpath.'thmb-' . $info['filename'] . '.' . $info['extension'];
         make_thumb($image, $thumb, 150);
    }
}

?>

<!DOCTYPE html>
<html>
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
    </head>
    <body>
    <?php echo $status; ?>
    <a href="auth/admin.php">Return to Admin</a><br>
    <a href="index.php">Return to Index</a>
    </body>
    </html>
