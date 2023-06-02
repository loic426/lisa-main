
<?php
// Connexion à la base de données
//define('BASEPATH', true); //access connection script if you omit this line file will be blank

include("./db.php");

session_start();

@$deconnexion = $_POST['deconnexion'];
if (isset($deconnexion)){
    session_destroy();
    header('location: ./login.php');
    exit;
}

if(!isset($_SESSION['connecter'])) header('location:login.php');

// Vérification si le formulaire a été soumis
$add = $_POST['add'];
if(isset($add)) {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mdp = $_POST['password'];
    $promotion = $_POST['id_promotion'];

    //Check if username exists
    $sql = "SELECT COUNT(email) as num FROM eleve WHERE email = :email;";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($row['num'] > 0){
        echo "
         <script>
         Swal.fire({
           icon: 'warning',
           title: 'Oops...',
           text: 'Cet utilisateur est déjà créé!',
         })
         </script>
       ";
   }else{

    // Insertion des données dans la base de données
    $stmt = $pdo->prepare("INSERT INTO eleve (nom, prenom, email, mdp, id_promotion) VALUES (:nom, :prenom, :email, md5(:mdp), :id_promotion)");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mdp', $mdp);
    $stmt->bindParam(':id_promotion', $promotion);

    $stmt->execute();

    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    //If $row is FALSE.
    if($user === false){
        echo "
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Utilisateur ou mot de passe incorrect!',
                })
            </script>
        ";
    } else{
         
        //Compare and decrypt passwords.
        $validPassword = password_verify($passwordAttempt, $user['password']);
        
        //If $validPassword is TRUE, the login has been successful.
        if($validPassword){
            
            //Provide the user with a login session.
             
            $_SESSION['users'] = $username;
            $_SESSION['connecter'] = 'oui';
            echo '<script>window.location.replace("./index.php");</script>';
            exit;
            
        } else{
            echo "
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Utilisateur ou mot de passe incorrect!',
                })
            </script>
        ";
        }

    }
}
}
?>