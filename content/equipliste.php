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
                 <input type="button" value="Neuen Equipment anlegen" onclick="window.location.href='updateequip.php?ID=0'">
            </td>
            <tr>
            <th>                Bearbeiten            </th>
            <th>                Loschen            </th>
            <th>                InventarID            </th>
            <th>                Bezeichnung            </th>
            <th>                Menge            </th>
            <th>                Verfugbarkeit            </th>            
            </tr>            
            <?php
            $db=new dbclass();
            $werte = $db->displayallequip();            
            foreach($werte as $inhalt){
                echo"<tr>";
                ?>
            <form action="equipbearbeiten.php" method="POST">
                <td><input type="submit" name="but" value="Bearbeiten"></td>
                <td><input type="submit" name="but" value="Loschen"></td>
            <input type="hidden" name="equipid" value="<?php echo $inhalt[0];?>">
            </form>
                   <?php
                for($i=0;$i<=3;$i++){
                    echo "<td>".$inhalt[$i]."</td>";                   
                }
                echo"</tr>";
            }
            ?>
            
            
        </table>
    </div>
    </body>
</html>

