<?php
require '../connect.php';

// Get the posted data.

$postdata = file_get_contents("php://input");

//print_r($postdata);

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);
	

  // Sanitize.
  $id = mysqli_real_escape_string($con, trim($request->id));
  $libelle = mysqli_real_escape_string($con, trim($request->libelle));
  
  // Update.
   $sql = "UPDATE `categorie` SET `Libelle`='$libelle' WHERE categorie.id_categorie = '$id'";

  if(mysqli_query($con, $sql))
  {
    http_response_code(204);
  }
  else
  {
    return http_response_code(422);
  }  
}
