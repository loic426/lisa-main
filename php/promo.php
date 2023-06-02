<?php 


include("./db.php");

@$promoSubmit = $_POST["promoSubmit"];
if(isset($promoSubmit)) {

$nom = $_POST['promo'];

$stmt = $pdo->prepare("INSERT INTO promotion (nom) VALUES (:promotion)");
$stmt->bindParam(':promotion', $nom);
$stmt->execute();

}    