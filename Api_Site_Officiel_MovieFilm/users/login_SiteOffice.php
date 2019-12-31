<?php
require '../../connect.php';

  $token = null;
  $headers = apache_request_headers();
  //print_r($headers);


 $postdata = file_get_contents("php://input");


if(isset($postdata) && !empty($postdata))
{
  $request = json_decode($postdata);

  //print_r($request);
  
  // Sanitize.
  //  $username = $request->username;
  //  $password = $request->password;

  $username = mysqli_real_escape_string($con, trim($request->username));
  $password = mysqli_real_escape_string($con, trim($request->password));

   $sql = "SELECT * FROM `user` WHERE Email='$username' AND ModePasse='$password'";
   $result=mysqli_query($con,$sql);
   $row=mysqli_fetch_array($result);
   
  if(mysqli_num_rows($result) == 1){

   echo json_encode(
            array(
                "message" => "Successful login.",
                "token" => 'Bearer-jsdfnkj223',
                "email" => $username
            ));
         http_response_code(200);
    }
    else{

       // http_response_code(401);
        echo json_encode(array("message" => "Login failed."));
    }
  

}