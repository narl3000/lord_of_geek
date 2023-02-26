<section id="authentification">
    <form method="POST" action="index.php?uc=authentification&action=loginClient">
        <fieldset>
            <legend>Authentification</legend>
            <p>
                <label for="mail">Mail</label>
                <input id="mail" type="text" name="mail" maxlength="90">
            </p>
            <p>
                <label for="password">Mot de passe</label>
                <input id="password" type="password" name="password" minlength="6" maxlength="90">
            </p>
            <p>
                <input type="submit" value="Valider" name="valider">
                <input type="reset" value="Annuler" name="annuler"> 
            </p>
    </form>
</section>