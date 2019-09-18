<?php

require_once '../classes/dbclass.php';

if (isset($_POST)){
    if($_POST["but"]=="Bearbeiten"){
        header("Location:updateequip.php?ID=".$_POST["equipid"]);
       
    } else {
        $db =new dbclass();
        $db->deleteequip($_POST["equipid"]);
        header("Location:equipliste.php");
    }
}
