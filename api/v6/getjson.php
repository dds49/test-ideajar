<?php
header('Cache-Control: max-age=1');

// Allow the following headers from any origin 
header("Access-Control-Allow-Headers: *");

// Allow any origin to access your API
header("Access-Control-Allow-Origin: *");

// Allow the following methods from any origin
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

$myfile = fopen("./data/jar.json", "r") or die("Unable to open file!");
echo fread($myfile, filesize("./data/jar.json"));
fclose($myfile);
//return $obj;   
    