<?php

// See https://davidwalsh.name/create-image-thumbnail-php

// In go I'm used to the dst first, and then source,
// but it looks like in PHP that is not the case;
function createThumbnail($src, $dst) {
    // wtf are these function names...
    $source = imagecreatefromjpeg($src);
    $width = imagesx($source);
    $height = imagesy($source);

    // Get the dimensions
    $desired_width = 200;
    $desired_height = floor($height * ($desired_width / $width));

    // Copy Image into dest
    $tmp = imagecreatetruecolor($desired_width, $desired_height);
    imagecopyresampled($tmp, $src, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
    imagejpeg($tmp, $dst);
}


?>