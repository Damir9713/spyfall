<?php

if(!$_SESSION['auth']){
    header('Location: index.php');
}

?>