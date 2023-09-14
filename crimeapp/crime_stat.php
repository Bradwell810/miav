<?php

include 'db.php';

$stmt = $conn->prepare("SELECT `ID` FROM details_stanbic limit 20");

$stmt ->execute();
$stmt -> bind_result($location);

$crime_list = array();

while($stmt ->fetch()){

    $temp = array();
	
	$temp['Legal name'] = $location;

	array_push($crime_list,$temp);
	}

	echo json_encode($crime_list);

?>