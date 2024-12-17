<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";

$departements = recupDepartement($pdo);

?>
<div class="container mt-5">
    <div class="row mx-auto">
        <div class="form h-100 feuille-contact">
            <h3 class="text-center mb-5 mt-5">Créer L'utilisateur</h3>
            <form class="mt-2" method="post" action="../controler/traitement_ajout_user.php">

                <!-- Début Inscription PhP -->
                <?php
                if (isset($_GET['erreur'])) {

                    if ($_GET['erreur'] == 'emailExiste') {
                        echo '<p class="Error">Cette email existe déja </p>';
                    }
                    if ($_GET['erreur'] == 'mdpConfirm') {
                        echo '<p class="Error">Les deux mot de passe ne conrespondent pas </p>';
                    }
                }
                ?>

                <!-- Fin Inscription Connexion PhP -->

                <div class="row">
                    <div class="col-md-6 form-group mb-3">
                        <label for="nom" class="col-form-label">Nom :</label>
                        <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom">
                    </div>
                    <div class="col-md-6 form-group mb-3">
                        <label for="prenom" class="col-form-label">Prénom :</label>
                        <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group mb-3">
                        <label for="email" class="col-form-label">Email :</label>
                        <input type="email" class="form-control" name="mail" id="email" placeholder="Email">
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 form-group mb-3">
                        <label for="departement" class="col-form-label">Departement :</label>
                        <select name="departement" id="departement" class="form-select" aria-label="Default select example">
                            <option value="">choix du département</option>
                            <?php foreach ($departements as $dept) { ?>
                                <option value="<?php echo htmlspecialchars($dept['id_departement'], ENT_QUOTES, 'UTF-8') ?>"><?php echo htmlspecialchars($dept['nom_departement'], ENT_QUOTES, 'UTF-8') ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <label for="ville" class="col-form-label">Ville :</label>
                        <select class="form-select" name="ville" id="ville">
                            <option value="">Choix de vôtre ville</option>
                        </select>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 form-group mb-3">
                        <label for="adresse" class="col-form-label">Adresse :</label>
                        <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Adresse">
                    </div>
                    <div class="col-md-6 form-group mb-3">
                        <label for="telephone" class="col-form-label">Numéro de téléphone :</label>
                        <input type="tel" class="form-control" name="tel" id="telephone" placeholder="Numéro de téléphone">
                    </div>
                </div>

                <div class="row">
                    <input type="submit" value="Créer l'utilisateur" class="btn btnDesAjouts mx-auto mt-2" style="width: 20%;">
                    <span class="submitting"></span>
                </div>
            </form>
        </div>
    </div>
</div>