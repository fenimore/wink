<?php
if ( !empty($_GET['gallery'])) {
    $gallery = $_REQUEST['gallery'];
    $category = $_REQUEST['category'];
    $index = $_REQUEST['index'];
} else {
    echo 'none';
}
$path = 'media/'. $category . '/' . $gallery . '/';
$images = glob($path."*.{[jJ][pP][gG],gif,jpeg,svg,bmp,png}", GLOB_BRACE);
// Loop
if ($index > sizeof($images)) {
    $index = 0;
} else if ($index == -1) {
    $index = sizeof($images) - 1;
}
$info = pathinfo($images[$index]);
$filepath = $path . $info['filename'] . '.' . $info['extension'];
echo $filepath;

?>
