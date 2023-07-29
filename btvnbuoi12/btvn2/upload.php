<?php
require_once 'ImageUpload.php';

$targetDir = "images"; 
$imageUpload = new imageUpload($targetDir);


$uploadedFiles = array_diff(scandir($targetDir), array('..', '.'));
if (!empty($uploadedFiles)) {
    echo "<h2>Image :</h2>";
    echo "<div id='uploaded-image'>";
    foreach ($uploadedFiles as $file) {
        echo "<img src='$targetDir/$file' alt='image'>";
    }
    echo "</div>";
}
?>