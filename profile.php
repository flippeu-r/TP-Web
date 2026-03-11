<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil - Prisma</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles_tick_colab.css">
    
</head>
<body>

    <div class="dashboard-container">
        <nav class="sidebar">
            <div class="logo"><h2>Prisma <span>Tickets</span></h2></div>
            <ul>
                <li><a href="dash_colab.html"><i class="fas fa-home"></i> Accueil </a></li>
                <li><a href="proj_colab.html"><i class="fas fa-project-diagram"></i> Projets </a></li>
                <li><a href="ticket_colab.html"><i class="fas fa-ticket-alt"></i> Tickets </a></li>
                <li><a href="mes_heures.html"><i class="fas fa-clock"></i> Mes Heures </a></li>
            </ul>
            <div class="Deconnexion"><a href="login.html"><i class="fas fa-sign-out-alt"></i> Deconnexion </a></div>
        </nav>

        <main class="main-content">
            
            <div class="ticket-header-wrapper">
                <h1 class="ticket-title">Mon Profil</h1>
                <a href="settings.html" class="btn-create" style="background: rgba(255,255,255,0.1);">
                    <i class="fas fa-cog">_</i> Paramètres
                </a>
            </div>

            <div class="profile-container">
                
                <div class="profile-header-card">
                    
                    <h2 style="font-size: 2rem; margin-bottom: 5px;">Olivier</h2>
                    <p style="opacity: 0.7;">Olivier@prisma.com</p>
                    <span class="role-badge-large">Développeur Fullstack</span>

                    <div class="profile-stats">
                        <div class="stat-box">
                        </div>
                        <div class="stat-box">
                            <h4>45 Tickets résolus</h4>
                            
                        </div>
                        <div class="stat-box">
                            <h4>120h  Ce mois</h4>
                            
                        </div>
                    </div>
                </div>

                <div class="glass-form" style="text-align: left;">
                    <h3 style="margin-bottom: 20px; opacity: 0.8;">Informations personnelles</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Téléphone</label>
                            <input type="text" value="+33 6 12 34 56 78" readonly>
                        </div>
                        <div class="form-group">
                            <label>Département</label>
                            <input type="text" value="Technique / RSE" readonly>
                        </div>
                    </div>
                    <div class="form-group full-width">
                        <label>Bio / Compétences</label>
                        <textarea readonly>Expert Dev ops, Dev fullstack, major en Osint. J'ai juste mis des mots que j'ai déjà entendu quelque part</textarea>
                    </div>
                </div>

            </div>s

        </main>
    </div>
</body>
</html>