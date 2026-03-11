<?php
session_start();
require 'db.php'; 


$req_tickets_actifs = $pdo->query("SELECT COUNT(*) FROM tickets WHERE status = 'En cours' OR status = 'Nouveau'");
$tickets_actifs = $req_tickets_actifs->fetchColumn();


$req_total_projets = $pdo->query("SELECT COUNT(*) FROM projets");
$total_projets = $req_total_projets->fetchColumn();


$req_total_tickets = $pdo->query("SELECT COUNT(*) FROM tickets");
$total_tickets = $req_total_tickets->fetchColumn();


$req_derniers_tickets = $pdo->query("
    SELECT * FROM tickets 
    ORDER BY id DESC 
    LIMIT 5
");
$derniers_tickets = $req_derniers_tickets->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style_dash_colab.css">

    
</head>
<body>

    <script>

        if (localStorage.getItem("email_stocke") == null ){
            window.location.href = "accueil.php";
        }
    </script>

    <div class="dashboard-container">

        <nav class ="sidebar">

            <div class="logo">
                <h2>
                    Prisma <span style="font-weight: 300; font-size: 0.8em;">Tickets</span>
                </h2>
            </div>

            <ul>

                <li class="active"><a href="dash_colab.php">    <i class="fas fa-home"></i>
                     Accueil </a></li>

                <li><a href="proj_colab.php">    <i class="fas fa-project-diagram"> </i>
                    Projets </a> </li>

                <li><a href="ticket_colab.php">    <i class="fas fa-ticket-alt"></i>
                    Tickets </a></li>

                <li><a href="heures.html"><i class="fas fa-clock"></i>
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
                    Tableau de Bord
                </h1>
                <div class="user-info"><span id="message_bienvenue">"Bonjour, [email]"</span>  <a href="profile.html"><div class="profile-pic">  </div></a>     </div>

            </header>

            <div class="stats-container">

                <div class="card">   <h3>Tickets Actifs</h3>     <p><?= $tickets_actifs ?></p>      <span>En cours / Nouveau</span>    </div>
                <div class="card">   <h3>Total Projets</h3>     <p><?= $total_projets ?></p>     <span>Projets enregistrés</span>       </div>
                <div class="card">   <h3>Total Tickets</h3>     <p><?= $total_tickets ?></p>     <span>Depuis le début</span>      </div>

            </div>


            <div class="tickets-container">
                <h2>Derniers Tickets</h2>

                <table>

                    <thead>

                        <tr>

                        <th>ID</th>

                        <th>Sujet</th>

                        <th>Client</th>
                        
                        <th>Status</th>

                        <th>priorité</th>

                        <th>type</th>

                        </tr>
                        </thead>

                        <tbody>
                            
                            <?php foreach ($derniers_tickets as $ticket): ?>
                            <?php 
                                $statut_class = strtolower(str_replace(' ', '-', $ticket['status'])); 
                                $type_class = ($ticket['type'] == 'facturable') ? 'facturable' : 'inclus';
                            ?>
                            <tr>

                                <td>#<?= $ticket['id'] ?></td>
                                <td><?= htmlspecialchars($ticket['sujet']) ?></td>
                                <td><?= htmlspecialchars($ticket['client']) ?></td>
                                <td><span class="status <?= $statut_class ?>"><?= htmlspecialchars($ticket['status']) ?></span></td>
                                <td><?= htmlspecialchars($ticket['priorite']) ?></td>
                                <td><span class="<?= $type_class ?>"><?= htmlspecialchars($ticket['type']) ?></span></td>


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