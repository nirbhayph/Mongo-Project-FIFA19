<?php
include "allCollections.php";
header("Access-Control-Allow-Origin: *");

if(isset($_GET['id']) && isset($_GET['comment'])){
	$id = (int)$_GET['id'];
	$comment = $_GET['comment'];
	$findPlayer = $collectionPlayerDetails->updateOne(['ID' => $id], ['$push' => ["comment" => $comment]]);
	$modifiedCount = $findPlayer->getModifiedCount();
	if($modifiedCount == 1){
		echo "Success";
	}
	else{
		echo "Fail";
	}
}

?>