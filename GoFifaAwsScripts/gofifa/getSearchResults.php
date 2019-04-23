<?php
include "allCollections.php";
header("Access-Control-Allow-Origin: *");

$countries = array();
$teams = array();

$age = "";
$lowerAge = 15;
$higherAge = 45;

$overallRating = "";
$lowerORating = 0;
$higherORating = 99;

$potential = "";
$lowerPotential = 0;
$higherPotential = 99;

$positions = array();
$preferredFoot = array();
$weakFoot = array();
$skillMoves = array();

$heightRange = "";
$heightArray = array();

$weightRange = "";
$lowerWeight = (string)110;
$higherWeight = (string)270;

$value = "";
$lowerValue = (string)0;
$higherValue = (string)150000000;

$wage = "";
$lowerWage = (string)0;
$higherWage = (string)600000;

$releaseClause = "";
$lowerReleaseClause = (string)0;
$higherReleaseClause = (string)600000000;

$crossing = "";
$lowerCrossing = 0;
$higherCrossing = 99;

$finishing = "";
$lowerFinishing = 0;
$higherFinishing = 99;

$haccuracy = "";
$lowerHAccuracy = 0;
$higherHAccuracy = 99;

$spassing = "";
$lowerSPassing = 0;
$higherSPassing = 99;

$volleys = "";
$lowerVolleys = 0;
$higherVolleys = 99;

$dribbling = "";
$lowerDribbling = 0;
$higherDribbling = 99;

$curve = "";
$lowerCurve = 0;
$higherCurve = 99;

$fka = "";
$lowerFka = 0;
$higherFka = 99;

$lpassing = "";
$lowerLPassing = 0;
$higherLPassing = 99;

$bc = "";
$lowerBc = 0;
$higherBc = 99;

$acceleration = "";
$lowerAcceleration = 0;
$higherAcceleration = 99;

$sprint = "";
$lowerSprint = 0;
$higherSprint = 99;

$agility = "";
$lowerAgility = 0;
$higherAgility = 99;

$reactions = "";
$lowerReactions = 0;
$higherReactions = 99;

$balance = "";
$lowerBalance = 0;
$higherBalance = 99;

$spower = "";
$loweSPower = 0;
$higherSPower = 99;

$jumping = "";
$lowerJumping = 0;
$higherJumping = 99;

$stamina = "";
$lowerStamina = 0;
$higherStamina = 99;

$strength = "";
$lowerStrength = 0;
$higherStrength = 99;

$lshots = "";
$lowerLShots = 0;
$higherLShots = 99;

$aggression = "";
$lowerAggression = 0;
$higherAggression = 99;

$interceptions = "";
$lowerInterceptions = 0;
$higherInterceptions = 99;

$positioning = "";
$lowerPositioning = 0;
$higherPositioning = 99;

$vision = "";
$lowerVision = 0;
$higherVision = 99;

$penalties = "";
$lowerPenalties = 0;
$higherPenalties = 99;

$composure = "";
$lowerComposure = 0;
$higherComposure = 99;

$marking = "";
$lowerMarking = 0;
$higherMarking = 99;

$standT = "";
$lowerStandT = 0;
$higherStandT = 99;

$slideT = "";
$lowerSlideT = 0;
$higherSlideT = 99;

$gkd = "";
$lowerGkd = 0;
$higherGkd = 99;

$gkh = "";
$lowerGkh = 0;
$higherGkh = 99;

$gkk = "";
$lowerGkk = 0;
$higherGkk = 99;

$gkp = "";
$lowerGkp = 0;
$higherGkp = 99;

$gkr = "";
$lowerGkr = 0;
$higherGkr = 99;

$iReputation = array();
$rFace = array();

$ls_st_rs = "";
$lowerLS_ST_RS = 0;
$higherLS_ST_RS = 99;

$lw_rw = "";
$lowerLW_RW = 0;
$higherLW_RW = 99;

$lf_cf_rf = "";
$lowerLF_CF_RF = 0;
$higherLF_CF_RF = 99;

$lam_cam_ram = "";
$lowerLAM_CAM_RAM = 0;
$higherLAM_CAM_RAM = 99;

$lm_rm = "";
$lowerLM_RM = 0;
$higherLM_RM = 99;

