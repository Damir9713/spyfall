 <?php
 session_start();
require('actions/missions/MissionInfos.php');
require 'vendor/autoload.php';
use Michelf\Markdown;
?>



<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
<?php include 'includes/navbar.php'; ?>

<br><br>



<div class="container">

<?php if(isset($_SESSION['firstname'])){
  echo '<h1>'.'Bonjour '.$_SESSION['firstname'].'</h1>';
 
  echo Markdown::defaultTransform("**Bienvenue sur la page d'administration**");
  
} ?>
 
 <br><br>

<?php
    while($infos = $getAllMissions->fetch()){
        ?>





        <div class="card">
  <h5 class="card-header">Nom de la mission : <?php echo $infos["Title"] ?></h5>
  <div class="card-body">
    <h5 class="card-title">Mission Code : <?php echo $infos["MissionCode"] ?></h5>
    <p class="card-text"><?php echo $infos["Description"] ?></p>
    
    
    <!-- Button trigger modal -->
<button type="button" class="missioninfo m-2 btn btn-primary" data-id="<?php echo $infos["id"]; ?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Détails
</button>


 <!-- Modal Détails  -->
  
 <div class="modal fade justify-content-around" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"> Détails </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-details">
      

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          
        </div>
      </div>
    </div>
  </div>


  <button type="button" class="agentinfo m-2 btn btn-primary" data-id="<?php echo $infos["id"]; ?>" data-bs-toggle="modal" data-bs-target="#modal2">
  Agents 
</button>


<!-- Modal Agents  -->
  <div class="modal fade justify-content-around" id="modal2" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"> Agents </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-agents">
      

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          
        </div>
      </div>
    </div>
  </div> 


  <button type="button" class="contactinfo m-2  btn btn-primary" data-id="<?php echo $infos["id"]; ?>" data-bs-toggle="modal" data-bs-target="#modal3">
  Contact
</button> 


 <!-- Modal Contact  -->
   <div class="modal fade justify-content-around" id="modal3" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"> Contact</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-contact">
      

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          
        </div>
      </div>
    </div>
  </div>

  <button type="button" class="targetinfo m-2  btn btn-primary" data-id="<?php echo $infos["id"]; ?>" data-bs-toggle="modal" data-bs-target="#modal4">
  Cible
</button> 


 <!-- Modal Cible -->
   <div class="modal fade justify-content-around" id="modal4" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"> Cible</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-target">
      

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          
        </div>
      </div>
    </div> 
  </div> 

  <button type="button" class="planqueinfo m-2  btn btn-primary" data-id="<?php echo $infos["id"]; ?>" data-bs-toggle="modal" data-bs-target="#modal5">
  Planque
</button> 


 <!-- Modal Cible -->
   <div class="modal fade justify-content-around" id="modal5" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"> Planque</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modalplanque">
      

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          
        </div>
      </div>
    </div> 
  </div> 
  

 
 

  


</div> 
</div>
  

<br><br>


<?php
    }
    

?>

</div>

<script src="includes/ajax.js "type='text/javascript'>       
</script>
           
           

</body>
</html> 