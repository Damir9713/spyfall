<?php

// se connecter à la bdd
require('actions/database.php');

//Récupérer les questions par défaut sans recherche
$getAllTargetAdmin = $bdd->query('SELECT * FROM target

left join nationality on target.nationality_id = nationality.id

 ORDER BY target.id DESC');

//Vérifier si une recherche a été rentrée par l'utlisateur
if(isset($_GET['search']) AND !empty($_GET['search'])){

    //La recherche
    $usersSearch = $_GET['search'];

    //Récupérer toutes les questions qui correspondent à la recherche (en fonction du titre)
    $getAllTargetAdmin = $bdd->query('SELECT * FROM target
    
    inner join nationality on target.nationality_id = nationality.id
    
     WHERE Firstname LIKE "%'.$usersSearch.'%" ORDER BY target.id DESC');

}