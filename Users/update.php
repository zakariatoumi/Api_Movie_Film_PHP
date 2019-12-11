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
  $nom = mysqli_real_escape_string($con, trim($request->nom));
  $prenom = mysqli_real_escape_string($con, trim($request->prenom));
  $email = mysqli_real_escape_string($con, $request->email);
  $password = mysqli_real_escape_string($con, $request->password);
  // Update.
   $sql = "UPDATE `user` SET `Nom`='$nom',`Prenom`='$prenom',`Email`='$email',`ModePasse`='$password' WHERE user.id = '$id'";

  if(mysqli_query($con, $sql))
  {
    http_response_code(204);
  }
  else
  {
    return http_response_code(422);
  }  
}
