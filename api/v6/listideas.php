<?php
header('Cache-Control: max-age=1');

// Allow the following headers from any origin
header("Access-Control-Allow-Headers: *");

// Allow any origin to access your API
header("Access-Control-Allow-Origin: *");

// Allow the following methods from any origin
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

include 'PDOconnect.php';
$objDb = new PDOconnect;
$conn = $objDb->connect();

$sql = "SELECT * FROM ideas ORDER BY created DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
if($stmt) {
    $ideas = $stmt->fetchALL(PDO::FETCH_ASSOC);
    echo json_encode($ideas);
}else echo "ERRORE DB";