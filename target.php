<?php 
require('actions/database.php');

$targetid = $_POST['targetid'];

$target = $bdd->query('SELECT * FROM missiontarget

inner join target on target.id = missiontarget.Target_id
inner join mission on missiontarget.Mission_id = mission.id
inner join nationality on target.nationality_id = nationality.id



where mission.id='.$targetid);

while($targetInfos = $target->fetch()){
    ?>

    <div class="row p-2">
        <div class="col ">
            
            <ul>
                
                
                <li>Cible : <?php echo $targetInfos["Firstname"] ?></li>
                <li>Nationalité : <?php echo $targetInfos["Country"] ?></li>
                <li>Age : <?php echo $targetInfos["Age"] ?></li>
                <li>Nom de code : <?php echo $targetInfos["nameCode"] ?></li>
                
            </ul>
        </div>

        
    </div>  
     

      




<?php
}
?>