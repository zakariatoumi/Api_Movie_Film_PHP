<?php

require '../connect.php';


  $id = $_GET['id'];



  // Get by id.
$sql = "SELECT user.*,commantaire.* FROM `commantaire` INNER JOIN user ON user.id=commantaire.id_user WHERE commantaire.id=$id";

 if($result = mysqli_query($con,$sql))
{
   $cr = 0;

  $row = mysqli_fetch_assoc($result);
  
    $Details_commantaire['id'] = $id;
    $Details_commantaire['text_commantaire'] = $row['Text_commantaire'];
    $Details_commantaire['nom'] = $row['Nom'];
    $Details_commantaire['prenom'] = $row['Prenom'];
    $Details_commantaire['email'] = $row['Email'];
    
   // $cr++;
  
// var_dump($Details_commantaire);
// die();    

  echo json_encode($Details_commantaire);
  http_response_code(200);
}
else
{
  http_response_code(404);
}
