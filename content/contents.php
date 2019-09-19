<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<head>
    <style>
        .tablex{
           border:5px solid grey; 
           box-shadow:15px 10px 18px #888888;
        }
        body {
  background-image: url("../images/termin.jpg");
  background-repeat: no-repeat;
  background-position: right top;
  background-attachment: scroll;
  background-size: 100%;
}
table {
  border-collapse: collapse;
  width: 90%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
tr:nth-child(odd) {background-color: #ffffff;}
    </style>
</head>

<body>

    <div class="w3-container">
  <h2>Ultimative Terminplanung</h2>
  
  <div class="w3-bar w3-light-grey" style="width:100%;margin-bottom: 25px;">
    <a href="contents.php" class="w3-bar-item w3-button">Home</a>
    <a href="#" class="w3-bar-item w3-button">Programminfos</a>

	<div class="w3-dropdown-hover">
      <button class="w3-button">Kursverwaltung</button>
      <div class="w3-dropdown-content w3-card-4">
        <a href="updatekurs.php?ID=0" class="w3-bar-item w3-button">Neuer Kurs</a>
        <a href="kursliste.php" class="w3-bar-item w3-button">Kursliste</a>
      </div>
    </div>
    <div class="w3-dropdown-hover">
      <button class="w3-button">Benutzerverwaltung</button>
      <div class="w3-dropdown-content w3-card-4">
        <a href="userneu.php" class="w3-bar-item w3-button">Neuer Benutzer</a>
        <a href="userliste.php" class="w3-bar-item w3-button">Benutzerliste</a>
      </div>
    </div>
	 <div class="w3-dropdown-hover">
      <button class="w3-button">Sonstiges</button>
      <div class="w3-dropdown-content w3-card-4">
        <a href="raumliste.php" class="w3-bar-item w3-button">Raumverwaltung</a>
        <a href="equipliste.php" class="w3-bar-item w3-button">Equipmentverwaltung</a>
      </div>      
    </div>
     <div class="w3-dropdown-hover">
      <button class="w3-button">Terminverwaltung</button>
      <div class="w3-dropdown-content w3-card-4">
        <a href="terminliste.php" class="w3-bar-item w3-button">Termineliste</a>
        <a href="neutermine.php" class="w3-bar-item w3-button">Neu Termin</a>
      </div>
  </div>
</div>