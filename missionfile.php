<?php
require('actions/database.php');

$missionid = $_POST['missionid'];


$stash = '';
$missionInfo = $bdd->query('SELECT * from mission 



inner join speciality on mission.speciality_id  = speciality.id  
inner join nationality on mission.nationality_id  =  nationality.id
inner join missiontype on mission.missionType_Id = missiontype.id
inner join missionstatus on mission.missionStatus_Id = missionstatus.id










 where mission.id='.$missionid);


  

while( $spec = $missionInfo->fetch() ){
  ?>


<div class="row ">
<div class="col">

<p>Date de début de mission : <?php echo $spec["BeginningDate"]?></p>
<p>Date de fin de mission : <?php echo $spec["EndingDate"]?></p>
<p>Spécialité  requise : <?php echo $spec["type"]?></p>

</div>
<div class="col">
   
    <p >Nationalité : <?php echo $spec["Country"] ?></p>
   <p >Type : <?php echo $spec["Type"] ?></p>
   <p >Statut : <?php echo $spec["Status"] ?></p> 
   <ul> 



     





    <!-- <li class="card-title">Planque : <?php echo $spec["Adress"] ?></li>  -->
  
   </ul>
  
       
   
    </div>


</div>





  
   
    
  <?php } ?>
