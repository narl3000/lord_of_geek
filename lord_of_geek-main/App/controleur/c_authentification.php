<?php

include 'App/modele/M_Client.php';

switch ($action) {

    case 'loginClient':
        $mail = filter_input(INPUT_POST, 'mail');
       
        $password = filter_input(INPUT_POST, 'password');
        
        $client = M_Client::trouverClientParmailEtMDP($mail, $password);
        
        if ($client)
     
        {
            $_SESSION['client'] = $client;
            header('Location: index.php');
        }else {
            echo("Entrez votre mail et votre mot de passe ou enregistrez-vous");
         } 
        break;

    case 'logoutClient':
        supprimerPanier();
        unset($_SESSION['client']);
        header('Location: index.php');
        die();
        break;

        
}