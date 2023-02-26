<?php

class M_Client {

    public static function creerClient($nom,$prenom, $rue, $cp, $ville, $mail, $password ) {
       

        if($erreurs = static::estProfilValide($nom,$prenom, $rue, $cp, $ville, $mail, $password)){
            return $erreurs;
        };
        $pdo = AccesDonnees::getPdo();
        $password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $pdo->prepare('INSERT INTO client(nom, prenom, rue, cp, ville, mail, password) VALUES (:nom, :prenom, :rue, :cp, :ville, :mail, :password)');
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':rue', $rue);
        $stmt->bindParam(':cp', $cp);
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':password', $password);
       
      
       
        $stmt->execute();
    }
    
    // public static function lastClient(){
    //     $idClient = AccesDonnees::getPdo()->lastInsertId();
    //     return $idClient;
    // }

    // public static function trouverClientParId($idClient) {
    //     $pdo = AccesDonnees::getPdo();
    //     $stmt = $pdo->prepare("SELECT * FROM client WHERE id = :id");
    //     $stmt->bindParam(":id", $idClient);
    //     $stmt->execute();
    //     $client = $stmt->fetch(PDO::FETCH_ASSOC);
    //     return $client;
    // }





    public static function trouverClientParmailEtMDP($mail, $password) 
    {
        $pdo = AccesDonnees::getPdo();
        $req = 'SELECT password, id FROM client WHERE mail = :mail';

        $stmt = $pdo->prepare($req);
          $stmt->bindParam(":mail", $mail);  
        // $stmt->bindParam(":password", $password);
          $stmt->execute();
          $data = $stmt->fetch();
          $hashpassword = $data['password'];

          if (password_verify($password, $hashpassword)){
            $_SESSION['client_id']=$data['id'];
            return true;
          }
          
          return false;
    }
 



    public static function estProfilValide($nom, $prenom, $rue, $cp, $ville, $mail) {
        $erreurs = [];
        if ($nom == "") {
            $erreurs[] = "Il faut saisir le champ nom";
        }
        if ($prenom == "") {
            $erreurs[] = "Il faut saisir le champ prenom";
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
    
}