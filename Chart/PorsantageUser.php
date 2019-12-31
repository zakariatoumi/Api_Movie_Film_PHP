<?php

require '../connect.php';

 $sql = $con->query("SELECT Nom, 100. * count(*) / sum(count(*)) over () AS Poucant from user group by Nom asc")->fetch_array();

 $sql1 = $con->query("SELECT Titre_film, 100. * count(*) / sum(count(*)) over () AS Poucant1 from film group by Titre_film  asc")->fetch_array();

 $sql2 = $con->query("SELECT Text_commantaire, 100. * count(*) / sum(count(*)) over () AS Poucant2 from commantaire group by Text_commantaire  asc")->fetch_array();

 $sql3 = $con->query("SELECT Libelle, 100. * count(*) / sum(count(*)) over () AS Poucant3 from categorie group by Libelle  asc")->fetch_array();


echo json_encode(
        array(
            "pourcentageUser" => $sql["Poucant"],
            "pourcentageFilm" => $sql1["Poucant1"],
            "pourcentagecommantaire" => $sql2["Poucant2"],
            "pourcentagecategorie" => $sql3["Poucant3"]
        ));
