
<!DOCTYPE HTML>
<html lang="en" >
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/login_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>  
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'> 
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="../js/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
</head>

<body class="body">
    
        <div class="login-page">
            <div class="form">
                <form action="login.php" method="post"> 
                    <img class='img_sdis' src="../img/lisa3.png" alt="logo"></img>
                    <input type="text" name="username" placeholder="&#xf007;   username">
                    <input type="password" id="password" name="password" placeholder="&#xf023;   password"> 
                    <i class="fas fa-eye" onclick="show()"></i> 
                    <br>
                    <br>   
                        <button name="submit" type="submit">Se connecter</button>
                </form>
            </div>
        </div>
<script>
    function show(){
        var password = document.getElementById("password");
        var icon = document.querySelector(".fas")
        // ========== Checking type of password ===========
      if(password.type === "password"){
        password.type = "text";
      }
      else {
        password.type = "password";
      }
    };
    
</script>

</body>
</html>


<?php
define('BASEPATH', true); //access connection script if you omit this line file will be blank
require './db.php'; //require connection script

session_start();

if (isset($_SESSION['connecter'])) header("location:./index.php");


if(isset($_POST['submit'])){  
        
    //ensure fields are not empty
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    //Retrieve the user account information for the given username.
    $sql = "SELECT id, username, password FROM admin WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    
    //Bind value.
    $stmt->bindValue(':username', $username);
    
    //Execute.
    $stmt->execute();
    
    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);


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
                 
        //If $validPassword is TRUE, the login has been successful.
        if(md5($passwordAttempt) == $user["password"]){
            
            //Provide the user with a login session.
             
            $_SESSION['user'] = $username;
            $_SESSION['connecter'] = 'oui';
            header('location:index.php');
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

?>
