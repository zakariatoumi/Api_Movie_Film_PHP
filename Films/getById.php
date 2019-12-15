<?php

require '../connect.php';

$id = $_GET['id']; 

  // Get by id.
$sql = "SELECT * FROM `film` WHERE film.id ='$id' LIMIT 1";

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