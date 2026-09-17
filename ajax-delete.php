<?php

$conn = mysqli_connect("localhost","root","","ajax");

$id = $_POST['id'];

$sql = "DELETE FROM user WHERE id = {$id}";

if(mysqli_query($conn,$sql)){
    echo 1;
}else{
    echo 0;
}

?>