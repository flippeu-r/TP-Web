<?php
session_start();
require 'db.php';

// 1. SI LE FORMULAIRE EST ENVOYÉ
if (isset($_POST['nom']) && isset($_POST['client']) && isset($_POST['date']) && isset($_POST['description'])) {
    
    $nom = $_POST['nom'];
    $client = $_POST['client'];
    $date = $_POST['date'];
    $budget = !empty($_POST['budget']) ? $_POST['budget'] : 0; 
    $description = $_POST['description'];

    // On insère le projet avec une détection d'erreur intégrée
    try {
        $requete = $pdo->prepare("INSERT INTO projets (nom, client, date_creation, budget, description) VALUES (:nom, :client, :date_creation, :budget, :description)");
        $requete->execute([
            'nom' => $nom,
            'client' => $client,
            'date_creation' => $date,
            'budget' => $budget,
            'description' => $description
        ]);

        // Redirection en cas de succès
        header("Location: proj_colab.php"); 
        exit();

    } catch (PDOException $e) {
        // Si la requête échoue, on stoppe tout et on affiche pourquoi
        die("<div style='background: red; color: white; padding: 20px; font-family: sans-serif;'>🚨 ERREUR SQL : " . $e->getMessage() . "</div>");
    }
}

// 2. RÉCUPÉRATION DES CLIENTS POUR LA BARRE DE RECHERCHE
try {
    $requete_clients = $pdo->query("SELECT DISTINCT client FROM projets WHERE client != '' ORDER BY client ASC");
    $liste_clients = $requete_clients->fetchAll();
} catch (PDOException $e) {
    $liste_clients = []; 
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau Projet - Prisma</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles_tick_colab.css">
</head>
<body>

    <div class="dashboard-container">

        <nav class="sidebar">
            <div class="logo">
                <h2>Prisma <span style="font-weight: 300; font-size: 0.8em;">Tickets</span></h2>
            </div>
            <ul>
                <li><a href="dash_colab.php"><i class="fas fa-home"></i> Accueil </a></li>
                <li class="active"><a href="proj_colab.php"><i class="fas fa-project-diagram"></i> Projets </a></li>
                <li><a href="ticket_colab.php"><i class="fas fa-ticket-alt"></i> Tickets </a></li>
                <li><a href="mes_heures.php"><i class="fas fa-clock"></i> Mes Heures </a></li>
            </ul>
            <div class="Deconnexion">
                <a href="login.php"><i class="fas fa-sign-out-alt"></i> Deconnexion </a>
            </div>
        </nav>

        <main class="main-content">
            
            <header>
                <h1>Nouveau Projet</h1>
                <div class="user-info">
                    <span>Collaborateur</span>
                    <a href="profile.php"><div class="profile-pic">  </div></a> 
                </div>
            </header>

            <div style="max-width: 800px; margin: 0 auto;">
                
                <form action="creer_projet.php" method="POST" class="glass-form" id="projetForm" novalidate>
    
                    <div class="form-group full-width">
                        <label for="nom">Nom du projet <span class="required">*</span></label>
                        <input type="text" id="nom" name="nom" placeholder="Ex: Refonte Site E-commerce" required>
                        <div id="nom_error" class="error-text titanic">Il faut choisir un nom de projet</div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="client">Client <span class="required">*</span></label>
                            
                            <input type="text" id="client" name="client" list="clients_existants" placeholder="Tapez ou choisissez..." autocomplete="off" required>
                            <datalist id="clients_existants">
                                <?php foreach ($liste_clients as $c): ?>
                                    <option value="<?= htmlspecialchars($c['client']) ?>">
                                <?php endforeach; ?>
                            </datalist>

                            <div id="client_error" class="error-text titanic">Il faut choisir un Client</div>
                        </div>
                        
                        <div class="form-group">
                            <label for="date">Date de fin (Deadline)</label>
                            <input type="date" id="date" name="date" required>
                            <div id="date_error" class="error-text titanic">Il faut choisir une date</div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="budget">Budget (Heures)</label>
                            <input type="number" id="budget" name="budget" placeholder="Ex: 200">
                            <div id="Budget_error" class="error-text titanic">Il faut choisir un Budget</div>
                        </div>
                        
                        <div class="form-group">
                            <label>Statut</label>
                            <select name="statut">
                                <option value="En cours">En cours</option>
                                <option value="En attente">En attente</option>
                                <option value="Terminé">Terminé</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="description">Description & Objectifs</label>
                        <textarea id="description" name="description" rows="5" placeholder="Décrivez le contexte du projet..." required></textarea>
                        <div id="description_error" class="error-text titanic">Il faut une description</div>
                    </div>

                    <div style="display: flex; justify-content: flex-end; gap: 15px; margin-top: 20px;">
                        <a href="proj_colab.php" style="padding: 10px 20px; color: rgba(255,255,255,0.7); text-decoration: none;">Annuler</a>
                        <button type="submit" style="background: #3F5EFB; color: white; border: none; padding: 12px 30px; border-radius: 10px; font-weight: bold; cursor: pointer;">
                            <i class="fas fa-save"></i> Enregistrer
                        </button>
                    </div>

                </form>

            </div>

        </main>
        <script src="script.js"></script>
    </div>
    
</body>
</html>