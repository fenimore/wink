<?php
if ( !empty($_GET['gallery'])) {
    $gallery = $_REQUEST['gallery'];
    $category = $_REQUEST['category'];
}
$path = 'media/'. $category . '/' . $gallery . '/';
$images = glob($path."*.{[jJ][pP][gG],gif,jpeg,svg,bmp,png}", GLOB_BRACE);
// Get real path for our folder
$zippath = 'media/'. $gallery .'.zip' ;

// Initialize archive object
$zip = new ZipArchive();
$zip->open($zippath, ZipArchive::CREATE | ZipArchive::OVERWRITE);
foreach ($images as $file) {
    // Add current file to archive
    $new_filename = substr($file,strrpos($file,'/') + 1);
    $zip->addFile($file, $new_filename);
}
// Zip archive will be created only after closing object
$zip->close();
// send the file to the browser as a download
header('Content-disposition: attachment; filename='.$gallery.'.zip');
header('Content-type: application/zip');
readfile($zippath);
?>