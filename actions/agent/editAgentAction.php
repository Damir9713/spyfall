
    <?php

// se connecter à la bdd
require('actions/database.php');

//Validation du formulaire
if(isset($_POST['valid'])){

    //Vérifier si les champs sont remplis
    if(!empty($_POST['firstname']) 
    AND !empty($_POST['lastname']) 
    AND !empty($_POST['code'])  
    AND !empty($_POST['nationality']) 
    AND !empty($_POST['age']) 
    AND !empty($_POST['speciality']) 
      ){

        //Les données à faire passer dans la requête
        $new_agent_firstname = htmlspecialchars($_POST['firstname']);
        $new_agent_lastname = nl2br(htmlspecialchars($_POST['lastname']));
        $new_agent_code = htmlspecialchars($_POST['code']);
        $new_agent_nationality = htmlspecialchars($_POST['nationality']);
        $new_agent_speciality = htmlspecialchars($_POST['speciality']);
        $new_agent_age = htmlspecialchars($_POST['age']);
       
        //Modifier les informations de la cible qui possède l'id rentré en paramètre dans l'URL
        $editContactOnWebsite = $bdd->prepare('UPDATE agent 
        SET Firstname = ?, 
        lastname = ?, 
        CodeID = ?, 
        Age = ?, 
        speciality_id = ?,
        nationality_id = ?  
        WHERE agent_id = ?');

        $editContactOnWebsite->execute(array(
        $new_agent_firstname, 
        $new_agent_lastname, 
        $new_agent_code, 
        $new_agent_age, 
        $new_agent_speciality, 
        $new_agent_nationality,  
        $idOfAgent));

        //Redirection vers la page d'affichage des questions de l'utilisateur
        header('Location: allAgentsAdmin.php');
        
    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
        
    }

}