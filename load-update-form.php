<?php

$conn = mysqli_connect("localhost", "root", "", "ajax");

$id = $_POST['id'];

$sql = "SELECT * FROM user WHERE id = {$id}";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){

    $row = mysqli_fetch_assoc($result);

    $output = '
        <tr>
            <td>First Name</td>
            <td>
                <input type="hidden" id="edit-id" value="'.$row['id'].'">
                <input type="text" id="edit-fname" value="'.$row['first_name'].'">
            </td>
        </tr>

        <tr>
            <td>Last Name</td>
            <td>
                <input type="text" id="edit-lname" value="'.$row['last_name'].'">
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <input class="btn-submit" type="submit" id="edit-submit" value="Update">
            </td>
        </tr>
    ';

    echo $output;
}
?>