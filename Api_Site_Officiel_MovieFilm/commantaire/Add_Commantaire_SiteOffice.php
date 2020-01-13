<?php
require '../../connect.php';
 $postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)) {
    $request = json_decode($postdata);
  
    // Sanitize.
    $textCommantaire = mysqli_real_escape_string($con, trim($request->textCommantaire));
  
      
  
    if (isset($_SESSION['id']) && !isset($_SESSION)) {
        session_start();
        $iduser = $_SESSION['id'];
        var_dump($iduser);
        die();
        $sql = "INSERT INTO `commantaire`(Text_commantaire, id_user, valid, date_commentaire, id_film) VALUES ('$textCommantaire','$iduser','1',NOW(),'34')";

        if (mysqli_query($con, $sql)) {
            http_response_code(201);
        } else {
            http_response_code(422);
        }
    }
    
}
