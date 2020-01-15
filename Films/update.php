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
  $id_categorie = mysqli_real_escape_string($con, $request->id_categorie);
  // Update.

  $lienConst = "https://www.youtube.com/embed/";
  $var = substr($lien_film, 0, 30);
  if ($lienConst == $var) {
    $lien = $lien_film;
  } else {
    $lienG=substr($lien_film, strpos($lien_film, "=") + 1);

    $lien = $lienConst . $lienG;
  }
  

   $sql = "UPDATE `film` SET `Titre_film`='$titre_film',`Pseudo`='$pseudo',`Lien_film`='$lien',`Description`='$description',`id_categorie`='$id_categorie' WHERE film.id_film = '$id'";

  if(mysqli_query($con, $sql))
  {
    http_response_code(204);
  }
  else
  {
    return http_response_code(422);
  }  
}
