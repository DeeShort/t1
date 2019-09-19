<?php
require_once("..//classes/dbclass.php");

?>

<html>
    <head>
        <meta charset="utf8">
        <script>
           function rechneEndDatum(datum,dauer)
 {
   var neu = new Date(datum.value);
   neu.setDate(neu.getDate()+parseInt(dauer));
   d = neu.getDate();
   m = neu.getMonth()+1;
   y = neu.getFullYear();
   document.ntermin.ende.value=d+"."+m+"."+y;
 }
        </script>
    </head>
    <body>
            <?php
            include_once 'contents.php';
            ?>
        <h2>Neuen Termin anlegen</h2>
        <hr>
        <form action="" method="POST" name="ntermin">
            <table width="50%" border="1">
                <tr>
                <th>Kurs</th>
                        <td>
                            <select style="width:550px" id="kursname" name="kurs">
                                <option selected disabled>Select</option>
                                   <?php
                                   $db=new dbclass();                                  
                                   $ergebnis=$db->displayallekurse();                                  
                                   foreach($ergebnis as $zeile){
                                   echo"<option value ='".$zeile[4]."'>".$zeile[1];                                 
                                   }
                                   ?>
                            </select>
                        </td>
            </tr>
            <tr>
                 <th>Trainer</th>
                      <td>
                            <select style="width:550px" name="trainer">
                                <option selected disabled>Select</option>
                                   <?php
                                   $db=new dbclass();                                  
                                   $ergebnis=$db->displayAlleTrainer();                                  
                                   foreach($ergebnis as $zeile){
                                       echo"<option value ='".$zeile[0]."'>".$zeile[2]." ".$zeile[3];
                                   }
                                   ?>
                            </select>
                      </td>    
             </tr>
            <tr>
   <th>Starttermin</th>   
   <td><input type="date" name="start" id="startdatum" onchange="rechneEndDatum(this,document.getElementById('kursname').value)" > </td>
   </tr>
   <tr>
   <th>Endtermin</th>
   <td><input type="text" style="background-color: gray" name="end" id="ende" readonly> </td>
   </tr>
             <tr>
                 <th>Raum</th>
                        <td>
                            <select style="width:550px" name="raum">
                                <option selected disabled>Select</option>
                                   <?php
                                   $db=new dbclass();                                  
                                   $ergebnis=$db->displayalleraume();                                  
                                   foreach($ergebnis as $zeile){
                                   echo"<option value ='".$zeile[0]."'>".$zeile[1];
                                   }
                                   ?>
                            </select>
                        </td>
             </tr>
              <tr>
                 <th>Inventar</th>
                        <td>
                            <select style="width:550px" name="equip">
                                <option selected disabled>Select</option>
                                   <?php
                                   $db=new dbclass();                                  
                                   $ergebnis=$db->displayallequip();                                  
                                   foreach($ergebnis as $zeile){
                                   if ($zeile[3]!=1){echo"<option value ='".$zeile[0]."'>".$zeile[1]." - - - Not Available!";} else{echo"<option value ='".$zeile[0]."'>".$zeile[1];}
                                   }
                                   ?>
                            </select>
                        </td>
             </tr>
             <tr>
                 <th>Benutzer</th>
                      <td>
                            <select style="width:550px" name="user">
                                <option selected disabled>Select</option>
                                   <?php
                                   $db=new dbclass();                                  
                                   $ergebnis=$db->displayAlleUser();                                  
                                   foreach($ergebnis as $zeile){
                                       echo"<option value ='".$zeile[0]."'>".$zeile[3]." ".$zeile[4];
                                   }
                                   ?>
                            </select>
                      </td>    
             </tr>
            </table>
        </form>
        
        
    </body>
</html>

