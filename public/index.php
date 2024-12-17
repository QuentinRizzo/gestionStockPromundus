<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Société de néttoyage situé sur Metz">
    <title>Promundus Propreté</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../public/ressource/css/style.css">
</head>

<body>
    <?php
    session_start();
    include "../front/header.php";
    
    ?>

    <?php if (isset($_SESSION['idUser'])) { ?>
        <?php if ($_SESSION['idRoleUser'] == 1 || $_SESSION['idRoleUser'] == 2 || $_SESSION['idRoleUser'] == 3 || $_SESSION['idRoleUser'] == 4) { ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-xl-2 px-sm-2 px-0 couleur-side-nav">
                        <nav class="navbar navbar-expand-sm navbar-dark couleur-side-nav">
                            <button class="navbar-toggler btnBurger" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse bgSideMobile" id="sidebarCollapse">
                                <div class="d-flex flex-column align-items-start text-white min-vh-100 supvhmobile-side">
                                    <ul class="nav flex-column mb-sm-auto mb-0 align-items-stretch text-center" id="assiette">
                                        <li class="nav-item">
                                            <a href="../public/index.php?promundus=accueilPromundus" class="nav-link d-flex align-items-center">
                                                <i class="bi bi-house-door fs-2 text-light me-2"></i><span class="text-light nav-link-side">Accueil</span>
                                            </a>
                                        </li>
                                    <?php } ?>

                                    <?php if ($_SESSION['idRoleUser'] == 1 || $_SESSION['idRoleUser'] == 2  || $_SESSION['idRoleUser'] == 3) { ?>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center collapsed" data-bs-toggle="collapse" href="#commandesCollapse" aria-expanded="false">
                                                <i class="bi bi-box fs-2 text-light me-2"></i><span class="text-light d-inline-block nav-link-side">Les Commandes</span>
                                                <i class="bi bi-caret-down-fill text-light"></i> <!-- Icône de flèche vers le bas -->
                                            </a>
                                            <div class="collapse" id="commandesCollapse">
                                                <ul class="nav flex-column sub-menu">
                                                    <li class="nav-item">
                                                        <a href="../public/index.php?promundus=pannierCommandePromundus" class="nav-link text-light">
                                                            <i class="bi bi-cart fs-5 me-2 text-light"></i> <!-- Icône pour "Passer Commande" -->
                                                            Pannier Commande
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="../public/index.php?promundus=nosProduitsPromundus" class="nav-link text-light">
                                                            <i class="bi bi-list-check fs-5 me-2 text-light"></i> <!-- Icône pour "Mes Commandes" -->
                                                            Nos Produits
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    <?php } ?>

                                    <?php if ($_SESSION['idRoleUser'] == 1 || $_SESSION['idRoleUser'] == 2) { ?>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center collapsed" data-bs-toggle="collapse" href="#stocksCollapse" aria-expanded="false">
                                                <i class="bi bi-card-list fs-2 text-light me-2"></i><span class="text-light nav-link-side">Stocks</span>
                                                <i class="bi bi-caret-down-fill text-light mx-2"></i> <!-- Icone de flèche vers le bas -->
                                            </a>
                                            <div class="collapse" id="stocksCollapse">
                                                <ul class="nav flex-column sub-menu">
                                                    <li class="nav-item">
                                                        <a href="../public/index.php?promundus=traceProdPromundus" class="nav-link text-light">Traçabilité des Produits</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="../public/index.php?promundus=stockPromundus" class="nav-link text-light">Stocks Promundus</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="../public/index.php?promundus=stockClientPromundus" class="nav-link text-light">Stocks Clients</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center collapsed" data-bs-toggle="collapse" href="#documentsCollapse" aria-expanded="false">
                                                <i class="bi bi-file-text fs-2 text-light me-2"></i><span class="text-light nav-link-side">Documents</span>
                                                <i class="bi bi-caret-down-fill text-light mx-2"></i> Icone de flèche vers le bas -->
                                        <!-- </a>
                                            <div class="collapse" id="documentsCollapse">
                                                <ul class="nav flex-column sub-menu">
                                                    <li class="nav-item">
                                                        <a href="../public/index.php?promundus=contratsPromundus" class="nav-link text-light">Les Contrats</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="../public/index.php?promundus=devisPromundus" class="nav-link text-light">Les Devis</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="../public/index.php?promundus=facturesPromundus" class="nav-link text-light">Les Factures</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li> -->
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center collapsed" data-bs-toggle="collapse" href="#messagesCollapse" aria-expanded="false">
                                                <i class="bi bi-envelope fs-2 text-light me-2"></i><span class="text-light nav-link-side">Messages</span>
                                                <i class="bi bi-caret-down-fill text-light mx-2"></i> <!-- Icone de flèche vers le bas -->
                                            </a>
                                            <div class="collapse" id="messagesCollapse">
                                                <ul class="nav flex-column sub-menu">
                                                    <li class="nav-item">
                                                        <a href="../public/index.php?promundus=MessagesRecuPromundus" class="nav-link text-light">Messages Reçus</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="../public/index.php?promundus=MessagesArchiverPromundus" class="nav-link text-light">Messages Archivés</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="../public/index.php?promundus=MessagesReponduPromundus" class="nav-link text-light">Messages Répondu</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="../public/index.php?promundus=MessagesSupprimerPromundus" class="nav-link text-light">Messages Supprimés</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center collapsed" data-bs-toggle="collapse" href="#statutCommandesCollapse" aria-expanded="false">
                                                <i class="bi bi-card-list fs-2 text-light me-2"></i><span class="text-light nav-link-side">Statut Commandes</span>
                                                <i class="bi bi-caret-down-fill text-light mx-2"></i> <!-- Icone de flèche vers le bas -->
                                            </a>
                                            <div class="collapse" id="statutCommandesCollapse">
                                                <ul class="nav flex-column sub-menu">
                                                    <li class="nav-item">
                                                        <a href="../public/index.php?promundus=CommandesEnAttente" class="nav-link text-light">Commandes En Attente</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="../public/index.php?promundus=commandesAccepterPromundus" class="nav-link text-light">Commandes Accepter</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="nav-item">
                                            <a href="../public/index.php?promundus=affichageUtilisateur" class="nav-link d-flex align-items-center">
                                                <i class="bi bi-person fs-2 text-light me-2"></i><span class="text-light d-inline-block nav-link-side">Les Utilisateurs</span>
                                            </a>
                                        </li>
                                    <?php } ?>

                                    <?php if ($_SESSION['idRoleUser'] == 4) { ?>
                                        <li class="nav-item">
                                            <a href="../public/index.php?promundus=mesFacturesPromundus" class="nav-link d-flex align-items-center">
                                                <i class="bi bi-file-text fs-2 text-light me-2"></i><span class="text-light d-inline-block nav-link-side">Mes Factures</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../public/index.php?promundus=mesContratsPromundus" class="nav-link d-flex align-items-center">
                                                <i class="bi bi-file-text fs-2 text-light me-2"></i><span class="text-light d-inline-block nav-link-side">Mes Contrats</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../public/index.php?promundus=mesDevisPromundus" class="nav-link d-flex align-items-center">
                                                <i class="bi bi-journal-text fs-2 text-light me-2"></i><span class="text-light d-inline-block nav-link-side">Mes Devis</span>
                                            </a>
                                        </li>
                                    <?php } ?>


                                    <?php if ($_SESSION['idRoleUser'] == 3 || $_SESSION['idRoleUser'] == 4) { ?>
                                        <li class="nav-item">
                                            <a href="../public/index.php?promundus=contactPromundus" class="nav-link d-flex align-items-center">
                                                <i class="bi bi-chat-text fs-2 text-light me-2"></i><span class="text-light d-inline-block  nav-link-side">Contactez-Nous</span>
                                            </a>
                                        </li>
                                    <?php } ?>

                                    <?php if ($_SESSION['idRoleUser'] == 1 || $_SESSION['idRoleUser'] == 2 || $_SESSION['idRoleUser'] == 3 || $_SESSION['idRoleUser'] == 4) { ?>
                                        <li class="nav-item">
                                            <a href="../public/index.php?promundus=monProfilPromundus&upForm=1" class="nav-link d-flex align-items-center">
                                                <i class="bi bi-person fs-2 text-light me-2"></i><span class="text-light d-inline-block nav-link-side">Mon Profil</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <hr class="d-none d-sm-block">
                                    <!-- Affiche le bouton Se déconnecter uniquement en format mobile -->
                                    <ul style="list-style: none; padding: 0;" class="d-sm-none mt-2 me-5">
                                        <li class="nav-item">
                                            <a href="../controler/traitement_deconnexion.php" class="nav-link d-flex align-items-center">
                                                <i class="bi bi-door-closed fs-2 text-light me-2"></i>
                                                <span class="text-light d-inline-block nav-link-side">Deconnexion</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <hr>
                        </nav>
                    </div>
                    <div class="col-md-9 col-xl-10 px-sm-2 px-0">
                                    <?php
                                        // Contenu de la page
                                        if (isset($_GET['promundus'])) {
                                            // =============================\\
                                            // Pages Global de l'application \\
                                            // ===============================\\
                                            if ($_GET['promundus'] == 'accueilPromundus') {
                                                include "../front/accueil.php";
                                            }
                                            if ($_GET['promundus'] == 'contactPromundus') {
                                                include "../front/contact.php";
                                            }
                                            if ($_GET['promundus'] == 'monProfilPromundus') {
                                                include "../front/mon_profil.php";
                                            }
                                            if ($_GET['promundus'] == 'nosProduitsPromundus') {
                                                include "../front/nos_produit.php";
                                            }
                                            if ($_GET['promundus'] == 'pannierCommandePromundus') {
                                                include "../front/pannier_commande.php";
                                            }
                                            if ($_GET['promundus'] == 'creerUserPromundus') {
                                                include "../front/creer_user.php";
                                            }
                                            if ($_GET['promundus'] == 'nouvMdp') {
                                                include "../front/nouv_mdp.php";
                                            }
                                            
                                            // =============================\\
                                            // Pages Dédier a la Modération  \\
                                            // ===============================\\

                                            if ($_GET['promundus'] == 'stockPromundus') {
                                                include "../front/affichage_stockPmd.php";
                                            }
                                            if ($_GET['promundus'] == 'traceProdPromundus') {
                                                include "../front/afficher_tracabilite_produit.php";
                                            }
                                            if ($_GET['promundus'] == 'ajouterProdPmd') {
                                                include "../front/ajout_produit_pmd.php";
                                            }
                                            if ($_GET['promundus'] == 'detailProdPmd') {
                                                include "../front/details_prod_pmd.php";
                                            }
                                            if ($_GET['promundus'] == 'editStockPromundus') {
                                                include "../front/edit_prod_promudus.php";
                                            }
                                            if ($_GET['promundus'] == 'supprimerStockPromundus') {
                                                include "../front/edit_prod_promudus.php";
                                            }
                                            if ($_GET['promundus'] == 'stockClientPromundus') {
                                                include "../front/affichage_stockCL.php";
                                            }
                                            if ($_GET['promundus'] == 'afficherClientPromundus') {
                                                include "../front/detail_stock_client.php";
                                            }
                                            if ($_GET['promundus'] == 'editerClientPromundus') {
                                                include "../front/editer_client.php";
                                            }
                                            if ($_GET['promundus'] == 'MessagesRecuPromundus') {
                                                include "../front/messages_recu.php";
                                            }
                                            if ($_GET['promundus'] == 'MessagesArchiverPromundus') {
                                                include "../front/messages_archiver.php";
                                            }
                                            if ($_GET['promundus'] == 'MessagesReponduPromundus') {
                                                include "../front/messages_repondu.php";
                                            }
                                            if ($_GET['promundus'] == 'MessagesSupprimerPromundus') {
                                                include "../front/messages_supprimer.php";
                                            }
                                            if ($_GET['promundus'] == 'DetailMessageRecuPromundus') {
                                                include "../front/detail_msg_recu.php";
                                            }
                                            if ($_GET['promundus'] == 'DetailMessageArchiverPromundus') {
                                                include "../front/detail_msg_archiver.php";
                                            }
                                            if ($_GET['promundus'] == 'DetailMessageReponduPromundus') {
                                                include "../front/detail_msg_repondu.php";
                                            }
                                            if ($_GET['promundus'] == 'DetailMessageSupprimerPromundus') {
                                                include "../front/detail_msg_supprimer.php";
                                            }
                                            if ($_GET['promundus'] == 'ReponsePromundus') {
                                                include "../front/repondre_msg.php";
                                            }
                                            if ($_GET['promundus'] == 'CommandesEnAttente') {
                                                include "../front/commandes_en_attente.php";
                                            }
                                            if ($_GET['promundus'] == 'commandesAccepterPromundus') {
                                                include "../front/commande_valider.php";
                                            }
                                            if ($_GET['promundus'] == 'affichageUtilisateur') {
                                                include "../front/affichage_utilisateur.php";
                                            }
                                            if ($_GET['promundus'] == 'detailUtilisateur') {
                                                include "../front/detail_utilisateur.php";
                                            }
                                        } else {
                                            include "../front/connexion.php";
                                        }
                                    ?>
                    </div>
                </div>
            </div>
        <?php }else{
            include "../front/connexion.php";} ?>
    <?php } else {
        include "../front/connexion.php";
        } 


include('../front/footer.php');
?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../public/ressource/js/script.js"></script>
</body>
</html>
