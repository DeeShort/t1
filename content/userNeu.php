<?php
require_once("../classes/dbclass.php");
// eingabeformular für einen neuen User anhand der Tabelle benutzer
// ohne benutzerID

?>
<html>
<head>
<link href="css/main.css" rel="stylesheet">
<script type="text/javascript">
 function checkePW()
 {
	 if ((document.getElementById("passwort1").value) != (document.getElementById("passwort2").value))
	 {
		 alert ("Passworte sind nicht gleich!");
		 document.getElementById("passwort1").value="";
		 document.getElementById("passwort2").value="";
		 
	 }
	 return false;
 }
</script>
</head>
<body>
    
    <?php
    include_once 'contents.php';
    ?>
    <br>
    
    <form method="POST" action="userinsert.php">  //onsubmit="checkePW()" >
 <div align="center"> 
  <table width="80%" border="1" >
  <tr>
   <td>Anrede</td><td>
    <select style="width:250px" name = "anrede">
	  <option value="Frau">Frau  
	  <option value="Herr">Herr
	  <option value="Firma">Firma  
	</select></td>
  </tr>
  <tr>
   <td>Rolle</td><td>
   <?php
    $db = new dbclass(); // Verbindungsobjekt unserer Datenbankklasse erzeugen
	$rollen = explode(";",$db->getRollen());
	echo '<select name = "rolle">';  
	for ($i=0;$i< count($rollen)-1;$i++)  // count zählt die Einträge im Array $rollen
	{	
	  $werte = explode("-",$rollen[$i]);  // 1-Admin  $werte[0] = 1 $werte[1]="Admin"
	  echo '<option value ="'.$werte[0].'">'.$werte[1]."</option>";
	}
	?>
	</select>
	</td>
  </tr>
  <tr>
   <td>Vorname</td><td><input style="width:250px" name="vorname" type="text"></td>
  </tr>
  <tr>
   <td>Nachname</td><td><input style="width:250px" name="nachname" type="text"></td>
  </tr>
  <tr>
   <td>PLZ</td><td><input style="width:250px" name="plz" type="text"></td>
  </tr>
  <tr>
   <td>Wohnort</td><td><input style="width:250px" name="wohnort" type="text"></td>
  </tr>
  <tr>
   <td>Strasse</td><td><input style="width:250px" name="strasse" type="text"></td>
  </tr>
  <tr>
   <td>Telefon</td><td><input style="width:250px" name="telefon" type="text"></td>
  </tr>
  <tr>
   <td>Login</td><td><input style="width:250px" name="login" type="text"></td>
  </tr>
  <tr>
   <td>Passwort</td><td><input style="width:250px" name="passwort1" type="password"></td>
  </tr>
  <tr>
   <td>Passwort wiederholen</td><td><input style="width:250px" name="passwort2" type="password"></td>
  </tr>
  <tr>
   <td><input style="width:250px;height:45px" type="submit" value="jetzt Anmelden"></td><td><input style="width:250px;height:45px" type="reset"></td>
  </tr>
  </table>
 </div>
<form>

</body>
</html>