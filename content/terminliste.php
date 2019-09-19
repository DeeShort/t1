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
        
        <table class="tablex" width="90%">
            <tr>
            <th>                Bearbeiten            </th>
            <th>                Loschen            </th>
            <th>                TerminID            </th>
            <th>                RaumID            </th>
            <th>                Benutzer           </th>
            <th>                Kurs            </th> 
            <th>                AnfangDatum           </th>
            <th>                EndDatum           </th>
            <th>                Trainer           </th>
            <th>                Inventar           </th>             
            </tr>            
            <?php
            $db=new dbclass();
            $werte = $db->displayalletermine();            
            foreach($werte as $inhalt){
                echo"<tr>";
                ?>
            <form action="terminbearbeiten.php" method="POST">
                <td><input type="submit" name="but" value="Bearbeiten"></td>
                <td><input type="submit" name="but" value="Loschen"></td>
            <input type="hidden" name="terminid" value="<?php echo $inhalt[0];?>">
            </form>
                   <?php
                for($i=0;$i<=7;$i++){
                    echo "<td>".$inhalt[$i]."</td>";                   
                }
                echo"</tr>";
            }
            ?>
            
            
        </table>
    </div>
    </body>
</html>