$ldm_cm_rcm = "";
$lowerLDM_CM = 0;
$higherLDM_CM = 99;

$lcb_cb_rcb = "";
$lowerLCB = 0;
$higherLCB = 99;

$lb_rb = "";
$lowerLB = 0;
$higherLB = 99;

$lwb_rwb = "";
$lowerLWB = 0;
$higherLWB = 99;

if (isset($_GET['player_text']))
{
    $text = $_GET['player_text'];
    $checkRegex = '/^' . $text . '/';
    $displayQuery = $text . "* (Wildcard Query)";
    $searchPlayersCursor = $collectionPlayerDetails->find(['Name' => new MongoDB\BSON\Regex('.*' . preg_quote($text) . '.*', 'i') , ],['sort' => ['Overall' => -1]]);

    $result = '<table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%"><thead><tr><th>Name</th><th>Description</th><th>Age</th><th>Overall</th><th>Potential</th><th>Team</th><th>Country</th><th>Value</th><th>Wage</th></tr></thead><tbody id="searchResult">';
    $count = 0;
    foreach ($searchPlayersCursor as $doc)
    {
        $result = $result . "<tr>";
        $id = $doc["ID"];
        $result = $result . "<td><a href=\"http://gofifa.herokuapp.com/home/player/see_details.php?id=" . $id . "\">" . $doc["Name"] . "</a></td>";
        $player_desc = substr($doc['description'], 0, 40);
        $result = $result . "<td>" . $player_desc . "...</td>";
        $result = $result . "<td>" . $doc['Age'] . "</td>";
        $result = $result . "<td>" . $doc['Overall'] . "</td>";
        $result = $result . "<td>" . $doc['Potential'] . "</td>";
        $result = $result . "<td>" . $doc['Club'] . "</td>";
        $result = $result . "<td>" . $doc['Nationality'] . "</td>";
        $result = $result . "<td>" . $doc['Value'] . "</td>";
        $result = $result . "<td>" . $doc['Wage'] . "</td>";
        $result = $result . "</tr>";
        $count = $count + 1;
    }
    $result = $result . "</tbody></table>";
    $response = array(
        "count" => $count,
        "results" => $result,
        "display" => $displayQuery
    );
    echo json_encode($response);
}
else
{
    if (isset($_GET['countries']))
    {
        $countries = $_GET['countries'];
    }
    else
    {
        $countries = $collectionPlayerDetails->distinct("Nationality");
    }

    if (isset($_GET['teams']))
    {
        $teams = $_GET['teams'];
    }
    else
    {
        $teams = $collectionPlayerDetails->distinct("Club");
    }

    if (isset($_GET['age']))
    {
        $age = $_GET['age'];
        $split = explode(";", $age);
        $lowerAge = (int)$split[0];
        $higherAge = (int)$split[1];
    }

    if (isset($_GET['o-rating']))
    {
        $overallRating = $_GET['o-rating'];
        $split = explode(";", $overallRating);
        $lowerORating = (int)$split[0];
        $higherORating = (int)$split[1];
    }

    if (isset($_GET['potential']))
    {
        $potential = $_GET['potential'];
        $split = explode(";", $potential);
        $lowerPotential = (int)$split[0];
        $higherPotential = (int)$split[1];
    }

    if (isset($_GET['positions']))
    {
        $positions = $_GET['positions'];
    }
    else
    {
        $positions = $collectionPlayerDetails->distinct("Position");
    }

    if (isset($_GET['preferredFoot']))
    {
        $preferredFoot = $_GET['preferredFoot'];
    }
    else
    {
        $preferredFoot = $collectionPlayerDetails->distinct("Preferred Foot");
    }

    if (isset($_GET['weakFoot']))
    {
        $weakFoot = $_GET['weakFoot'];
    }
    else
    {
        $weakFoot = $collectionPlayerDetails->distinct("Weak Foot");
    }

    if (isset($_GET['skillMoves']))
    {
        $skillMoves = $_GET['skillMoves'];
    }
    else
    {
        $skillMoves = $collectionPlayerDetails->distinct("Skill Moves");
    }

    if (isset($_GET['heightRange']))
    {
        $heightRange = $_GET['heightRange'];
        $heights = $collectionPlayerDetails->distinct("Height");

        $allInches = array();
        foreach ($heights as $height)
        {
            if ($height != "")
            {
                $split = explode("'", $height);
                $number1 = (int)$split[0] * 12;
                $number2 = (int)$split[1];
                $inches = $number1 + $number2;
                array_push($allInches, $inches);
            }
        }
        sort($allInches);

        $counter = 0;
        $index = 0;
        foreach ($allInches as $inch)
        {
            $inches = intdiv($inch, 12);
            $feet = $inch % 12;
            $heightValue = $inches . '\'' . $feet;
            if (strcmp($heightValue, $heightRange) == 0)
            {
                array_push($heightArray, $heightValue);
                break;
            }
            $counter = $counter + 1;
            array_push($heightArray, $heightValue);
        }
    }

    if (isset($_GET['weightRange']))
    {
        $weightRange = $_GET['weightRange'];
        $split = explode(";", $weightRange);
        $lowerWeight = (string)$split[0];
        $higherWeight = (string)$split[1];
    }

    if (isset($_GET['value']))
    {
        $value = $_GET['value'];
        $lowerValue = "€" . "0" . "M";
        if (isset($value)) $higherValue = "€" . "150000000" . "M";
        else $higherValue = "€" . $value . "M";
    }

    if (isset($_GET['wage']))
    {
        $wage = $_GET['wage'];
        $lowerWage = (string)0;
        if ($wage == "") $higherWage = (string)600000;
        else $higherWage = (string)$wage;
    }

    if (isset($_GET['releaseClause']))
    {
        $releaseClause = $_GET['releaseClause'];
        $lowerReleaseClause = (string)0;
        if ($releaseClause == "") $higherReleaseClause = (string)600000;
        else $higherReleaseClause = (string)$releaseClause;
    }

    if (isset($_GET['crossing']))
    {
        $crossing = $_GET['crossing'];
        $split = explode(";", $crossing);
        $lowerCrossing = (int)$split[0];
        $higherCrossing = (int)$split[1];
    }

    if (isset($_GET['finishing']))
    {
        $finishing = $_GET['finishing'];
        $split = explode(";", $finishing);
        $lowerFinishing = (int)$split[0];
        $higherFinishing = (int)$split[1];
    }

    if (isset($_GET['haccuracy']))
    {
        $haccuracy = $_GET['haccuracy'];
        $split = explode(";", $haccuracy);
        $lowerHAccuracy = (int)$split[0];
        $higherHAccuracy = (int)$split[1];
    }

    if (isset($_GET['spassing']))
    {
        $spassing = $_GET['spassing'];
        $split = explode(";", $spassing);
        $lowerSPassing = (int)$split[0];
        $higherSPassing = (int)$split[1];
    }

    if (isset($_GET['volleys']))
    {
        $volleys = $_GET['volleys'];
        $split = explode(";", $volleys);
        $lowerVolleys = (int)$split[0];
        $higherVolleys = (int)$split[1];
    }

    if (isset($_GET['dribbling']))
    {
        $dribbling = $_GET['dribbling'];
        $split = explode(";", $dribbling);
        $lowerDribbling = (int)$split[0];
        $higherDribbling = (int)$split[1];
    }

    if (isset($_GET['curve']))
    {
        $curve = $_GET['curve'];
        $split = explode(";", $curve);
        $lowerCurve = (int)$split[0];
        $higherCurve = (int)$split[1];
    }

    if (isset($_GET['fka']))
    {
        $fka = $_GET['fka'];
        $split = explode(";", $fka);
        $lowerFka = (int)$split[0];
        $higherFka = (int)$split[1];
    }

    if (isset($_GET['lpassing']))
    {
        $lpassing = $_GET['lpassing'];
        $split = explode(";", $lpassing);
        $lowerLPassing = (int)$split[0];
        $higherLPassing = (int)$split[1];
    }

    if (isset($_GET['bc']))
    {
        $bc = $_GET['bc'];
        $split = explode(";", $bc);
        $lowerBc = (int)$split[0];
        $higherBc = (int)$split[1];
    }

    if (isset($_GET['acceleration']))
    {
        $acceleration = $_GET['acceleration'];
        $split = explode(";", $acceleration);
        $lowerAcceleration = (int)$split[0];
        $higherAcceleration = (int)$split[1];
    }

    if (isset($_GET['sprint']))
    {
        $sprint = $_GET['sprint'];
        $split = explode(";", $sprint);
        $lowerSprint = (int)$split[0];
        $higherSprint = (int)$split[1];
    }

    if (isset($_GET['agility']))
    {
        $agility = $_GET['agility'];
        $split = explode(";", $agility);
        $lowerAgility = (int)$split[0];
        $higherAgility = (int)$split[1];
    }

    if (isset($_GET['reactions']))
    {
        $reactions = $_GET['reactions'];
        $split = explode(";", $reactions);
        $lowerReactions = (int)$split[0];
        $higherReactions = (int)$split[1];
    }

    if (isset($_GET['balance']))
    {
        $balance = $_GET['balance'];
        $split = explode(";", $balance);
        $lowerBalance = (int)$split[0];
        $higherBalance = (int)$split[1];
    }

    if (isset($_GET['spower']))
    {
        $spower = $_GET['spower'];
        $split = explode(";", $spower);
        $lowerSPower = (int)$split[0];
        $higherSPower = (int)$split[1];
    }

    if (isset($_GET['jumping']))
    {
        $jumping = $_GET['jumping'];
        $split = explode(";", $jumping);
        $lowerJumping = (int)$split[0];
        $higherJumping = (int)$split[1];
    }

    if (isset($_GET['stamina']))
    {
        $stamina = $_GET['stamina'];
        $split = explode(";", $stamina);
        $lowerStamina = (int)$split[0];
        $higherStamina = (int)$split[1];
    }

    if (isset($_GET['strength']))
    {
        $strength = $_GET['strength'];
        $split = explode(";", $strength);
        $lowerStrength = (int)$split[0];
        $higherStrength = (int)$split[1];
    }

    if (isset($_GET['lshots']))
    {
        $lshots = $_GET['lshots'];
        $split = explode(";", $lshots);
        $lowerLShots = (int)$split[0];
        $higherLShots = (int)$split[1];
    }

    if (isset($_GET['aggression']))
    {
        $aggression = $_GET['aggression'];
        $split = explode(";", $aggression);
        $lowerAggression = (int)$split[0];
        $higherAggression = (int)$split[1];
    }

    if (isset($_GET['interceptions']))
    {
        $interceptions = $_GET['interceptions'];
        $split = explode(";", $interceptions);
        $lowerInterceptions = (int)$split[0];
        $higherInterceptions = (int)$split[1];
    }

    if (isset($_GET['positioning']))
    {
        $positioning = $_GET['positioning'];
        $split = explode(";", $positioning);
        $lowerPositioning = (int)$split[0];
        $higherPositioning = (int)$split[1];
    }

    if (isset($_GET['vision']))
    {
        $vision = $_GET['vision'];
        $split = explode(";", $vision);
        $lowerVision = (int)$split[0];
        $higherVision = (int)$split[1];
    }

    if (isset($_GET['penalties']))
    {
        $penalties = $_GET['penalties'];
        $split = explode(";", $penalties);
        $lowerPenalties = (int)$split[0];
        $higherPenalties = (int)$split[1];
    }

    if (isset($_GET['composure']))
    {
        $composure = $_GET['composure'];
        $split = explode(";", $composure);
        $lowerComposure = (int)$split[0];
        $higherComposure = (int)$split[1];
    }

    if (isset($_GET['marking']))
    {
        $marking = $_GET['marking'];
        $split = explode(";", $marking);
        $lowerMarking = (int)$split[0];
        $higherMarking = (int)$split[1];
    }

    if (isset($_GET['standT']))
    {
        $standT = $_GET['standT'];
        $split = explode(";", $standT);
        $lowerStandT = (int)$split[0];
        $higherStandT = (int)$split[1];
    }

    if (isset($_GET['slideT']))
    {
        $slideT = $_GET['slideT'];
        $split = explode(";", $slideT);
        $lowerSlideT = (int)$split[0];
        $higherSlideT = (int)$split[1];
    }

    if (isset($_GET['gkd']))
    {
        $gkd = $_GET['gkd'];
        $split = explode(";", $gkd);
        $lowerGkd = (int)$split[0];
        $higherGkd = (int)$split[1];
    }

    if (isset($_GET['gkh']))
    {
        $gkh = $_GET['gkh'];
        $split = explode(";", $gkh);
        $lowerGkh = (int)$split[0];
        $higherGkh = (int)$split[1];
    }

    if (isset($_GET['gkk']))
    {
        $gkk = $_GET['gkk'];
        $split = explode(";", $gkk);
        $lowerGkk = (int)$split[0];
        $higherGkk = (int)$split[1];
    }

    if (isset($_GET['gkp']))
    {
        $gkp = $_GET['gkp'];
        $split = explode(";", $gkp);
        $lowerGkp = (int)$split[0];
        $higherGkp = (int)$split[1];
    }

    if (isset($_GET['gkr']))
    {
        $gkr = $_GET['gkr'];
        $split = explode(";", $gkr);
        $lowerGkr = (int)$split[0];
        $higherGkr = (int)$split[1];
    }

    if (isset($_GET['iReputation']))
    {
        $iReputation = $_GET['iReputation'];
        $count = 0;
        foreach ($iReputation as $Reputation)
        {
            $iReputation[$count] = (int)$Reputation;
            $count = $count + 1;
        }
    }
    else
    {
        $iReputation = $collectionPlayerDetails->distinct("International Reputation");
        $count = 0;
        foreach ($iReputation as $Reputation)
        {
            $iReputation[$count] = (int)$Reputation;
            $count = $count + 1;
        }
    }

    if (isset($_GET['rFace']))
    {
        $rFace = $_GET['rFace'];
    }
    else
    {
        $rFace = $collectionPlayerDetails->distinct("Real Face");
    }

    if (isset($_GET['ls_st_rs']))
    {
        $ls_st_rs = $_GET['ls_st_rs'];
        $split = explode(";", $ls_st_rs);
        $lowerLS_ST_RS = $split[0];
        $higherLS_ST_RS = $split[1];
    }

    if (isset($_GET['lw_rw']))
    {
        $lw_rw = $_GET['lw_rw'];
        $split = explode(";", $lw_rw);
        $lowerLW_RW = $split[0];
        $higherLW_RW = $split[1];
    }

    if (isset($_GET['lf_cf_rf']))
    {
        $lf_cf_rf = $_GET['lf_cf_rf'];
        $split = explode(";", $lf_cf_rf);
        $lowerLF_CF_RF = $split[0];
        $higherLF_CF_RF = $split[1];
    }

    if (isset($_GET['lam_cam_ram']))
    {
        $lam_cam_ram = $_GET['lam_cam_ram'];
        $split = explode(";", $lam_cam_ram);
        $lowerLAM_CAM_RAM = $split[0];
        $higherLAM_CAM_RAM = $split[1];
    }

    if (isset($_GET['lm_rm']))
    {
        $lm_rm = $_GET['lm_rm'];
        $split = explode(";", $lm_rm);
        $lowerLM_RM = $split[0];
        $higherLM_RM = $split[1];
    }

    if (isset($_GET['ldm_cm_rcm']))
    {
        $ldm_cm_rcm = $_GET['ldm_cm_rcm'];
        $split = explode(";", $ldm_cm_rcm);
        $lowerLDM_CM = $split[0];
        $higherLDM_CM = $split[1];
    }

    if (isset($_GET['lcb_cb_rcb']))
    {
        $lcb_cb_rcb = $_GET['lcb_cb_rcb'];
        $split = explode(";", $lcb_cb_rcb);
        $lowerLCB = $split[0];
        $higherLCB = $split[1];
    }

    if (isset($_GET['lb_rb']))
    {
        $lb_rb = $_GET['lb_rb'];
        $split = explode(";", $lb_rb);
        $lowerLB = $split[0];
        $higherLB = $split[1];
    }

    if (isset($_GET['lwb_rwb']))
    {
        $lwb_rwb = $_GET['lwb_rwb'];
        $split = explode(";", $lwb_rwb);
        $lowerLWB = $split[0];
        $higherLWB = $split[1];
    }
    $searchCursor = $collectionPlayerDetails->find(['Nationality' => ['$in' => $countries], 'Club' => ['$in' => $teams], 'Age' => ['$gte' => $lowerAge, '$lte' => $higherAge], 'Overall' => ['$gte' => $lowerORating, '$lte' => $higherORating], 'Potential' => ['$gte' => $lowerPotential, '$lte' => $higherPotential], 'Position' => ['$in' => $positions], 'Preferred Foot' => ['$in' => $preferredFoot], 'Weak Foot' => ['$in' => $weakFoot], 'Skill Moves' => ['$in' => $skillMoves], 'Height' => ['$in' => $heightArray], 'Weight' => ['$gte' => $lowerWeight, '$lte' => $higherWeight], /*
    'Value' => [
    '$gte' => $lowerValue,
    '$lte' => $higherValue
    ],
    'Wage' => [
    '$gte' => $lowerWage,
    '$lte' => $higherWage
    ],*/
    'Crossing' => ['$gte' => $lowerCrossing, '$lte' => $higherCrossing], 'Finishing' => ['$gte' => $lowerFinishing, '$lte' => $higherFinishing], 'HeadingAccuracy' => ['$gte' => $lowerHAccuracy, '$lte' => $higherHAccuracy], 'ShortPassing' => ['$gte' => $lowerSPassing, '$lte' => $higherSPassing], 'Volleys' => ['$gte' => $lowerVolleys, '$lte' => $higherVolleys], 'Finishing' => ['$gte' => $lowerFinishing, '$lte' => $higherFinishing], 'Dribbling' => ['$gte' => $lowerDribbling, '$lte' => $higherDribbling], 'Curve' => ['$gte' => $lowerCurve, '$lte' => $higherCurve], 'FKAccuracy' => ['$gte' => $lowerFka, '$lte' => $higherFka], 'LongPassing' => ['$gte' => $lowerLPassing, '$lte' => $higherLPassing], 'BallControl' => ['$gte' => $lowerBc, '$lte' => $higherBc], 'Acceleration' => ['$gte' => $lowerAcceleration, '$lte' => $higherAcceleration], 'SprintSpeed' => ['$gte' => $lowerSprint, '$lte' => $higherSprint], 'Agility' => ['$gte' => $lowerAgility, '$lte' => $higherAgility], 'Reactions' => ['$gte' => $lowerReactions, '$lte' => $higherReactions], 'Balance' => ['$gte' => $lowerBalance, '$lte' => $higherBalance], 'ShotPower' => ['$gte' => $lowerSPower, '$lte' => $higherSPower], 'Jumping' => ['$gte' => $lowerJumping, '$lte' => $higherJumping], 'Stamina' => ['$gte' => $lowerStamina, '$lte' => $higherStamina], 'Strength' => ['$gte' => $lowerStrength, '$lte' => $higherStrength], 'LongShots' => ['$gte' => $lowerLShots, '$lte' => $higherLShots], 'Aggression' => ['$gte' => $lowerStrength, '$lte' => $higherStrength], 'Interceptions' => ['$gte' => $lowerStrength, '$lte' => $higherStrength], 'Positioning' => ['$gte' => $lowerPositioning, '$lte' => $higherPositioning], 'Vision' => ['$gte' => $lowerVision, '$lte' => $higherVision], 'Penalties' => ['$gte' => $lowerPenalties, '$lte' => $higherPenalties], 'Composure' => ['$gte' => $lowerComposure, '$lte' => $higherComposure], 'Marking' => ['$gte' => $lowerMarking, '$lte' => $higherMarking], 'StandingTackle' => ['$gte' => $lowerStandT, '$lte' => $higherStandT], 'SlidingTackle' => ['$gte' => $lowerSlideT, '$lte' => $higherSlideT], 'GKDiving' => ['$gte' => $lowerGkd, '$lte' => $higherGkd], 'GKHandling' => ['$gte' => $lowerGkh, '$lte' => $higherGkh], 'GKKicking' => ['$gte' => $lowerGkk, '$lte' => $higherGkk], 'GKPositioning' => ['$gte' => $lowerGkp, '$lte' => $higherGkp], 'GKReflexes' => ['$gte' => $lowerGkr, '$lte' => $higherGkr], 'International Reputation' => ['$in' => $iReputation], 'Real Face' => ['$in' => $rFace], ],['sort' => ['Overall' => -1],]);

    $result = '<table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%"><thead><tr><th>Name</th><th>Description</th><th>Age</th><th>Overall</th><th>Potential</th><th>Team</th><th>Country</th><th>Value</th><th>Wage</th></tr></thead><tbody id="searchResult">';
    $count = 0;
    foreach ($searchCursor as $doc)
    {
        $result = $result . "<tr>";
        $id = $doc["ID"];
        $result = $result . "<td><a href=\"http://gofifa.herokuapp.com/home/player/see_details.php?id=" . $id . "\">" . $doc["Name"] . "</a></td>";
        $player_desc = substr($doc['description'], 0, 40);
        $result = $result . "<td>" . $player_desc . "...</td>";
        $result = $result . "<td>" . $doc['Age'] . "</td>";
        $result = $result . "<td>" . $doc['Overall'] . "</td>";
        $result = $result . "<td>" . $doc['Potential'] . "</td>";
        $result = $result . "<td>" . $doc['Club'] . "</td>";
        $result = $result . "<td>" . $doc['Nationality'] . "</td>";
        $result = $result . "<td>" . $doc['Value'] . "</td>";
        $result = $result . "<td>" . $doc['Wage'] . "</td>";
        $result = $result . "</tr>";
        $count = $count + 1;
    }
    $result = $result . "</tbody></table>";
    $response = array(
        "count" => $count,
        "results" => $result,
        "display" => "Custom Search Results"
    );
    echo json_encode($response);
}

