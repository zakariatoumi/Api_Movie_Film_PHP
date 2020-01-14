<?php
require '../../connect.php';
error_reporting(E_ERROR);
$films = [];
$id = $_GET['Id_categorie'];
$sql = "SELECT film.*,categorie.* FROM `film` INNER JOIN categorie ON categorie.id_categorie=film.id_categorie WHERE film.valid=1 AND film.id_categorie=$id";

if($result = mysqli_query($con,$sql))
{
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $films[$cr]['Id_film']    = $row['id_film'];
    $films[$cr]['titre_film'] = $row['Titre_film'];
    $films[$cr]['pseudo'] = $row['Pseudo'];
    $films[$cr]['lien_film'] = $row['Lien_film'];
    $films[$cr]['description'] = $row['Description'];
    $films[$cr]['Id_categorie'] = $row['id_categorie'];
    $films[$cr]['Valid'] = $row['valid'];
    $films[$cr]['Id_categorie'] = $row['id_categorie'];
    $films[$cr]['libelle'] = $row['Libelle'];
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