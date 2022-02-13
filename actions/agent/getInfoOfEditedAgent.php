<?php

require('actions/database.php');

// récupérer info pour liste déroulante
$nationality_list = $bdd->query('SELECT * from nationality order by id');
$speciality_list = $bdd->query('SELECT * from speciality order by id');



//Vérifier si l'id de la cible est bien passé en paramètre dans l'URL
if(isset($_GET['agent_id']) AND !empty($_GET['agent_id'])){

    $idOfAgent = $_GET['agent_id'];

    //Vérifier si la cible existe
    $getAgentInfo = $bdd->prepare('SELECT DISTINCT * FROM agent
    
    
    
    WHERE agent_id = ?');
    $getAgentInfo->execute(array($idOfAgent));

    if($getAgentInfo->rowCount() > 0){

        //Récupérer les données de la cible
        $AgentInfo = $getAgentInfo->fetch();
        if($AgentInfo['agent_id']){
            
            $agent_firstname = $AgentInfo['Firstname'];
            $agent_lastname = $AgentInfo['lastname'];
            $agent_code = $AgentInfo['CodeID'];
            $agent_age = $AgentInfo['Age'];
            $agent_speciality = $AgentInfo['speciality_id'];
            $agent_nationality = $AgentInfo['nationality_id'];
          

            
           

        }else{
            $errorMsg = "Vous ne pouvez pas modifier ce contact";
        }

    }else{
        $errorMsg = "Aucun contact n'a été trouvée";
    }

}else{
    $errorMsg = "Aucune contact n'a été trouvée";

}