<section>
    <img src="public/images/panier.gif" alt="Panier" title="panier"/>
    <?php
    $totalPrice = 0; // Initialize the total price
    foreach ($lesJeuxDuPanier as $unJeu) {
        $id = $unJeu['id'];
        $image = $unJeu['image'];
        $prix = $unJeu['prix'];
        $totalPrice += $prix; // Add the price to the total
        ?>
        <p>
            <img src="public/images/jeux/<?= $id ?>.jpeg" alt=image width=200 height=200 />
            <?php
            echo "($prix Euros)";
            ?>
            <a href="index.php?uc=panier&jeu=<?php echo $id ?>&action=supprimerUnJeu" onclick="return confirm('Voulez-vous vraiment retirer ce jeu ?');">
                <img src="public/images/retirerpanier.png" TITLE="Retirer du panier" >
            </a>
        </p>
        <?php
    }
    if ($uc == 'panier' && $action == 'voirPanier') {
        $lesJeuxDuPanier = getLesIdJeuxDuPanier();
        if (count($lesJeuxDuPanier) == 0) {
            $lesJeux = getJeuxDisponibles();
        }
    }

    // Calculate and apply discounts based on the total price
    $discount = 0;
    if ($totalPrice >= 100) {
        $discount = 10;
    } else if ($totalPrice >= 50) {
        $discount = 5;
    }

    ?>
    <p>Total du panier : <?php echo $totalPrice; ?> Euros</p> <!-- Display the total price -->
    <?php if ($discount > 0) { ?>
        <p>Réduction : <?php echo $discount; ?> Euros</p> <!-- Display the discount amount -->
        <p>Prix après réduction : <?php echo $totalPrice - $discount; ?> Euros</p> <!-- Display the price after the discount -->
    <?php } ?>

    <br>
    <a href=index.php?uc=commander&action=passerCommande>
        <img src="public/images/commander.jpg" title="Passer commande" >
    </a>

