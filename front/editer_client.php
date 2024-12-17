<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";
$id_sites_clients = $_POST['id_sites_clients'];
$clientExiste = recupInfosClient($pdo, $id_sites_clients);
?>

<div class="container-fluid">

    <div class="form h-100 feuille-contact mt-5 p-4">
        <h1 class="text-center mb-5 mt-5">Modifier les informations du client</h1>
        <form class="mb-5" method="post" action="../controler/traitement_edit_infosCL.php" enctype="multipart/form-data">
            <?php
            if (isset($_GET['erreur'])) {

                if ($_GET['erreur'] == 'FigurineExiste') {
                    echo '<p class="Error text-center text-danger">Le client existe déja ! </p>';
                }
                if ($_GET['erreur'] == 'erreurUpload') {
                    echo '<p class="Error text-center text-danger">Une erreur est survenu ! </p>';
                }

                if ($_GET['erreur'] == 'fichierInvalide') {
                    echo '<p class="Error text-center text-danger">Le fichier est Invalide ! </p>';
                }

                if ($_GET['erreur'] == 'aucunFichier') {
                    echo '<p class="Error text-center text-danger ">Aucun Fichier na était séléctionner ! </p>';
                }
            }

            ?>
            <div class="row">
                <div class="col-md-6 form-group mb-3">
                    <label for="nomClEdit" class="col-form-label">Nom du client :</label>
                    <input type="text" class="form-control" name="nomClEdit" id="nomClEdit" value="<?php echo $clientExiste['nom_site'] ?>">
                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="adClientEdit" class="col-form-label">Adresse du site :</label>
                    <input type="text" class="form-control" name="adClientEdit" id="adClientEdit" value="<?php echo $clientExiste['adresse_site'] ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group mb-3">
                    <label for="villeClEdit" class="col-form-label">Ville du site</label>
                    <input type="text" class="form-control" name="villeClEdit" id="villeClEdit" value="<?php echo $clientExiste['ville_site'] ?>">
                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="cpClEdit" class="col-form-label">Code Postal :</label>
                    <input type="text" class="form-control" name="cpClEdit" id="cpClEdit" value="<?php echo $clientExiste['cp_site'] ?>">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12 form-group mb-3 d-flex align-items-center justify-content-center">
                    <input type="hidden" name="id_sites_clients" value="<?php echo $clientExiste['id_sites_clients'] ?>">
                    <input type="submit" value="Editer" class="btn btnDesAjouts text-center" name="EditClient">
                    <span class="submitting"></span>
                </div>
            </div>
        </form>
    </div>
</div>