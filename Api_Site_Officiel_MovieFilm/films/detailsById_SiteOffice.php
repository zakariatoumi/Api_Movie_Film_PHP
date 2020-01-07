<?php

require '../../connect.php';


  $id = $_GET['id'];



  // Get by id.
$sql = "SELECT film.*,categorie.* FROM film INNER JOIN categorie ON categorie.id=film.id_categorie WHERE film.id=$id";

 if($result = mysqli_query($con,$sql))
{
   $cr = 0;

  $row = mysqli_fetch_assoc($result);
  
    $Details_films['id'] = $id;
    $Details_films['titre_film'] = $row['Titre_film'];
    $Details_films['pseudo'] = $row['Pseudo'];
    $Details_films['lien_film'] = $row['Lien_film'];
    $Details_films['description'] = $row['Description'];
    $Details_films['Date'] = $row['date'];
    $Details_films['libelle'] = $row['Libelle'];
   // $cr++;
  
// var_dump($Details_films);
// die();    

  echo json_encode($Details_films);
  http_response_code(200);
}
else
{
  http_response_code(404);
}
