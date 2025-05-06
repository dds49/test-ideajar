<?php
header("Access-Control-Allow-Origin: *");
header('Cache-Control: max-age=1');
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

$myfile = fopen("./data/jar.json", "r") or die("Unable to open file!");
echo fread($myfile, filesize("./data/jar.json"));
fclose($myfile);
  
    