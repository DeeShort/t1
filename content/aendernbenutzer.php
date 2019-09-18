<?php
require_once '../classes/dbclass.php';

$db=new dbclass();

$werte= $db->getbenutzerdaten($_GET["ID"]);

?>
 <?php
    include_once 'contents.php';
    ?>

<form method="POST" action="userupdate.php" onsubmit="checkePW()" >
    <input type="hidden" name="userid" value="<?php echo $_GET['ID']?>">
 <div align="center"> 
  <table width="80%" border="1" >
  <tr>
   <td>Anrede</td><td>
    <select style="width:250px" name = "anrede">
	 <?php
         $db=new dbclass();
         $ergebnis=$db->getAnreden();
         foreach($ergebnis as $zeile){
             if($werte[1]==$zeile[0])
             {
             echo '<option selected value="'.$zeile[0].'">'.$zeile[0];
             } else {
                 echo '<option value="'.$zeile[0].'">'.$zeile[0];
             }
         }
         ?>
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
	  $werter = explode("-",$rollen[$i]);  // 1-Admin  $werte[0] = 1 $werte[1]="Admin"
          
          if($werter[0]==$werte[8]){
              echo '<option selected value ="'.$werter[0].'">'.$werter[1]."</option>";
          }
          else {
              echo '<option value ="'.$werter[0].'">'.$werter[1]."</option>";
          }
	  
	}
	?>
	</select>
	</td>
  </tr>
  <tr>
  <td>Name</td><td><input style="width:250px" value="<?php echo $werte["Name"] ?>" name="name" type="text"></td>
  </tr>
  <tr>
   <td>Nachname</td><td><input style="width:250px" value="<?php echo $werte["Nachname"] ?>" name="nachname" type="text"></td>
  </tr>
  <tr>
   <td>PLZ</td><td><input style="width:250px" value="<?php echo $werte["PLZ"] ?>" name="plz" type="text"></td>
  </tr>
  <tr>
   <td>Wohnort</td><td><input style="width:250px" value="<?php echo $werte["Ort"] ?>" name="wohnort" type="text"></td>
  </tr>  
  <tr>
   <td>Telefon</td><td><input style="width:250px" value="<?php echo $werte["Telephone"] ?>" name="telefon" type="text"></td>
  </tr>
  
  <tr>
   <td><input style="width:250px;height:45px" type="submit" value="Jetzt speichern"></td><td><input style="width:250px;height:45px" type="reset"></td>
  </tr>
  </table>
 </div>
<form>