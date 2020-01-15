<?php
include('../connect.php');
if (isset($_GET['id']) && isset($_GET['status'])) {
    // get data from clients
    $id=$_GET['id'];
    $status=$_GET['status'];
    // select from databasa by ID
    $select=mysqli_query($con, "SELECT * FROM film WHERE id_film='$id'");

    while ($row=mysqli_fetch_object($select)) {
     
        $update=mysqli_query($con, "UPDATE film SET valid='$status' WHERE id_film='$id' ");
        if ($update) {
            http_response_code(201);
        } else {
            http_response_code(422);
        }
    }
}
