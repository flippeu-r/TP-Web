<?php
// 0. On allume la mémoire de PHP (DOIT TOUJOURS ÊTRE LA TOUTE PREMIÈRE LIGNE !) 🧠
session_start();

// 1. On "aspire" notre pont de connexion à la base de données
require 'db.php';

// 2. Si le formulaire a bien été envoyé...
if (isset($_POST['email']) && isset($_POST['password'])) {
    
    $emailSaisi = $_POST['email'];
    $passwordSaisi = $_POST['password'];

    // 3. On prépare notre question (requête)
    $requete = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = :email");
    $requete->execute(['email' => $emailSaisi]);
    
    // 4. On récupère la réponse
    $utilisateur = $requete->fetch();

    // 5. On vérifie la réponse !
    if ($utilisateur && $utilisateur['mot_de_passe'] === $passwordSaisi) {
        
        // SUCCÈS : On garde Didier en mémoire dans la "Session" 🎒
        $_SESSION['email'] = $utilisateur['email'];
        $_SESSION['role'] = $utilisateur['role'];
        
        // On le redirige instantanément vers le tableau de bord 🚀
        header("Location: dash_colab.php"); 
        exit(); // On arrête de lire le reste de la page
        
    } else {
        // ERREUR : On peut stocker l'erreur pour l'afficher plus bas dans le HTML
        $erreur = "Aïe, adresse email ou mot de passe incorrect.";
        
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style_log.css">
</head>
<body>

<div class = "container">
<!--Formulaire-->




    <form id="login_form" method="POST" action="login.php">

        <h1>
        <p>
            Bienvenue
        </p>
    </h1>

    <input type="email" placeholder="Email" id="email" name="email">




    <div id="email_error" class="error-text titanic">L'adresse email est obligatoire.</div><br>

    <input type="password" placeholder="Mot de passe " id="password" name="password">
    <div id="password_error" class="error-text titanic">Le mot de passe est obligatoire.</div><br>
    <div id="password_len_error" class="error-text titanic">Le mot de passe doit contenir au moins 8 caractères.</div>
    

    <input type="submit" value="Connexion"><br>
    <?php
    if (isset($erreur)){
        echo '<p style="color: red; font-weight: bold;">' . $erreur . '</p>';
    }
    ?>
    <a href="mdp_perdu.html">Mot de passe oublié</a><br>
    
    <a href="inscription.php">Créer un compte</a>


    
    </form>


        <script>
                console.log("coucou tout le monde !");
                let a = 3;
                let b = 4;
                console.log(a+b);
            </script>
            <script src="script.js"></script>
</div>
    
</body>
</html> 