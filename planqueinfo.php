<?php
require('actions/database.php');

$planqueid = $_POST['planqueid'];



$missionInfo = $bdd->query('SELECT * from mission 

inner join stash on mission.id = stash.mission_id
inner join nationality on stash.nationality_id = nationality.ID

 where mission.id='.$planqueid);


  



while( $stash = $missionInfo->fetch() ){
    ?>
  
  
  <div class="row">
  <div class="col">
  
  <ul>
    <li>Adresse : <?php echo $stash["Adress"]?></li>
    <li>Code : <?php echo $stash["stashCode"]?></li>
    <li>Type : <?php echo $stash["Type"]?></li>
    <li >Nationalité : <?php echo $stash["Country"] ?></li>
  
  </ul>
 
  </div>
  
  
  
  </div>
  
  
  <br><br>
  
  
    
     
      
    <?php } ?>


