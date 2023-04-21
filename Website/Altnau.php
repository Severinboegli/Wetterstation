<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wetter Altnau</title>
    <link rel="stylesheet" href="./Style/style.css" />
    <link rel="stylesheet" href="./Style/reset.css" />
    <link rel="stylesheet" href="./Style/Switch.css" />
</head>

<body>
    <!-- Header -->
    <nav class="navbar">
        <a class="navbar-left" href="./">Home</a>

        <div class="navbar-right">
            <div class="navbar-right-text">
                <a class="navbar-right-text-a" href="./Altnau.php">Altnau</a>
                <a class="navbar-right-text-a" href="./Illighausen.php">Illighausen</a>
            </div>
            <!-- Switch-->
            <label class="switch navbar-switch">
                <input onclick="changeColorMode()" type="checkbox" checked />
                <span class="slider round"></span>
            </label>
            <div class="navbar-logo">
                <a href="#">
                    <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="icon"
                            d="M28 24.6044L15.6978 12.3022L28 0L40.3022 12.3022L28 24.6044ZM43.6978 40.3022L31.3956 28L43.6978 15.6978L56 28L43.6978 40.3022ZM12.3022 40.3022L0 28L12.3022 15.6978L24.6044 28L12.3022 40.3022ZM28 56L15.6978 43.6978L28 31.3956L40.3022 43.6978L28 56Z"
                            fill="#DDDDDD" />
                    </svg>
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content-->
    <main>
        <h1 class="title">Aktuelles Wetter</h1>

        <!-- Picture Column -->
        <div class="Column-Img">
            <img src="./Images/wolkig.png" alt="Wolkig" />
        </div>


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



    </main>

    <!-- Footer -->
    <footer>
        <p>
            &copy 2023
            <a href="https://github.com/Severinboegli" target="_blank" class="inner-link">Severin Bögli</a>
            & Timo Schreiber
        </p>
    </footer>

    <script type="text/javascript" src="./Javascript/main.js"></script>
    <script type="text/javascript" src="./Javascript/auto_update.js"></script>
</body>

</html>