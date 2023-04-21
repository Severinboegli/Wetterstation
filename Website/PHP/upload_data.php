<?php
//more information at: https://www.aeq-web.com/arduino-wetterstation/?ref=phpfile

// ------------------ Get values from HTTP -------------------------------------
$get_weatherdata = $_POST["wx"]; // Get String from Arduino HTTP-Post request
$w_data = explode("~", $get_weatherdata); // Split POST-String
$temp = $w_data[0];
$pressure = $w_data[1];
$humidity = $w_data[2];
$wind = $w_data[3];
$uptime = $w_data[4];
// ------------------ Get values from HTTP -------------------------------------
$get_time = date("Y-m-d");// Get local time from server

echo $get_time;

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
$sql = "insert into datas values(null,";
$sql .= "'" . $get_time . "',";
$sql .= $temp . ",";
$sql .= $pressure . ",";
$sql .= $humidity . ",";
$sql .= $wind . ",";
$sql .= $uptime . ");";


if (mysqli_query($conn, $sql)) {
        echo "Daten erfolgreich hinzugefügt";
} else {
        echo "Fehler beim Einfügen der Daten: " . mysqli_error($conn);
}
// Verbindung schließen
mysqli_close($conn);
?>