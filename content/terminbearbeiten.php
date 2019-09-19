<?php

require_once '../classes/dbclass.php';

if (isset($_POST)){
    if($_POST["but"]=="Bearbeiten"){
        header("Location:updatetermin.php?ID=".$_POST["terminid"]);
       
    } else {
        $db =new dbclass();
        $db->deletetermin($_POST["terminid"]);
        header("Location:terminliste.php");
    }
}
