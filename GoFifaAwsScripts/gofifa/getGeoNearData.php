<?php
include "allCollections.php";
header("Access-Control-Allow-Origin: *");

if(isset($_GET['country']) && isset($_GET['distance'])){
	$country = $_GET['country'];
	$latitude = 0.0;
	$longitude = 0.0;
	if(strcmp($country, "Argentina") == 0){
		$latitude = -34.6085;
		$longitude = -58.37344;
	}else if(strcmp($country, "Brazil") == 0){
		$latitude = -15.77843;
		$longitude = -47.92866;
	}else if(strcmp($country, "Spain") == 0){
		$latitude = 40.41956;
		$longitude = -3.69196;
	}else if(strcmp($country, "Germany") == 0){
		$latitude = 52.51605;
		$longitude = 13.37691;
	}
	$maxDistance = (int)$_GET['distance'] * 1000;
	$db = (new MongoDB\Client)->fifa;
	$cursor = $db->command([
		'geoNear' => 'playerDetails',
		'near' => [
			'type' => 'Point',
			'coordinates' => [$longitude,$latitude],
		],
		'spherical' => 'true',
		'maxDistance' => $maxDistance,
		'num' => 2000,
	]);
	$results = $cursor->toArray()[0];
	$count = 0;
	$allPlayers = array();
	$tempLat = 0;
	$tempLon = 0;
	$tempName = "";
	$change = 0;
	$countryCount = 0;
	foreach ($results["results"] as $doc) {
		$bigName = $tempName;
		$name = $doc["obj"]["Name"];
		$latitude = $doc["obj"]["Latitude"];
		$longitude = $doc["obj"]["Longitude"];
		$id = $doc["obj"]["ID"];
		if($change == 0){
			$tempLat = $latitude;
			$tempLon = $longitude;
			$change = 1;
		}
		if($tempLat == $latitude && $tempLon == $longitude){
			if($countryCount < 21){
				$tempName = $tempName." "."<a href=\"https://gofifa.herokuapp.com/home/player/see_details.php?id=".$id."\">".$name."</a>";
				$countryCount = $countryCount + 1;
			}
		}
		else{
			$player = array("name"=> $bigName, "lat" => $tempLat, "lon" => $tempLon);
			array_push($allPlayers, $player);
			$tempLat = $latitude;
			$tempLon = $longitude;
			$bigName = "";
			$tempName="";
			$countryCount = 0;
		}		
	}
	echo json_encode($allPlayers);
}
?>