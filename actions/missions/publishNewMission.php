<?php

// se connecter à la bdd
require('actions/database.php');

// récupérer info pour liste déroulante
$speciality_list = $bdd->query('SELECT * from speciality order by id');
$nationality_list = $bdd->query('SELECT * from nationality order by id');
$admin_list = $bdd->query('SELECT * from admin order by id');
$typeMission_list = $bdd->query('SELECT * from missiontype order by id');
$statusMission_list = $bdd->query('SELECT * from missionstatus order by id');


//Valider le formulaire
if(isset($_POST['validate'])){

    //Vérifier si les champs ne sont pas vides
    if(!empty($_POST['title']) 
    AND !empty($_POST['description']) 
    AND !empty($_POST['code'])  
    AND !empty($_POST['speciality']) 
    AND !empty($_POST['nationality']) 
    AND !empty($_POST['admin']) 
    AND !empty($_POST['type']) 
    AND !empty($_POST['status'])  )
    {
        
        //Les données de la mission
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

        //Insérer la mission sur la question
        $insertMissionOnWebsite = $bdd->prepare('INSERT INTO mission(Title, 
        Description, 
        MissionCode, 
        BeginningDate, 
        EndingDate, 
        speciality_id, 
        nationality_id, 
        Admin_id, 
        missionType_Id, 
        missionStatus_Id) VALUES(?, ?, ?, ?, ?, ?, ?, ? , ? , ?)');
        
        $insertMissionOnWebsite->execute(
            array(
             $new_mission_title,
             $new_mission_description,
             $new_mission_code,
             $new_mission_begin,
             $new_mission_ending,
             $new_mission_speciality,
             $new_mission_nationality,
             $new_mission_admin,
             $new_mission_type,
             $new_mission_status
            
            )
        );
        
        $successMsg = "Votre mission a bien été ajoutée ";
        
        


        header('Location: allMission.php');
    
    

        
        }else{
        $errorMsg = "Veuillez remplir tout les champs";
    }

    


}