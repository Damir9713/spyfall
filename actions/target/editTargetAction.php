
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
        $new_target_firstname = htmlspecialchars($_POST['firstname']);
        $new_target_lastname = nl2br(htmlspecialchars($_POST['lastname']));
        $new_target_code = htmlspecialchars($_POST['code']);
        $new_target_nationality = htmlspecialchars($_POST['nationality']);
        $new_target_age = htmlspecialchars($_POST['age']);
       
        //Modifier les informations de la cible qui possède l'id rentré en paramètre dans l'URL
        $editTargetOnWebsite = $bdd->prepare('UPDATE target 
        SET Firstname = ?, 
        lastname = ?, 
        nameCode = ?, 
        Age = ?, 
        nationality_id = ?  
        WHERE id = ?');

        $editTargetOnWebsite->execute(array(
        $new_target_firstname, 
        $new_target_lastname, 
        $new_target_code, 
        $new_target_age, 
        $new_target_nationality,  
        $idOfTarget));

        //Redirection vers la page d'affichage des questions de l'utilisateur
        header('Location: allTargetAdmin.php');
        
    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
        
    }

}