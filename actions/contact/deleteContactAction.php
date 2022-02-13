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
    $idOfTheContact = $_GET['id'];

    //Vérifier si la cible existe
    $checkIfContactExists = $bdd->prepare('SELECT id FROM contact WHERE id = ?');
    $checkIfContactExists->execute(array($idOfTheContact));

    if($checkIfContactExists->rowCount() > 0){

        //Récupérer les infos de la cible
        $ContactInfos = $checkIfContactExists->fetch();
        if( $_SESSION['id']){

            //Supprimer la cible en fonction de son id rentré en paramètre
           
            $deleteThisContact = $bdd->prepare('DELETE FROM contact WHERE id = ?');
            $deleteThisContact->execute(array($idOfTheContact));

            //Rediriger l'utilisateur vers ses questions
            header('Location: ../../allContactAdmin.php');

        }else{
            echo "Vous n'avez pas le droit de supprimer ce contact !";
        }

    }else{
        echo "Aucun contact n'a été trouvée";
    }


}else{
    echo "Aucun contact n'a été trouvée";
}