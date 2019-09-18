<?php
require_once("..//classes/dbclass.php");
if($_GET["ID"]>0){
    $db=new dbclass();
    $werte=$db->getequipdaten($_GET["ID"]);
} else {
    $werte["Bezeichnung"]="";    
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
            
           <?php if($_GET["ID"]>0){echo "<h2>Andern eines Inventar</h2>";}else{echo "<h2>Neuen Inventar anlegen</h2>";} ?>
            
            <form action="editequip.php" method="POST">
                <input type="hidden" value="<?php echo $_GET["ID"]; ?>" name="rid">
                <table width="90%" border="1">
                    <tr>
                    <th>Bezeichnung</th><td><input type="text" name="bezeichnung" value="<?php  echo $werte["Bezeichnung"];?>"></td>
                    </tr>                    
                    <tr>
                    <th>Menge</th><td><input type="text" name="menge" value="<?php  echo $werte["Menge"];?>"></td>
                    </tr>
                     <tr>                    
                    <td><input type="submit" formaction="equipliste.php" value="Abbrechen"></td>
                    <td><input type="submit" value="Speichern"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

