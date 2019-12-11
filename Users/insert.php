<?php
require '../connect.php';

 $postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  $request = json_decode($postdata);

  /*print_r($request);
  die();*/
  
  // Sanitize.
  $nom = mysqli_real_escape_string($con, trim($request->nom));
  $prenom = mysqli_real_escape_string($con, trim($request->prenom));
  $email = mysqli_real_escape_string($con, $request->email);
  $password = mysqli_real_escape_string($con, $request->password);
  
  // var_dump($password);


  // Store.
//   $sql = "INSERT INTO `user`(
//      `Nom`,
//      `Prenom`,
//      `Email`,
//      `ModePasse`,
     
//  ) VALUES
//   ('{$nom}',
//   '{$prenom}',
//   '{$email}',
//   '{$password}',
  
//   )";

$sql = "INSERT INTO `user`(Nom, Prenom, Email, ModePasse) VALUES ('$nom','$prenom','$email','$password')";
//$sql = "SELECT * FROM `user` WHERE 1";
// var_dump(mysqli_query($con,$sql));
if(mysqli_query($con,$sql))
{
  http_response_code(201);
}
else
{
  http_response_code(422);
}
}

?>