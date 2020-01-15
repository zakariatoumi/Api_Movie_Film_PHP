<?php
include('../connect.php');
if (isset($_GET['id']) && isset($_GET['status'])) {
    // get data from clients
    $id=$_GET['id'];
    $status=$_GET['status'];
    // select from databasa by ID
    $select=mysqli_query($con, "SELECT * FROM categorie WHERE id_categorie='$id'");

    while ($row=mysqli_fetch_object($select)) {
       
        $update=mysqli_query($con, "UPDATE categorie SET valid='$status' WHERE id_categorie='$id' ");
        if ($update) {
            http_response_code(201);
        } else {
            http_response_code(422);
        }
    }
}
