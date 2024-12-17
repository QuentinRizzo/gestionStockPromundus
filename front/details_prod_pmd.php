<?php 
require "../model/connexion_bdd.php";
require "../model/fonctions.php";
$id_produit = $_POST['id_produit'];
$produit = recupInfosProduits($pdo, $id_produit);
?>
    <div class="container my-5 mt-5 mx-auto CardDesc">
        <div class="row">
            <div class="col-md-5">
                <div class="main-img">
                    <img src="../public/ressource/img/<?php echo $produit['logo'] ?>" alt="../public/ressource/img/<?php echo $produit['logo'] ?>" class="img-fluid">
                </div>
            </div>
            <div class="col-md-7">
                <div class="main-description px-2">
                    <div class="product-title text-bold my-3">
                        <span><?php echo $produit['nom_produit'] ?></span>
                    </div>
                    <div class="price-area my-4">
                        <?php if($produit['stock'] < 1){ ?>
                                <p class="old-price mb-1">Stock Actuel :<span class="old-price-discount text-danger fs-2"> En Rupture de Stock</span></p>
                        <?php }else{ ?>
                                    <p class="old-price mb-1 fs-2">Stock Actuel :<span class="old-price-discount text-success"> <?php echo $produit['stock'] ?></span></p>
                            <?php } ?>
                        <p class="new-price text-bold mb-1">Prix Unité :</p>
                        <p class="text-secondary mb-1"><?php echo $produit['prix_unite'] ?> €</p>
                    </div>

                <div class="product-details my-4">
                    <p class="details-title text-color mb-1">Description du Produit :</p>
                    <p class="description"><?php echo $produit['description'] ?></p>
                </div>
            </div>
            <form action="../public/index.php?promundus=stockPromundus" method="post">
                <input class="btn btnDesAjouts" type="submit" value="Retourner a la gestion">
            </form>
        </div>
    </div>

 </div>

