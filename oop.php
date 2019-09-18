<?php
// Klasse CPerson includieren
 require_once("classes/CPerson.php");   
 // Anlegen von Objekten der Klasse CPerson
 
 $chef = new CPerson("Anna","Bella","Frau","13.09.1934");
 echo "Anrede: ".     $chef->getAnrede()."<br>";
 echo "Vorname: ".    $chef->getVorname()."<br>";
 echo "Nachname: ".   $chef->getNachname()."<br>";
 echo "Geburtstag: ". $chef->getGeburtstag()."<br>";
 
 // unsere Person hat geheiratet
 $chef->setNachname("Fritzchen");  // neuen Wert an Eigenschaft nachnamen zuweisen
 echo "Nachname: ".   $chef->getNachname()."<br>";
 
 $azubiene = new CPerson("Carmen","Hutschenreuter","Frl","01.02.2000");
 $lagerist = new CPerson("Manni","Wutbürger","Herr","24.12.1856");
 
 echo "Azubi Nachname ".$azubiene->getNachname()."<br>";
 echo "Lagerist Nachname ".$lagerist->getNachname()."<br>";
 echo  "Geb: ".$lagerist->getGeburtstag();
?>