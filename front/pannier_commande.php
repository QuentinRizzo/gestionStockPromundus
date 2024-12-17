<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";
require "../controler/GestionBack.php";

if (isset($_SESSION['idCommande'])) {
?>

    <div class="container mt-5">
        <div class="row justify-content-center ">
            <div class="col-md-8 ">
                <div class="card BorderCardLivraion">
                    <?php if (isset($_GET['sucess']) && $_GET['sucess'] == 'suprimerProdPan') { ?>
                        <p class="alert alert-success text-center mt-3">Le produit a été supprimé avec succès ! </p>
                    <?php } ?>

                    <div class="card-header ">
                        <h5 class="text-center">Votre Commande</h5>
                    </div>

                    <div class="card-body">
                        <?php foreach ($produitPanier as $produit) { ?>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <img src="../public/ressource/img/<?php echo $produit['logo'] ?>" alt="<?php echo $produit['nom_produit'] ?>" class="img-fluid card-img-top">
                                </div>

                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="nom_produit">Nom du produit</label>
                                        <h6><?php echo htmlspecialchars($produit['nom_produit'], ENT_QUOTES, 'UTF-8') ?></h6>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <p><?php echo htmlspecialchars($produit['description'], ENT_QUOTES, 'UTF-8') ?></p>
                                    </div>
                                    <div class="form-group">
                                        <div class="text-center d-flex align-items-center justify-content-between">
                                            <a href="../controler/traitement_panier.php?action=supprimerProd&idProd=<?php echo htmlspecialchars($produit['id_produit'], ENT_QUOTES, 'UTF-8') ?>" class="btn btnDesAjouts btn-sm"><i class="bi bi-trash-fill"></i> Retirer l'article</a>
                                            <label class="me-3" for="quantite">Quantité</label>
                                        </div>
                                        <div class="d-flex justify-content-end align-items-end">
                                            <div>
                                                <input type="hidden" value="<?php echo htmlspecialchars($produit['id_produit'], ENT_QUOTES, 'UTF-8') ?>" id="id_produit">
                                                <button id="moinsArticles" class="btn btnDesAjouts btn-sm afficher"><i class="bi bi-patch-minus"></i></button>
                                                <span id="resultatQte" class="mx-2"><?php echo htmlspecialchars($produit['qte_com'], ENT_QUOTES, 'UTF-8') ?></span>
                                                <button id="plusArticles" class="btn btnDesAjouts btn-sm"><i class="bi bi-patch-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        <?php } ?>

                        <form action="../controler/traitement_panier.php" method="post" class="text-center">
                            <input type="hidden" name="idProd" value="<?php echo htmlspecialchars($produit['id_produit'], ENT_QUOTES, 'UTF-8') ?>">
                            <input type="hidden" name="id_site_client" value="<?php echo htmlspecialchars($produit['id_sites_clients'], ENT_QUOTES, 'UTF-8') ?>">
                            <input type="hidden" name="action" value="payerPan">
                            <button type="submit" class="btn btnDesAjouts">Commander</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } else {
    echo '<p class="alert alert-danger text-center">Vous N\'avez passez aucunes commandes</p>';
} ?>