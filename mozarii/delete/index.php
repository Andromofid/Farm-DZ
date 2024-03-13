<?php
require_once("../../connexiondb.php");
session_start();
if (!isset($_SESSION['data'])) {
    header("location:../../index.php");
}
else{
    $id = $_GET['id_produit'];
    $sql = $db ->prepare("DELETE FROM produits WHERE id_produit=?");
    $sql->execute([$id]);
    header("location:../home/index.php");
}
?>
