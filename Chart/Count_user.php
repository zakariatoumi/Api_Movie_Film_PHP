<?php
require '../connect.php';

$result = $con->query("SELECT COUNT(*) AS User_count FROM user")->fetch_array();
echo json_encode($result['User_count']);

?>