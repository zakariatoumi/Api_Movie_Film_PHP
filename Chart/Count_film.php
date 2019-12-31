<?php
require '../connect.php';

$result = $con->query("SELECT COUNT(*) AS Film_count FROM film")->fetch_array();
echo json_encode($result['Film_count']);

?>