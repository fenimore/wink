<?php
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
$galleries = glob('media/'.$category.'/*');

foreach($galleries as $gallery) {
    $path = 'media/'. $category . '/' . $gallery . '/';
    $images = glob($path."*.{[jJ][pP][gG],gif,jpeg,svg,bmp,png}", GLOB_BRACE);
    $thumbpath = $path . 'thumbnails/';
mkdir($thumbpath, 0777, true);
    foreach($images as $image) {
        $info = pathinfo($image);
        $thumb = $thumbpath.'thmb-' . $info['filename'] . '.' . $info['extension'];
         make_thumb($image, $thumb, 60);
    }


}

?>