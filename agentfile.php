<?php
require('actions/database.php');
$userid = $_POST['userid'];

$agentInfo = $bdd->query('SELECT * FROM missionagent

inner join mission on missionagent.Mission_id = mission.id
inner join agent on missionagent.Agent_id = agent.agent_id
inner join speciality on missionagent.speciality_id = speciality.id
inner join nationality on agent.nationality_id = nationality.id






where mission.id='.$userid);

while ($agent = $agentInfo->fetch()){
    ?>

    <div class="row">
        <div class="col">
            <ul>
                <li>Agent : <?php echo $agent["Firstname"] ?></li>
                <li>Age : <?php echo $agent["Age"] ?></li>
                <li>Nom de code : <?php echo $agent["CodeID"] ?></li>
                <li>Spécialité : <?php echo $agent["type"] ?></li>
                <li>nationalité : <?php echo $agent["Country"] ?></li>
                <hr>
            </ul>

            
        </div>
        
    </div>


<?php
} ?>