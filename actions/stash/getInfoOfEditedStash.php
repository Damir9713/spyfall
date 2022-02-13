<?php

require('actions/database.php');

//récupérer info pour la liste déroulante
$nationality_list = $bdd->query('SELECT * from nationality order by id');
$mission_list = $bdd->query('SELECT * from mission order by id');
$type_list = $bdd->query('SELECT * from stash order by stash_id');


//Vérifier si l'id de la question est bien passé en paramètre dans l'URL
if(isset($_GET['stash_id']) AND !empty($_GET['stash_id'])){

    $idOfstash = $_GET['stash_id'];

    //Vérifier si la question existe
    $getStashInfo = $bdd->prepare('SELECT  * FROM stash 
    
    
    
    WHERE stash_id = ?');
    $getStashInfo->execute(array($idOfstash));

    if($getStashInfo->rowCount() > 0){

        //Récupérer les données de la question
        $stashInfo = $getStashInfo->fetch();
        if($stashInfo['stash_id']){
            
            $stash_adress = $stashInfo['Adress'];
            $stash_code = $stashInfo['stashCode'];
            $stash_mission = $stashInfo['mission_id'];
            $stash_Type = $stashInfo['Type'];
            $stash_nationality = $stashInfo['nationality_id'];
          
           

        }else{
            $errorMsg = "Vous ne pouvez pas modifier cette planque";
        }

    }else{
        $errorMsg = "Aucune planque n'a été trouvée";
    }

}else{
    $errorMsg = "Aucune planque n'a été trouvée";
} 