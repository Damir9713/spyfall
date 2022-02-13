<?php 
session_start();
require('securityAdmin.php');
require('actions/agent/getInfoOfEditedAgent.php');
require('actions/agent/editAgentAction.php');

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
                        <input type="text" class="form-control" name="firstname" value="<?= $agent_firstname; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Prénom</label>
                        <input class="form-control" name="lastname" value="<?= $agent_lastname ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">code</label>
                        <input type="text" class="form-control" name="code" value="<?= $agent_code; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Age</label>
                        <input type="text" class="form-control" name="age" value="<?= $agent_age; ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Spécialité</label>
                        <select type="text" class="form-control" name="speciality">

                        <?php while($speciality = $speciality_list->fetch())
                                {
                                echo '<option ';
                                if($agent_speciality==$speciality['id'])
                                {
                                echo 'selected="selected" ';
                                }
                                echo 'value="'.$speciality['id'].'">'.$speciality['type'].'</option>' ;
                                } ?>

                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nationalité</label>
                        <select type="text" class="form-control" name="nationality">

                        <?php while($nationality = $nationality_list->fetch())
                                {
                                echo '<option ';
                                if($agent_nationality==$nationality['ID'])
                                {
                                echo 'selected="selected" ';
                                }
                                echo 'value="'.$nationality['ID'].'">'.$nationality['Country'].'</option>' ;
                                } ?>

                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" name="valid">Modifier le contact</button>
                    <br><br>
                </form>
                
                <?php
            }
        ?>
        


        
                        
    </div>
    

</body>
</html>

