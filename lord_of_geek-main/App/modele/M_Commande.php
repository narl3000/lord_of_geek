<?php

/**
 * Requetes sur les commandes
 *
 * @author Loic LOG
 */
class M_Commande {

    /**
     * Crée une commande
     *
     * Crée une commande à partir des arguments validés passés en paramètre, l'identifiant est
     * construit à partir du maximum existant ; crée les lignes de commandes dans la table contenir à partir du
     * tableau d'idProduit passé en paramètre
     * @param $nom
     * @param $rue
     * @param $cp
     * @param $ville
     * @param $mail
     * @param $listJeux

     */
    public static function creerCommande($idClient, $listJeux)
    {
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare("INSERT INTO commandes(created_at, client_id) VALUES (NOW(), :idClient)");
        $stmt->bindParam(":idClient", $idClient);
        $stmt->execute();
        $idCommande = AccesDonnees::getPdo()->lastInsertId();
        foreach ($listJeux as $jeu) {
            $pdo = AccesDonnees::getPdo();
            $stmt = $pdo->prepare("INSERT INTO lignes_commande(commande_id, exemplaire_id) VALUES (:idCommande, :jeu)");
            $stmt->bindParam(":idCommande", $idCommande);
            $stmt->bindParam(":jeu", $jeu);
            $stmt->execute();
        }
    }

    /**
     * Retourne vrai si pas d'erreur
     * Remplie le tableau d'erreur s'il y a
     *
     * @param $nom : chaîne
     * @param $rue : chaîne
     * @param $ville : chaîne
     * @param $cp : chaîne
     * @param $mail : chaîne
     * @return : array
     */
    public static function estValide($nom, $rue, $ville, $cp, $mail) {
        $erreurs = [];
        if ($nom == "") {
            $erreurs[] = "Il faut saisir le champ nom";
        }
        if ($rue == "") {
            $erreurs[] = "Il faut saisir le champ rue";
        }
        if ($ville == "") {
            $erreurs[] = "Il faut saisir le champ ville";
        }
        if ($cp == "") {
            $erreurs[] = "Il faut saisir le champ Code postal";
        } else if (!estUnCp($cp)) {
            $erreurs[] = "erreur de code postal";
        }
        if ($mail == "") {
            $erreurs[] = "Il faut saisir le champ mail";
        } else if (!estUnMail($mail)) {
            $erreurs[] = "erreur de mail";
        }
        return $erreurs;
    }
    public static function afficherCommande($idClient)
    {
        $pdo = Accesdonnees::getPdo();
        $stmt = $pdo->prepare("SELECT client.id, exemplaires.*, commandes.*
        FROM commandes 
        JOIN client ON commandes.client_id = client.id
        JOIN lignes_commande ON commandes.id = lignes_commande.commande_id
        JOIN exemplaires ON lignes_commande.exemplaire_id = exemplaires.id
        WHERE client.id = :clientId
        ORDER BY commandes.id DESC");
        $stmt->bindParam(":clientId", $idClient);
        $stmt->execute();
        $lesCommandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lesCommandes;
    }
}

