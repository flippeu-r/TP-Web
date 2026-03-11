<?php

session_start();

// 1. On "aspire" notre pont de connexion à la base de données
require 'db.php';



if (isset($_POST['email']) && isset($_POST['password'] ) && isset($_POST['confirm_password'])) {


    
    $emailSaisi = $_POST['email'];
    $passwordSaisi = $_POST['password'];
    $confirmpasswordSaisi = $_POST['confirm_password'];

    // 3. On prépare notre question (requête)


    // 4. On récupère la réponse
    // $utilisateur = $requete->fetch();

    // 5. On vérifie la réponse !


    if ( $confirmpasswordSaisi === $passwordSaisi && strlen($confirmpasswordSaisi)>=8) {



        $requete = $pdo->prepare("INSERT INTO utilisateurs (email, mot_de_passe,role) VALUES (:email, :password, :role)");
        $requete->execute ([ 'email' => $emailSaisi, 'password' =>$passwordSaisi, 'role' => "utilisateur"]);
        
        

        $_SESSION['email'] = $emailSaisi;
        $_SESSION['role'] = 'utilisateur';
        $_SESSION['password'] = $passwordSaisi;
        

        header("Location: login.php"); 
        exit(); 
        
    } else {

        // ERREUR : On peut stocker l'erreur pour l'afficher plus bas dans le HTML
        $erreur = "Aïe, Les mots de passe ne sont pas les mêmes ou ils ne font pas au minimum 8 caractères";
        
    }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="styles_inscription.css">
</head>
<body>

<div class = "container">
<!--Formulaire-->




    <form id="inscription_form" method="POST" action="inscription.php">

        <h1>
        <p>
            Créer votre compte
        </p>
    </h1>

    <input type="email" placeholder="Email" id="email" name="email">
    <div id="email_error2" class="error-text titanic">L'adresse email est obligatoire.</div><br>


    <input type="password" placeholder="Mot de passe " id="password" name="password">
    <div id="password_error2" class="error-text titanic">Le mot de passe est obligatoire.</div><br>

    

    <input type="password" placeholder="Confirmer le Mot de passe " id="confirm_password" name="confirm_password">
     <div id="password2_error2" class="error-text titanic">Les mots de passe doivent correspondre</div><br>



    <input type="submit" value="Creer compte"><br>
    <div id="password_len_error2" class="error-text titanic">Le mot de passe doit contenir au moins 8 caractères.</div>
    <div class="Reconnexion">
    <?php
    if (isset($erreur)){
        echo '<p style="color: red; font-weight: bold;">' . $erreur . '</p>';
    }
    ?>
    <p>Vous avez déjà un compte ? </p>
    <a href="login.php"> Connexion</a>

    </div>
    </form>


        <script>
                console.log("coucou tout le monde !");
 
            </script>
        <script src="script.js"></script>
</div>
    
</body>
</html> 