<section id="inscription">

    <form method="POST" action="index.php?uc=inscription&action=creerClient">
        <fieldset>
            <legend>Inscription</legend>
            <p>
                <label for="nom">Nom</label>
                <input id="nom" type="text" name="nom" autocomplete="off" maxlength="50">
            </p>
            <p>
                <label for="prenom">Prenom</label>
                <input id="prenom" type="text" name="prenom" autocomplete="off" maxlength="50">
            </p>
         
            <p>
                <label for="password">Mot de passe</label>
                <input id="password" type="password" name="password" autocomplete="off" minlength="6" maxlength="50">
            </p>
          
            <p>
                <label for="rue">Rue</label>
                <input id="rue" type="text" name="rue" autocomplete="off" maxlength="100">
            </p>
            <p>
                <label for="cp">Code postal</label>
                <input id="cp" type="text" name="cp" autocomplete="off" size="5" maxlength="5">
            </p>
            <p>
                <label for="ville">Ville</label>
                <input id="ville" type="text" name="ville" autocomplete="off" maxlength="50">
            </p>
            <p>
                <label for="mail">Email </label>
                <input id="mail" type="text"  name="mail" autocomplete="off" maxlength="50">
            </p> 
            <p>
                <input type="submit" value="Valider" name="Valider">
                <input type="reset" value="Annuler" name="Annuler"> 
            </p>
    </form>
</section>