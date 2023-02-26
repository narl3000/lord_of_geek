<div style="display: flex; justify-content: space-around">
    <div>   
        <h1 style="text-align: center;">Commandes :</h1>

       
            
                <?php 
                 foreach ($commandesClient as $commandes) {

                    $id = $commandes['id'];
                    $prix = $commandes['prix'];
                   
                    $description = $commandes['nom'];
                    $datecommande = $commandes['created_at'];
                ?>
                    <article class="marg">
                        <!-- <img src="public/images/jeux/<?= $image ?>" alt="Image de <?= $description; ?>" width="200px" height="200px" /> -->
                        <p><?= $description ?></p>
                        <p><?= "Prix :   $prix  Euros <br> Commandé le : <br>  $datecommande" ?>
                        </p>
                        <br>
                    </article>
                <?php
                }
                ?>
       
    </div>
</div>


</div>