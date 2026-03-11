
<?php
session_start();
require 'db.php'; // On se connecte à la base de données

// On demande à récupérer tous les projets, du plus récent au plus ancien
$requete = $pdo->query("SELECT * FROM projets ORDER BY id DESC");
$projets = $requete->fetchAll();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles_proj_colab.css">

    
</head>
<body>

    <div class="dashboard-container">

        <nav class ="sidebar">

            <div class="logo">
                <h2>
                    Prisma <span style="font-weight: 300; font-size: 0.8em;">Tickets</span>
                </h2>
            </div>

            <ul>

                <li><a href="dash_colab.php"><i class="fas fa-home"></i> Accueil </a></li>
                <li class="active"><a href="proj_colab.php"><i class="fas fa-project-diagram"></i> Projets </a></li>

                <li><a href="ticket_colab.php">    <i class="fas fa-ticket-alt"></i>
                    Tickets </a></li>

                <li><a href="heures.php"><i class="fas fa-clock"></i>
                    Mes Heures </a></li>
                

            </ul>

            <div class="Deconnexion">
                <a href="login.php">   <i class="fas fa-sign-out-alt"></i>
                    Deconnexion </a>

            </div>

        </nav>

        <main class="main-content">
    
            <header>
                <div style="display: flex; align-items: center; gap: 20px;">
                    <h1>Mes Projets</h1>
                    <a href="creer_projet.php" class="btn-create">
                         <h3>+ Créer un projet</h3>
                         
                    </a>
                </div>

                <div class="user-info">
                    <span>Collaborateur</span>
                    <a href="profile.php"><div class="profile-pic"> </div></a> 
                </div>
            </header>

            <div class="tickets-container">
                <h2>Tous les projets</h2>

                <table>
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Projet</th>
                            <th>Tickets</th> <th>Heures</th>
                            <th>Progression</th> <th>Action</th>      </tr>
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

            </div>

        </main>

    </div>
    
</body>
</html>