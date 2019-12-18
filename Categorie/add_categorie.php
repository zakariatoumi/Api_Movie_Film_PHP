<?php
require '../connect.php';

 $postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  $request = json_decode($postdata);
  
  // Sanitize.
  $libelle = mysqli_real_escape_string($con, trim($request->libelle));


$sql = "INSERT INTO `categorie`(Libelle) VALUES ('$libelle')";

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