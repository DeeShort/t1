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
<title>
</title>
</head>

<body>

<h1>Hallo welt</h1>







<?php 
	
     $pdo=new pdo("mysql:host=$server; dbname=$dbname", $user, $passwort);
	 if($pdo)
	 {
		 echo "Verbunden";
		 $sql ="select * from benutzer order by vorname";
		 echo $sql;
		 
		 foreach($pdo->query($sql) as $row){
			 
			 for($i=0; $i<8; $i++){
				 echo $row[$i]."<br>";
			 }
		/*  echo "Anrede: " .$row["anrede"]."<br>";
		 echo "Vorname: " .$row["vorname"]."<br>";
		 echo "Nachname: " .$row["nachname"]."<br>";
		 echo "Telefon: " .$row["telefon"]."<br>"; */
		 echo "-----------------------------------<br>";
		 // ein insert Statement in die DB mit prepare
		 }
		 $statement= $pdo->prepare("insert into benutzer (rolle, anrede, vorname, nachname) values (?,?,?,?)");
		 $statement->execute(array(2,'Frau','Anna','Brucks'));
		 
		 
		 
		 //die methode Execute versucht die Werte in die Fragezeichen in  SQL String zu schreiben
		 //dabei werden diese Werte geprüft auf Datentyxpenauf dieverse sonderzeichen
		 
		 
		  $statement= $pdo->prepare("update benutzer set nachname = ? where benutzerid = ?");
		 $statement->execute(array("Mayer", 2));
		 
	 }
	 else{
		 echo"error";
	 }
?>
</body>

</html>