/*
'$and' => [
			'LS' => [
				'$gte'=>$lowerLS_ST_RS,
				'$lte'=>$higherLS_ST_RS
			],
			'ST' => [
				'$gte'=>$lowerLS_ST_RS,
				'$lte'=>$higherLS_ST_RS
			],
			'RS' => [
				'$gte'=>$lowerLS_ST_RS,
				'$lte'=>$higherLS_ST_RS
			]
		],
		'$and' => [
			'LW' => [
				'$gte'=>$lowerLW_RW,
				'$lte'=>$higherLW_RW
			],
			'RW' => [
				'$gte'=>$lowerLW_RW,
				'$lte'=>$higherLW_RW
			]
		],
		'$and' => [
			'LF' => [
				'$gte'=>$lowerLF_CF_RF,
				'$lte'=>$higherLF_CF_RF
			],
			'CF' => [
				'$gte'=>$lowerLF_CF_RF,
				'$lte'=>$higherLF_CF_RF
			],
			'RF' => [
				'$gte'=>$lowerLF_CF_RF,
				'$lte'=>$higherLF_CF_RF
			]
		],
		'$and' => [
			'LAM' => [
				'$gte'=>$lowerLAM_CAM_RAM,
				'$lte'=>$higherLAM_CAM_RAM
			],
			'CAM' => [
				'$gte'=>$lowerLAM_CAM_RAM,
				'$lte'=>$higherLAM_CAM_RAM
			],
			'RAM' => [
				'$gte'=>$lowerLAM_CAM_RAM,
				'$lte'=>$higherLAM_CAM_RAM
			]
		],
		'$and' => [
			'LM' => [
				'$gte'=>$lowerLM_RM,
				'$lte'=>$higherLM_RM
			],
			'RM' => [
				'$gte'=>$lowerLM_RM,
				'$lte'=>$higherLM_RM
			]
		],
		'$and' => [
			'LCM' => [
				'$gte'=>$lowerLDM_CM,
				'$lte'=>$higherLDM_CM
			],
			'CM' => [
				'$gte'=>$lowerLDM_CM,
				'$lte'=>$higherLDM_CM
			],
			'RCM' => [
				'$gte'=>$lowerLDM_CM,
				'$lte'=>$higherLDM_CM
			]
		],
		'$and' => [
			'LCB' => [
				'$gte'=>$lowerLCB,
				'$lte'=>$higherLCB
			],
			'CB' => [
				'$gte'=>$lowerLCB,
				'$lte'=>$higherLCB
			],
			'RCB' => [
				'$gte'=>$lowerLCB,
				'$lte'=>$higherLCB
			]
		],
		'$and' => [
			'LB' => [
				'$gte'=>$lowerLB,
				'$lte'=>$higherLB
			],
			'RB' => [
				'$gte'=>$lowerLB,
				'$lte'=>$higherLB
			]
		],
		'$and' => [
			'LWB' => [
				'$gte'=>$lowerLWB,
				'$lte'=>$higherLWB
			],
			'RWB' => [
				'$gte'=>$lowerLWB,
				'$lte'=>$higherLWB
			]
		]
*/
?>
