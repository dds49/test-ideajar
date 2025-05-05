<?php
header('Cache-Control: max-age=1');

// Allow the following headers from any origin
header("Access-Control-Allow-Headers: *");

// Allow any origin to access your API
header("Access-Control-Allow-Origin: *");

// Allow the following methods from any origin
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

include 'connect.php'; 

$json_obj = file_get_contents('php://input');
$data = json_decode($json_obj,true);

$nick = $_GET['nick'];
$dayon = $_GET['dayon'];
$result = 'notplayed';
$sql ="SELECT score.* FROM score INNER JOIN player where player.id=score.player_id AND nick='$nick' AND dayon=$dayon";

$res = $conn->query($sql);
if($res->num_rows>0) 
echo 1;
else echo 0;
$conn->close();
