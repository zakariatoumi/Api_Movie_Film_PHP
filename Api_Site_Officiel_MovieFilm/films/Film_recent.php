<?php
require '../../connect.php';
error_reporting(E_ERROR);
$films = [];
$sql = "SELECT * FROM `film` ORDER BY id DESC LIMIT 6";

if($result = mysqli_query($con,$sql))
{
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $films[$cr]['id']    = $row['id'];
    $films[$cr]['titre_film'] = $row['Titre_film'];
    $films[$cr]['pseudo'] = $row['Pseudo'];
    $films[$cr]['lien_film'] = $row['Lien_film'];
    $films[$cr]['description'] = $row['Description'];
    $films[$cr]['Id_categorie'] = $row['id_categorie'];
    $films[$cr]['Valid'] = $row['valid'];
    $cr++;
  }

    // print_r($films);
    // die();

  echo json_encode($films);
}
else
{
  http_response_code(404);
}
?>