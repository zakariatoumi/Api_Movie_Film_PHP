<?php

require '../connect.php';

$id = $_GET['id']; 

  // Get by id.
$sql = "SELECT * FROM `user` WHERE user.id ='$id' LIMIT 1";

 if($result = mysqli_query($con,$sql))
{
   $cr = 0;

  $row = mysqli_fetch_assoc($result);
  
    $students['id']    = $id;
    $students['nom'] = $row['Nom'];
    $students['prenom'] = $row['Prenom'];
    $students['email'] = $row['Email'];
    $students['password'] = $row['ModePasse'];
   // $cr++;
  
    
  echo json_encode($students);
  http_response_code(200);
}
else
{
  http_response_code(404);
}