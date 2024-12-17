<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";
require "../controler/pagination.php";
require "../controler/GestionBack.php";
?>


<h2 class="Title-h2 fs-1 text-dark mt-5">Notre stock actuelle</h2>
<div class="row m-0">
    <div class="col-lg-12 mb-2 d-flex">
        <div class="d-block mx-4" id="recherchenom">
            <input class="inpRecherche text-center form-control" type="search" name="searchBar" id="input_rechercher" placeholder="Rechercher...">
        </div>
    </div>
</div>
<div class="container">
    <!-- ligne Card 1 -->
    <div class="row mx-auto">
        <div class="container py-5">
            <div class="row" id="AffichageProdFiltrees">
                <?php foreach ($produits as $produit) : ?>
                    <div class="col-md-4 mb-4">
                        <div class="card BorderCardLivraion">
                            <div class="d-flex justify-content-between p-3">
                                <p class="lead mb-0">Stock Restant :</p>
                                <div class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong" style="width: 35px; height: 35px;">
                                    <?php if ($produit['stock'] < 1) { ?>
                                        <p class="text-danger mb-0 small"><?php echo $produit['stock'] ?></p>
                                    <?php } else { ?>
                                        <p class="text-white mb-0 small"><?php echo $produit['stock'] ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <hr>
                            <img src="../public/ressource/img/<?php echo $produit['logo'] ?>" class="card-img-top" alt="../public/ressource/img/<?php echo $produit['logo'] ?>" />
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0"><?php echo htmlspecialchars($produit['nom_produit'], ENT_QUOTES, 'UTF-8') ?></h5>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="small"><?php echo htmlspecialchars($produit['description'], ENT_QUOTES, 'UTF-8') ?></p>
                                </div>
                                <hr>
                                <form action="../controler/traitement_panier.php" method="post" class="d-flex justify-content-between">
                                    <?php if ($produit['stock'] < 1) { ?>
                                        <p class="text-danger text-center mb-0 small fs-4 mx-auto">En rupture de stocks</p>
                                    <?php } else { ?>
                                        <select name="id_site_client" class="form-select me-2" aria-label="Default select example">
                                            <option value="">Choisissez le client à livrer</option>
                                            <?php foreach ($recupClient as $client) { ?>
                                                <option value="<?php echo $client['id_sites_clients'] ?>"><?php echo $client['nom_site'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" name="idProd" value="<?php echo htmlspecialchars($produit['id_produit'], ENT_QUOTES, 'UTF-8') ?>">
                                        <input type="hidden" name="action" value="ajoutProd">
                                        <input class="btn btnDesAjouts mx-auto" type="submit" value="Ajouter à la livraison">
                                    <?php } ?>

                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- // fin foreach -->

        <!-- Début de la pagination -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-center justify-content-center" id="pagination">
                <?php for ($i = 1; $i <= $nbPages; $i++) {
                    echo '<a class="text-decoration-none icon-card mt-5 text-dark mx-2 fs-5" href="index.php?promundus=nosProduitsPromundus&num_page=' . $i . '">' . $i . '</a>';
                } ?>
            </div>
        </div>
        <!-- Fin de la pagination -->
    </div>
</div>