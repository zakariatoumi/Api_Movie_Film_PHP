<?php

require '../connect.php';

$id = $_GET['id']; 

  // Get by id.
$sql = "SELECT * FROM `categorie` WHERE categorie.id_categorie ='$id' LIMIT 1";

 if($result = mysqli_query($con,$sql))
{
   $cr = 0;

  $row = mysqli_fetch_assoc($result);
  
    $categorie['id']    = $id;
    $categorie['libelle'] = $row['Libelle'];
    
   // $cr++;
  
    
  echo json_encode($categorie);
  http_response_code(200);
}
else
{
  http_response_code(404);
}