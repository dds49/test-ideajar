<?php
header("Access-Control-Allow-Origin: *");
header('Cache-Control: max-age=1');

// Allow the following headers from any origin
header("Access-Control-Allow-Headers: *");

// Allow any origin to access your API

// Allow the following methods from any origin 
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

include 'connect.php'; 

$nick = $_GET['nick'];
$sql= "SELECT id FROM player WHERE nick = '$nick'";
$result = $conn->query($sql);
if($result->num_rows>0){ 
    $row = $result->fetch_array(MYSQLI_NUM); 
    $id = $row[0];    
}else $id = 0;  

echo ($id);   