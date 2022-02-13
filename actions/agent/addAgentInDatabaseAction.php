<?php

require('actions/database.php');


$nationality_list = $bdd->query('SELECT DISTINCT Country, ID FROM agent

inner join nationality on agent.nationality_id = nationality.id
WHERE  nationality_id NOT IN (SELECT nationality_id FROM target)
');

$speciality_list = $bdd->query('SELECT * from speciality
');




//Valider le formulaire
if(isset($_POST['validate'])){

    //Vérifier si les champs ne sont pas vides
    if(!empty($_POST['firstname']) 
    AND !empty($_POST['lastname']) 
    AND !empty($_POST['code'])  
    AND !empty($_POST['age']) 
    AND !empty($_POST['speciality']) 
    AND !empty($_POST['nationality']) 
    )
    {
        
        //Les données de la question
        //Les données à faire passer dans la requête
        $new_agent_firstname = htmlspecialchars($_POST['firstname']);
        $new_agent_lastname = nl2br(htmlspecialchars($_POST['lastname']));
        $new_agent_code = htmlspecialchars($_POST['code']);
        $new_agent_age = htmlspecialchars($_POST['age']);
        $new_agent_speciality = htmlspecialchars($_POST['speciality']);
        $new_agent_nationality = htmlspecialchars($_POST['nationality']);
        

        //Insérer la question sur la question
        $insertAgentOnWebsite = $bdd->prepare('INSERT INTO agent(Firstname, 
        lastname, 
        CodeID, 
        Age, 
        nationality_id,
        speciality_id) VALUES(?, ?, ?, ?, ?,?)');
        $insertAgentOnWebsite->execute(
            array(
        
            $new_agent_firstname,
             $new_agent_lastname,
             $new_agent_code,
             $new_agent_age,
             $new_agent_nationality,
             $new_agent_speciality
            )
        );
        
        $successMsg = "Votre agent a bien été ajoutée ";
        
        


        header('Location: allAgentsAdmin.php');
    
    

        
        }else{
        $errorMsg = "Veuillez remplir tout les champs";
    }

    


}