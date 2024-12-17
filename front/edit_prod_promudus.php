<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";
$id_produit = $_POST['id_produit'];
$produitExiste = recupProduitforEdit($pdo, $id_produit);
?>
<div class="container-fluid">

    <div class="form h-100 feuille-contact mt-5 p-4">
        <h1 class="text-center mb-5 mt-5">Modifier l'article</h1>
        <form class="mb-5" method="post" action="../controler/traitement_edit_produits.php" enctype="multipart/form-data">
            <?php
            if (isset($_GET['erreur'])) {

                if ($_GET['erreur'] == 'FigurineExiste') {
                    echo '<p class="Error text-center text-danger">Le produit existe déja ! </p>';
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
                    <label for="nomProdEditPmd" class="col-form-label">Nom du produit :</label>
                    <input type="text" class="form-control" name="nomProdEditPmd" id="nomProdEditPmd" value="<?php echo $produitExiste['nom_produit'] ?>">
                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="prixUniteEditPmd" class="col-form-label">Prix Unité</label>
                    <input type="text" class="form-control" name="prixUniteEditPmd" id="prixUniteEditPmd" value="<?php echo $produitExiste['prix_unite'] ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 form-group mb-3">
                    <label for="quantiteProdEditPmd" class="col-form-label">Stock :</label>
                    <input type="text" class="form-control" name="quantiteProdEditPmd" id="quantiteProdEditPmd" value="<?php echo $produitExiste['stock'] ?>">
                </div>
                <div class="col-md-12 form-group mb-3">
                    <label for="nomImgEdit" class="col-form-label">image actuel :</label>
                    <input type="text" class="form-control" name="nomImgEdit" id="nomImgEdit" value="<?php echo $produitExiste['logo'] ?>" readonly>
                    <img class="img-fluid img-prod-BackOffice mt-2" src="../public/ressource/img/<?php echo $produitExiste['logo'] ?>" alt="<?php echo $produitExiste['logo'] ?>">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" name="descProdEditPmd" id="exampleFormControlTextarea1" rows="3"><?php echo $produitExiste['description'] ?></textarea>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12 form-group mb-3 d-flex align-items-center justify-content-center">
                    <input type="hidden" name="id_produit" value="<?php echo $produitExiste['id_produit'] ?>">
                    <input type="submit" value="Editer" class="btn btnDesAjouts text-center" name="EditProdPme">
                    <span class="submitting"></span>
                </div>
            </div>
        </form>
    </div>
</div>