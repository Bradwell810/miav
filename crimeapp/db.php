<?php

$conn = mysqli_connect("localhost","root","","stanbic_april");

if(mysqli_connect_error()){
    echo "error db";
}


$x = 0;
while($x<=7){
    $x++;
}
echo $x;
?>