<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";
$userExiste = utilisateurConnecter($pdo, $_SESSION['idUser']);
if ($_SESSION['idRoleUser'] == 1) {
?>
    <!-- Vue Super Administrateur -->
    <div class="container">
        <div class="container-fluid">
            <section id="minimal-statistics">
                <div class="row mb-5 mt-5">
                    <div class="col-12 card cardTitle-accueil">
                        <h4 class="text-uppercase fs-1 text-center mt-5">Bienvenue <span class="spanName"><?php echo $userExiste['nom'] . ' ' . $userExiste['prenom'] ?></span></h4>
                        <p class="text-uppercase fs-2 text-center">Voici les statistique Global</p>
                    </div>
                </div>

                <div class="row mt-5 mb-5 bg">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card card-accueil">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="icon-pencil primary font-large-2 float-left"></i>
                                        </div>
                                        <div class="media-body text-right">
                                            <h3>3</h3>
                                            <span>Client Enregistrer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card card-accueil">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="icon-speech warning font-large-2 float-left"></i>
                                        </div>
                                        <div class="media-body text-right">
                                            <h3>10</h3>
                                            <span>Produits Disponible</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card card-accueil">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="icon-graph success font-large-2 float-left"></i>
                                        </div>
                                        <div class="media-body text-right">
                                            <h3>5</h3>
                                            <span>Nombre de Produits Vendu</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card card-accueil">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="icon-pointer danger font-large-2 float-left"></i>
                                        </div>
                                        <div class="media-body text-right">
                                            <h3>500</h3>
                                            <span>Nombre de Produit en Stock</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row row mt-5 mb-5">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card card-accueil">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="danger">3</h3>
                                            <span>Produit en Rupture de stock</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-rocket danger font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card card-accueil">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="success">1</h3>
                                            <span>Client enregistré</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-user success font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card card-accueil">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="warning">2</h3>
                                            <span>Total des Factures Enregistré</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-pie-chart warning font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card card-accueil">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="primary">30</h3>
                                            <span>Total des Message Reçu</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-support primary font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5 mb-5">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card card-accueil">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="primary">20</h3>
                                            <span>Total des Paniers Créer</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-book-open primary font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card card-accueil">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="warning">10</h3>
                                            <span>Total des Traçabilité créer</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-bubbles warning font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ================================================================================================================ -->

            <!-- Vue Administrateur -->
        <?php } elseif ($_SESSION['idRoleUser'] == 2) { ?>

            <div class="container-fluid">
                <div class="row mb-5 mt-5">
                    <div class="col-12 mt-3 mb-1 card card-accueil">
                        <h4 class="text-uppercase fs-1 text-center">Bonjour <span class="spanName"><?php echo $userExiste['nom'] . ' ' . $userExiste['prenom'] ?></span></h4>
                        <p class="text-uppercase fs-2 text-center">Bienvenue sur Promundus Propreté</p>
                    </div>
                </div>
            </div>

            <div class="container-fluid d-flex align-items-center justify-content-around card-linkBox">
                <div class="card card-link">
                    <div class="col-lg-12 d-flex flex-column">
                        <div class="row d-flex align-items-center justify-content-center mb-3">
                            <span class="spanLinkCard"><i class="bi bi-person-fill text-light text-center fs-1 icon-CardLink w-100"></i></span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-text text-center text-light">Stock Promundus</h3>
                            <a href="#" class="btn Btn-CardAdmin">Consulter</a>
                        </div>
                    </div>
                </div>

                <div class="card card-link mx-2">
                    <div class="col-lg-12 d-flex flex-column">
                        <div class="row d-flex align-items-center justify-content-center mb-3">
                            <span class="spanLinkCard"><i class="bi bi-file-text text-light text-center fs-1 icon-CardLink w-100"></i></span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-text text-center text-light">Stocks Des Clients</h3>
                            <a href="#" class="btn Btn-CardAdmin">Consulter</a>
                        </div>
                    </div>
                </div>

                <div class="card card-link">
                    <div class="col-lg-12 d-flex flex-column">
                        <div class="row d-flex align-items-center justify-content-center mb-3">
                            <span class="spanLinkCard"><i class="bi bi-journal-text text-light text-center fs-1 icon-CardLink w-100"></i></span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-text text-center text-light">Livraison de stock</h3>
                            <button class="btn Btn-CardAdmin" data-bs-toggle="modal" data-bs-target="#LivraisonStockClients">Je Livre</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ================================================================================================================ -->

            <!-- Vue Employers -->
        <?php } elseif ($_SESSION['idRoleUser'] == 3) { ?>

            <div class="container-fluid">
                <div class="row mb-5 mt-5">
                    <div class="col-12 mt-3 mb-1 card card-accueil">
                        <h4 class="text-uppercase fs-1 text-center">Bonjour <span class="spanName"><?php echo $userExiste['nom'] . ' ' . $userExiste['prenom'] ?></span></h4>
                        <p class="text-uppercase fs-2 text-center">Bienvenue sur Promundus Propreté</p>
                    </div>
                </div>
            </div>

            <div class="container-fluid d-flex align-items-center justify-content-around card-linkBox">
                <div class="card card-link mx-2">
                    <div class="col-lg-12 d-flex flex-column">
                        <div class="row d-flex align-items-center justify-content-center mb-3">
                            <span class="spanLinkCard"><i class="bi bi-file-text text-light text-center fs-1 icon-CardLink w-100"></i></span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-text text-center text-light">Commander Stock</h3>
                            <button class="btn Btn-Card" data-bs-toggle="modal" data-bs-target="#ModalCommandeStock">Commander</button>
                        </div>
                    </div>
                </div>
                <div class="card card-link">
                    <div class="col-lg-12 d-flex flex-column">
                        <div class="row d-flex align-items-center justify-content-center mb-3">
                            <span class="spanLinkCard"><i class="bi bi-person-fill text-light text-center fs-1 icon-CardLink w-100"></i></span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-text text-center text-light">Mon Profil</h3>
                            <a href="#" class="btn Btn-Card">Consulter</a>
                        </div>
                    </div>
                </div>
            </div>
           


            <!-- ================================================================================================================ -->

            <!-- Vue Client -->
        <?php } elseif ($_SESSION['idRoleUser'] == 4) { ?>
            <div class="container-fluid">
                <div class="row mb-5 mt-5">
                    <div class="col-12 mt-3 mb-1 card card-accueil">
                        <h4 class="text-uppercase fs-1 text-center">Bonjour <span class="spanName"><?php echo $userExiste['nom'] . ' ' . $userExiste['prenom'] ?></span></h4>
                        <p class="text-uppercase fs-2 text-center">Bienvenue sur Promundus Propreté</p>
                    </div>
                </div>
            </div>

            <div class="container-fluid d-flex align-items-center justify-content-around card-linkBox">
                <div class="card card-link">
                    <div class="col-lg-12 d-flex flex-column">
                        <div class="row d-flex align-items-center justify-content-center mb-3">
                            <span class="spanLinkCard"><i class="bi bi-person-fill text-light text-center fs-1 icon-CardLink w-100"></i></span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-text text-center text-light">Mon Profil</h3>
                            <a href="#" class="btn Btn-Card">Consulter</a>
                        </div>
                    </div>
                </div>

                <div class="card card-link mx-2">
                    <div class="col-lg-12 d-flex flex-column">
                        <div class="row d-flex align-items-center justify-content-center mb-3">
                            <span class="spanLinkCard"><i class="bi bi-file-text text-light text-center fs-1 icon-CardLink w-100"></i></span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-text text-center text-light">Mes Factures</h3>
                            <a href="#" class="btn Btn-Card">Consulter</a>
                        </div>
                    </div>
                </div>

                <div class="card card-link">
                    <div class="col-lg-12 d-flex flex-column">
                        <div class="row d-flex align-items-center justify-content-center mb-3">
                            <span class="spanLinkCard"><i class="bi bi-journal-text text-light text-center fs-1 icon-CardLink w-100"></i></span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-text text-center text-light">Mes Devis</h3>
                            <a href="#" class="btn Btn-Card">Consulter</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>