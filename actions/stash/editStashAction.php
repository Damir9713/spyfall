<?php

require('actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){

    //Vérifier si les champs sont remplis
    if(!empty($_POST['adress']) 
    AND !empty($_POST['code']) 
    AND !empty($_POST['mission'])  
    AND !empty($_POST['type']) 
    AND !empty($_POST['nationality']) 
     ){

        //Les données à faire passer dans la requête
        $new_stash_adress = htmlspecialchars($_POST['adress']);
        $new_stash_code = nl2br(htmlspecialchars($_POST['code']));
        $new_stash_mission = htmlspecialchars($_POST['mission']);
        $new_stash_type = htmlspecialchars($_POST['type']);
        $new_stash_nationality = htmlspecialchars($_POST['nationality']);
        
        
        //Modifier les informations de la planque qui possède l'id rentré en paramètre dans l'URL
        $editMissionOnWebsite = $bdd->prepare('UPDATE stash SET stashCode = ?, 
        Adress = ?, 
        Type = ?,   
        nationality_id = ? , 
        mission_id = ?  
        WHERE stash_id = ?');

        $editMissionOnWebsite->execute(array(
            $new_stash_code,
            $new_stash_adress,
            $new_stash_type,
            $new_stash_nationality,
            $new_stash_mission,
            $idOfstash 

        ));
        //Redirection vers la page d'affichage des questions de l'utilisateur
        header('Location: allStashAdmin.php');

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}