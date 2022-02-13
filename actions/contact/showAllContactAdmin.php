<?php

// se connecter à la bdd
require('actions/database.php');

//Récupérer les questions par défaut sans recherche
$getAllContactAdmin = $bdd->query('SELECT * FROM contact

INNER join nationality on contact.nationality_id = nationality.ID

 ORDER BY contact.id DESC');

//Vérifier si une recherche a été rentrée par l'utlisateur
if(isset($_GET['search']) AND !empty($_GET['search'])){

    //La recherche
    $usersSearch = $_GET['search'];

    //Récupérer toutes les questions qui correspondent à la recherche (en fonction du titre)
    $getAllContactAdmin = $bdd->query('SELECT * FROM contact
    
    inner join nationality on contact.nationality_id = nationality.id
    
     WHERE Firstname LIKE "%'.$usersSearch.'%" ORDER BY contact.id DESC');

}