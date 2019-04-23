<?php
include "allCollections.php";
header("Access-Control-Allow-Origin: *");
if(isset($_GET['id'])){
	$id = (int)$_GET['id'];
	$findPlayer = $collectionPlayerDetails->findOne(['ID' => $id]);
	$result = array();
	foreach ($findPlayer['comment'] as $key) {
		array_push($result, $key);
	}
	echo json_encode($result);
}
?>