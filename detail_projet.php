<?php
session_start();
require 'db.php'; // On se connecte à la base de données

// On demande à récupérer tous les projets, du plus récent au plus ancien
$requete = $pdo->query("SELECT * FROM projets ORDER BY id DESC");
$projets = $requete->fetchAll();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet : Refonte Site Web</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles_tick_colab.css">
    <link rel="stylesheet" href="styles_tick_det.css">
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
            
            <div class="ticket-header-wrapper">
                <div class="header-left">
                    <a href="proj_colab.php" class="btn-back"><i class="fas fa-arrow-left"></i> Liste des projets</a>
                    <h1 class="ticket-title">Refonte Site Web <span class="client-badge" style="vertical-align: middle; margin-left: 10px;">MCDONALDS</span></h1>
                </div>
                
                <a href="project_create.php" class="btn-create" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2);">
                    <i class="fas fa-pen"></i> Modifier le projet
                </a>
            </div>

            <div class="ticket-grid">
                
                <div class="ticket-conversation">
                    <h3 style="margin-bottom: 20px; opacity: 0.7; font-size: 0.9rem; text-transform: uppercase;">Tickets associés</h3>
                    
                    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                        <thead>
                            <tr style="border-bottom: 1px solid rgba(255,255,255,0.1); color: rgba(255,255,255,0.5); font-size: 0.8rem;">
                                <th style="text-align: left; padding: 10px;">ID</th>
                                <th style="text-align: left;">Sujet</th>
                                <th style="text-align: center;">Statut</th>
                                <th style="text-align: center;">Priorité</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                       <tbody>
                        
                        <?php foreach ($projets as $projet): ?>
                        <tr>
                            <td><strong>#<?= $projet['id'] ?></strong></td>
                            
                            <td><?= htmlspecialchars($projet['nom']) ?></td>
                            
                            <td><span class="client-badge"><?= htmlspecialchars($projet['client']) ?></span></td>
                            
                            <td><?= htmlspecialchars($projet['date_creation']) ?></td>
                            
                            <td><?= htmlspecialchars($projet['budget']) ?> €</td>
                            
                            <td><a href="#" class="btn-action"><i class="fas fa-eye"></i></a></td>
                        </tr>
                        <?php endforeach; ?>

                    </tbody>
                    </table>
                    
                    <a href="create_test.php" class="btn-add-time" style="text-decoration: none; color: white;">
                        <i class="fas fa-plus"></i> Créer un nouveau ticket
                    </a>
                </div>

                <div class="ticket-sidebar">
                    
                    <div class="info-card">
                        <h3>Avancement Global</h3>
                        <div class="info-row">
                            <label>Progression</label>
                            <strong>75%</strong>
                        </div>
                        <div class="time-bar-bg">
                            <div class="time-bar-fill" style="width: 75%; background: #2ecc71;"></div>
                        </div>
                        <div class="info-row" style="margin-top: 15px;">
                            <label>Budget Heures</label>
                            <span>150h / 200h</span>
                        </div>
                    </div>

                    <div class="info-card">
                        <h3>Contexte</h3>
                        <p style="font-size: 0.9rem; opacity: 0.8; line-height: 1.5; font-style: italic;">
                            "Refonte complète du site institutionnel avec intégration du module de commande en ligne et adaptation mobile (Responsive)."
                        </p>
                    </div>

                    <div class="info-card">
                        <h3>Équipe</h3>
                        <div class="collab-stack">
                            <span class="collab-name"><i class="fas fa-user-circle"></i> Alan Grant</span>
                            <span class="collab-name"><i class="fas fa-user-circle"></i> Olivier</span>
                            <span class="collab-name"><i class="fas fa-user-circle"></i> Ada</span>
                        </div>
                    </div>

                </div>

            </div>

        </main>
    </div>
    
</body>
</html>