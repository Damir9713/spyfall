<?php 
session_start();
require('securityAdmin.php');
require('actions/agent/showAllAgentAdmin.php');
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
                    <input type="search" placeholder="Entrez le nom d'un agent" name="search" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn btn-success "  type="submit"> Rechercher</button>
                </div>

            </div>
        </form>

</div>

<div class="col">
    
<a class="btn btn-success" href="addAgentInDatabase.php">Créer un agent</a>
</div>

    </div>
        

        <br>

       
       
        <?php 
            while($agent = $getAllAgentAdmin->fetch()){
                ?>
                 <div class="container">

<div class="card">
 <h5 class="card-header">Nom : <?php echo $agent["Firstname"] ?></h5>
 <div class="card-body">
   <h5 class="card-title"> Code : <?php echo $agent["CodeID"] ?></h5>
   <h5 class="card-title"> Age : <?php echo $agent["Age"] ?></h5>
   <h5 class="card-title"> spécialité : <?php echo $agent["type"] ?></h5>
   <h5 class="card-title"> nationalité : <?php echo $agent["Country"] ?></h5>
   
   
   <br><br>
  

   <a href="editAgent.php?agent_id=<?= $agent['agent_id']; ?>" class="btn btn-warning">Modifier agent</a>
    <a href="actions/agent/deleteAgentAction.php?agent_id=<?= $agent['agent_id']; ?>" class="btn btn-danger">Supprimer agent</a>
   


   </div>


</div>

</div>

<br><br> 

                <?php
            }
        ?>
    
    

</body>
</html>

