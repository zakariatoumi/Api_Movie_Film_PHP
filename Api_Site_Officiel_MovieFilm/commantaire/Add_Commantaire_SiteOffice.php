<?php
require '../../connect.php';
 $postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)) {
    $request = json_decode($postdata);
  
    // Sanitize.
    $textCommantaire = mysqli_real_escape_string($con, trim($request->textCommantaire));

    session_start();
    if (isset($_SESSION['id'])) {
        
        $sql = "INSERT INTO `commantaire`(Text_commantaire, id_user, valid, date_commentaire, id_film) VALUES ('$textCommantaire','".$_SESSION['id']."','1',NOW(),'34')";
        
        if (mysqli_query($con, $sql)) {
            http_response_code(201);
        } else {
            http_response_code(422);
        }
    }
    
    
}
