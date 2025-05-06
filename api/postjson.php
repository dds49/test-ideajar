<?php
header('Cache-Control: max-age=1');

// Allow the following headers from any origin 
header("Access-Control-Allow-Headers: *");

// Allow any origin to access your API
header("Access-Control-Allow-Origin: *");

// Allow the following methods from any origin
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

$obj = file_get_contents('php://input');   // $obj is a JSON object
$myfile = fopen("./data/jar.json", "w") or die("Unable to open file!");
fwrite($myfile, $obj);
fclose($myfile);
   
    