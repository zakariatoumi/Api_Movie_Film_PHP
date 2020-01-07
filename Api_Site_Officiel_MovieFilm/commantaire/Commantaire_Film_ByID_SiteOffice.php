<?php

require '../../connect.php';


  $id = $_GET['id'];



  // Get by id.
$sql = "SELECT commantaire.*, user.* FROM `commantaire` INNER JOIN user ON user.id=commantaire.id_user INNER JOIN film ON film.id=commantaire.id_film WHERE film.id=$id";

 if($result = mysqli_query($con,$sql))
{
    $cr = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $Details_commantaire[$cr]['Id'] = $row['id'];
        $Details_commantaire[$cr]['text_commantaire'] = $row['Text_commantaire'];
        $Details_commantaire[$cr]['Date'] = $row['date'];
        $Details_commantaire[$cr]['Id_Film'] = $id;
        $Details_commantaire[$cr]['nom'] = $row['Nom'];
        $Details_commantaire[$cr]['prenom'] = $row['Prenom'];
        $cr++;
    }  

  echo json_encode($Details_commantaire);
  http_response_code(200);
}
else
{
  http_response_code(404);
}
