<?php
require '../connect.php';
error_reporting(E_ERROR);
$categories = [];
$sql = "SELECT * FROM categorie WHERE valid=1";

if($result = mysqli_query($con,$sql))
{
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $categories[$cr]['id']    = $row['id_categorie'];
    $categories[$cr]['libelle'] = $row['Libelle'];
    $categories[$cr]['Valid'] = $row['valid'];
    $cr++;
  }
    
    //print_r($users);
    //die();

  echo json_encode($categories);
}
else
{
  http_response_code(404);
}
?>