<?php
// feuille permettant de supprimer une réservation
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");

$date_debut = json_encode($temp->date_debut);
$date_fin = json_encode($temp->date_fin);
$UtilisateurID = json_encode($temp->UtilisateurID);
$RessourceID = json_encode($temp->RessourceID);

ini_set('display_errors', 'on');
try {
    // $connect = new \PDO("mysql:host=localhost;dbname=flexoffice;port=3306","root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $connect = new \PDO("mysql:host=db5011374029.hosting-data.io;dbname=Flex;port=3306","dbu4205535", "Flex@SII-LeMans2022", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

/*if ($received_data->action=='fetchall'){*/
    //récupération de tous les utilisateurs et informations
    //$query ="  INSERT INTO reservation(`ReservationID`, `DateDebut`, `DateFin`, `Matin`, `ApresMidi`, `UtilisateurID`, `RessourceID`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]') ";
    $query ="    INSERT INTO reservation(`DateDebut`, `DateFin`, `UtilisateurID`, `RessourceID`) VALUES ('2022/12/22','2022/12/22','1','7') ";
    
    //$query ="  INSERT INTO reservation(`DateDebut`, `DateFin`, `UtilisateurID`, `RessourceID`) VALUES ('$date_debut','$date_fin','$UtilisateurID','$RessourceID') ";
    // $query ="SELECT Email,MotDePasse FROM utilisateur ";
    $statement = $connect->prepare($query);
    $statement->execute();
   
	// http_response_code(200);
    // header('HTTP/1.1 200 OK');
     
//}

?>