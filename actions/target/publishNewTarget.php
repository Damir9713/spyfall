<?php

require('actions/database.php');


$nationality_list = $bdd->query('SELECT DISTINCT Country , nationality.id FROM target

inner join nationality on target.nationality_id = nationality.id
WHERE  nationality_id NOT IN (SELECT nationality_id FROM agent)
');




//Valider le formulaire
if(isset($_POST['validate'])){

    //Vérifier si les champs ne sont pas vides
    if(!empty($_POST['firstname']) 
    AND !empty($_POST['lastname']) 
    AND !empty($_POST['code'])  
    AND !empty($_POST['age']) 
    )
    {
        
        //Les données de la question
        //Les données à faire passer dans la requête
        $new_target_firstname = htmlspecialchars($_POST['firstname']);
        $new_target_lastname = nl2br(htmlspecialchars($_POST['lastname']));
        $new_target_code = htmlspecialchars($_POST['code']);
        $new_target_age = htmlspecialchars($_POST['age']);
        $new_target_nationality = htmlspecialchars($_POST['nationality']);
        

        //Insérer la question sur la question
        $insertTargetOnWebsite = $bdd->prepare('INSERT INTO target(Firstname, 
        lastname, 
        nameCode, 
        Age, 
        nationality_id) VALUES(?, ?, ?, ?, ?)');
        $insertTargetOnWebsite->execute(
            array(
        
            $new_target_firstname,
             $new_target_lastname,
             $new_target_code,
             $new_target_age,
             $new_target_nationality
             
            
            )
        );
        
        $successMsg = "Votre mission a bien été ajoutée ";
        
        


        header('Location: allTargetAdmin.php');
    
    

        
        }else{
        $errorMsg = "Veuillez remplir tout les champs";
    }

    


}