<?php
    require_once('fonctionsDB.php');

    $request_payload = file_get_contents('php://input');
    $data_requete = json_decode($request_payload, true);

    if (isset($data_requete['action'])) {

        // Switch en fonction de l'action envoyée
        switch ($data_requete['action']) {

            case 'getJoueurs':

                if (isset($data_requete['idEquipe'])) {
                    
                    $id_equipe = htmlspecialchars($data_requete['idEquipe']);
                    
                    $data_reponse = array();
        
                    // Obtenir les équipes dans la BD
                    $joueurs = getAllJoueursParEquipe($id_equipe);
        
                    // Récupérer la ligne suivante d'un ensemble de résultats sous forme de tableau associatif
                    while ($joueur = mysqli_fetch_assoc($joueurs)) { 
                        $data_reponse[] = $joueur;
                    }

                } else {
                    $data_reponse = 'Erreur query string';
                }
            
                header('Content-type: application/json; charset=utf-8');
                echo json_encode($data_reponse);
                break;
        }
    } else {
        echo 'Erreur action';					
    }
?>