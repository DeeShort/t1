<?php
// die datei muss geladen werden 

$server;
$user;
$passwort;
$dbname;
$werte =parse_ini_file("classes/settings.ini");

$server=$werte["server"];
$user=$werte["user"];
$passwort=$werte["passwort"];
$dbname=$werte["datenbank"];
echo "Server: " .$server;

?>
<html>
<head>
<title> </title>
</head>

<body>

<h1>Login</h1>
<div align="center">

<form action="pruefe.php" method="POST">
 <table border="1" width=40%>
 <tr>
 <td>Login</td><td><input style="width:150px" type="text" name="login" required></td>
 </tr>
 <tr>
 <td>Passwort</td><td><input style="width:150px" type="password" name="passwort" required></td>
 </tr>
 <tr>
 <td><input style="width:150px" type="submit" value="login"></td>
 <td><input style="width:150px" type="reset" value="Abbrechen"></td>
 </tr>
 </table>




</form>

</div>

</body>

</html>