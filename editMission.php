<?php 
session_start();
require('securityAdmin.php');
require('actions/missions/getInfosOfEditedMission.php');
require('actions/missions/editMissionAction.php');

?>




<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <br><br>
    <div class="container">
        <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
        
        <?php 
            if(isset($_SESSION['auth'])){ 
                ?>
                <form method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Titre de la mission</label>
                        <input type="text" class="form-control" name="title" value="<?= $mission_title; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Description de la mission</label>
                        <textarea class="form-control" name="description"><?= $mission_description; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Mission code</label>
                        <input type="text" class="form-control" name="code" value="<?= $mission_code; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Date de début</label>
                        <input type="text" class="form-control" name="begin" value="<?= $mission_dateBeginning; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Date de fin</label>
                        <input type="text" class="form-control" name="ending" value="<?= $mission_dateEnding ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Spécialité ID</label>
                        <select type="text" class="form-control" name="speciality">
                                    
                                                        
                                <?php while($speciality = $speciality_list->fetch())
                                {
                                echo '<option ';
                                if($mission_speciality==$speciality['id'])
                                {
                                echo 'selected="selected" ';
                                }
                                echo 'value="'.$speciality['id'].'">'.$speciality['type'].'</option>' ;
                                } ?>
                                </select>
                        


                        

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nationalité ID</label>
                        <select type="text" class="form-control" name="nationality">

                        <?php while($nationality = $nationality_list->fetch())
                                {
                                echo '<option ';
                                if($mission_nationality==$nationality['ID'])
                                {
                                echo 'selected="selected" ';
                                }
                                echo 'value="'.$nationality['ID'].'">'.$nationality['Country'].'</option>' ;
                                } ?>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Admin ID</label>
                        <select type="text" class="form-control" name="admin">


                        <?php while($admin = $admin_list->fetch())
                                {
                                echo '<option ';
                                if($mission_admin==$admin['id'])
                                {
                                echo 'selected="selected" ';
                                }
                                echo 'value="'.$admin['id'].'">'.$admin['firstname'].'</option>' ;
                                } ?>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Type de mission ID</label>
                        <select type="text" class="form-control" name="type">

                        <?php while($typeMission = $typeMission_list->fetch())
                                {
                                echo '<option ';
                                if($mission_missionType==$typeMission['id'])
                                {
                                echo 'selected="selected" ';
                                }
                                echo 'value="'.$typeMission['id'].'">'.$typeMission['Type'].'</option>' ;
                                } ?>      

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Statut ID</label>
                        <select type="text" class="form-control" name="status">

                        <?php while($statusMission = $statusMission_list->fetch())
                                {
                                echo '<option ';
                                if($mission_missionStatus==$statusMission['id'])
                                {
                                echo 'selected="selected" ';
                                }
                                echo 'value="'.$statusMission['id'].'">'.$statusMission['Status'].'</option>' ;
                                } ?> 

                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" name="valid">Modifier la mission</button>
                    <br><br>
                </form>
                
                <?php
            }
        ?>
        


        
                        
    </div>
    

</body>
</html>


                       