<?php 
session_start();
    require('securityAdmin.php'); 
    require('actions/contact/publishNewContactAction.php');
    
    
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
                        <label for="exampleInputEmail1" class="form-label">Nom</label>
                        <input type="text" autocomplete="off" class="form-control" name="firstname">
                    </div>
                    
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Prénom</label>
                        <input type="text" autocomplete="off" class="form-control" name="lastname" >
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">code</label>
                        <input type="text" autocomplete="off" class="form-control" name="code" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Age</label>
                        <input type="text" autocomplete="off" class="form-control" name="age" >
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
                
                   
                    

                    <button type="submit" class="btn btn-primary" name="validate">Ajouter le contact</button>

        <br><br>
   </form>
</body>
</html>