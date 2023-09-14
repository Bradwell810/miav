<?php
include "db.php";

$stmt = $conn->prepare("SELECT * FROM crime_report_list ORDER BY id DESC;");


$stmt->execute();
$stmt->bind_result($id,$title,$story,$date);

$list = array();

while ($stmt->fetch()) {
    $crime = array();

    //$crime['id'] = $id;
    $crime['Story'] = $story;
    $crime['Title'] = $title;
    $crime['Date'] = $date;

    array_push($list,$crime);
}

echo json_encode($list);
?>