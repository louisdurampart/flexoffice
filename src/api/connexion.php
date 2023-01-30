<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");

	
ini_set('display_errors', 'on');
$temp = json_decode(file_get_contents('php://input'));

//echo json_encode($temp->action);

$inputEmail= json_encode($temp->inputEmail);
$inputMdp= json_encode($temp->inputMdp);
try {
    // $connect = new \PDO("mysql:host=localhost;dbname=flexoffice;port=3306","root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $connect = new \PDO("mysql:host=db5011374029.hosting-data.io;dbname=Flex;port=3306","dbu4205535", "Flex@SII-LeMans2022", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

/*if ($received_data->action=='fetchall'){*/
    //récupération de tous les utilisateurs et informations
    $query ="SELECT UtilisateurID,Nom,Prenom,Email,MotDePasse FROM utilisateur ";
    // $query ="SELECT Email,MotDePasse FROM utilisateur ";
    $statement = $connect->prepare($query);
    $statement->execute();
    while($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        
        $data[] = $row;
        
    }
    //echo json_encode($data);
//}

//$inputEmail='ted@gmail.com';
//$inputMdp='test';

// vérification de correspondance email mot de passe renvoi status 200 en cas de succès
$i=0;
foreach ($data as $cle => $valeur) {
$valeurs = implode(" , ", $data[$i]);

// zone de test
//echo ($valeurs);

$email1 = strstr($valeurs, '@', true); // recherche avant le masque
$email1 = strrchr($email1, ', ');
$email1 =trim($email1,", ");
$Email = strpbrk($valeurs, '@');// recherche les caractères
$Email = substr($Email, 0, strpos($Email,",")); //on supprime la fin de chaine
$Email =trim($Email," ,");// retire les espaces et les , avant et après
$email1 .= $Email;
//echo ($email1);
//mdp OK
$MotDePasse = strrchr($valeurs, ', '); //recherche la dernière occurence après la , ici le mdp
$MotDePasse =trim($MotDePasse,", "); // on supprime la, et l'espace

if($inputEmail == $email1 && $inputMdp == $MotDePasse){
 header('Status: 200');
  echo json_encode($data[$i]);
  break;
  
}
else{
    // erreur de connexion
    header('Status: 400');
}

$i=$i+1;
}
?>
<?php


