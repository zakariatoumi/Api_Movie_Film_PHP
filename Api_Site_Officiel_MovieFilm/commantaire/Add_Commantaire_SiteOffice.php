<?php
require '../../connect.php';



 $postdata = file_get_contents("php://input");

 $id = $_GET['id'];

if(isset($postdata) && !empty($postdata))
{
  $request = json_decode($postdata);
  
  // Sanitize.
  $textCommantaire = mysqli_real_escape_string($con, trim($request->textCommantaire));

  
    $sql = "INSERT INTO `commantaire`(Text_commantaire, id_user, valid, date, id_film) VALUES ('hhhhhhhhhhhh','1','33',NOW(),'11')";

    if (mysqli_query($con, $sql)) {
        http_response_code(201);
    } else {
        http_response_code(422);
    }


}

?>