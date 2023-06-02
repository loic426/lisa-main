<?php 

require_once("autoload.php");

$sBasepath=getcwd().'\\';   // Chemin de la base de l'application avec un slash final

$evenement = new EvenementModel();

$evenement->titre = $_POST['titre'];
$evenement->evenement = $_POST['evenement'];
$evenement->date_debut = $_POST['date_debut'];
$evenement->date_fin = $_POST['date_fin'];
$evenement->heure_debut = $_POST['heure_debut'];
$evenement->heure_fin = $_POST['heure_fin'];
$evenement->salle = $_POST['salle'];
$evenement->lieu = $_POST['lieu'];


$evenement->create();

$tab = $evenement->index();
