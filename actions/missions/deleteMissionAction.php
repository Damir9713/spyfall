<?php

//Vérifier si l'utilisateur est authentifié au niveau du site
session_start();
if(!isset($_SESSION['auth'])){
    header('Location: ../../index.php');
}

//Se connecter à la base de données
require('../database.php');

//Vérifier si l'id est rentré en paramètre dans l'URL
if(isset($_GET['id']) AND !empty($_GET['id'])){

    //L'id de la mission en paramètre
    $idOfTheMission = $_GET['id'];

    //Vérifier si la mission existe
    $checkIfMissionExists = $bdd->prepare('SELECT id FROM mission WHERE id = ?');
    $checkIfMissionExists->execute(array($idOfTheMission));

    if($checkIfMissionExists->rowCount() > 0){

        //Récupérer les infos de la mission
        $MissionInfos = $checkIfMissionExists->fetch();
        if( $_SESSION['id']){

            //Supprimer la mission en fonction de son id rentré en paramètre
           
            $deleteThisMission = $bdd->prepare('DELETE FROM mission WHERE id = ?');
            $deleteThisMission->execute(array($idOfTheMission));

            //Rediriger l'utilisateur vers ses questions
            header('Location: ../../allMission.php');

        }else{
            echo "Vous n'avez pas le droit cet mission !";
        }

    }else{
        echo "Aucune mission n'a été trouvée";
    }


}else{
    echo "Aucune mission n'a été trouvée";
}