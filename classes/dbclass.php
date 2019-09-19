<?php
session_start();
// Klasse für den Datenbankzugriff  ( model  vom MVC)
class dbclass
{ // Klassenvariablen / Attribute / members
  // als private definieren, da von aussen nicht ereichbar sein sollen ( Kapselung)
  private $server;
  private $user;
  private $passwort;
  private $dbname;
  private $pdo;    // Verbindungsvariable
  // Konstruktor mit 2x Unterstrich und Namen construct()
  public function __construct()   // muss public sein 
  {
	$sergej =  parse_ini_file("settings.ini");
    $this->server   = $sergej["server"];
    $this->user     = $sergej["user"];
    $this->passwort = $sergej["passwort"];
    $this->dbname   = $sergej["datenbank"];  
	// $this ist ein Zeiger auf sich selbst somit auch Zugriff auf 
    // die Klassenvariablen	
	$this->pdo = new PDO("mysql:host=$this->server;dbname=$this->dbname",$this->user,$this->passwort);
	$this->pdo->exec("set names utf8");
  }
  public function getRollen()
  {// liefert uns alle Rollen aus der Datenbank für das Anmeldeformular
    $rolle="";   // vorinitialisieren
	$sql="select RolleID,Rolle from rollen order by rolle asc";
	$ergebnis = $this->pdo->prepare($sql);
    if ($ergebnis->execute())  // sind Daten enthalten???
	{
		while($row = $ergebnis->fetch())  // die einzelnen Zeilen auslesen
		{
		  $rolle .= $row[0]."-".$row[1].";";
			
			// Ergebnis:  1-Admin;2-AzuBI;3-Buchhaltung;4-Praktikant;5-Trainer
		}
	}
	return $rolle;
   }
  
  
  
  public function checkUser($login,$passwort)
  {
	  $sql="select * from benutzer where login = ? and passwort = ?";
	  $ergebnis = $this->pdo->prepare($sql);
	  $ergebnis->execute(array($login,md5($passwort)));
	  if ($ergebnis->rowCount()>0)
	  {
		  // rowCount() zählt die Zeilen des Ergebnisses der Abfrage
		 $row = $ergebnis->fetch();  // Ergebnis auslesen und in row ablegen
		 $_SESSION["Vorname"]    = $row[3];
		 $_SESSION["Nachname"]   = $row[4];
		 $_SESSION["BenutzerID"] = $row[0];
		 return $row[0];   // 0 für die benutzerID
	  }
	  else
	  {
		 return 0;
	  }		  
  }
 
	public function userNeu($sergej)
	{
		$sql="insert into benutzer ";
		$sql.="(Anrede,Name,Nachname,PLZ,Ort,Telephone,RolleID,Login,";
		$sql.="Password) values (?,?,?,?,?,?,?,?,?)";
		$ergebnis= $this->pdo->prepare($sql);
		$ergebnis->execute(array($sergej["anrede"],$sergej["vorname"],
		$sergej["nachname"],$sergej["plz"],$sergej["wohnort"],
		$sergej["telefon"],$sergej["rolle"],$sergej["login"],$sergej["passwort1"]));
                    //md5($sergej["passwort1"])));
		
	}
 
 
        public function displayAlleUser(){
            //gibt alle eintrage der Tabelle Benutzer
            
            $sql="select b.benutzerID, r.Rolle, b.Anrede, b.Name, b.Nachname, b.PLZ, b.Ort, b.Email,b.telephone,b.login,b.Password from benutzer as b join rollen as r on  b.rolleID=r.rolleID";
            $ergebnis=$this->pdo->query($sql);
            return $ergebnis->fetchAll();           
        }
        
        public function deletebenutzer($benutzerid){
            $sql ="DELETE FROM benutzer WHERE benutzerID=".$benutzerid;
            $ergebnis=$this->pdo->query($sql);
        }
        
        public function getbenutzerdaten($benutzerid){
            $sql ="select * FROM benutzer WHERE benutzerID=".$benutzerid;
            $ergebnis=$this->pdo->query($sql);
            $zeile=$ergebnis->fetch();
            return $zeile;
        }
        
        public function getAnreden(){
            $sql="select bezeichnung from anrede order by bezeichnung asc ";
            $ergebnis=$this->pdo->query($sql);
            return $ergebnis->fetchAll();   
        }
        
        public function userupdate($wurst){
            $sql ="update benutzer set Anrede=?,Name=?,Nachname=?,PLZ=?,Ort=?,Telephone=?,RolleID=? where BenutzerID=?";
            $ergebnis=$this->pdo->prepare($sql);
            $ergebnis->execute(array($wurst["anrede"],$wurst["name"],$wurst["nachname"],$wurst["plz"],$wurst["wohnort"],$wurst["telefon"],$wurst["rolle"],$wurst["userid"]));
        }
        
        public function displayalleraume(){
            $sql="select RaumID,Bezeichnung,Kapazitat,Verfugbarkeit, if (Verfugbarkeit=0,'Frei','Belegt') from raume";
            $ergebnis=$this->pdo->query($sql);
            return $ergebnis->fetchAll();  
        }
        
        public function deleteraum($raumid){
            $sql ="DELETE FROM raume WHERE RaumID=".$raumid;
            $ergebnis=$this->pdo->query($sql);
        }
        
