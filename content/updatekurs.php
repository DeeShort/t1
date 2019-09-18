<?php
require_once("..//classes/dbclass.php");
if($_GET["ID"]>0){
    $db=new dbclass();
    $werte=$db->getkursdaten($_GET["ID"]);
} else {
    $werte["Bezeichnung"]="";
    $werte["TrainerID"]="";
    $werte["Kapazitat"]="";
    $werte["Dauer"]="";
    $werte["Preis"]="";
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
            
           <?php if($_GET["ID"]>0){echo "<h2>Andern eines Kurses</h2>";}else{echo "<h2>Neuen Kurs anlegen</h2>";} ?>
            
            <form action="editkurs.php" method="POST">
                <input type="hidden" value="<?php echo $_GET["ID"]; ?>" name="rid">
                <table width="90%" border="1">
                    <tr>
                    <th>Bezeichnung</th><td><input type="text" name="bezeichnung" value="<?php  echo $werte["Bezeichnung"];?>"></td>
                    </tr>                    
                    <tr>
                    <th>TrainerID</th><td><input type="text" name="trainerid" value="<?php echo $werte["TrainerID"];?>"></td>
                    </tr>
                    <tr>
                    <th>Kapazitat</th><td><input type="text" name="kapazitat" value="<?php  echo $werte["Kapazitat"];?>"></td>
                    </tr>
                     <tr>
                    <th>Dauer</th><td><input type="text" name="dauer" value="<?php  echo $werte["Dauer"];?>"></td>
                    </tr>
                     <tr>
                    <th>Preis</th><td><input type="text" name="preis" value="<?php  echo $werte["Preis"];?>"></td>
                    </tr>
                     <tr>                   
                    <td><input type="submit" formaction="kursliste.php" value="Abbrechen"></td>
                    <td><input type="submit" value="Speichern"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

