<?php
include "App/modele/M_Commande.php";
include "App/modele/M_Client.php";
$commandesClient = [];
if (!empty($clientSess)) {

    $commandesClient = M_Commande::afficherCommande($clientSess['id']);
}

switch ($action) {

    case 'historique':
        $id_client=$_SESSION['client_id'];
    $commandesClient=M_Commande::afficherCommande($id_client);
    break;
}