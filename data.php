



<?php
// On crée un tableau contenant nos tickets (simule une base de données)
$tickets = [
    [
        'id' => '#1024',
        'sujet' => 'Problème fermeture cage Raptors',
        'client' => 'InGen',
        'collab' => 'Alan Grant',
        'temps' => '2h / 4h',
        'priorite' => 'Haute',
        'priorite_class' => 'high',
        'statut' => 'En cours',
        'statut_class' => 'en-cours',
        'type' => 'Inclus',
        'type_class' => 'inclus'
    ],
    [
        'id' => '#1023',
        'sujet' => 'Faille windoz',
        'client' => 'pasMicrosoft',
        'collab' => 'Morgane, Xavier',
        'temps' => '1h / 8h',
        'priorite' => 'Moyenne',
        'priorite_class' => 'medium',
        'statut' => 'Nouveau',
        'statut_class' => 'nouveau',
        'type' => 'Facturable',
        'type_class' => 'facturable'
    ],
    [
        'id' => '#1022',
        'sujet' => 'Problème tarifaire',
        'client' => 'ESIEA',
        'collab' => 'Jean-Pierre',
        'temps' => '3h / 3h',
        'priorite' => 'Basse',
        'priorite_class' => 'low',
        'statut' => 'Terminé',
        'statut_class' => 'termine',
        'type' => 'Inclus',
        'type_class' => 'inclus'
    ]
];
?>