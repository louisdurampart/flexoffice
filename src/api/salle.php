<?php
// feuille permettant d'avoir une liste de salles
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");
	
//echo json_encode($temp->BureauID);
ini_set('display_errors', 'on');
try {
    // $connect = new \PDO("mysql:host=localhost;dbname=flexoffice;port=3306","root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $connect = new \PDO("mysql:host=db5011374029.hosting-data.io;dbname=Flex;port=3306","dbu4205535", "Flex@SII-LeMans2022", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

/*if ($received_data->action=='fetchall'){*/
    //récupération de tous les utilisateurs et informations
    $query ="SELECT * FROM salle ";
    //$query ="SELECT * FROM salle  WHERE BureauID =$temp";
    $statement = $connect->prepare($query);
    $statement->execute();
    while($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        $data[] = $row;
    }
	// http_response_code(200);
    // header('HTTP/1.1 200 OK');
     
    echo json_encode($data);
//}

?>