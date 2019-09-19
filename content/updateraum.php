<?php
require_once("..//classes/dbclass.php");
if($_GET["ID"]>0){
    $db=new dbclass();
    $werte=$db->getraumdaten($_GET["ID"]);
} else {
    $werte["Bezeichnung"]="";
    $werte["Kapazitat"]="";
    $werte["Menge"]="";
}
?>

<html>
    <head>
        
    </head>
    <body>
        <?php
    include_once 'contents.php';
    ?>
<html>
    <head>
        <meta charset="utf8"
    </head>
    <body>
        <div align="center">
            
           <?php if($_GET["ID"]>0){echo "<h2>Andern eines Raumes</h2>";}else{echo "<h2>Neuen Raum anlegen</h2>";} ?>
            
            <form action="editraum.php" method="POST">
                <input type="hidden" value="<?php echo $_GET["ID"]; ?>" name="rid">
                <table width="90%" class="tablex">
                    <tr>
                    <th>Bezeichnung</th><td><input type="text" name="bezeichnung" value="<?php  echo $werte["Bezeichnung"];?>"></td>
                    </tr>                    
                    <tr>
                    <th>Kapazitat</th><td><input type="text" name="kapazitat" value="<?php echo $werte["Kapazitat"];?>"></td>
                    </tr>
                    <tr>
                    <th>Menge</th><td><input type="text" name="menge" value="<?php  echo $werte["Menge"];?>"></td>
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

