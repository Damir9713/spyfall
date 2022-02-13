<?php

require('actions/database.php');


$mission_list = $bdd->query('SELECT * from mission

ORDER BY id ASC
');

$target_list = $bdd->query('SELECT * from target

ORDER BY id ASC
');





//Valider le formulaire
if(isset($_POST['validate'])){

    //Vérifier si les champs ne sont pas vides
    if(!empty($_POST['target']) 
    AND !empty($_POST['missions']) 
    )
    {
        
        //Les données de la question
        //Les données à faire passer dans la requête
        $addInMission_target = htmlspecialchars($_POST['target']);
        $addInMission_mission = nl2br(htmlspecialchars($_POST['missions']));
       
        

        //Insérer la question sur la question
        $insertTargetOnWebsite = $bdd->prepare('INSERT INTO missiontarget(Target_id,  Mission_id) VALUES(?, ?)');
        $insertTargetOnWebsite->execute(
            array(
        
            $addInMission_target,
             $addInMission_mission
            
            
            )
        );
        
        $successMsg = "Votre mission a bien été ajoutée ";
        
        


        header('Location: allTargetAdmin.php');
    
    

        
        }else{
        $errorMsg = "Veuillez remplir tout les champs";
    }

    


}