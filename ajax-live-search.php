<?php

$conn = mysqli_connect("localhost", "root", "", "ajax");

$search_value = $_POST['search'];
$page = isset($_POST['page_no']) ? $_POST['page_no'] : 1;

$limit = 10;
$offset = ($page - 1) * $limit;

$sql = "SELECT * FROM user 
        WHERE first_name LIKE '%{$search_value}%'
        OR last_name LIKE '%{$search_value}%'
        LIMIT {$offset}, {$limit}";

$count_sql = "SELECT * FROM user
              WHERE first_name LIKE '%{$search_value}%'
              OR last_name LIKE '%{$search_value}%'";

$count_result = mysqli_query($conn, $count_sql);

$total_records = mysqli_num_rows($count_result);

$total_pages = ceil($total_records / $limit);
$result = mysqli_query($conn, $sql);

$output = '<div class="table-container">
<table class="user-table" width="100%">
<tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Action</th>
</tr>';

if(mysqli_num_rows($result) > 0){

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

}else{

    $output .= '<tr>
        <td colspan="4">No Record Found</td>
    </tr>';
}
$output .= '</table></div>';

$output .= '<div id="pagination">';

if($page > 1){

    $previous = $page - 1;

    $output .= '<button class="page-btn" data-page="'.$previous.'">
                    Previous
                </button>';
}

for($i = 1; $i <= $total_pages; $i++){

    $active = ($i == $page) ? "active" : "";

    $output .= '<button class="page-btn '.$active.'" data-page="'.$i.'">
                    '.$i.'
                </button>';
}

if($page < $total_pages){

    $next = $page + 1;

    $output .= '<button class="page-btn" data-page="'.$next.'">
                    Next
                </button>';
}

$output .= '</div>';

echo $output;

?>