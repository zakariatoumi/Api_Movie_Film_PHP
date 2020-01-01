<?php
require '../../connect.php';

$dateNow = date("Y/m/d");
$moth = explode("/", $dateNow)['1'];
switch ($moth) {
  case '1':
    $query = "INSERT INTO `chartLine`(`jan`) VALUES (1);";
    break;
  case '2':
    $query = "INSERT INTO `chartLine`(`Feb`) VALUES (1);";
    break;
  case '3':
    $query = "INSERT INTO `chartLine`(`March`) VALUES (1);";
    break;
  case '4':
    $query = "INSERT INTO `chartLine`(`April`) VALUES (1);";
    break;
  case '5':
    $query = "INSERT INTO `chartLine`(`May`) VALUES (1);";
    break;
  case '6':
    $query = "INSERT INTO `chartLine`(`June`) VALUES (1);";
    break;
  case '7':
    $query = "INSERT INTO `chartLine`(`July`) VALUES (1);";
    break;
  case '8':
    $query = "INSERT INTO `chartLine`(`Aug`) VALUES (1);";
    break;
  case '9':
    $query = "INSERT INTO `chartLine`(`Sep`) VALUES (1);";
    break;
  case '10':
    $query = "INSERT INTO `chartLine`(`Oct`) VALUES (1);";
    break;
  case '11':
    $query = "INSERT INTO `chartLine`(`Nov`) VALUES (1);";
    break;
  case '12':
    $query = "INSERT INTO `chartLine`(`Dec`) VALUES (1);";
    break;

  default:
    # code...
    break;
}

mysqli_query($con,$query);


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