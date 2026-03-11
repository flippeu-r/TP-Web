<?php
session_start();
require 'db.php'; 


// 1. On vérifie qu'on a bien cliqué sur un vrai ticket (présence de l'ID dans l'URL)
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: ticket_colab.php");
    exit();
}

$ticket_id = $_GET['id'];


// 2. On récupère TOUTES les informations de CE ticket précis
$req_ticket = $pdo->prepare("
    SELECT tickets.*, utilisateurs.email AS email_collab
    FROM tickets
    LEFT JOIN utilisateurs ON tickets.id_utilisateur = utilisateurs.id
    WHERE tickets.id = :id
");
$req_ticket->execute(['id' => $ticket_id]);
$ticket = $req_ticket->fetch();

if (!$ticket) {
    die("<h2 style='color: white; font-family: sans-serif; text-align: center; margin-top: 50px;'>🚨 Ce ticket n'existe pas ou a été supprimé !</h2>");
}


// 3. On récupère l'historique des heures de CE ticket uniquement
$req_heures = $pdo->prepare("
    SELECT heures.*, utilisateurs.email AS collab_email
    FROM heures
    LEFT JOIN utilisateurs ON heures.id_utilisateur = utilisateurs.id
    WHERE heures.id_ticket = :id
    ORDER BY heures.date_saisie DESC
");
$req_heures->execute(['id' => $ticket_id]);
$historique_heures = $req_heures->fetchAll();


// 4. On calcule le total des heures passées sur ce ticket
$total_heures = 0;
foreach ($historique_heures as $h) {
    $total_heures += $h['nb_heures'];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail Ticket #<?= $ticket['id'] ?> - Prisma</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style_dash_colab.css">


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
                <a href="login.php" id="logout">   <i class="fas fa-sign-out-alt"></i>
                    Deconnexion </a>

            </div>

        </nav>

        <main class ="main-content"> 
            
            <header>
                <h1>
                    Ticket #<?= $ticket['id'] ?>
                </h1>
                <div class="user-info"><span>Collaborateur</span>  <a href="profile.html"><div class="profile-pic">  </div></a>     </div>

            </header>


            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h2 style="color: white; margin: 0;"><?= htmlspecialchars($ticket['sujet']) ?></h2>
                <a href="ticket_colab.php" style="color: rgba(255,255,255,0.7); text-decoration: none;"><i class="fas fa-arrow-left"></i> Retour aux tickets</a>
            </div>


            <div class="stats-container">

                <div class="card">   <h3>Client</h3>     <p style="font-size: 1.5em;"><?= htmlspecialchars($ticket['client']) ?></p>      <span>Facturation : <?= htmlspecialchars($ticket['type']) ?></span>    </div>
                <div class="card">   <h3>Statut</h3>     <p style="font-size: 1.5em;"><?= htmlspecialchars($ticket['status']) ?></p>     <span>Priorité : <?= htmlspecialchars($ticket['priorite']) ?></span>       </div>
                <div class="card">   <h3>Temps Passé</h3>     <p style="font-size: 1.5em;"><?= $total_heures ?> h</p>     <span>Cumul total</span>      </div>

            </div>


            <div class="tickets-container">
                <h2>Historique des interventions</h2>

                <?php if (count($historique_heures) > 0): ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Collaborateur</th>
                                <th>Durée</th>
                                <th>Commentaire</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php foreach ($historique_heures as $h): ?>
                            <tr>
                                <td><?= $h['date_saisie'] ?></td>
                                <td><?= htmlspecialchars(explode('@', $h['collab_email'])[0]) ?></td>
                                <td><strong><?= $h['nb_heures'] ?> h</strong></td>
                                <td style="font-size: 0.85em; opacity: 0.8;"><?= htmlspecialchars($h['commentaire']) ?></td>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                <?php else: ?>
                    <p style="color: rgba(255,255,255,0.6); padding: 20px; text-align: center;">Aucune heure n'a encore été saisie sur ce ticket.</p>
                <?php endif; ?>

            </div>

        </main>

    </div>

</body>
</html>