 <?php
try{
    $bdd = new PDO('mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_d7e00b379bd5ae4;charset=utf8;', 'b8d1fd6f7235c8', 'bd1378f1');
}catch(Exception $e){
    die('Une erreur a été trouvée : ' . $e->getMessage()); 
} 

