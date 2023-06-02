<?php 

require_once("autoload.php");

$sBasepath=getcwd().'\\';   // Chemin de la base de l'application avec un slash final

$promo = new PromotionModel();

$promo->nom = $_POST['promot'];

$promo->create();

$tab = $promo->index();
