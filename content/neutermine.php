<?php
require_once("..//classes/dbclass.php");

?>

<html>
    <head>
        <meta charset="utf8">
        <script>
           function rechneEndDatum(datum,dauer)
 {
     var da=dauer.split("-"); //delit na slova po minusu
//     da[0]=KursID;
//     da[1]=Dauer
   var neu = new Date(datum.value);
   neu.setDate(neu.getDate()+parseInt(da[1]));
   d = neu.getDate();
   m = neu.getMonth()+1;
   if(m<10){ m="0"+"1";}
   y = neu.getFullYear();
   document.ntermin.ende.value=d+"."+m+"."+y;
 }
           function checkFormular(){
               if(document.ntermin.kurs.selectedIndex=="0"){
                   alert("Bitte den Kurs auswahlen!");
                   document.ntermin.kurs.focus();
                   return false;}
               else if (document.ntermin.trainer.selectedIndex=="0"){
                   alert("Bitte den Trainer auswahlen!");
                   document.ntermin.trainer.focus();
                   return false;}
               else if (document.ntermin.end.value==""){
                   alert("Bitte den Startdatum auswahlen!");
                   document.ntermin.start.focus();
                   return false;}
               else if (document.ntermin.raum.selectedIndex=="0"){
                   alert("Bitte den Raum auswahlen!");
                   document.ntermin.raum.focus();
                   return false;}
               else if (document.ntermin.equip.selectedIndex=="0"){
                   alert("Bitte den Inventar auswahlen!");
                   document.ntermin.equip.focus();
                   return false;}
               else if (document.ntermin.user.selectedIndex=="0"){
                   alert("Bitte den User auswahlen!");
                   document.ntermin.user.focus();
                   return false;}
           }
        </script>
    </head>
    <body>
            <?php
            include_once 'contents.php';
            ?>
        <h2>Neuen Termin anlegen</h2>
        <hr>
        <div style="width:40%;">
            
            
        <form action="terminspeichern.php" method="POST" name="ntermin" onsubmit="return checkFormular();">
            <table class="tablex">
                <tr>
                <th>Kurs</th>
                        <td>
                            <select style="width:350px" id="kursname" name="kurs">
                                <option selected disabled>Select</option>
                                   <?php
                                   $db=new dbclass();                                  
                                   $ergebnis=$db->displayallekurse();                                  
                                   foreach($ergebnis as $zeile){
                                   echo"<option value ='".$zeile[0]."-".$zeile[4]."'>".$zeile[1];                                 
                                   }
                                   ?>
                            </select>
                        </td>
            </tr>
            <tr>
                 <th>Trainer</th>
                      <td>
                            <select style="width:350px" name="trainer">
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
                            <select style="width:350px" name="raum">
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
                            <select style="width:350px" name="equip">
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
                            <select style="width:350px" name="user">
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
             <tr>                   
                    <td><input type="submit" formaction="raumliste.php" value="Abbrechen"></td>
                    <td><input type="submit" value="Speichern"></td>
             </tr>
            </table>
        </form>
       </div>
        
    </body>
</html>

