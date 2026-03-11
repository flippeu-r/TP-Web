<?php
// Les informations de connexion à ta base MAMP
$host = 'localhost;port=8889'; 
$dbname = 'prisma_tickets';
$username = 'root'; // L'utilisateur par défaut de MAMP
$password = 'root'; // Le mot de passe par défaut de MAMP (parfois c'est vide '' sur Windows)

try {
    // On essaie de se connecter...
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    
    // On demande à PHP de nous afficher les vraies erreurs SQL s'il y en a
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

} catch (PDOException $e) {
    // S'il y a un problème, on arrête tout et on affiche l'erreur
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>


