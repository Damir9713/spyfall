<?php

//Vérifier si l'utilisateur est authentifié au niveau du site
session_start();
if(!isset($_SESSION['auth'])){
    header('Location: ../../index.php');
}

// se connecter à la bdd
require('../database.php');

//Vérifier si l'id est rentré en paramètre dans l'URL
if(isset($_GET['id']) AND !empty($_GET['id'])){

    //L'id de la cible en paramète
    $idOfTheTarget = $_GET['id'];

    //Vérifier si la cible existe
    $checkIfTargetExists = $bdd->prepare('SELECT id FROM target WHERE id = ?');
    $checkIfTargetExists->execute(array($idOfTheTarget));

    if($checkIfTargetExists->rowCount() > 0){

        //Récupérer les infos de la cible
        $TargetInfos = $checkIfTargetExists->fetch();
        if( $_SESSION['id']){

            //Supprimer la cible en fonction de son id rentré en paramètre
           
            $deleteThisTarget = $bdd->prepare('DELETE FROM target WHERE id = ?');
            $deleteThisTarget->execute(array($idOfTheTarget));

            //Rediriger l'utilisateur vers ses questions
            header('Location: ../../allTargetAdmin.php');

        }else{
            echo "Vous n'avez pas le droit de supprimer cette cible !";
        }

    }else{
        echo "Aucune cible n'a été trouvée";
    }


}else{
    echo "Aucune cible n'a été trouvée";
}