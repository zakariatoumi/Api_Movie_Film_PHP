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
  
  $token =  md5(session_id().microtime());
  $token = substr($token, -20);

  $select = mysqli_query($con, "SELECT * FROM user WHERE Email = '".$email."'");
  if(mysqli_num_rows($select)) {
    
    echo json_encode(array ("error" => "Cette adresse email est déjà utilisé" ));
    
  }else{
      $sql = "INSERT INTO `user`(Nom, Prenom, Email, ModePasse, date, Token, valid) VALUES ('$nom','$prenom','$email','$password',NOW(),'$token','1')";

      if (mysqli_query($con, $sql)) {
          http_response_code(201);
      } else {
          http_response_code(422);
      }
  }
}

?>