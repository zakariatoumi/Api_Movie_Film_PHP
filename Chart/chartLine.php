<?php

require '../connect.php';

 $sql = $con->query("SELECT Jan AS janv FROM chartline WHERE id=1")->fetch_array();
 $sql1 = $con->query("SELECT Feb AS févr FROM chartline WHERE id=2")->fetch_array();
 $sql2 = $con->query("SELECT March AS mars FROM chartline WHERE id=3")->fetch_array();
 $sql3 = $con->query("SELECT April AS avr FROM chartline WHERE id=4")->fetch_array();
 $sql4 = $con->query("SELECT May AS mai FROM chartline WHERE id=5")->fetch_array();
 $sql5 = $con->query("SELECT June AS juin FROM chartline WHERE id=6")->fetch_array();
 $sql6 = $con->query("SELECT July AS juill FROM chartline WHERE id=7")->fetch_array();
 $sql7 = $con->query("SELECT Aug AS août FROM chartline WHERE id=8")->fetch_array();
 $sql8 = $con->query("SELECT Sep AS sept FROM chartline WHERE id=9")->fetch_array();
 $sql9 = $con->query("SELECT Oct AS oct FROM chartline WHERE id=10")->fetch_array();
 $sql10 = $con->query("SELECT Nov AS nov FROM chartline WHERE id=11")->fetch_array();
 $sql11 = $con->query("SELECT `Dec` AS decembre FROM chartline WHERE id=12")->fetch_array();

echo json_encode(
        array(
            "jan" => $sql['janv'],
            "feb" => $sql1['févr'],
            "march" => $sql2['mars'],
            "april" => $sql3['avr'],
            "may" => $sql4['mai'],
            "june" => $sql5['juin'],
            "july" => $sql6['juill'],
            "aug" => $sql7['août'],
            "sep" => $sql8['sept'],
            "oct" => $sql9['oct'],
            "nov" => $sql10['nov'],
            "dec" => $sql11['decembre'],
            
        ));