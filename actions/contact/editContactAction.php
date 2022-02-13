
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
      ){

        //Les données à faire passer dans la requête
        $new_contact_firstname = htmlspecialchars($_POST['firstname']);
        $new_contact_lastname = nl2br(htmlspecialchars($_POST['lastname']));
        $new_contact_code = htmlspecialchars($_POST['code']);
        $new_contact_nationality = htmlspecialchars($_POST['nationality']);
        $new_contact_age = htmlspecialchars($_POST['age']);
       
        //Modifier les informations de la cible qui possède l'id rentré en paramètre dans l'URL
        $editContactOnWebsite = $bdd->prepare('UPDATE contact 
        SET Firstname = ?, 
        lastname = ?, 
        nameCode = ?, 
        Age = ?, 
        nationality_id = ?  
        WHERE id = ?');

        $editContactOnWebsite->execute(array(
        $new_contact_firstname, 
        $new_contact_lastname, 
        $new_contact_code, 
        $new_contact_age, 
        $new_contact_nationality,  
        $idOfContact));

        //Redirection vers la page d'affichage des questions de l'utilisateur
        header('Location: allContactAdmin.php');
        
    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
        
    }

}