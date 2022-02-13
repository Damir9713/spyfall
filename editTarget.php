<?php 
session_start();
require('securityAdmin.php');
require('actions/target/getInfoOfEditedTarget.php');
require('actions/target/editTargetAction.php');

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
                        <label for="exampleInputEmail1" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="firstname" value="<?= $target_firstname; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Prénom</label>
                        <input class="form-control" name="lastname" value="<?= $target_lastname ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">code</label>
                        <input type="text" class="form-control" name="code" value="<?= $target_code; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Age</label>
                        <input type="text" class="form-control" name="age" value="<?= $target_age; ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nationalité</label>
                        <select type="text" class="form-control" name="nationality">

                        <?php while($nationality = $nationality_list->fetch())
                                {
                                echo '<option ';
                                if($target_nationality==$nationality['ID'])
                                {
                                echo 'selected="selected" ';
                                }
                                echo 'value="'.$nationality['ID'].'">'.$nationality['Country'].'</option>' ;
                                } ?>

                        </select>
                    </div>
                    

                    <button type="submit" class="btn btn-primary" name="valid">Modifier la cible</button>
                    <br><br>
                </form>
                
                <?php
            }
        ?>
        


        
                        
    </div>
    

</body>
</html>

