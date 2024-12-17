<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";

$traceProd = recupTraceProdPmd($pdo);

?>
<div class="container-fluid">
    <div class="form h-100 feuille-contact mt-5 p-4">
        <h1 class="text-center mb-5 mt-5">Traçabilité des Produit</h1>
        <form class="mb-5" method="post" action="../controler/traitement_generer_tracabiliter.php">

            <div class="row">
                
                <div class="col-md-6 form-group mb-3">
                    <label for="traceDateDebut" class="col-form-label">Date Début :</label>
                    <input type="date" class="form-control" name="traceDateDebut" id="traceDateDebut">
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="traceDateFin" class="col-form-label">Date Fin :</label>
                    <input type="date" class="form-control" name="traceDateFin" id="traceDateFin">
                </div>

            </div>

            <div class="row mt-2">
                <div class="col-md-12 form-group mb-3 d-flex align-items-center justify-content-center">
                    <input type="submit" value="Generer Pdf" class="btn btnDesAjouts text-center" name="AjoutProdPme">
                    <span class="submitting"></span>
                </div>
            </div>
        </form>
    </div>
</div>