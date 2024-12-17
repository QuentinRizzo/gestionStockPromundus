<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";
?>
<div class="container-fluid">

    <div class="form h-100 feuille-contact mt-5 p-4">
        <h1 class="text-center mb-5 mt-5">Recepetion Livraison</h1>
        <form class="mb-5" method="post" action="../controler/traitement_ajout_produits.php" enctype="multipart/form-data">
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
                    <label for="nomProdAjoutPmd" class="col-form-label">Nom du produit :</label>
                    <input type="text" class="form-control" name="nomProdAjoutPmd" id="nomProdAjoutPmd" placeholder="Nom du produit">
                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="prixUniteAjoutPmd" class="col-form-label">Prix Unité</label>
                    <input type="text" class="form-control" name="prixUniteAjoutPmd" id="prixUniteAjoutPmd" placeholder="Prix Unité">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group mb-3">
                    <label for="quantiteProdAjoutPmd" class="col-form-label">Quantité :</label>
                    <input type="text" class="form-control" name="quantiteProdAjoutPmd" id="quantiteProdAjoutPmd" placeholder="Prix Unité">
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="quantiteProdAjoutPmd" class="col-form-label">Prix Fournisseur :</label>
                    <input type="text" class="form-control" name="prixFournisseurAjoutPmd" id="quantiteProdAjoutPmd" placeholder="Prix Unité">
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="quantiteProdAjoutPmd" class="col-form-label">Nom Fournisseur :</label>
                    <input type="text" class="form-control" name="nomFournisseurAjoutPmd" id="quantiteProdAjoutPmd" placeholder="Prix Unité">
                </div>
                <div class="col-md-6 form-froup mb-3">
                    <label for="dateLivraisonAjoutPmd" class="col-form-label">Date de Livraison :</label>
                    <input class="form-control" type="date">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" name="descProdAjoutPmd" id="exampleFormControlTextarea1" rows="3" placeholder="Description de l'article"></textarea>
                </div>

                <div class="col-md-12 form-group mb-3">
                    <label for="Inp-ajt-Produit" class="col-form-label">Ajouter Image :</label>
                    <input aria-colspan="Inp-ajt-Produit" type="file" class="form-control" name="logo" id="inputFile">
                </div>

            </div>

            <div class="row mt-2">
                <div class="col-md-12 form-group mb-3 d-flex align-items-center justify-content-center">
                        <input type="submit" value="Ajouter" class="btn btnDesAjouts text-center" name="AjoutProdPme">
                        <span class="submitting"></span>
                </div>
            </div>

        </form>
    </div>
</div>