<?php
require '../../connect.php';

 $postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)) {
    $request = json_decode($postdata);

    // compteur qui calculer le nombre de login
             
    $dateNow = date("Y/m/d");
    $moth = explode("/", $dateNow)['1'];

    // $moth=2;

    switch ($moth) {
  case '1':
    $select = mysqli_query($con, "SELECT Jan FROM chartline WHERE id=1");
    $row=mysqli_fetch_array($select);
    if ($row['Jan'] == 0) {
        $query = "UPDATE `chartline` SET `Jan`=1 WHERE id=1";
    } elseif ($row['Jan'] != 0) {
        $query = "UPDATE `chartline` SET `Jan`=Jan+1 WHERE id=1";
    }

    break;
  case '2':
    $select = mysqli_query($con, "SELECT Feb FROM chartline WHERE id=2");
  $row=mysqli_fetch_array($select);
  if ($row['Feb'] == 0) {
      $query = "UPDATE `chartline` SET `Feb`=1 WHERE id=2";
  } elseif ($row['Feb'] != 0) {
      $query = "UPDATE `chartline` SET `Feb`=Feb+1 WHERE id=2";
  }
    break;
  case '3':
    $select = mysqli_query($con, "SELECT March FROM chartline WHERE id=3");
  $row=mysqli_fetch_array($select);
  if ($row['March'] == 0) {
      $query = "UPDATE `chartline` SET `March`=1 WHERE id=3";
  } elseif ($row['March'] != 0) {
      $query = "UPDATE `chartline` SET `March`=March+1 WHERE id=3";
  }
    break;
  case '4':
    $select = mysqli_query($con, "SELECT April FROM chartline WHERE id=4");
  $row=mysqli_fetch_array($select);
  if ($row['April'] == 0) {
      $query = "UPDATE `chartline` SET `April`=1 WHERE id=4";
  } elseif ($row['April'] != 0) {
      $query = "UPDATE `chartline` SET `April`=April+1 WHERE id=4";
  }
    break;
  case '5':
    $select = mysqli_query($con, "SELECT May FROM chartline WHERE id=5");
  $row=mysqli_fetch_array($select);
  if ($row['May'] == 0) {
      $query = "UPDATE `chartline` SET `May`=1 WHERE id=5";
  } elseif ($row['May'] != 0) {
      $query = "UPDATE `chartline` SET `May`=May+1 WHERE id=5";
  }
    break;
  case '6':
    $select = mysqli_query($con, "SELECT June FROM chartline WHERE id=6");
  $row=mysqli_fetch_array($select);
  if ($row['June'] == 0) {
      $query = "UPDATE `chartline` SET `June`=1 WHERE id=6";
  } elseif ($row['June'] != 0) {
      $query = "UPDATE `chartline` SET `June`=June+1 WHERE id=6";
  }
    break;
  case '7':
    $select = mysqli_query($con, "SELECT July FROM chartline WHERE id=7");
  $row=mysqli_fetch_array($select);
  if ($row['July'] == 0) {
      $query = "UPDATE `chartline` SET `July`=1 WHERE id=7";
  } elseif ($row['July'] != 0) {
      $query = "UPDATE `chartline` SET `July`=July+1 WHERE id=7";
  }
    break;
  case '8':
    $select = mysqli_query($con, "SELECT Aug FROM chartline WHERE id=8");
  $row=mysqli_fetch_array($select);
  if ($row['Aug'] == 0) {
      $query = "UPDATE `chartline` SET `Aug`=1 WHERE id=8";
  } elseif ($row['Aug'] != 0) {
      $query = "UPDATE `chartline` SET `Aug`=Aug+1 WHERE id=8";
  }
    break;
  case '9':
    $select = mysqli_query($con, "SELECT Sep FROM chartline WHERE id=9");
  $row=mysqli_fetch_array($select);
  if ($row['Sep'] == 0) {
      $query = "UPDATE `chartline` SET `Sep`=1 WHERE id=9";
  } elseif ($row['Sep'] != 0) {
      $query = "UPDATE `chartline` SET `Sep`=Sep+1 WHERE id=9";
  }
    break;
  case '10':
    $select = mysqli_query($con, "SELECT Oct FROM chartline WHERE id=10");
  $row=mysqli_fetch_array($select);
  if ($row['Oct'] == 0) {
      $query = "UPDATE `chartline` SET `Oct`=1 WHERE id=10";
  } elseif ($row['Oct'] != 0) {
      $query = "UPDATE `chartline` SET `Oct`=Oct+1 WHERE id=10";
  }
    break;
  case '11':
    $select = mysqli_query($con, "SELECT Nov FROM chartline WHERE id=11");
  $row=mysqli_fetch_array($select);
  if ($row['Nov'] == 0) {
      $query = "UPDATE `chartline` SET `Nov`=1 WHERE id=11";
  } elseif ($row['Nov'] != 0) {
      $query = "UPDATE `chartline` SET `Nov`=Nov+1 WHERE id=11";
  }
    break;
  case '12':
    $select = mysqli_query($con, "SELECT Dec FROM chartline WHERE id=12");
  $row=mysqli_fetch_array($select);
  if ($row['Dec'] == 0) {
      $query = "UPDATE `chartline` SET `Dec`=1 WHERE id=12";
  } elseif ($row['Dec'] != 0) {
      $query = "UPDATE `chartline` SET `Dec`=Dec+1 WHERE id=12";
  }
    break;

  default:
    # code...
    break;
}

    mysqli_query($con, $query);
 
  
    // Sanitize.

    $username = mysqli_real_escape_string($con, trim($request->username));
    $password = mysqli_real_escape_string($con, trim($request->password));

    $sql = "SELECT * FROM `user` WHERE Email='$username' AND ModePasse='$password'";
    $result=mysqli_query($con, $sql);
    $row=mysqli_fetch_array($result);
   
    if (mysqli_num_rows($result) == 1) {
        echo json_encode(
       array(
                "message" => "Successful login.",
                "token" => $row['Token'],
                "nom" => $row['Nom']
            )
   );
        http_response_code(200);
    } else {

       // http_response_code(401);
        echo json_encode(array("message" => "Login failed."));
    }
}
