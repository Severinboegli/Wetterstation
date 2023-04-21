<!DOCTYPE html>
<html lang="de-de">

<head>
    <meta charset="utf-8" />
    <title> Wetterstation</title>
    <meta name="author" content="Severin Bögli, Timo Schreiber" />
    <link rel="icon" href="./Files/images/wolkig.png">

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>

    <script>


        function reload() {

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("table").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "PHP/reload.php", true);
            xmlhttp.send();
        }

        // reloads the datas every 8 seconds
        const interval = setInterval(function () {
            reload();
        }, 1000);
    </script>
</head>

<body>

    <h1>Wetterstation</h1>
    <h3>Test</h3>

    <!--<button type="button" onclick="reload()">Click Me!</button>-->

    <div id="table">

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
        $sql = "select * from datas";

        $result = mysqli_query($conn, $sql);


        echo "<table>
            <tr>
                <th>datas_ID</th>
                <th>recorded_time</th>
                <th>temp</th>
                <th>pressure</th>
                <th>humidity</th>
                <th>wind</th>
                <th>uptime</th>
            </tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['datas_ID'] . "</td>";
            echo "<td>" . $row['recorded_time'] . "</td>";
            echo "<td>" . $row['temp'] . "</td>";
            echo "<td>" . $row['pressure'] . "</td>";
            echo "<td>" . $row['humidity'] . "</td>";
            echo "<td>" . $row['wind'] . "</td>";
            echo "<td>" . $row['uptime'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_close($conn);

        ?>

    </div>





</body>

</html>