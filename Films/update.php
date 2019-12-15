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
  $titre_film = mysqli_real_escape_string($con, trim($request->titre_film));
  $pseudo = mysqli_real_escape_string($con, trim($request->pseudo));
  $lien_film = mysqli_real_escape_string($con, $request->lien_film);
  $description = mysqli_real_escape_string($con, $request->description);
  // Update.
   $sql = "UPDATE `film` SET `Titre_film`='$titre_film',`Pseudo`='$pseudo',`Lien_film`='$lien_film',`Description`='$description' WHERE film.id = '$id'";

  if(mysqli_query($con, $sql))
  {
    http_response_code(204);
  }
  else
  {
    return http_response_code(422);
  }  
}
