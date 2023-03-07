<?php
// Verbindung zur Datenbank herstellen
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wetterstation";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Überprüfen, ob die Verbindung erfolgreich war
if (!$conn) {
  die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
}

// Daten in die Tabelle einfügen
$sql = "insert into datas values(null,'Tester');";

if (mysqli_query($conn, $sql)) {
  echo "Daten erfolgreich hinzugefügt";
} else {
  echo "Fehler beim Einfügen der Daten: " . mysqli_error($conn);
}

// Verbindung schließen
mysqli_close($conn);
?>
