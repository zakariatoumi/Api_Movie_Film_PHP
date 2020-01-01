<?php
require '../connect.php';
error_reporting(E_ERROR);
$users = [];
$sql = "SELECT * FROM  user";

if($result = mysqli_query($con,$sql))
{
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $users[$cr]['id']    = $row['id'];
    $users[$cr]['nom'] = $row['Nom'];
    $users[$cr]['prenom'] = $row['Prenom'];
    $users[$cr]['email'] = $row['Email'];
    $users[$cr]['password'] = $row['ModePasse'];
    $users[$cr]['Valid'] = $row['valid'];
    $cr++;
  }
    
    //print_r($users);
    //die();

  echo json_encode($users);
}
else
{
  http_response_code(404);
}
?>