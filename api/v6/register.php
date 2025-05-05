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

$nick = $data['pnick'];
$dayonInit = $data['pdayonInit'];
echo ('dayonInit = '  . $dayonInit);
echo json_encode($nick);
$sql ="SELECT * FROM player where nick='$nick'";
$nickresult = $conn->query($sql);
if($nickresult->num_rows>0)
    {
		echo json_encode('badnick');	 		
	}
	else
	{
        if($nick != null)
        {
            $sql = "INSERT INTO player (nick, dayon_init, created) VALUES (?, ?, CURDATE())";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $nick, $dayonInit);
            $result = $stmt->execute();

            if($result)
            {
                echo "Nuovo giocatore registrato correttamente";	 		
		    }
            else
            {
			    echo "Errore: " . $sql . "<br>" . $conn->error; // Errore di database 		
            }   
    }
    else{
        echo "nick nullo";	
    }
}
    $conn->close();   
    return $result;