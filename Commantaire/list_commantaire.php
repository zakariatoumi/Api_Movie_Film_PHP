<?php
require '../connect.php';
error_reporting(E_ERROR);
$commantaire = [];
$sql = "SELECT * FROM  commantaire";

if($result = mysqli_query($con,$sql))
{
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $commantaire[$cr]['id']    = $row['id'];
    $commantaire[$cr]['text_commantaire'] = $row['Text_commantaire'];
    $commantaire[$cr]['Id_user'] = $row['id_user'];
    $cr++;
  }
    
    //print_r($commantaire);
    //die();

  echo json_encode($commantaire);
}
else
{
  http_response_code(404);
}
?>