<?php

// se conneter à la bdd
require('actions/database.php');

// récupérer info pour liste déroulante
$speciality_list = $bdd->query('SELECT DISTINCT * from speciality ');
$nationality_list = $bdd->query('SELECT * from nationality order by id');
$admin_list = $bdd->query('SELECT * from admin order by id');
$typeMission_list = $bdd->query('SELECT * from missiontype order by id');
$statusMission_list = $bdd->query('SELECT * from missionstatus order by id');


//Vérifier si l'id de la mission est bien passé en paramètre dans l'URL
if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfMission = $_GET['id'];

    //Vérifier si la mission existe
    $getMissionInfo = $bdd->prepare('SELECT DISTINCT * FROM mission 
    
    
    
    WHERE id = ?');
    $getMissionInfo->execute(array($idOfMission));

    if($getMissionInfo->rowCount() > 0){

        //Récupérer les données de la mission
        $missionInfo = $getMissionInfo->fetch();
        if($missionInfo['id']){
            
            $mission_title = $missionInfo['Title'];
            $mission_description = $missionInfo['Description'];
            $mission_code = $missionInfo['MissionCode'];
            $mission_dateBeginning = $missionInfo['BeginningDate'];
            $mission_dateEnding = $missionInfo['EndingDate'];
            $mission_speciality = $missionInfo['speciality_id'];
            $mission_nationality = $missionInfo['nationality_id'];
            $mission_admin = $missionInfo['Admin_id'];
            $mission_missionType = $missionInfo['missionType_Id'];
            $mission_missionStatus = $missionInfo['missionStatus_Id'];

            $mission_description = str_replace('<br />', '', $mission_description);
           

        }else{
            $errorMsg = "Vous ne pouvez pas modifier cette mission";
        }

    }else{
        $errorMsg = "Aucune mission n'a été trouvée";
    }

}else{
    $errorMsg = "Aucune mission n'a été trouvée";
}