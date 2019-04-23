<?php
include "allCollections.php";

$document = $collectionPlayerDetails->findOne(['ID' => 158023]);
var_dump($document);
?>