<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";
require "../controler/GestionBack.php";
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 d-flex align-items-center justify-content-between mt-5">
            <h1>Affichage des Stocks Promundus</h1>
            <button class="btnDesAjouts  text-center p-2"><a class="nav-link text-light" href="../public/index.php?promundus=ajouterProdPmd">Ajouter un article</a></button>
        </div>
    </div>
</div>
<section class="intro mt-5 mb-5">
    <!-- <form method="post" action="../controler/traitement_produits.php"> -->
        <div class="container-fluid">
            <?php

            ?>
            <div class="row">
                <div class="col-12">
                    <div class="card bg-white">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Stock</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach ($produitExiste as $indice=>$produit) {
                                            $indice++;
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $indice; ?></th>
                                                <td><?php echo $produit['nom_produit'] ?></td>
                                                <td><img class="img-fluid img-thumbnail img-prod-BackOffice" src="../public/ressource/img/<?php echo $produit['logo'] ?>" alt="<?php echo $produit['logo'] ?>"></td>
                                                <td><?php echo $produit['stock'] ?></td>
                                                <td class="d-flex align-items-center">

                                                    <form action="../controler/traitement_delete_produits.php" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer ce produit ?');">
                                                        <input type="hidden" name="id_produit" value="<?php echo $produit['id_produit']; ?>">
                                                        <input type="hidden" name="action" value="suprimerProduit">
                                                        <button type="submit" class="btn btnDesAjouts  btn-sm me-1" data-mdb-toggle="tooltip" title="Retirer l'article">
                                                            <i class="bi bi-trash-fill fs-4"></i>
                                                        </button>
                                                    </form>


                                                    <form action="../public/index.php?promundus=editStockPromundus" method="post">
                                                        <input type="hidden" name="id_produit" value="<?php echo $produit['id_produit']; ?>">
                                                        <input type="hidden" name="action" value="Editerproduit">
                                                        <button type="submit" class="btn btnDesAjouts  btn-sm me-1" title="Editer le produit">
                                                            <i class="bi bi-pencil-square fs-4"></i>
                                                        </button>
                                                    </form>

                                                    <form action="../public/index.php?promundus=detailProdPmd" method="post">
                                                        <input type="hidden" name="id_produit" value="<?php echo $produit['id_produit']; ?>">
                                                        <input type="hidden" name="action" value="Afficherproduit">
                                                        <button type="submit" class="btn btnDesAjouts  btn-sm" title="Afficher l'article">
                                                            <i class="bi bi-eye fs-4"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>