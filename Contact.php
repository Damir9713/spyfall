
<?php 
require('actions/database.php');

$contactid = $_POST['contactid'];

$contactTarget = $bdd->query('SELECT * FROM missioncontact

inner join contact on contact.id = missioncontact.Contact_id
inner join mission on missioncontact.Mission_id = mission.id
inner join nationality on contact.nationality_id = nationality.id



where mission.id='.$contactid);

while($contactAndTarget = $contactTarget->fetch()){
    ?>

    <div class="row p-2">
        <div class="col ">
            
            <ul>
                
                <br>
                <li>Contact : <?php echo $contactAndTarget["lastname"] ?></li>
                <li>Nationalité : <?php echo $contactAndTarget["Country"] ?></li>
                <li>Age : <?php echo $contactAndTarget["Age"] ?></li>
                <li>Nom de code : <?php echo $contactAndTarget["nameCode"] ?></li>
                
            </ul>
        </div>

        
    </div>  
     

      




<?php
}
?>


