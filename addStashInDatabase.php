<?php 
session_start();
    require('securityAdmin.php'); 
    require('actions/stash/publishNewStashAction.php');
    
    
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
                        <label for="exampleInputEmail1" class="form-label">Adress</label>
                        <input type="text" autocomplete="off" class="form-control" name="adress">
                    </div>
                    
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"> code</label>
                        <input type="text" autocomplete="off" class="form-control" name="code" >
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">type</label>
                        <input type="text" autocomplete="off" class="form-control" name="type" >
                    </div>
                 
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nationalité</label>
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
                        <label for="exampleInputEmail1" class="form-label">mission</label>
                        <select type="text" class="form-control" name="mission" >
                            
                        <?php 
                            while($mission = $mission_list->fetch()){
                                ?>
                            
                                    <option value="<?php echo $mission['id']; ?>" > <?php echo $mission['Title'] ?> </option> 
                                    
                        <?php
                            }
                        ?>

                        </select>
                    </div>
                    

                    <button type="submit" class="btn btn-primary" name="validate">Ajouter la planque</button>

        <br><br>
   </form>
</body>
</html>