<?php

require('actions/database.php');

if(isset($_POST['updateAgent'])){

    $clearAgent = $bdd->exec('truncate table missionagent');

    $updateAgent = $bdd->exec('INSERT into missionagent (Agent_id, speciality_id, Mission_id)
    select distinct agent.agent_id , agent.speciality_id, mission.id
    From agent
    Inner join mission on agent.speciality_id = mission.speciality_id
    where not exists(select 1 from missionagent
        where Agent_id = agent.agent_id
        and missionagent.speciality_id = agent.speciality_id
        and Mission_id = mission.id
         )');
    
    $updateContact = $bdd->exec('INSERT into missioncontact (Contact_id, Mission_id)
    select  contact.id ,  mission.id
    From contact
             Inner join mission on contact.nationality_id = mission.nationality_id
    where not exists(select 1 from missioncontact
                     where Contact_id = contact.id
                       and contact.nationality_id = mission.nationality_id
                       and Mission_id = mission.id
        );
    ');
    

$sucessMsg = "Mise à jour effectué avec succés";
}