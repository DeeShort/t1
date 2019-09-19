<?php
require_once("..//classes/dbclass.php");

if(isset($_POST)){
    $werte=explode("-",$_POST["kurs"]); //delim po minusu na 2 chisla
        
    $db=new dbclass();
    $db->insertTermin(werte[0],$_POST["trainer"],$_POST["start"],$_POST["raum"], $_POST["equip"]);
    
    header("Location:terminliste.php");
    
    
}

