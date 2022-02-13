<?php 
session_start();
require('securityAdmin.php');
require('actions/stash/getInfoOfEditedStash.php');
require('actions/stash/editStashAction.php');

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
                        <label for="exampleInputEmail1" class="form-label">Adresse de la planque</label>
                        <input type="text" class="form-control" autocomplete="off" name="adress" value="<?= $stash_adress ; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Code</label>
                        <input class="form-control" autocomplete="off" name="code" value="<?= $stash_code; ?>">
                    </div>
                    
                   
                    
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Mission</label>
                        <select type="text"  class="form-control" name="mission">
                                    
                                                        
                                <?php while($mission = $mission_list->fetch())
                                {
                                echo '<option ';
                                if($stash_mission==$mission['id'])
                                {
                                echo 'selected="selected" ';
                                }
                                echo 'value="'.$mission['id'].'">'.$mission['Title'].'</option>' ;
                                } ?>
                                </select>
                        


                        

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Type</label>
                        <input class="form-control" name="type" value="<?= $stash_Type; ?>">
                            </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nationalité</label>
                        <select type="text" class="form-control" name="nationality">


                        <?php while($nationality = $nationality_list->fetch())
                                {
                                echo '<option ';
                                if($stash_nationality==$nationality['ID'])
                                {
                                echo 'selected="selected" ';
                                }
                                echo 'value="'.$nationality['ID'].'">'.$nationality['Country'].'</option>' ;
                                } ?>

                        </select>
                    </div>
                  

                    <button type="submit" class="btn btn-primary" name="validate">Modifier la planque</button>
                    <br><br>
                </form>
                
                <?php
            }
        ?>
        


        
                        
    </div>
    

</body>
</html>