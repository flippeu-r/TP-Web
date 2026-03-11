
<?php
session_start();
require 'db.php'; // On se connecte à la vraie base !

// 1. On récupère les tickets et on fait le lien avec la table utilisateurs
// pour avoir l'email de la personne grâce à son id_utilisateur
$requete = $pdo->query("
    SELECT tickets.*, utilisateurs.email AS email_collab,(SELECT SUM(nb_heures) FROM heures WHERE id_ticket = tickets.id) AS total_heures
    FROM tickets 
    LEFT JOIN utilisateurs ON tickets.id_utilisateur = utilisateurs.id
    ORDER BY tickets.id DESC
");
$tickets_db = $requete->fetchAll();

// 2. On prépare le tableau $tickets exactement comme ton HTML l'attend
$tickets = [];
foreach ($tickets_db as $t) {
    
    // On extrait juste le pseudo avant le "@" de l'adresse mail pour faire plus propre
    $pseudo = $t['email_collab'] ? explode('@', $t['email_collab'])[0] : 'Non assigné';


    $heures_affichees = $t['total_heures'] ? $t['total_heures'] : '0';
    $tickets[] = [
        'id' => '#' . $t['id'],
        'sujet' => htmlspecialchars($t['sujet']),
        'client' => htmlspecialchars($t['client']),
        'collab' => htmlspecialchars($pseudo),
        'temps' => $heures_affichees . ' h',
        'priorite' => htmlspecialchars($t['priorite']),
        'priorite_class' => '', // Laissé vide pour l'instant (esthétique)
        'statut' => htmlspecialchars($t['status']), // Ta colonne SQL s'appelle 'status'
        'statut_class' => '', // Laissé vide pour l'instant
        'type' => htmlspecialchars($t['type']),
        'type_class' => '' // Laissé vide pour l'instant
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles_tick_colab.css">

    
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

                <li><a href="dash_colab.php">    <i class="fas fa-home"></i>
                     Accueil </a></li>

                <li><a href="proj_colab.php">    <i class="fas fa-project-diagram"> </i>
                    Projets </a> </li>

                <li class="active"><a href="ticket_colab.php">    <i class="fas fa-ticket-alt"></i>
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
                <h1>Gestion des Tickets</h1> <div class="user-info">
                    <span>Collaborateur</span>
                    <a href="profile.php"><div class="profile-pic">  </div></a> 
                </div>
            </header>

            <div class="tickets-container">
                <h2>Tous les Tickets</h2>

                <div class="filters-header" style="margin-bottom: 20px;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;">
                </div>
                <div class="filters-actions" style="display: flex; gap: 10px;">
                    <button id="btn-tous" class="filter-btn active">Tous</button>
                    
                    <button id="btn-atraiter" class="filter-btn">À traiter</button>
                     <a href="create_test.php" class="btn-create">+ Nouveau Ticket</a>
                </div>

               



                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sujet</th>       
                            <th>Client</th>   
                            <th>Collab</td>
                            <th>Temps</th>
                            <th>Priorité</th>    
                            <th>Statut</th>      
                            <th>Type</th>        
                            <th>Action</th>      
                        </tr>
                    </thead>

                    <tbody>
                        
                        <?php foreach ($tickets as $ticket): ?>
                        <tr>

       
              

                            <td><strong><?= $ticket['id'] ?></strong></td>
                            <td> <?=$ticket['sujet']  ?> </td>
                            <td><span class="client-badge"><?=$ticket['client']  ?></span></td>
                            
                            <td>
                                <span class="collab-name"> <?=$ticket['collab']  ?></span>
                            </td>
                            <td style="font-size: 0.9rem; font-weight: 500;"><?=$ticket['temps']  ?></td>
                            <td><span class="priority <?= $ticket['priorite_class'] ?>"><?=$ticket['priorite']  ?></span></td>

                            <td><span class="status <?= $ticket['statut_class'] ?>"><?=$ticket['statut']  ?></span></td>

                             <td><span class="type <?= $ticket['type_class'] ?>"><?=$ticket['type']  ?></span></td>
                            <td><a href="ticket_detail.php?id=<?= str_replace('#', '', $ticket['id']) ?>" class="btn-action"><i class="fas fa-eye"></i></a></td>


                            
                        </tr>
                        <?php endforeach; ?>






                    </tbody>
                </table>

            </div>

        </main>

    </div>
    <script src="script.js"></script>
</body>
</html>