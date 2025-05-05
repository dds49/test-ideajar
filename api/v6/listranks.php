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

$sql = "SELECT nick, punti, avg_diff, avg_time, played, dayon_init  FROM player  WHERE enabled=1 AND played>0 ORDER BY punti DESC, avg_diff ASC, avg_time ASC";
$stmt = $conn->prepare($sql);
$stmt->execute();
if($stmt) {
    $ranks = $stmt->fetchALL(PDO::FETCH_ASSOC);
    echo json_encode($ranks);
}else echo "ERRORE DB";