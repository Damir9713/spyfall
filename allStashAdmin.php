<?php 
session_start();
require('securityAdmin.php');
// require('actions/missions/showAllMissionAction.php');
require('actions/stash/getStashAction.php');
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
                    <input type="search" placeholder="Entrez le nom d'une mission" name="search" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn btn-success "  type="submit"> Rechercher</button>
                </div>

            </div>
        </form>

</div>

<div class="col">
    
<a class="btn btn-success" href="addStashInDatabase.php">Créer une planque</a>
</div>

    </div>
        

        <br>

        <?php 
            while($stashAdmin = $getAllStash->fetch()){
                ?>
                 <div class="container">

<div class="card">
 <h5 class="card-header">Adresse de la planque : <?php echo $stashAdmin["Adress"] ?></h5>
 <div class="card-body">
   <h5 class="card-title"> Code : <?php echo $stashAdmin["stashCode"] ?></h5>
   <h5 class="card-title"> Mission : <?php echo $stashAdmin["Title"] ?></h5>
   <p class="card-text">Type : <?php echo $stashAdmin["Type"] ?></p>
   <p class="card-text">Nationalité : <?php echo $stashAdmin["Country"] ?></p>

   <a href="editStash.php?stash_id=<?= $stashAdmin['stash_id']; ?>" class="btn btn-warning">Modifier la planque</a>
    <a href="actions/stash/deleteStashAction.php?stash_id=<?= $stashAdmin['stash_id']; ?>" class="btn btn-danger">Supprimer la planque</a>
   


   <br><br>
   </div>


</div>

</div>

<br><br> 

                <?php
            }
        ?>

    
    

</body>
</html>