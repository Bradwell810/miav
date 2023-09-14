<?php

include 'db.php';

$stmt = $conn->prepare("SELECT LocationName,OpenCases,ClosedCases FROM crime_locations");

$stmt ->execute();
$stmt -> bind_result($location, $open, $closed);

$crime_list = array();

while($stmt ->fetch()){

    $temp = array();
	
	$temp['LocationName'] = $location;
	$temp['OpenCases'] = $open;
	$temp['ClosedCases'] = $closed;

	array_push($crime_list,$temp);
	}

	echo json_encode($crime_list);

?>