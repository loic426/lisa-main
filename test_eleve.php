<?php 

require_once("autoload.php");

$sBasepath=getcwd().'\\';   // Chemin de la base de l'application avec un slash final

$eleve = new EleveModel();

$eleve->id_promotion = intval($_POST['promotion']);
//$eleve->id_photo = "";
$eleve->nom = $_POST['nom'];
$eleve->prenom = $_POST['prenom'];
$eleve->email = $_POST['email'];
$eleve->mdp = $_POST['password'];


//$eleve->nom = "toto";

$eleve->create();
//print_r($eleve->toArray());

$tab = $eleve->index();

