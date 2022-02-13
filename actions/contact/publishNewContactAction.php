<?php

require('actions/database.php');


$nationality_list = $bdd->query('SELECT * from nationality
');




//Valider le formulaire
if(isset($_POST['validate'])){

    //Vérifier si les champs ne sont pas vides
    if(!empty($_POST['firstname']) 
    AND !empty($_POST['lastname']) 
    AND !empty($_POST['code'])  
    AND !empty($_POST['age']) 
    AND !empty($_POST['nationality']) 
    )
    {
        
        //Les données de la question
        //Les données à faire passer dans la requête
        $new_contact_firstname = htmlspecialchars($_POST['firstname']);
        $new_contact_lastname = nl2br(htmlspecialchars($_POST['lastname']));
        $new_contact_code = htmlspecialchars($_POST['code']);
        $new_contact_age = htmlspecialchars($_POST['age']);
        $new_contact_nationality = htmlspecialchars($_POST['nationality']);
        

        //Insérer la question sur la question
        $insertContactOnWebsite = $bdd->prepare('INSERT INTO Contact(Firstname, 
        lastname, 
        nameCode, 
        Age, 
        nationality_id) VALUES(?, ?, ?, ?, ?)');
        $insertContactOnWebsite->execute(
            array(
        
            $new_contact_firstname,
             $new_contact_lastname,
             $new_contact_code,
             $new_contact_age,
             $new_contact_nationality
             
            
            )
        );
        
        $successMsg = "Votre contact a bien été ajoutée ";
        
        


        header('Location: allContactAdmin.php');
    
    

        
        }else{
        $errorMsg = "Veuillez remplir tout les champs";
    }

    


}