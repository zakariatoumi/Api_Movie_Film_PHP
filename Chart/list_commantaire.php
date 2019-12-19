<?php
require '../connect.php';

$result = $con->query("SELECT COUNT(*) AS Commantaire_count FROM commantaire")->fetch_array();
echo json_encode($result['Commantaire_count']);

?>