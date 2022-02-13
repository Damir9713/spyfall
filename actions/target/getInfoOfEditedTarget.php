<?php

require('actions/database.php');

// récupérer info pour liste déroulante
$nationality_list = $bdd->query('SELECT * from nationality order by id');



//Vérifier si l'id de la cible est bien passé en paramètre dans l'URL
if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfTarget = $_GET['id'];

    //Vérifier si la cible existe
    $getTargetInfo = $bdd->prepare('SELECT DISTINCT * FROM target 
    
    
    
    WHERE id = ?');
    $getTargetInfo->execute(array($idOfTarget));

    if($getTargetInfo->rowCount() > 0){

        //Récupérer les données de la cible
        $targetInfo = $getTargetInfo->fetch();
        if($targetInfo['id']){
            
            $target_firstname = $targetInfo['Firstname'];
            $target_lastname = $targetInfo['lastname'];
            $target_code = $targetInfo['nameCode'];
            $target_age = $targetInfo['Age'];
            $target_nationality = $targetInfo['nationality_id'];
          

            
           

        }else{
            $errorMsg = "Vous ne pouvez pas modifier cette cible";
        }

    }else{
        $errorMsg = "Aucune cible n'a été trouvée";
    }

}else{
    $errorMsg = "Aucune cible n'a été trouvée";

}