<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramètres - Prisma</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles_tick_colab.css">
    
    
</head>
<body>

    <div class="dashboard-container">
        <nav class="sidebar">
            <div class="logo"><h2>Prisma <span>Tickets</span></h2></div>
            <ul>
                <li><a href="dash_colab.php"><i class="fas fa-home"></i> Accueil </a></li>
                <li><a href="proj_colab.html"><i class="fas fa-project-diagram"></i> Projets </a></li>
                <li><a href="ticket_colab.html"><i class="fas fa-ticket-alt"></i> Tickets </a></li>
                <li><a href="mes_heures.html"><i class="fas fa-clock"></i> Mes Heures </a></li>
            </ul>
            <div class="Deconnexion"><a href="login.html"><i class="fas fa-sign-out-alt"></i> Deconnexion </a></div>
        </nav>

        <main class="main-content">
            
            <header>
                <h1>Paramètres</h1>
                <div class="user-info"><span>Collaborateur</span><a href="profile.html"><div class="profile-pic">  </div></a> </div>
            </header>

            <div style="max-width: 800px; margin: 0 auto;">
                
                <div class="settings-section">
                    <h3>Notifications</h3>
                    
                    <div class="setting-row">
                        <div class="setting-info">
                            <h4>Emails de ticket</h4>
                            <p>Recevoir un email quand un ticket m'est assigné</p>
                        </div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="setting-row">
                        <div class="setting-info">
                            <h4>Nouveaux commentaires</h4>
                            <p>Notification quand un client répond</p>
                        </div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>

                <div class="settings-section">
                    <h3>Sécurité</h3>
                    <form>
                        <div class="form-group full-width">
                            <label>Ancien mot de passe</label>
                            <input type="password" class="glass-input" style="width:100%; padding:10px; border-radius:10px; border:1px solid rgba(255,255,255,0.2); background:rgba(0,0,0,0.2); color:white;">
                        </div>
                        <div class="form-row" style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
                            <div class="form-group">
                                <label>Nouveau mot de passe</label>
                                <input type="password" class="glass-input" style="width:100%; padding:10px; border-radius:10px; border:1px solid rgba(255,255,255,0.2); background:rgba(0,0,0,0.2); color:white;">
                            </div>
                            <div class="form-group">
                                <label>Confirmer</label>
                                <input type="password" class="glass-input" style="width:100%; padding:10px; border-radius:10px; border:1px solid rgba(255,255,255,0.2); background:rgba(0,0,0,0.2); color:white;">
                            </div>
                        </div>
                        <button type="submit" class="btn-submit" style="background:#FC4668; border:none; color:white; padding:10px 20px; border-radius:10px; cursor:pointer;">
                            Mettre à jour le mot de passe
                        </button>
                    </form>
                </div>

            </div>

        </main>
    </div>
</body>
</html>