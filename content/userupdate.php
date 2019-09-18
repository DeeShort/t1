<?php
require_once("..//classes/dbclass.php");
// fügt den neuen User in die Datenbank ein
 if(isset($_POST))  // wurden überhaupt daten versendet?
 {
   
	$db = new dbclass();   // neues  Objekt erstellen
	$db->userupdate($_POST);
 }
 Header("Location:userliste.php");

