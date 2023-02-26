<?php

include 'App/modele/M_Client.php';

switch ($action) {
    case 'creerClient' :
       
        $nom = filter_input(INPUT_POST, 'nom');
        $prenom = filter_input(INPUT_POST, 'prenom');
        $ville = filter_input(INPUT_POST, 'ville');
        $cp = filter_input(INPUT_POST, 'cp');
        $rue = filter_input(INPUT_POST, 'rue');
        $mail = filter_input(INPUT_POST, 'mail');
        $password = filter_input(INPUT_POST, 'password');
        $erreurs = M_Client::creerClient( $nom,$prenom, $rue, $cp, $ville, $mail, $password);
       
      
        if ($erreurs) {
            afficheErreurs($erreurs);
        } else {
            afficheMessage("Vous êtes inscrit !");
        }

        break;

    // case 'voirClient':
    //     $id = filter_input(INPUT_GET, 'id');
    //     $client = M_Client::trouverClientParId($id);
    //     break;


    default:
        $client = [];
        break;
}