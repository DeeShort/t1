<?php
require_once("..//classes/dbclass.php");

?>

<html>
    <head>
        <meta charset="utf8"
    </head>
    <body>
            <?php
            include_once 'contents.php';
            ?>
        <h2>Neuen Termin anlegen</h2>
        <hr>
        <form action="" method="POST">
            <table width="90" border="1">
                <tr>
                <th>Kurs</th>
                        <td>
                            <select style="width:550px" name="kurs">
                                   <?php
                                   $db=new dbclass();                                  
                                   $ergebnis=$db->displayallekurse();                                  
                                   foreach($ergebnis as $zeile){
                                   echo"<option value ='".$zeile[0]."'>".$zeile[1];
                                   }
                                   ?>
                            </select>
                        </td>
            </tr>
            <tr>
                 <th>Trainer</th>
                      <td>
                            <select style="width:550px" name="trainer">
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
             <td>
                 <input type="date" name="start" ochange="rechneEndDatum(document.getElementsByName('start'))">
                 
             </td>
             </tr>
             <tr>
             <th> Endtermin</th>
             <td><input type="date" name="end"></td>
             </tr>
            </table>
        </form>
        
        
    </body>
</html>

