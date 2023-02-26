<section id="visite">
    <aside id="categories">
        <ul >
            <?php
            
            foreach ($lesCategories as $uneCategorie) {
                $idCategorie = $uneCategorie['id'];
                $libCategorie = $uneCategorie['nom'];
                ?>
                <li>
                    <a href=index.php?uc=visite&categorie=<?php echo $idCategorie ?>&action=voirJeux><?php echo $libCategorie ?></a>
                </li>
                <?php
            }
            ?>
        </ul>
        
        
        <ul>

    <?php
   
    $etats = array(
        "bon état" => "Bon état",
        "mauvais état" => "Mauvais état",
        "état moyen" => "Etat moyen"
    );


    foreach ($etats as $etat_key => $etat_value) {
        ?>
        <li>
            <a href="index.php?uc=visite&exemplaire&etat=<?php echo $etat_key; ?>&action=voirEtat"><?php echo $etat_value; ?></a>
        </li>
        <?php
    }
    ?>
</ul>

    </aside>
    <section  id="jeux">
        <?php
        foreach ($lesJeux as $unJeu) {
            $id = $unJeu['id'];
            $nom = $unJeu['nom'];
            $prix = $unJeu['prix'];
            $année = $unJeu['année'];
            $image = $unJeu['image'];
            $etat = $unJeu['etat'];
           
            ?>
            <article> <img src="public/images/jeux/<?= $id ?>.jpeg" alt="Image de <?= $unJeu['nom']; ?>"/>
            <p><?= "Nom : " . $nom ?></p>
            <p><?= "Année : " . $année ?></p>
               <p><?= "Etat : " . $etat ?></p>
                <p><?= "Prix : " . $prix . " Euros" ?>
                    <a href="index.php?uc=visite&jeu=<?= $id ?>&action=ajouterAuPanier">
                        <img src="public/images/mettrepanier.png" title="Ajouter au panier" class="add"/>
                    </a>
                </p>
            </article>
            <?php
        }
        ?>
    </section>
</section>


