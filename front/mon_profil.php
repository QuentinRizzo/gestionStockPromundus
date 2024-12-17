<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";
$user = recupInfosUsers($pdo, $_SESSION['idUser']);
$departements = recupDepartement($pdo);
?>

<div class="col py-3">
    <div class="container mt-5">
        <?php
        if (isset($_GET['sucess'])) {

            if ($_GET['sucess'] == 'InformationModifier') {
                echo '<p class="text-success text-center">Les informations on été mis à jour avec succès ! </p>';
            }
        }
        if (isset($_GET['erreur'])) {

            if ($_GET['erreur'] == 'ModifInfoErreur') {
                echo '<p class="Error text-center text-danger">Une erreur c\'est produit lors de la modification des informations ! </p>';
            }
        }
        ?>
        <div class="form h-100 feuille-contact" id="feuilleContact">
            <h3 class="text-center mb-5 mt-5">Mes informations personnelles</h3>
            <form action="../controler/modif_infos_profil.php" class="mb-3" method="post" id="contactForm" name="contactForm">
                <div class="row">
                    <div class="col-md-6 form-group mb-2">
                        <label for="name" class="col-form-label">Nom :</label>
                        <input type="text" class="form-control" name="nameProfil" id="name" value="<?php echo $user['nom'] ?>">
                    </div>

                    <div class="col-md-6 form-group mb-2">
                        <label for="prenom" class="col-form-label">Prénom :</label>
                        <input type="text" class="form-control" name="prenomProfil" id="prenom" value="<?php echo $user['prenom'] ?>">
                    </div>

                    <div class="col-md-6 form-group mb-2">
                        <label for="mail" class="col-form-label">Email :</label>
                        <input type="text" class="form-control" name="mailProfil" id="mail" value="<?php echo $user['mail'] ?>">
                    </div>

                    <div class="col-md-6 form-group mb-2">
                        <label for="tel" class="col-form-label">Tel:</label>
                        <input type="text" class="form-control" name="telProfil" id="tel" value="<?php echo $user['tel'] ?>">
                    </div>

                    <div class="col-md-12 form-group mb-2">
                        <label for="adresse" class="col-form-label">Adresse :</label>
                        <input type="text" class="form-control" name="adresseProfil" id="adresse" value="<?php echo $user['adresse'] ?>">
                    </div>

                    <div class="col-md-6 form-group mb-2">
                        <label for="departement">Departement :</label>
                        <select name="departement" id="departement" class="form-select" aria-label="Default select example">
                            <option value=""><?php echo $user['nom_departement'] ?></option>
                            <?php foreach ($departements as $dept) { ?>
                                <option value="<?php echo htmlspecialchars($dept['id_departement'], ENT_QUOTES, 'UTF-8') ?>"><?php echo htmlspecialchars($dept['nom_departement'], ENT_QUOTES, 'UTF-8') ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-6 form-group mb-2">
                        <label for="ville">Ville :</label>
                        <select class="form-select" name="ville" id="ville">
                            <option value=""><?php echo $user['nom_ville'] ?></option>
                        </select>
                    </div>

                    <div class="col-md-12 me-5 mt-3 form-group d-flex justify-content-end">
                        <input type="submit" value="Enregistrer" class="btnDesAjouts mx-auto p-2">
                        <span class="submitting"></span>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-md-12 me-5 form-group d-flex justify-content-end">
                    <a href="#" class="nav-link mx-auto text-light" id="modifierMdp">Modifier mon mot de passe</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" id="form-mdp" style="display: none;">
    <div class="col-md-6 feuille-contact w-100 mx-auto">
        <h3 class="text-center mb-5 mt-2">Modification du Mot de passe</h3>
        <form class="mb-2" method="post" action="../controler/traitement_modif_mdp.php">
            <div class="row d-flex flex-column">

                <div class="col-md-6 form-group mb-2 mx-auto">
                    <label for="modifPasswordActuel" class="col-form-label">Mot de passe Actuel :</label>
                    <div class="input-group mdpforjs">
                        <input class="afficher form-control" type="password" name="mdpActuel" id="modifPasswordActuel" placeholder="Mot de passe" autocomplete="new-password">
                    </div>
                </div>


                <div class="col-md-6 form-group mb-2 mx-auto">
                    <label for="ChangeMdp" class="col-form-label">Mot de passe :</label>
                    <div class="input-group mdpforjs">
                        <input class="afficher form-control" type="password" name="nouvMdp" id="modifNouvPassword" placeholder="Mot de passe" autocomplete="new-password">
                    </div>
                </div>

                <div class="col-md-6 form-group mb-2 mx-auto">
                    <label for="confirmChangeMdp" class="col-form-label">Confirmer le mot de passe :</label>
                    <div class="input-group mdpforjs">
                        <input class="afficher form-control" type="password" name="nouvMdpConfirm" id="modifConfirmNouvPassword" placeholder="Confirmer le mot de passe" autocomplete="new-password">
                    </div>
                </div>
            </div>

            <div class="d-grid mt-2">
                <div class="d-flex align-items-center flex-column">
                    <input name="idUser" type="hidden" value="<?php echo $user['id_user'] ?>">
                    <input type="submit" id="submit" name="ValiderModifMdp" class="btn btnDesAjouts mt-2" value="Enregistrer">
                </div>
            </div>
        </form>
        <div class="row">
                <div class="col-md-12 me-5 form-group d-flex justify-content-end">
                    <a href="#" class="nav-link mx-auto btn btnDesAjouts p-2" id="afficherMonProfil">Afficher mon Profil</a>
                </div>
            </div>
    </div>
</div>