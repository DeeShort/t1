<?php
class CPerson
{
	// Eigenschaften / Attribute / memberVariablen 
	// sollten alle private sein, von Aussen nicht erreichbar ( Kapselung)
		private $anrede;
		private $vorname;
		private $nachname;
		private $geburtstag;
		
	// Methoden der Klasse, verändern den Zustand des Objektes
	// Konstruktor der Klasse
	// er wird aufgerufen, wenn mit new ein neues Objekt instanziiert wird
	// jedes Objekt hat einen unsichtbaren Standardkontruktor
	
		public function __construct($vname,$nname,$anrede,$gebdat)
		{
			$this->vorname    = $vname;
			$this->nachname   = $nname;
			$this->geburtstag = $gebdat;
			$this->anrede     = $anrede;
			$this->geburtstag = $this->setGeburtstag($gebdat);
		
			// $this ist eine Referenzvariable auf das Objekt selbst
		}
		public function getVorname()
		{
			// gibt die Eigensachaft Vorname zurück
			return $this->vorname;
		}
		public function setVorname($vname)
		{
			$this->vorname = $vname;
		}
		public function setGeburtstag($tag)
		{
			//$this->geburtstag="default";  // Standardvorgabe	
			// checken, ob gebdat in der richtigen Schreibweise eingegeben wurde
			$werte = explode(".",$tag);
			// 12.09.2009  =>  werte[0] = 12  werte[1] = 09 werte[2] = 2009
		  
		    if (($werte[0]>=1) and ($werte[0]<=31))  // Ist der Tag zwischen 1 und 31
		    {
			    if (($werte[1]>=1) and ($werte[1]<=12)) // MOnat zwischen 1 und 12
			    {
				    if (($werte[2]>=1900) and ($werte[2]<=2019)) // Jahr >1900 und <2019
				    {
				     //$this->geburtstag = $tag;  // eingabe korrekt
				     return $tag;
				    }
			    }
		    }
		}
		
		public function getGeburtstag()
		{
			return $this->geburtstag;
		}
		public function setNachname($nname)
		{
			$this->nachname = $nname;
		}
		public function getNachname()
		{
			return $this->nachname;
		}
		public function setAnrede($wert)
		{
			$this->anrede = $wert;
		}
		public function getAnrede()
		{
			return $this->anrede;
		}
		
		
		
		
}
?>







