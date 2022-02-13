<?php

require('actions/database.php');


// récupérer infos des planques
$getAllStash = $bdd->query('SELECT * FROM stash

inner join mission on stash.mission_id = mission.id
inner join nationality on stash.nationality_id = nationality.ID



 ORDER BY mission.id ASC
 ');


if(isset($_GET['search']) AND !empty($_GET['search'])){

    //La recherche
    $usersSearch = $_GET['search'];

    //Récupérer toutes les planques qui correspondent à la recherche (en fonction du titre)
    $getAllStash = $bdd->query('SELECT * FROM stash 
    
    inner join mission on stash.mission_id = mission.id
    inner join nationality on stash.nationality_id = nationality.ID

     WHERE Title
     
     LIKE "%'.$usersSearch.'%" 
     
     ORDER BY stash_id DESC');

}

 ?>


