<?php

//============================================================+
// Author: Peckins Bradwell Kudakwashe Kamupira
//
// (c) Copyright:
//               Peckins Bradwell Kudakwashe Kamupira
//               peckinszw.rf.gd
//               kamupirak810@gmail.com
//============================================================+
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "eftDB";

$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $synid = mysqli_real_escape_string($link, $_POST['n1']);
    $region = mysqli_real_escape_string($link, $_POST['n2']);
    $shop = mysqli_real_escape_string($link, $_POST['n3']);
    $name = mysqli_real_escape_string($link, $_POST['n4']);
    $serial = mysqli_real_escape_string($link, $_POST['n5']);
    $currency = mysqli_real_escape_string($link, $_POST['n6']);
    $avail = mysqli_real_escape_string($link, $_POST['n7']);
    $availExp = mysqli_real_escape_string($link, $_POST['n8']);
    $status = mysqli_real_escape_string($link, $_POST['n9']);
    $notworking = mysqli_real_escape_string($link, $_POST['n9A']);
    $cond = mysqli_real_escape_string($link, $_POST['n10']);
    $stand = mysqli_real_escape_string($link, $_POST['n11']);
    $action = mysqli_real_escape_string($link, $_POST['n12']);
    $issues = mysqli_real_escape_string($link, $_POST['n13']);
    $issuesExp = mysqli_real_escape_string($link, $_POST['n14']);
    $user_name = mysqli_real_escape_string($link, $_POST['n15']);
    $datesaved = mysqli_real_escape_string($link, $_POST['n16']);


    $sql = " INSERT INTO `tills`(`SyncID`, `Region`, `Shop`, `Name`, `Serial`, `Currency`, 
    `Available`, `AvailableExp`, `Status`,`NotWorking`, `Cond`, `Stand`, `Action`, `Issues`, `IssuesExp`,`user_name`,`dateSaved`) VALUES 
    ('$synid','$region','$shop','$name','$serial','$currency','$avail','$availExp','$status','$notworking','$cond','$stand','$action','$issues','$issuesExp','$user_name','$datesaved');";

    if (mysqli_query($link, $sql)) {
        $response['error'] = false;
        $response['message'] = 'Data saved successfully';
        

    } else {
        // if not, making failure response
        $response['error'] = true;
        $response['message'] = 'Please try later';
        
    }
} else {
    $response['error'] = true;
    $response['message'] = "Invalid request";
    
}

echo json_encode($response);