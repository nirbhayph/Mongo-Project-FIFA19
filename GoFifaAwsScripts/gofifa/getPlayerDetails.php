<?php
include "allCollections.php";
require "../vendor/autoload.php";
header("Access-Control-Allow-Origin: *");
if(isset($_GET["id"])){
	$id = (int)$_GET["id"];
	$findPlayer = $collectionPlayerDetails->findOne([
		'ID' => $id
	]);

	$db = (new MongoDB\Client)->playerphotos;
	$imageBucket = $db->selectGridFSBucket();
	$clubStream = $imageBucket->openDownloadStreamByName("photos/".$id.".png");
	$contents = stream_get_contents($clubStream);
	$file = 'photos/'.$id.'.png';
	file_put_contents($file, $contents);

	$db = (new MongoDB\Client)->clublogosphotos;
	$imageBucket = $db->selectGridFSBucket();
	$clubStream = $imageBucket->openDownloadStreamByName("clubs/".$id.".png");
	$contents = stream_get_contents($clubStream);
	$file = 'clubs/'.$id.'.png';
	file_put_contents($file, $contents);

	$db = (new MongoDB\Client)->flaglogosphotos;
	$imageBucket = $db->selectGridFSBucket();
	$clubStream = $imageBucket->openDownloadStreamByName("flags/".$id.".png");
	$contents = stream_get_contents($clubStream);
	$file = 'flags/'.$id.'.png';
	file_put_contents($file, $contents);

	$paceValue = round($findPlayer['SprintSpeed'] * 0.55 + $findPlayer['Acceleration'] * 0.45, 0, PHP_ROUND_HALF_UP);
	$shootingValue = round($findPlayer['Finishing'] * 0.45 + $findPlayer['LongShots'] * 0.2 + $findPlayer['ShotPower'] * 0.2 + $findPlayer['Positioning'] * 0.05 + $findPlayer['Penalties'] * 0.05 + $findPlayer['Volleys'] * 0.05, 0, PHP_ROUND_HALF_UP);
	$passingValue = round($findPlayer['ShortPassing'] * 0.35 + $findPlayer['Vision'] * 0.2 + $findPlayer['Crossing'] * 0.2 + $findPlayer['LongPassing'] * 0.15 + $findPlayer['Curve'] * 0.05 + $findPlayer['FKAccuracy'] * 0.05, 0, PHP_ROUND_HALF_UP);
	$dribbleValue = round($findPlayer['Dribbling'] * 0.5 + $findPlayer['BallControl'] * 0.35 + $findPlayer['Agility'] * 0.1 + $findPlayer['Balance'] * 0.05, 0, PHP_ROUND_HALF_UP);
	$defendingValue = round($findPlayer['Marking'] * 0.3 + $findPlayer['StandingTackle'] * 0.3 + $findPlayer['Interceptions'] * 0.2 + $findPlayer['HeadingAccuracy'] * 0.1 + $findPlayer['SlidingTackle'] * 0.1, 0, PHP_ROUND_HALF_UP);
	$physicalValue = round($findPlayer['Strength'] * 0.5 + $findPlayer['Stamina'] * 0.25 + $findPlayer['Aggression'] * 0.2 + $findPlayer['Jumping'] * 0.05, 0, PHP_ROUND_HALF_UP);
	
	$talentArray = array();

	array_push($talentArray, $paceValue, $shootingValue, $passingValue, $dribbleValue, $defendingValue, $physicalValue);

	$response = array(
		"result" => $findPlayer,
		"photo" => "https://pothole.ml/php/gofifa/photos/".$id.".png",
		"club" => "https://pothole.ml/php/gofifa/clubs/".$id.".png",
		"country" => "https://pothole.ml/php/gofifa/flags/".$id.".png",
		"talent_array" => $talentArray
	);

	echo json_encode($response);
}
