<?php

$conn = mysqli_connect("localhost","root","","ajax");

$first = $_POST['fname'];
$last = $_POST['lname'];

$sql = "INSERT INTO user(first_name,last_name)
VALUES('$first','$last')";

if(mysqli_query($conn,$sql)){
   echo 1;
}else{
    echo 0;
}
?>