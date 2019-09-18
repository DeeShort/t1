<?php

require_once '../classes/dbclass.php';
//da die dbclas.php nicht in diesem Ordner ist, muss mit ../ 
//erst ein Verzeichnis nach oben gewechselt werden und dann in classes
?>
<html>
<head>
    <script>
        function loecheBenutzer(bid)
        {
            window.location.href="loechebenutzer.php?ID="+bid;
        }
        function editBenutzer(bid)
        {
            window.location.href="aendernbenutzer.php?ID="+bid;
        }
        </script>
</head>
<body>
    
    <?php
    include_once 'contents.php';
    ?>
    <br>
    
<div align="center">
        <table width="90%" border="1">
            <tr>
            <th>Action</th>
            <th>Action</th>
            <th>BenutzerID</th>
            <th>Rolle</th>
            <th>Anrede</th>
            <th>Name</th>
            <th>Nachname</th> 
            <th>PLZ</th>
            <th>Ort</th>
            <th>Email</th>
            <th>Telephone</th>
            </tr>
        <?php 
        $db=new dbclass();
        $werte=$db->displayAlleUser();
        
        foreach($werte as $inhalt)
            
        {
            //print_r($inhalt);
            echo"<tr>";
            ?>
            <td> <input type="button" value="Loschen" id="delete" onclick="loecheBenutzer(<?php echo $inhalt[0];?>)"></td>
            <td> <input type="button" value="Bearbeiten" id="edit" onclick="editBenutzer(<?php echo $inhalt[0];?>)"></td>
            <?php
            for($i=0;$i<=8;$i++)
            {
                echo "<td>".$inhalt[$i]."</td>";
                
            }   
        } 
        ?>
        </table>
</body>
</html>

