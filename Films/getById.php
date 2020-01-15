<?php

require '../connect.php';

$id = $_GET['id']; 

  // Get by id.
$sql = "SELECT film.*, categorie.* FROM `film` INNER JOIN categorie ON categorie.id_categorie=film.id_categorie WHERE film.id_film =$id LIMIT 1";

 if($result = mysqli_query($con,$sql))
{
   $cr = 0;

  $row = mysqli_fetch_assoc($result);
  
    $films['id']    = $id;
    $films['titre_film'] = $row['Titre_film'];
    $films['pseudo'] = $row['Pseudo'];
    $films['lien_film'] = $row['Lien_film'];
    $films['description'] = $row['Description'];
    $films['Id_categorie'] = $row['id_categorie'];
    
   // $cr++;
  
    
  echo json_encode($films);
  http_response_code(200);
}
else
{
  http_response_code(404);
}