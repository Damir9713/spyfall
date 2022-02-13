<?php

require('actions/database.php');

//Récupérer les questions par défaut sans recherche
$getAllAgentAdmin = $bdd->query('SELECT * FROM agent

inner join nationality on agent.nationality_id = nationality.ID
inner join speciality on agent.speciality_id = speciality.id

 ORDER BY agent.agent_id DESC ');

//Vérifier si une recherche a été rentrée par l'utlisateur
if(isset($_GET['search']) AND !empty($_GET['search'])){

    //La recherche
    $usersSearch = $_GET['search'];

    //Récupérer toutes les questions qui correspondent à la recherche (en fonction du titre)
    $getAllAgentAdmin = $bdd->query('SELECT * FROM agent
    
inner join nationality on agent.nationality_id = nationality.ID
inner join speciality on agent.speciality_id = speciality.id
    
     WHERE Firstname LIKE "%'.$usersSearch.'%" ORDER BY agent.agent_id DESC');

}