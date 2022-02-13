<?php 
session_start();
require('securityAdmin.php');
require('actions/missions/showAllMissionAction.php');
require('actions/updateAgentsAction.php');
?>




<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>
<div class="container">
    
        <div class="row">

            <div class="col">

                <form method="GET">

                        <div class="form-group row">

                            <div class="col-8">
                                <input type="search" name="search" placeholder="Entrez le nom d'une mission" class="form-control">
                            </div>
                            <div class="col-4">
                                <button class="btn btn-success" type="submit">Rechercher</button>
                            </div>

                        </div>
                    </form>

            </div>

            <div class="col">
                
            <a class="btn btn-success" href="addMissionInDatabase.php">Créer une mission</a>



           


            <br><br>
         </div>

        <div class="col">

                    <form method="POST">

            <div class="form-group row">

            
                <div class="">
                    <input class="btn btn-success" value="Mettre à jour les agents et contact" name="updateAgent" type="submit">
                    <?php if(isset($sucessMsg)){ echo '<p>'.$sucessMsg.'</p>'; } ?>
                </div>

            </div>
            </form>

        </div>

</div>    

        
<?php 
    while($missionDetails = $getAllMissionAdmin->fetch()){
        
        ?>
        
        <div class="card">
<h5 class="card-header">Nom de la mission : <?php echo $missionDetails["Title"] ?></h5>
<div class="card-body">
<h5 class="card-title">Mission Code : <?php echo $missionDetails["MissionCode"] ?></h5>
<p class="card-text"><?php echo $missionDetails["Description"] ?></p>
<a href="editMission.php?id=<?= $missionDetails['id']; ?>" class="btn btn-warning">Modifier la mission</a>
<a href="actions/missions/deleteMissionAction.php?id=<?= $missionDetails['id']; ?>" class="btn btn-danger">Supprimer la mission</a>
    </div>
    </div>
    <br><br>
        <?php
    }
?>

</div>
        


    
    

</body>
</html>

