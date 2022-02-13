<?php 
session_start();
    require('securityAdmin.php'); 
    require('actions/missions/publishNewMission.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <br><br>
    <form class="container" method="POST">

     <!-- Afficher une erreur -->
        <?php 
            if(isset($errorMsg)){ 
                echo '<p>'.$errorMsg.'</p>'; 
            }elseif(isset($successMsg)){ 
                echo '<p>'.$successMsg.'</p>'; 
            }
        ?>


<!--  Formulaire pour ajouter une mission -->
<div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Titre de la mission</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description de la mission</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Mission code</label>
                <input type="text" class="form-control" name="code" >
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Date de début</label>
                <input type="text" class="form-control" name="begin" >
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Date de fin</label>
                <input type="text" class="form-control" name="ending" >
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Spécialité ID</label>
                
                <select type="text" class="form-control" name="speciality" > 

                    <?php 
                    while($speciality = $speciality_list->fetch()){
                        ?>
                            <option value="<?php echo $speciality['id'] ?>"> <?php echo $speciality['type'] ?> </option>        
                    <?php
                        }
                    ?>
                </select>
                        
            </div>
        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nationalité ID</label>
                        <select type="text" class="form-control" name="nationality" > 

                        <?php 
                            while($nationality = $nationality_list->fetch()){
                                ?>
                            
                                    <option value="<?php echo $nationality['ID']; ?>" > <?php echo $nationality['Country'] ?> </option> 
                        <?php
                            }
                        ?>

                        </select>
        </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Admin </label>
                        <select type="text" class="form-control" name="admin" > 

                        <?php 
                            while($admin = $admin_list->fetch()){
                                ?>
                            
                                    <option value="<?php echo $admin['id']; ?>" > <?php echo $admin['firstname'] ?> </option> 
                                    
                        <?php
                            }
                        ?>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Type de mission</label>
                        <select type="text" class="form-control" name="type" >
                            
                        <?php 
                            while($missionType = $typeMission_list->fetch()){
                                ?>
                            
                                    <option value="<?php echo $missionType['id']; ?>" > <?php echo $missionType['Type'] ?> </option> 
                                    
                        <?php
                            }
                        ?>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Statut</label>
                        <select type="text" class="form-control" name="status" >
                            
                        
                        <?php 
                            while($status = $statusMission_list->fetch()){
                                ?>
                            
                                    <option value="<?php echo $status['id']; ?>" > <?php echo $status['Status'] ?> </option> 
                        <?php
                            }
                        ?>

                        </select>

                    </div>

<div>
                    <button type="submit" class="btn btn-primary" name="validate">Ajouter la mission</button>

        <br><br>
   </form>
</body>
</html>