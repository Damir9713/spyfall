<?php

require('actions/database.php');

//Récupérer les questions par défaut sans recherche
$getAllMissionAdmin = $bdd->query('SELECT * FROM mission



 ORDER BY id DESC LIMIT 0,20');

//Vérifier si une recherche a été rentrée par l'utlisateur
if(isset($_GET['search']) AND !empty($_GET['search'])){

    //La recherche
    $usersSearch = $_GET['search'];

    //Récupérer toutes les questions qui correspondent à la recherche (en fonction du titre)
    $getAllMissionAdmin = $bdd->query('SELECT * FROM mission WHERE title LIKE "%'.$usersSearch.'%" ORDER BY id DESC');

}