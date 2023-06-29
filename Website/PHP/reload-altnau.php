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
$sql = "select * from datas order by datas_ID desc limit 10";

$result = mysqli_query($conn, $sql);

header("Refresh:1");

echo "<table>
            <tr>
            <th>Datum</th>
            <th>Temperatur</th>
            <th>Luftdruck</th>
            <th>Luftfeuchtigkeit</th>
            </tr>";
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['recorded_time'] . "</td>";
    echo "<td>" . $row['temp'] . "° C</td>";
    echo "<td>" . $row['pressure'] / 100 . " hPa</td>";
    echo "<td>" . $row['humidity'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($conn);

?>