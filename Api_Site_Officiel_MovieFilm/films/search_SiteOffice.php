<?php
    require_once '../../connect.php';
    $postdata = file_get_contents("php://input");
    
if (isset($postdata) && !empty($postdata)) {
    $request = json_decode($postdata);
    
  $search = mysqli_real_escape_string($con, trim($request->search));

    $min_length = 1;
    if (strlen($query) >= $min_length) {
        $sql = "SELECT * FROM film WHERE Titre_film LIKE '%$query%'";
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
