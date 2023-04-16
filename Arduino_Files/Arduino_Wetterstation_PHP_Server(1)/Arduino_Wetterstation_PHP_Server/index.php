<?php
$file = fopen("received_data.txt", "r") or die("Unable to open file!");
echo fread($file,filesize("received_data.txt"));
fclose($file);
?>