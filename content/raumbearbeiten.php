<?php

require_once '../classes/dbclass.php';

if (isset($_POST)){
    if($_POST["but"]=="Bearbeiten"){
        header("Location:updateraum.php?ID=".$_POST["raumid"]);
       
    } else {
        $db =new dbclass();
        $db->deleteraum($_POST["raumid"]);
        header("Location:raumliste.php");
    }
}

