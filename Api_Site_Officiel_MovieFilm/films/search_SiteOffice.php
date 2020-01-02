<?php
    require_once '../../connect.php';
    
if (isset($_GET['search']) && !empty($_GET['search'])) {
    
    $search=$_GET['search'];

    $min_length = 1;
    if (strlen($search) >= $min_length) {
        $sql = "SELECT * FROM film WHERE Titre_film LIKE '%$search%'";
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
        $output = array();
        while ($row = mysqli_fetch_array($result)) {
            $output[] = $row;
        }

        
        if (mysqli_query($con, $sql)) {
            echo json_encode($output);
            http_response_code(201);
        } else {
            http_response_code(422);
        }
    }
}
?>
