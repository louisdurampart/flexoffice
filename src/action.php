<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
	//$connect = new PDO("mysql:host=localhost;dbname=flexoffice;port=3306","root", "");
//$received_data = json_decode(file_get_contents("php://input"));
//$data = array();
ini_set('display_errors', 'on');
try {
    $connect = new \PDO("mysql:host=localhost;dbname=flexoffice;port=3306","root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

/*if ($received_data->action=='fetchall'){*/
    //récupération de tous les utilisateurs et informations
    $query ="SELECT * FROM utilisateur ";
    // $query ="SELECT Email,MotDePasse FROM utilisateur ";
    $statement = $connect->prepare($query);
    $statement->execute();
    while($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        $data[] = $row;
    }
	// http_response_code(200);
    // header('HTTP/1.1 200 OK');
     
    echo json_encode($data);
/*}
// vérification de correspondance email mot de passe renvoi status 200 en cas de succès
foreach ($data as list ($Email,$MotDePasse)) {
if($email == $Email && $mdp == $MotDePasse){
  header('Status: 200');
}
else{
    // erreur de connexion
     header('Status: 400');
}
}
}

*/
?>