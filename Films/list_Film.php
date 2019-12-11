<?php
require '../connect.php';
error_reporting(E_ERROR);
$films = [];
$sql = "SELECT * FROM  film";

if($result = mysqli_query($con,$sql))
{
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $films[$cr]['id']    = $row['id'];
    $films[$cr]['titre_film'] = $row['Titre_film'];
    $films[$cr]['lien_film'] = $row['Lien_film'];
    $films[$cr]['pseudo'] = $row['Pseudo'];
    $films[$cr]['description'] = $row['Description'];
    $films[$cr]['id_categorie'] = $row['id_categorie'];
    $cr++;
  }
    
    //print_r($users);
    //die();

  echo json_encode($films);
}
else
{
  http_response_code(404);
}
?>