<?php

require_once '../classes/dbclass.php';
//print_r($_POST);
//die();

if (isset($_POST)){
    if($_POST["but"]=="Bearbeiten"){
        header("Location:updatekurs.php?ID=".$_POST["kursid"]);
       
    } else {
        $db =new dbclass();
        $db->deleteraum($_POST["kursid"]);
        header("Location:kursliste.php");
    }
}

