<?php
session_start();
require 'db.php';


if (isset($_POST['id_ticket']) && isset($_POST['nb_heures'])) {

    $id_ticket = $_POST['id_ticket'];
    $nb_heures = $_POST['nb_heures'];
    $date_saisie = $_POST['date_saisie'];
    $commentaire = $_POST['commentaire'];

    $req_user = $pdo->prepare("SELECT id FROM utilisateurs WHERE email = :email");
    $req_user->execute(['email' => $_SESSION['email']]);
    $user = $req_user->fetch();
    $id_utilisateur = $user['id'];

    $insert = $pdo->prepare("INSERT INTO heures (id_ticket, id_utilisateur, nb_heures, date_saisie, commentaire) VALUES (:id_ticket, :id_utilisateur, :nb_heures, :date_saisie, :commentaire)");
    $insert->execute([
        'id_ticket' => $id_ticket,
        'id_utilisateur' => $id_utilisateur,
        'nb_heures' => $nb_heures,
        'date_saisie' => $date_saisie,
        'commentaire' => $commentaire
    ]);

    header("Location: heures.php");
    exit();
}


$req_tickets = $pdo->query("SELECT id, sujet FROM tickets ORDER BY sujet ASC");
$liste_tickets = $req_tickets->fetchAll();


$req_historique = $pdo->prepare("
    SELECT heures.*, tickets.sujet 
    FROM heures 
    JOIN tickets ON heures.id_ticket = tickets.id 
    JOIN utilisateurs ON heures.id_utilisateur = utilisateurs.id
    WHERE utilisateurs.email = :email
    ORDER BY heures.date_saisie DESC
");
$req_historique->execute(['email' => $_SESSION['email']]);
$historique = $req_historique->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Heures - Prisma</title>

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

                <li><a href="ticket_colab.php">    <i class="fas fa-ticket-alt"></i>
                    Tickets </a></li>

                <li class="active"><a href="heures.php"><i class="fas fa-clock"></i>
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
                    Saisie du Temps
                </h1>
                <div class="user-info"><span>Collaborateur</span>  <a href="profile.html"><div class="profile-pic">  </div></a>     </div>

            </header>


            <div class="tickets-container" style="margin-bottom: 30px;">
                
                <form action="heures.php" method="POST" style="display: flex; flex-direction: column; gap: 15px; padding: 20px;">
                    
                    <div style="display: flex; gap: 20px;">
                        
                        <div style="flex: 2;">
                            <label>Ticket associé</label><br>
                            <select name="id_ticket" required style="width: 100%; padding: 10px; margin-top: 5px; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); color: white; border-radius: 5px;">
                                <option value="" disabled selected>Choisir un ticket...</option>
                                <?php foreach ($liste_tickets as $t): ?>
                                    <option value="<?= $t['id'] ?>"><?= htmlspecialchars($t['sujet']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div style="flex: 1;">
                            <label>Nombre d'heures</label><br>
                            <input type="number" name="nb_heures" step="0.5" placeholder="Ex: 2.5" required style="width: 100%; padding: 10px; margin-top: 5px; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); color: white; border-radius: 5px;">
                        </div>

                        <div style="flex: 1;">
                            <label>Date</label><br>
                            <input type="date" name="date_saisie" value="<?= date('Y-m-d') ?>" required style="width: 100%; padding: 10px; margin-top: 5px; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); color: white; border-radius: 5px;">
                        </div>

                    </div>

                    <div>
                        <label>Commentaire (Optionnel)</label><br>
                        <textarea name="commentaire" rows="2" style="width: 100%; padding: 10px; margin-top: 5px; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); color: white; border-radius: 5px;"></textarea>
                    </div>

                    <button type="submit" style="background: #3F5EFB; color: white; border: none; padding: 12px; border-radius: 10px; font-weight: bold; cursor: pointer; align-self: flex-end;">
                        <i class="fas fa-plus"></i> Enregistrer les heures
                    </button>

                </form>

            </div>


            <div class="tickets-container">
                <h2>Mon Historique</h2>

                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Ticket</th>
                            <th>Durée</th>
                            <th>Commentaire</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php foreach ($historique as $h): ?>
                        <tr>
                            <td><?= $h['date_saisie'] ?></td>
                            <td><?= htmlspecialchars($h['sujet']) ?></td>
                            <td><strong><?= $h['nb_heures'] ?> h</strong></td>
                            <td style="font-size: 0.85em; opacity: 0.8;"><?= htmlspecialchars($h['commentaire']) ?></td>
                        </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>

            </div>

        </main>

    </div>

</body>
</html>