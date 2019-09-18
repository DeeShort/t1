<?php

session_start();
require_once("classes/dbclass.php");   
if(isset($_POST))
{
	// print_r($_POST);   Prüft eingabe
	$db=new dbclass();
	if($db->checkUser($_POST["login"],$_POST["passwort"])>0)
	{
		//echo "hallo lieber User: ".$_SESSION["vorname"]." ".$_SESSION["nachname"]."<br>";
		header("Location: content.php");
	}
	else
	{
		header("Location: error.php");
	}
}
	
?>