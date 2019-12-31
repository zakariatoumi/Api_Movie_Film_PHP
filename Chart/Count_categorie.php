<?php
require '../connect.php';

$result = $con->query("SELECT COUNT(*) AS Categorie_count FROM categorie")->fetch_array();
echo json_encode($result['Categorie_count']);

?>