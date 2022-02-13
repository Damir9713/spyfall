<?php 
session_start();
require('securityAdmin.php');
require('actions/target/showAllTargetAdmin.php');
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
                    <input type="search" placeholder="Entrez le nom d'une cible" name="search" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn btn-success "  type="submit"> Rechercher</button>
                </div>

            </div>
        </form>

</div>

<div class="col">
    
<a class="btn btn-success" href="addTargetInDatabase.php">Créer une cible</a>
<a class="btn btn-success" href="addTargetInMissions.php">Ajouter une cible sur une mission</a>
</div>

    </div>
        

        <br>

        <?php 
            while($target = $getAllTargetAdmin->fetch()){
                ?>
                 <div class="container">

<div class="card">
 <h5 class="card-header">Nom : <?php echo $target["Firstname"] ?></h5>
 <div class="card-body">
   <h5 class="card-title"> Code : <?php echo $target["nameCode"] ?></h5>
   <h5 class="card-title"> Age : <?php echo $target["Age"] ?></h5>
   <p class="card-text">Nationalité : <?php echo $target["Country"] ?></p>
   

    <a href="editTarget.php?id=<?= $target['id']; ?>" class="btn btn-warning">Modifier la cible</a>
    <a href="actions/target/deleteTargetAction.php?id=<?= $target['id']; ?>" class="btn btn-danger">Supprimer la cible</a>
    


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