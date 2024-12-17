<?php
    session_start();
    $commandeMemoire = $_SESSION['idCommande'];
    session_destroy();
    session_start();
    $_SESSION['idCommande'] = $commandeMemoire;
    header('Location:../public/index.php');