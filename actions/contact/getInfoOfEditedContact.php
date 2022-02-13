<?php

require('actions/database.php');

// récupérer info pour liste déroulante
$nationality_list = $bdd->query('SELECT * from nationality order by id');



//Vérifier si l'id de la cible est bien passé en paramètre dans l'URL
if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfContact = $_GET['id'];

    //Vérifier si la cible existe
    $getContactInfo = $bdd->prepare('SELECT DISTINCT * FROM contact 
    
    
    
    WHERE id = ?');
    $getContactInfo->execute(array($idOfContact));

    if($getContactInfo->rowCount() > 0){

        //Récupérer les données de la cible
        $ContactInfo = $getContactInfo->fetch();
        if($ContactInfo['id']){
            
            $contact_firstname = $ContactInfo['Firstname'];
            $contact_lastname = $ContactInfo['lastname'];
            $contact_code = $ContactInfo['nameCode'];
            $contact_age = $ContactInfo['Age'];
            $contact_nationality = $ContactInfo['nationality_id'];
          

            
           

        }else{
            $errorMsg = "Vous ne pouvez pas modifier ce contact";
        }

    }else{
        $errorMsg = "Aucun contact n'a été trouvée";
    }

}else{
    $errorMsg = "Aucune contact n'a été trouvée";

}