<?php
require "../vendor/autoload.php";
$db = (new MongoDB\Client)->playerphotos;
$imageBucket = $db->selectGridFSBucket();
$stream = $imageBucket->openDownloadStreamByName("photos/158023.png");

$contents = stream_get_contents($stream);

$file = 'photos/158023.png';
file_put_contents($file, $contents);

?>
<img src="photos/158023.png"/>
