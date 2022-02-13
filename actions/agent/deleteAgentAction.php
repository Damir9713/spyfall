<?php

//Vérifier si l'utilisateur est authentifié au niveau du site
session_start();
if(!isset($_SESSION['auth'])){
    header('Location: ../../index.php');
}

// se connecter à la bdd
require('../database.php');

//Vérifier si l'id est rentré en paramètre dans l'URL
if(isset($_GET['agent_id']) AND !empty($_GET['agent_id'])){

    //L'id de la cible en paramète
    $idOfTheAgent = $_GET['agent_id'];

    //Vérifier si la cible existe
    $checkIfAgentExists = $bdd->prepare('SELECT agent_id FROM agent WHERE agent_id = ?');
    $checkIfAgentExists->execute(array($idOfTheAgent));

    if($checkIfAgentExists->rowCount() > 0){

        //Récupérer les infos de la cible
        $AgentInfos = $checkIfAgentExists->fetch();
        if( $_SESSION['id']){

            //Supprimer la cible en fonction de son id rentré en paramètre
           
            $deleteThisAgent = $bdd->prepare('DELETE FROM agent WHERE agent_id = ?');
            $deleteThisAgent->execute(array($idOfTheAgent));

            //Rediriger l'utilisateur vers ses questions
            header('Location: ../../allAgentsAdmin.php');

        }else{
            echo "Vous n'avez pas le droit de supprimer cet agent !";
        }

    }else{
        echo "Aucun agent n'a été trouvée";
    }


}else{
    echo "Aucun agent n'a été trouvée";
}