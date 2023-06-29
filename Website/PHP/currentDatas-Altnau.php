<?php
// Verbindung zur Datenbank herstellen
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "standort2";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Überprüfen, ob die Verbindung erfolgreich war
if (!$conn) {
    die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
}

// Daten in die Tabelle einfügen
$sql = "select * from datas order by datas_ID desc limit 1;";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
    echo "<p class='datas' >" . $row['temp'] . "° C</p>";
    echo "<p class='datas' >" . $row['pressure'] / 100 . " hPa</p>";
    //echo "<p class='datas' >" . $row['humidity'] . "</p>";
}

mysqli_close($conn);
?>