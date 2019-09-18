<?php
require_once("..//classes/dbclass.php");

$db = new dbclass();

if($_POST["rid"]>0){
    $db->editraum($_POST);
}else{
    $db->insertraum($_POST);
}
    
header("Location:raumliste.php");

