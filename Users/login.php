<?php
//require 'connect.php';
  // $dateNow = date("Y/m/d");
  // $moth =explode("/",$dateNow)['1'];
  // switch ($moth) {
  //   case '12':
  //     $query = "INSERT INTO `user`(`dec`) VALUES (13);";
  //     break;
  //   case '1':
  //     $query = "INSERT INTO `user`(`jan`) VALUES (13);";
  //     break;
    
  //   default:
  //     # code...
  //     break;
  // }
  // echo $query;
  // die();
  $token = null;
  $headers = apache_request_headers();
  //print_r($headers);


 $postdata = file_get_contents("php://input");


if(isset($postdata) && !empty($postdata))
{
  $request = json_decode($postdata);

  //print_r($request);
  
  // Sanitize.
   $username = $request->username;
   $password = $request->password;
   
  
  if($username=='Admin' && $password=='123456'){

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