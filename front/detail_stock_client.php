<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";

// echo $recupClient[0]['nom_site'] = tableau double dimention 0 = a la première ligne de la bdd
if (isset($_POST['id_sites_clients'])) {
    $id_sites_clients = $_POST['id_sites_clients'];
    $recupClient = recupInfosStockClient($pdo, $id_sites_clients);
?>
    <div class="row mx-auto d-flex mx-auto BorderCardLivraion mt-5">
        <div class="row mx-auto mt-1 box-descProd-bOffice">
            <div class="col-lg-12 text-center h-100">
                <div class="box-detailtext mt-5 mb-5 mx-auto w-100">
                    <div class="row">
                        <h1 class="mt-5 text-light fs-1">Détails des stocks</h1>
                        <div class="col-lg-6">
                            <h5 class="card-title text-center text-light mt-5">Nom du client :</h5>
                            <p class="card-text text-center text-light"><?php echo $recupClient[0]['nom_site'] ?></p>
                        </div>

                        <div class="col-lg-6">
                            <h5 class="card-title text-center text-light mt-5">adresse du site :</h5>
                            <p class="card-text text-center text-light"><?php echo $recupClient[0]['adresse_site'] ?></p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <h5 class="card-title text-center text-light mt-5">ville site :</h5>
                            <p class="card-text text-center text-light"><?php echo $recupClient[0]['ville_site'] ?></p>
                        </div>

                        <div class="col-lg-6">
                            <h5 class="card-title text-center text-light mt-5">code postal:</h5>
                            <p class="card-text text-center text-light"><?php echo $recupClient[0]['cp_site'] ?></p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 mx-auto mt-5">
                            <select name="categ-figurine" class="form-select" aria-label="Default select example">
                                <option selected>Stock du Client</option>
                                <?php foreach ($recupClient as $client) { ?>
                                    <option value="<?php echo $client['id_produit']; ?>">
                                        <?php echo $client['nom_produit'] . ' (Quantité : ' . $client['stock_client'].')'; ?>
                                    </option>
                                <?php } ?>
                            </select>                     
                        </div>
                        
                    </div>
                    <a href="../public/index.php?page=2" class="btnDesAjouts btn mt-5 mb-5 mx-auto">Retour à la gestion</a>
                </div>
            </div>
        </div>

    </div>
<?php
} else {
    echo 'erreur isset';
}
?>