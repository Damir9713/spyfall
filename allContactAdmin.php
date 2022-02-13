<?php 
session_start();
require('securityAdmin.php');
require('actions/contact/showAllContactAdmin.php');
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
    
<a class="btn btn-success" href="addContactInDatabase.php">Créer un contact</a>
</div>

    </div>
        

        <br>

        <?php 
            while($contact = $getAllContactAdmin->fetch()){
                ?>
                 <div class="container">

<div class="card">
 <h5 class="card-header">Nom : <?php echo $contact["Firstname"] ?></h5>
 <div class="card-body">
   <h5 class="card-title"> Code : <?php echo $contact["nameCode"] ?></h5>
   <h5 class="card-title"> Age : <?php echo $contact["Age"] ?></h5>
   <h5 class="card-title"> nationalité : <?php echo $contact["Country"] ?></h5>
   
   
   <br><br>
  

   <a href="editContact.php?id=<?= $contact['id']; ?>" class="btn btn-warning">Modifier le contact</a>
    <a href="actions/contact/deleteContactAction.php?id=<?= $contact['id']; ?>" class="btn btn-danger">Supprimer le contact</a>
   


   </div>


</div>

</div>

<br><br> 

                <?php
            }
        ?>

    
