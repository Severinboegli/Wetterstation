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
$datas = array(
    array(
        "time" => "2023-04-28 12:00:00",
        "temp" => 25.5,
        "pressure" => 1013.2,
        "humidity" => 50,
        "wind" => 10,
        "uptime" => 3600
    ),
    array(
        "time" => "2023-04-28 13:00:00",
        "temp" => 26.2,
        "pressure" => 1012.8,
        "humidity" => 48,
        "wind" => 8,
        "uptime" => 3600
    ),
    array(
        "time" => "2023-04-28 14:00:00",
        "temp" => 27.1,
        "pressure" => 1012.4,
        "humidity" => 45,
        "wind" => 7,
        "uptime" => 3600
    ),
    array(
        "time" => "2023-04-29 10:00:00",
        "temp" => 22.3,
        "pressure" => 1014.5,
        "humidity" => 55,
        "wind" => 15,
        "uptime" => 3600
    ),
    array(
        "time" => "2023-04-29 11:00:00",
        "temp" => 22.8,
        "pressure" => 1015.2,
        "humidity" => 53,
        "wind" => 12,
        "uptime" => 3600
    ),
    array(
        "time" => "2023-04-29 12:00:00",
        "temp" => 23.5,
        "pressure" => 1015.8,
        "humidity" => 51,
        "wind" => 10,
        "uptime" => 3600
    ),
    array(
        "time" => "2023-04-29 13:00:00",
        "temp" => 24.1,
        "pressure" => 1016.4,
        "humidity" => 48,
        "wind" => 8,
        "uptime" => 3600
    ),
    array(
        "time" => "2023-04-29 14:00:00",
        "temp" => 25.0,
        "pressure" => 1016.9,
        "humidity" => 45,
        "wind" => 7,
        "uptime" => 3600
    ),
    array(
        "time" => "2023-04-29 15:00:00",
        "temp" => 25.6,
        "pressure" => 1017.2,
        "humidity" => 43,
        "wind" => 6,
        "uptime" => 3600
    ),
    array(
        "time" => "2023-04-29 16:00:00",
        "temp" => 26.3,
        "pressure" => 1017.6,
        "humidity" => 41,
        "wind" => 5,
        "uptime" => 3600
    ),
    array(
        "time" => "2023-04-29 17:00:00",
        "temp" => 27.0,
        "pressure" => 1017.9,
        "humidity" => 40,
        "wind" => 4,
        "uptime" => 3600
    ),
    array(
        "time" => "2023-04-29 18:00:00",
        "temp" => 27.5,
        "pressure" => 1018.2,
        "humidity" => 38,
        "wind" => 3,
        "uptime" => 3600
    ),
    array(
        "time" => "2023-04-29 19:00:00",
        "temp" => 28.1,
        "pressure" => 1018.4,
        "humidity" => 36,
        "wind" => 2,
        "uptime" => 3600
    ),
    array(
        "time" => "2023-04-28 15:00:00",
        "temp" => 28.5,
        "pressure" => 1012.0,
        "humidity" => 42,
        "wind" => 6,
        "uptime" => 3600
    ),
    array(
        "time" => "2023-04-28 16:00:00",
        "temp" => 29.1,
        "pressure" => 1011.6,
        "humidity" => 40,
        "wind" => 5,
        "uptime" => 3600
    ),
    array(
        "time" => "2023-04-28 17:00:00",
        "temp" => 30.2,
        "pressure" => 1011.2,
        "humidity" => 38,
        "wind" => 4,
        "uptime" => 3600
    ),
    array(
        "time" => "2023-04-28 18:00:00",
        "temp" => 29.9,
        "pressure" => 1010.8,
        "humidity" => 39,
        "wind" => 5,
        "uptime" => 3600
    ),
    array(
        "time" => "2023-04-28 19:00:00",
        "temp" => 28.7,
        "pressure" => 1010.4,
        "humidity" => 41,
        "wind" => 6,
        "uptime" => 3600
    ),
    array(
        "time" => "2023-04-28 20:00:00",
        "temp" => 27.9,
        "pressure" => 1010.0,
        "humidity" => 43,
        "wind" => 7,
        "uptime" => 3600
    ),
    array(
        "time" => "2023-04-28 21:00:00",
        "temp" => 26.8,
        "pressure" => 1009.6,
        "humidity" => 46,
        "wind" => 8,
        "uptime" => 3600
    )
);








$sql = array();

foreach ($datas as $data) {
    $sqls = "INSERT INTO datas VALUES (null, '" . $data['time'] . "', " . $data['temp'] . ", " . $data['pressure'] . ", " . $data['humidity'] . ", " . $data['wind'] . ", " . $data['uptime'] . ");";
    mysqli_query($conn, $sqls);
}

mysqli_close($conn);

?>