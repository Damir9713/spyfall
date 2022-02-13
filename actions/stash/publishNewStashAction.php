<?php

require('actions/database.php');

// récupérer infos pour liste déroulante
$nationality_list = $bdd->query('SELECT * from nationality order by id');
$mission_list = $bdd->query('SELECT * from mission order by id');



//Valider le formulaire
if(isset($_POST['validate'])){

    //Vérifier si les champs ne sont pas vides
    if(!empty($_POST['adress']) 
    AND !empty($_POST['code']) 
    AND !empty($_POST['type'])  
    AND !empty($_POST['nationality']) 
    AND !empty($_POST['mission']) 
  )
    {
        
        //Les données de la planque
        //Les données à faire passer dans la requête
        $new_stash_adress = htmlspecialchars($_POST['adress']);
        $new_stash_code = nl2br(htmlspecialchars($_POST['code']));
        $new_stash_type = htmlspecialchars($_POST['type']);
        $new_stash_nationality = htmlspecialchars($_POST['nationality']);
        $new_stash_mission = htmlspecialchars($_POST['mission']);
       
        //Insérer la question sur la planque
        $insertStashOnDatabase = $bdd->prepare('INSERT INTO stash(stashCode, Adress, Type, nationality_id, mission_id) VALUES(?, ?, ?, ?, ?)');
        $insertStashOnDatabase->execute(
            array(
             $new_stash_code,
             $new_stash_adress,
             $new_stash_type,
             $new_stash_nationality,
             $new_stash_mission
            
            
            )
        );
        
        $successMsg = "Votre planque a bien été ajoutée ";
        
        


    
    
    

        
        }else{
        $errorMsg = "Veuillez remplir tout les champs";
    }

    


}