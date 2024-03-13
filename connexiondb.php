<?php
try{
    $db = new PDO("mysql:host=localhost;dbname=farm","root","Youssefwac2003");
}
catch(PDOException $e){
    echo $e->getMessage();
}
?>