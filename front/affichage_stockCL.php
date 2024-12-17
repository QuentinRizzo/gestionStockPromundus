<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";
$produitExiste = recupListeProduitsClient($pdo);
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 d-flex align-items-center justify-content-between mt-5">
            <h1>Affichage des Stocks Clients</h1>
            <!-- <button class="btnDesAjouts  text-center p-2"><a class="nav-link text-light" href="../public/index.php?promundus=ajouterProdPmd">Ajouter un article</a></button> -->
        </div>
    </div>
</div>

<section class="intro mt-5 mb-5">
    <!-- <form method="post" action="../controler/traitement_produits.php"> -->
    <div class="container-fluid">
        <?php
        if (isset($_GET['sucess'])) {

            if ($_GET['sucess'] == 'ok') {
                echo '<p class="text-success text-center">Le produit à été ajouter avec succès ! </p>';
            }
            if ($_GET['sucess'] == 'produitMAj') {
                echo '<p class="text-success text-center">Le stock du produit à été Mis a jour avec succès ! </p>';
            }
        }
        if (isset($_GET['erreur'])) {

            if ($_GET['erreur'] == 'FigurineExiste') {
                echo '<p class="Error text-center text-danger">Le produit existe déja ! </p>';
            }
        }
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
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    foreach ($produitExiste as $indice => $produit) {
                                        $indice++;
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $indice; ?></th>
                                            <td><?php echo $produit['nom_site'] ?></td>
                                            <td class="d-flex align-items-center">
                                                <!-- <form action="../controler/traitement_delete_produits.php" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer ce produit ?');">
                                                    <input type="hidden" name="id_sites_clients" value="<?php echo $produit['id_sites_clients']; ?>">
                                                    <input type="hidden" name="action" value="suprimerClient">
                                                    <button type="submit" class="btn btnDesAjouts  btn-sm me-1" data-mdb-toggle="tooltip" title="Retirer l'article">
                                                        <i class="bi bi-trash-fill fs-4"></i>
                                                    </button>
                                                </form> -->

                                                <form action="../public/index.php?promundus=editerClientPromundus" method="post">
                                                    <input type="hidden" name="id_sites_clients" value="<?php echo $produit['id_sites_clients']; ?>">
                                                    <input type="hidden" name="action" value="EditerClient">
                                                    <button type="submit" class="btn btnDesAjouts  btn-sm me-1" title="Editer le Client">
                                                        <i class="bi bi-pencil-square fs-4"></i>
                                                    </button>
                                                </form>

                                                <form action="../public/index.php?promundus=afficherClientPromundus" method="post">
                                                    <input type="hidden" name="id_sites_clients" value="<?php echo $produit['id_sites_clients']; ?>">
                                                    <input type="hidden" name="action" value="Afficherproduit">
                                                    <button type="submit" class="btn btnDesAjouts  btn-sm" title="Afficher le Client">
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

