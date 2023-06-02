<!DOCTYPE html>
<html>
<head>
    <title>Administrateur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta charset="utf-8" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
      <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css"/>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
      <link rel="stylesheet" href="sweetalert2.min.css">
      <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
      <script src="./js/sweetalert2.all.min.js"></script>
</head>
<body>
    <h1>Ajouter un utilisateur</h1>
    <form method="post" action="">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password :</label>
        <input type="password" id="password" name="password" minlength="12" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" id="password" name="password" required><br>

        <label for="id_promotion">Promotion :</label>
        <select name="id_promotion" id="promotion">
            <option value="">--Choisir une promotion--</option>
            <option value="BTSSN21">BTSSN21</option>
        </select>


        <input type="submit" name="add" value="Ajouter utilisateur">
    </form>
    <form method="post" action="">
        <input type="submit" name="deconnexion" value="Deconnexion">
    </form>
    <h1>Ajouter une promotion</h1>
    <form method="post" action="">
        <label for="promo">Promotion :</label>
        <input type="text" id="promo" name="promo" required><br>
        <input type="submit" name="promoSubmit" value="Ajouter la promotion">
    </form>
</body>
</html>







<?php


include "add.php";


include "promo.php";