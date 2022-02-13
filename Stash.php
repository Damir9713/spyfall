<?php 
require('actions/stash/getStashAction.php');


?>




<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'includes/head.php'; ?>
<?php include 'includes/navbar.php'; ?>
</head>
<body>
    
<br><br>

 <?php
while( $stash = $getAllStash->fetch() ){
    ?>
 
  <div class="container">

 <div class="card">
  <h5 class="card-header">Adresse de la planque : <?php echo $stash["Adress"] ?></h5>
  <div class="card-body">
    <h5 class="card-title"> Code : <?php echo $stash["stashCode"] ?></h5>
    <h5 class="card-title"> Mission : <?php echo $stash["Title"] ?></h5>
    <p class="card-text">Type : <?php echo $stash["Type"] ?></p>
    <p class="card-text">Nationalité : <?php echo $stash["Country"] ?></p>

    


    </div>


 </div>
 
</div>
 
 <br><br> 
 
    
     
      
     <?php } ?> 


</body>
</html>
 