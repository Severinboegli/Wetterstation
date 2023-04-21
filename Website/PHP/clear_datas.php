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

$sql = "drop table if exists datas;";

if (mysqli_query($conn, $sql)) {
    echo "Daten erfolgreich hinzugefügt";
} else {
    echo "Fehler beim Einfügen der Daten: " . mysqli_error($conn);
}


// Daten in die Tabelle einfügen
$sql = "create table datas(
    datas_ID int not null auto_increment,
    recorded_time date,
    temp float,
    pressure float,
    humidity float,
    wind float,
    uptime float,
    primary key(datas_ID)
);";

if (mysqli_query($conn, $sql)) {
    echo "Daten erfolgreich hinzugefügt";
} else {
    echo "Fehler beim Einfügen der Daten: " . mysqli_error($conn);
}


// Verbindung schließen
mysqli_close($conn);

?>