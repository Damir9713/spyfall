<?php
session_start();
require('actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){

    //Vérifier si l'user a bien complété tous les champs
    if( !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['email'])  AND !empty($_POST['password'])){
        
        //Les données de l'user
        
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_email = htmlspecialchars($_POST['email']);
        $user_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $dateCreation = date('Y/m/d');
        

        //Vérifier si l'utilisateur existe déjà sur le site
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT firstname FROM admin WHERE firstname = ?');
        $checkIfUserAlreadyExists->execute(array($user_firstname));

        if($checkIfUserAlreadyExists->rowCount() == 0){
            
            //Insérer l'utilisateur dans la bdd
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO admin(firstname, lastname, Email, CreationDate , password)VALUES(?, ?, ?, ?, ?)');
            $insertUserOnWebsite->execute(array( $user_firstname, $user_lastname, $user_email, $dateCreation, $user_password));

            //Récupérer les informations de l'utilisateur
            $getInfosOfThisUserReq = $bdd->prepare('SELECT id , firstname, lastname FROM admin WHERE firstname = ? AND lastname = ? ');
            $getInfosOfThisUserReq->execute(array($user_firstname, $user_lastname));

            $usersInfos = $getInfosOfThisUserReq->fetch();

            //Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales sessions
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['lastname'] = $usersInfos['lastname'];
            $_SESSION['firstname'] = $usersInfos['firstname'];
            $_SESSION['pseudo'] = $usersInfos['pseudo'];
            
            //Rediriger l'utilisateur vers la page d'accueil
            header('Location: index.php');

        }else{
            $errorMsg = "L'utilisateur existe déjà sur le site";
        }

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}