<?php
require '../connect.php';
error_reporting(E_ERROR);
$users = [];
$sql = "SELECT * FROM  categorie";

if($result = mysqli_query($con,$sql))
{
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $categories[$cr]['id']    = $row['id'];
    $categories[$cr]['libelle'] = $row['Libelle'];
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