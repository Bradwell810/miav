<?php
$conn = mysqli_connect("sql104.infinityfree.com","epiz_32384930","FKMAmdCW1KLHKE","epiz_32384930_miav");

if(mysqli_connect_error()){
    echo "error db";
}

$email = $_POST["email"];
$password = $_POST["psw"];

$isValidEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

if($conn){
    if($isValidEmail === true){
        echo "The Email is not valid";
    }else{
        $sqlCheckEmail = "SELECT * FROM `users` WHERE `email` LIKE '$email';";
        $emailQuery = mysqli_query($conn,$sqlCheckEmail);
        if(mysqli_num_rows($emailQuery)>0){
            $sqlLogin = "SELECT * FROM `users` WHERE `email` LIKE '$email' AND `pass` LIKE '$password';";
            $loginQuery = mysqli_query($conn,$sqlLogin);
            if(mysqli_num_rows($loginQuery)>0){
                while($row = mysqli_fetch_array($loginQuery)){
                    $emp_id = $row['userId'];
                    $username = $row['username'];
                    $get_email = $row['email'];
                    $status1 = $row['status'];
                    $status2 = $row['status'];
                    $getpassword = $row['pass'];
                    $mobile = $row['lastPage'];

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


// $conn = mysqli_connect("localhost","root","","miav_config");

// if(mysqli_connect_error()){
//     echo "error db";
// }

// $response = array();
// $email = $_POST["email"];
// $password = $_POST["psw"];

// $isValidEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

// if($conn){
//     if($isValidEmail === true){
//         echo "The Email is not valid";
//     }else{
//         $sqlCheckEmail = "SELECT * FROM `users` WHERE `email` LIKE '$email';";
//         $emailQuery = mysqli_query($conn,$sqlCheckEmail);
//         if(mysqli_num_rows($emailQuery)>0){
//             $sqlLogin = "SELECT * FROM `users` WHERE `email` LIKE '$email' AND `pass` LIKE '$password';";
//             $loginQuery = mysqli_query($conn,$sqlLogin);
//             if(mysqli_num_rows($loginQuery)>0){
//                 while($row = mysqli_fetch_array($loginQuery)){
//                     $response['success'] = true;
//                     $response['userId'] = $row['userId'];
//                     $response['userName'] = $row['username'];
//                     $response['userEmail'] = $row['email'];
//                     $response['userStatus'] = $row['status'];
//                     $response['userStatus21'] = $row['status'];
//                     $response['userPword'] = $row['pass'];
//                     $response['userNumber'] = $row['lastPage'];
                    
//                 }
//             }else{
//                 $response['success'] = false;
//             }
//         }else{
//             $response['success'] = false;
//         }
//     }
// }else{
//     $response['success'] = false;
// }

// echo json_encode($response);
?>