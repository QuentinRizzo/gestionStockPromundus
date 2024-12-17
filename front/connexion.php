<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";
$departements = recupDepartement($pdo);

if (isset($_GET['sucess'])) {

    if ($_GET['sucess'] == 'compteCree') {
        echo '<p class="text-success text-center fs-2">Le compte à été créer avec succès ! </p>';
    }
    if ($_GET['sucess'] == 'MdpModifSuccess') {
        echo '<p class="text-success text-center">Le mot de passe a été mis a jour avec succès ! </p>';
    }
}

if (isset($_GET['erreur'])) {

    if ($_GET['erreur'] == 'emailExiste') {
        echo '<p class="text-danger fs-2 text-center">Cette email existe déja </p>';
    }
    if ($_GET['erreur'] == 'mdpConfirm') {
        echo '<p class="text-danger fs-2 text-center">Les deux mot de passe ne conrespondent pas </p>';
    }
    if ($_GET['erreur'] == 'identifiants') {
        echo '<p class="text-danger fs-2 text-center">vos identifiants ne sont pas correct ! </p>';
    }
}
?>


<section class="bodyFormCoEtInscription">
    <div class="containerFormInscriptionConnexion" id="container">
        <div class="form-container sign-up">
            <!-- Formulaire inscription -->
            <form action="../controler/traitement_inscription.php" method="post">
                <h1>Inscription</h1>
                <input name="nomInscription" type="text" placeholder="Votre nom" required>
                <input name="prenomInscription" type="text" placeholder="Votre Prenom" required>
                <input name="mailInscription" type="email" placeholder="Votre Mail" required>
                <input name="telInscription" type="text" placeholder="Votre numéro" required>
                <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Votre adresse">

                <div class="row">
                    <div class="col-md-6 form-group mb-3">
                        <select name="departement" id="departement" class="form-select" aria-label="Default select example">
                            <option value="">choix du département</option>
                            <?php foreach ($departements as $dept) { ?>
                                <option value="<?php echo htmlspecialchars($dept['id_departement'], ENT_QUOTES, 'UTF-8') ?>"><?php echo htmlspecialchars($dept['nom_departement'], ENT_QUOTES, 'UTF-8') ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <select class="form-select" name="ville" id="ville">
                            <option value="">Choix de vôtre ville</option>
                        </select>
                    </div>
                </div>
                <input name="mdpInscription" type="password" placeholder="Votre mot de passe" required>
                <input name="mdpInscriptionConfirm" type="password" placeholder="Confirmer Votre mot de passe" required>
                <button type="submit">Validez la Création</button>
            </form>
        </div>

        <!-- Formulaire de connexion -->
        <div class="form-container sign-in">
            <form action="../controler/traitement_connexion.php" method="post">
                <h1>Connexion</h1>
                <input name="mailConnexion" type="email" placeholder="Adresse Mail" required>
                <input name="mdpConnexion" type="password" placeholder="Mot de Passe" required>
                <button type="submit">Se Connecter</button>
                <a class="mt-3 nav-link" href="../front/verification_email.php">Mot de passe oublié?</a>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>PROMUNDUS Propreté</h1>
                    <p>vous possédez déjà un compte ?</p>
                    <button class="hidden" id="login">Connectez-Vous</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>PROMUNDUS Propreté</h1>
                    <p>Vous n'avez pas encore de compte ?</p>
                    <button class="hidden" id="register">Inscrivez-vous</button>
                </div>
            </div>
        </div>
    </div>
</section>