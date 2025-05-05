<?php
header("Access-Control-Allow-Origin: *");
header('Cache-Control: max-age=1');

// Allow the following headers from any origin
header("Access-Control-Allow-Headers: *");

// Allow any origin to access your API

// Allow the following methods from any origin 
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");


$myfile = fopen("./data/jar.json", "w") or die("Unable to open file!");
$ideas = fwrite($myfile, $obj);
$sql= "SELECT * FROM ideas WHERE closed = false";
$result = $conn->query($sql);
if($result->num_rows>0){ 
    $row = $result->fetch_array(MYSQLI_NUM); 
    return $row;  
}else return false;   