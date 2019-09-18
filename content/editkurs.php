<?php
require_once("..//classes/dbclass.php");

$db = new dbclass();

if($_POST["rid"]>0){
    $db->editkurs($_POST);
}else{
    $db->insertkurs($_POST);
}
    
header("Location:kursliste.php");

