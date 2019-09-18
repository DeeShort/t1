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
            <td colspan="7">
                 <input type="button" value="Neuen Raum Anlegen" onclick="window.location.href='updateraum.php?ID=0'">
            </td>
            <tr>
            <th>                Bearbeiten            </th>
            <th>                Loschen            </th>
            <th>                RaumID            </th>
            <th>                Bezeichnung            </th>
            <th>                Raumtyp            </th>
            <th>                Kapazitat            </th>
            <th>                Frei/Belegt            </th>
            </tr>            
            <?php
            $db=new dbclass();
            $werte = $db->displayalleraume();
            foreach($werte as $inhalt){
                echo"<tr>";
                ?>
            <form action="raumbearbeiten.php" method="POST">
                <td><input type="submit" name="but" value="Bearbeiten"></td>
                <td><input type="submit" name="but" value="Loschen"></td>
            <input type="hidden" name="raumid" value="<?php echo $inhalt[0];?>">
            </form>
                   <?php
                for($i=0;$i<=4;$i++){
                    echo "<td>".$inhalt[$i]."</td>";                   
                }
                echo"</tr>";
            }
            ?>
            
            
        </table>
    </div>
    </body>
</html>