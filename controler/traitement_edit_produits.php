<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";

$id_produit = $_POST['id_produit'];
$produitExiste = recupProduitforEdit($pdo, $id_produit);

if($produitExiste){
    $nom_produit = $_POST['nomProdEditPmd'];
    $description = $_POST['descProdEditPmd'];
    $prix_unit = $_POST['prixUniteEditPmd'];
    $stock = $_POST['quantiteProdEditPmd'];
    $nom_img = $_POST['nomImgEdit'];
    updateStockPromundus($pdo, $nom_produit, $description, $prix_unit, $nom_img, $stock, $id_produit);
    header('Location:../public/index.php?promundus=stockPromundus&sucess=UpdateProd');
}else{
    header('Location:../public/index.php?promundus=stockPromundus&erreur=ErreurProdUpdate');
}

    