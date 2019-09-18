<?php
require_once '../classes/dbclass.php';

?>

<html>
    <head>
        
    </head>
    <body>
        <?php
    include_once 'contents.php';
    ?>
    <br>
    
    <div align="center">
        
      
       
       
        
        <table width="90%" border="1">
            <td colspan="8">
                 <input type="button" value="Neuen Kurs Anlegen" onclick="window.location.href='updatekurs.php?ID=0'">
            </td>
            <tr>
            <th>                Action           </th>
            <th>                Action           </th>
            <th>                KursID           </th>
            <th>                Bezeichnung           </th>
            <th>                TrainerID            </th>
            <th>                Kapazitat            </th>
            <th>                Dauer            </th>
            <th>                Preis            </th>           
            </tr>            
            <?php
            $db=new dbclass();
            $werte = $db->displayallekurse();
            foreach($werte as $inhalt){
                echo"<tr>";
                ?>
            <form action="kursbearbeiten.php" method="POST">
                <td><input type="submit" name="but" value="Bearbeiten"></td>
                <td><input type="submit" name="but" value="Loschen"></td>
            <input type="hidden" name="kursid" value="<?php echo $inhalt[0];?>">
            </form>
                   <?php
                for($i=0;$i<=5;$i++){
                    echo "<td>".$inhalt[$i]."</td>";                   
                }
                echo"</tr>";
            }
            ?>
            
            
        </table>
    </div>
    </body>
</html>