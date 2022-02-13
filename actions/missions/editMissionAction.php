<?php

// se connecter à la base de donnée
require('actions/database.php');

//Validation du formulaire
if(isset($_POST['valid'])){

    //Vérifier si les champs sont remplis
    if(!empty($_POST['title']) 
    AND !empty($_POST['description']) 
    AND !empty($_POST['code'])  
    AND !empty($_POST['speciality']) 
    AND !empty($_POST['nationality']) 
    AND !empty($_POST['admin']) 
    AND !empty($_POST['type']) 
    AND !empty($_POST['status'])  ){

        //Les données à faire passer dans la requête
        $new_mission_title = htmlspecialchars($_POST['title']);
        $new_mission_description = nl2br(htmlspecialchars($_POST['description']));
        $new_mission_code = htmlspecialchars($_POST['code']);
        $new_mission_begin = date('Y/m/d');
        $new_mission_ending = date('Y/m/d');
        $new_mission_speciality = htmlspecialchars($_POST['speciality']);
        $new_mission_nationality = htmlspecialchars($_POST['nationality']);
        $new_mission_admin = htmlspecialchars($_POST['admin']);
        $new_mission_type = htmlspecialchars($_POST['type']);
        $new_mission_status = htmlspecialchars($_POST['status']);
        
        //Modifier les informations de la mission qui possède l'id rentré en paramètre dans l'URL
        $editMissionOnWebsite = $bdd->prepare('UPDATE mission SET Title = ?, 
        Description = ?, 
        MissionCode = ?, 
        BeginningDate = ?, 
        EndingDate = ? , 
        speciality_id = ? , 
        nationality_id = ? , 
        Admin_id = ? , 
        missionType_Id = ? , 
        missionStatus_Id = ? 
        WHERE id = ?');

        $editMissionOnWebsite->execute(array($new_mission_title, 
        $new_mission_description, 
        $new_mission_code, 
        $new_mission_begin, 
        $new_mission_ending, 
        $new_mission_speciality, 
        $new_mission_nationality, 
        $new_mission_admin, 
        $new_mission_type , 
        $new_mission_status , 
        $idOfMission));

        //Redirection vers la page d'affichage des missions 
        header('Location: allMission.php');
        
    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
        
    }

}