        public function getraumdaten($raumid) {
            $sql="select * from raume where RaumID=".$raumid;
            $ergebnis=$this->pdo->query($sql);
            return $ergebnis->fetch();  
            return $zeile;
        }
        
        public function editraum($wurst){
//            print_r($wurst);
//            die();
            $sql ="update raume set Bezeichnung=?,Kapazitat=?,Menge=? where RaumID=?";
            $ergebnis=$this->pdo->prepare($sql);
            $ergebnis->execute(array($wurst["bezeichnung"],$wurst["kapazitat"],$wurst["menge"],$wurst["rid"]));
        
        }
        
        public function insertraum($wurst){
//            print_r($wurst);
//            die();
                $sql="insert into raume ";
		$sql.="(Bezeichnung,Kapazitat,Menge)";
		$sql.="values (?,?,?)";
		$ergebnis= $this->pdo->prepare($sql);
		$ergebnis->execute(array($wurst["bezeichnung"],$wurst["kapazitat"],$wurst["menge"]));
        }
        
        public function displayallequip() {
           $sql="select InventarID,Bezeichnung,Menge,Verfugbarkeit from inventar";
            $ergebnis=$this->pdo->query($sql);
            return $ergebnis->fetchAll(); 
        }
        
        public function getequipdaten($equipid) {
            $sql="select * from inventar where InventarID=".$equipid;
            $ergebnis=$this->pdo->query($sql);
            return $ergebnis->fetch();  
            return $zeile;
        }
        
        public function editequip($wurst) {
            $sql ="update inventar set Bezeichnung=?,Menge=? where InventarID=?";
            $ergebnis=$this->pdo->prepare($sql);
            $ergebnis->execute(array($wurst["bezeichnung"],$wurst["menge"],$wurst["rid"]));
        }
        public function insertequip($wurst) {
                $sql="insert into inventar(Bezeichnung,Menge) values (?,?)";
		$ergebnis= $this->pdo->prepare($sql);
		$ergebnis->execute(array($wurst["bezeichnung"],$wurst["menge"]));
        }
        
        public function deleteequip($equipid){
            $sql ="DELETE FROM inventar WHERE InventarID=".$equipid;
            $ergebnis=$this->pdo->query($sql);
        }
                
        public function displayallekurse(){
            $sql="select KursID,Bezeichnung,TrainerID,Kapazitat,Dauer,Preis from kurs order by Bezeichnung asc";
            $ergebnis=$this->pdo->query($sql);
            return $ergebnis->fetchAll(); 
        }
           
        public function getkursdaten($kursid) {
            $sql="select * from kurs where KursID=".$kursid;
            $ergebnis=$this->pdo->query($sql);
            return $ergebnis->fetch();  
            return $zeile;
        }
        
         public function editkurs($wurst) {
            $sql ="update kurs set Bezeichnung=?,TrainerID=?,Kapazitat=?,Dauer=?,Preis=? where KursID=?";
            $ergebnis=$this->pdo->prepare($sql);
            $ergebnis->execute(array($wurst["bezeichnung"],$wurst["trainerid"],$wurst["kapazitat"],$wurst["dauer"],$wurst["preis"],$wurst["rid"]));
        }
        
        public function insertkurs($wurst) {
                $sql="insert into kurs(Bezeichnung,TrainerID,Kapazitat,Dauer,Preis) values (?,?,?,?,?)";
		$ergebnis= $this->pdo->prepare($sql);
		$ergebnis->execute(array($wurst["bezeichnung"],$wurst["trainerid"],$wurst["kapazitat"],$wurst["dauer"],$wurst["preis"]));
        }
        
        
        public function displayalletermine(){
            $sql="select t.TerminID,r.RaumID,concat(b.Name,' ',b.Nachname),k.Bezeichnung, date_format(t.AnfangDatum,'%d.%m.%Y'),date_format(DATE_ADD(t.AnfangDatum,INTERVAL k.Dauer DAY), '%d.%m.%Y'), concat(b.Name,' ',b.Nachname),e.Bezeichnung
                    from termin as t, benutzer as b,kurs as k, raume as r, inventar as e
                    where (b.BenutzerID=t.BenutzerID
                    and t.KursID=k.KursID
                    and r.RaumID=t.RaumID
                    and e.InventarID=t.InventarID)";
            $ergebnis=$this->pdo->query($sql);
            return $ergebnis->fetchAll();  
            
        }
        
        public function deletetermin($terminid) {
            $sql ="DELETE FROM termin WHERE TerminID=".$terminid;
            $ergebnis=$this->pdo->query($sql);
        }
        
        public function updatetermin($wurst) {
            $sql ="update kurs set Bezeichnung=?,TrainerID=?,Kapazitat=?,Dauer=?,Preis=? where KursID=?";
            $ergebnis=$this->pdo->prepare($sql);
            $ergebnis->execute(array($wurst["bezeichnung"],$wurst["trainerid"],$wurst["kapazitat"],$wurst["dauer"],$wurst["preis"],$wurst["rid"]));
        }
       
        public function displayAlleTrainer(){
            $sql="select b.benutzerID, r.Rolle, b.Anrede, b.Name, b.Nachname, b.PLZ, b.Ort, b.Email,b.telephone,b.login,b.Password from benutzer as b join rollen as r on  b.rolleID=r.rolleID where r.RolleID=7";
            $ergebnis=$this->pdo->query($sql);
            return $ergebnis->fetchAll();  
        }
        
}










