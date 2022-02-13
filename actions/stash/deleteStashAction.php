<?php



//Vérifier si l'utilisateur est authentifié au niveau du site
session_start();
if(!isset($_SESSION['auth'])){
    header('Location: ../../index.php');
}

require('../database.php');

//Vérifier si l'id est rentré en paramètre dans l'URL
if(isset($_GET['stash_id']) AND !empty($_GET['stash_id'])){

    //L'id de la planque en paramète
    $idOfTheStash = $_GET['stash_id'];

    //Vérifier si la planque existe
    $checkIfStashExists = $bdd->prepare('SELECT stash_id FROM stash WHERE stash_id = ?');
    $checkIfStashExists->execute(array($idOfTheStash));

    if($checkIfStashExists->rowCount() > 0){

        //Récupérer les infos de la planque
        $StashInfos = $checkIfStashExists->fetch();
        if( $_SESSION['id']){

            //Supprimer la planque en fonction de son id rentré en paramètre
           
            $deleteThisMission = $bdd->prepare('DELETE FROM stash WHERE stash_id = ?');
            $deleteThisMission->execute(array($idOfTheStash));

            //Rediriger l'utilisateur vers ses questions
            header('Location: ../../allStashAdmin.php');

        }else{
            echo "Vous n'avez pas le droit de supprimer cet planque !";
        }

    }else{
        echo "Aucune planque n'a été trouvée";
    }


}else{
    echo "Aucune planque n'a été trouvée";
}