<?php

$conn = mysqli_connect("localhost", "root", "", "ajax");

$page = isset($_POST['page_no']) ? $_POST['page_no'] : 1;

$limit = 10;
$offset = ($page - 1) * $limit;

$sql = "SELECT * FROM user LIMIT {$offset}, {$limit}";
$result = mysqli_query($conn, $sql);

$output = '<div class="table-container">
<table class="user-table" width="100%">
<tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Action</th>
</tr>';

while($row = mysqli_fetch_assoc($result)){

    $output .= '<tr>
        <td>'.$row['id'].'</td>
        <td>'.$row['first_name'].'</td>
        <td>'.$row['last_name'].'</td>
        <td>
            <button class="edit-btn" data-eid="'.$row['id'].'">Edit</button>
            <button class="delete-btn" data-id="'.$row['id'].'">Delete</button>
        </td>
    </tr>';
}

$output .= '</table></div>';


// Total records
$sql_total = "SELECT * FROM user";
$result_total = mysqli_query($conn, $sql_total);

$total_records = mysqli_num_rows($result_total);
$total_pages = ceil($total_records / $limit);


// Pagination
$output .= '<div id="pagination">';

// Previous button
if($page > 1){
    $previous = $page - 1;

    $output .= '<button class="page-btn" data-page="'.$previous.'">
                    Previous
                </button>';
}


// Page numbers
for($i = 1; $i <= $total_pages; $i++){

    if($i == $page){
        $active = "active";
    }else{
        $active = "";
    }

    $output .= '<button class="page-btn '.$active.'" data-page="'.$i.'">
                    '.$i.'
                </button>';
}


// Next button
if($page < $total_pages){
    $next = $page + 1;

    $output .= '<button class="page-btn" data-page="'.$next.'">
                    Next
                </button>';
}

$output .= '</div>';
echo $output;
?>