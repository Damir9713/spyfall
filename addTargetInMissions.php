<?php 
session_start();
    require('securityAdmin.php'); 
    require('actions/target/addTargetInMissionAction.php');
    
    
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <br><br>
    <form class="container" method="POST">

        <?php 
            if(isset($errorMsg)){ 
                echo '<p>'.$errorMsg.'</p>'; 
            }elseif(isset($successMsg)){ 
                echo '<p>'.$successMsg.'</p>'; 
            }
        ?>

<div class="mb-3">
                        
                 
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Cible</label>
                        <select type="text" class="form-control" name="target" > 

                        <?php 
                            while($target = $target_list->fetch()){
                                ?>
                            
                                    <option value="<?php echo $target['id']; ?>" > <?php echo $target['Firstname'] ?> </option> 
                                   
                        <?php
                            }
                        ?>

                        </select>
                        </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">missions</label>
                        <select type="text" class="form-control" name="missions" > 

                        <?php 
                            while($missions = $mission_list->fetch()){
                                ?>
                            
                                    <option value="<?php echo $missions['id']; ?>" > <?php echo $missions['Title'] ?> </option> 
                                   
                        <?php
                            }
                        ?>

                        </select>
                    </div>
                
                    
                    

                    <button type="submit" class="btn btn-primary" name="validate">Ajouter la cible sur cet mission</button>

        <br><br>
   </form>
</body>
</html>