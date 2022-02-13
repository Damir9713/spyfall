

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Spyfall</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

<?php
        if(isset($_SESSION['firstname']))  
                {  
                ?>  
        <li class="nav-item ">
          <a class="nav-link text-decoration-none" href="logout.php">Déconnexion</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-decoration-none" href="allMission.php">missions</a>
        </li>

        <li class="nav-item ">
          <a class="nav-link text-decoration-none" href="allStashAdmin.php">planques</a>
        </li>

        <li class="nav-item ">
          <a class="nav-link text-decoration-none" href="allTargetAdmin.php">cibles</a>
        </li>
        
        <li class="nav-item ">
          <a class="nav-link text-decoration-none" href="allContactAdmin.php">contact</a>
        </li>

        <li class="nav-item ">
          <a class="nav-link text-decoration-none" href="allAgentsAdmin.php">agent</a>
        </li>
               <?php        
                } 
else 
{  
?>  


        
         <!-- <li class="nav-item">
           <a class="nav-link" id="contact" href="#loginmodal" data-bs-toggle="modal" data-bs-target="#loginmodal">Se connecter</a>  
</li>


         <div class="modal fade loginmodal" id="loginmodal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="">
      
        <br><br>
     <form class="container"  id="contactForm" method="POST">

         <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?> 

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nom</label>
            <input type="text" class="form-control" id="username" name="firstname">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" id="login_button" class="btn btn-primary" name="validate">Se connecter</button>

        <br><br>
        
    </form>  

    </div>
         
         <div class="modal-footer">
          <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          
        </div>
      </div>
    </div>
  </div>    -->

  <li class="nav-item">
          <a class="nav-link" href="index.php">Les missions</a>
         </li>
    
         <li class="nav-item">
          <a class="nav-link" href="Stash.php">Les planques</a>
         </li>


  <li class="nav-item">
          <a class="nav-link" href="login.php">se connecter </a>
              </li>
        

<?php  
}  
?>  
       
      </ul>
    </div>
  </div>
</nav>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer">


          
           
</script>

  
