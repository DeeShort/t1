
<?php
require_once '../classes/dbclass.php';

//loecht uber ID

$db = new dbclass();

$db->deletebenutzer($_GET["ID"]);

header("Location:userliste.php");






