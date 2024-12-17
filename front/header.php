<?php
require "../model/connexion_bdd.php";
?>

<header class="w-100">
    <nav class="navbar navbar-expand-lg navbar-dark couleur-nav d-flex align-items-center justify-content-around">
        <a class="navbar-brand" href="#">
            <img src="../public/ressource/img/logo-promundus.webp" class="img-fluid logo mx-2 logo-barnav" alt="Logo-Promundus">
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">

            <div class="navbar-nav mx-auto">

            </div>
            <li class="nav-item list-unstyled">
                <div class="d-flex align-items-center btnDeconnexion">
                    <?php if (isset($_SESSION['idUser'])) { ?>
                        <button class="btn me-3 ">
                            <a class="text-decoration-none nav-link" href="../controler/traitement_deconnexion.php">
                                <i class="bi bi-door-closed fs-5"></i>
                                <p>Déconnexion</p>
                            </a>
                        </button>
                    <?php } ?>
                </div>
            </li>

        </div>

    </nav>

</header>
