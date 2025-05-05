<?php
header('Cache-Control: max-age=1');

// Allow the following headers from any origin 
header("Access-Control-Allow-Headers: *");

// Allow any origin to access your API
header("Access-Control-Allow-Origin: *");

// Allow the following methods from any origin
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

include 'connect.php'; 

$obj = file_get_contents('php://input');   // $obj is a JSON object
$data = json_decode($obj,true);            // $data is an associative Array 
$description = $data['description'];
$closed = 0;

$sql = "INSERT INTO ideas (description, closed) VALUES (?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $description,$closed); // $closed and $created are not used in the query, but are required by bind_param
$result = $stmt->execute();             // returns boolean*/
return $result;   
    