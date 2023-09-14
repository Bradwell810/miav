<?php
require "db.php";

$email = $_POST["email"];
$password = $_POST["psw"];

$isValidEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

if($conn){
    if($isValidEmail === true){
        echo "The Email is not valid";
    }else{
        $sqlCheckEmail = "SELECT * FROM `crime_login` WHERE `emp_id` LIKE '$email';";
        $emailQuery = mysqli_query($conn,$sqlCheckEmail);
        if(mysqli_num_rows($emailQuery)>0){
            $sqlLogin = "SELECT * FROM `crime_login` WHERE `emp_id` LIKE '$email' AND `password` LIKE '$password';";
            $loginQuery = mysqli_query($conn,$sqlLogin);
            if(mysqli_num_rows($loginQuery)>0){
                while($row = mysqli_fetch_array($loginQuery)){
                    $emp_id = $row['emp_id'];
                    $username = $row['username'];
                    $get_email = $row['email'];
                    $status1 = $row['status1'];
                    $status2 = $row['status2'];
                    $getpassword = $row['password'];
                    $mobile = $row['mobile'];

                    echo $emp_id."aaa".$get_email."bbb".$status1."ccc".$status2."ddd".$username."eee".$getpassword."fff".$mobile."nulll";
                }
            }else{
                echo "Wrong Password";
            }
        }else{
            echo "This ID is not Registered!";
        }
    }
}else{
    echo "Connection Error";
}

?>