<?php

require '../connect.php';

$films = [];
$sql = "SELECT * FROM film";

if ($result = mysqli_query($con, $sql)) {
    $cr = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $films[$cr]['id']    = $row['id'];
        $films[$cr]['Valid'] = $row['valid'];
        $cr++;
    }

    if ($films[$cr]['Valid'] == 1) {
        $Update = "UPDATE film SET valid = 0 WHERE film.id=1";
    } else {
        $Update = "UPDATE film SET valid = 1 WHERE film.id=1";
    }
}




?>