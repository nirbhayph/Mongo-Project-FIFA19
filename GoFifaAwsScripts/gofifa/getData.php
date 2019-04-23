<?php
include "allCollections.php";
header("Access-Control-Allow-Origin: *");

$countries = $collectionPlayerDetails->distinct("Nationality");
$teams = $collectionPlayerDetails->distinct("Club");
$positions = $collectionPlayerDetails->distinct("Position");
$preferredFoots = $collectionPlayerDetails->distinct("Preferred Foot");
$weakFoots = $collectionPlayerDetails->distinct("Weak Foot");
$skillMoves = $collectionPlayerDetails->distinct("Skill Moves");
$heights = $collectionPlayerDetails->distinct("Height");
$internationalReputations = $collectionPlayerDetails->distinct("International Reputation");
$realFaces = $collectionPlayerDetails->distinct("Real Face");

$countryList = '<optgroup label="Countries">';
foreach ($countries as $country) {
	if($country!="")
		$countryList=$countryList.'<option value ="'.$country.'" >'.$country."</option>";
}
$countryList=$countryList."</optgroup>";

$teamList = '<optgroup label="Teams">';
foreach ($teams as $team){
	if($team!="")
		$teamList=$teamList.'<option value ="'.$team.'" >'.$team."</option>";
}
$teamList=$teamList."</optgroup>";

$positionList = '<optgroup label="Positions">';
foreach ($positions as $position){
	if($position!="")
		$positionList=$positionList.'<option value ="'.$position.'" >'.$position."</option>";
}
$positionList=$positionList."</optgroup>";

$preferredFootList = '<optgroup label="Preferred Foot">';
foreach ($preferredFoots as $preferredFoot){
	if($preferredFoot!="")
		$preferredFootList=$preferredFootList.'<option value ="'.$preferredFoot.'" >'.$preferredFoot."</option>";
}
$preferredFootList=$preferredFootList."</optgroup>";

$weakFootList = '<optgroup label="Weak Foot">';
foreach ($weakFoots as $weakFoot){
	if($weakFoot!="")
		$weakFootList=$weakFootList.'<option value ="'.$weakFoot.'" >'.$weakFoot."</option>";
}
$weakFootList=$weakFootList."</optgroup>";

$skillMovesList = '<optgroup label="Skill Moves">';
foreach ($skillMoves as $skillMove){
	if($skillMove!="")
		$skillMovesList=$skillMovesList.'<option value ="'.$skillMove.'" >'.$skillMove."</option>";
}
$skillMovesList=$skillMovesList."</optgroup>";

$heightList = "[";
$allInches = array();
foreach ($heights as $height){
	if($height!=""){
		$split = explode("'", $height);
		$number1 = (int)$split[0] * 12;
		$number2 = (int)$split[1];
		$inches = $number1 + $number2;
		array_push($allInches,$inches);
	}
}
sort($allInches);
foreach($allInches as $inch){
		$inches = intdiv($inch ,12);
		$feet = $inch % 12;
		$heightList=$heightList.'"'.$inches.'\''.$feet.'",';
}
$heightList=rtrim($heightList,',')."]";

$reputationList = '<optgroup label="International Reputation">';
foreach ($internationalReputations as $reputation){
	if($reputation!="")
		$reputationList=$reputationList.'<option value ="'.$reputation.'" >'.$reputation."</option>";
}
$reputationList=$reputationList."</optgroup>";

$realFaceList = '<optgroup label="Real Face">';
foreach ($realFaces as $realFace){
	if($realFace!="")
		$realFaceList=$realFaceList.'<option value ="'.$realFace.'" >'.$realFace."</option>";
}
$realFaceList=$realFaceList."</optgroup>";

$json_items = array(
	"countries"=>$countryList,
	"teams"=>$teamList,
	"positions"=>$positionList,
	"preferredFoot"=>$preferredFootList,
	"weakFoot"=>$weakFootList,
	"skillMoves"=>$skillMovesList,
	"heights"=>$heightList,
	"internationalReputation"=>$reputationList,
	"realFace"=>$realFaceList
);
echo json_encode($json_items);
?>