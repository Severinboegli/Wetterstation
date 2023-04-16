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
$get_time = date("d-m-Y H:i:s"); // Get local time from server


// ------------------ Write values to textfile ---------------------------------
$textfile = fopen("Files/receive.txt", "w") or die("Unable to open file!");
$txt = "Time: " . $get_time . " Temp: " . $temp . " *C Pressure: " . $pressure .
        " H/Pa Humidity: " . $humidity . " % Wind: " . $wind . " Km/h Runtime: " .
        $uptime . " sec. \n";
fwrite($textfile, $txt); // Write to textfile
fclose($textfile); //Close textfile


// ------------------ Write values to textfile ---------------------------------
echo "Uplink File";
?>