<?php
include('../connect.php');
if (isset($_GET['id']) && isset($_GET['status'])) {
    // get data from clients
    $id=$_GET['id'];
    $status=$_GET['status'];
    // select from databasa by ID
    $select=mysqli_query($con, "SELECT * FROM film WHERE id='$id'");

    while ($row=mysqli_fetch_object($select)) {
        // $status_var=$row->valid;
        // if($status_var=='0')
        // {
//     $status_state=1;
        // }
        // else
        // {
        // $status_state=0;
        // }
        $update=mysqli_query($con, "UPDATE film SET valid='$status' WHERE id='$id' ");
        if ($update) {
            http_response_code(201);
        } else {
            http_response_code(422);
        }
    }
}
