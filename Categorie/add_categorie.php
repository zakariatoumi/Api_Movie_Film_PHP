<?php
require '../connect.php';

 $postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  $request = json_decode($postdata);
  
  // Sanitize.
  $libelle = mysqli_real_escape_string($con, trim($request->libelle));


$sql = "INSERT INTO `categorie`(Libelle, valid, date_categorie) VALUES ('$libelle','1',NOW())";

if(mysqli_query($con,$sql))
{
  http_response_code(201);
}
else
{
  http_response_code(422);
}
}

?>