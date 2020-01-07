<?php
require '../connect.php';

 $postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  $request = json_decode($postdata);

  // print_r($request);
  // die();
  
  // Sanitize.
  $titreFilm = mysqli_real_escape_string($con, trim($request->titreFilm));
  $pseudoFilm = mysqli_real_escape_string($con, trim($request->pseudoFilm));
  $lienFilm = mysqli_real_escape_string($con, $request->lienFilm);
  $descriptionFilm = mysqli_real_escape_string($con, $request->descriptionFilm);
  $categorie = mysqli_real_escape_string($con, $request->categorie);
  
  // var_dump($password);

  $lienConst = "https://www.youtube.com/embed/";

  $lienG=substr($lienFilm, strpos($lienFilm, "=") + 1);

  $lien = $lienConst . $lienG;


$sql = "INSERT INTO `film`(Titre_film, Pseudo, Lien_film,  Description, id_categorie, valid, date) VALUES ('$titreFilm','$pseudoFilm','$lien','$descriptionFilm','$categorie','1',NOW())";
//$sql = "SELECT * FROM `user` WHERE 1";
// var_dump(mysqli_query($con,$sql));
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