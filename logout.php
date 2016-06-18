<?php
include_once("fonctions-panier.php");
session_start();
supp_panier();
$_SESSION['name']='';
header("location: index.php");
?>
