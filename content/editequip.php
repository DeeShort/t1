<?php
require_once("..//classes/dbclass.php");

$db = new dbclass();

if($_POST["rid"]>0){
    $db->editequip($_POST);
}else{
    $db->insertequip($_POST);
}
    
header("Location:equipliste.php");

