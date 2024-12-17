<?php
session_start();
require "../model/connexion_bdd.php";
require "../model/fonctions.php";


// Ajout de produit \\
date_default_timezone_set('Europe/Paris');
$date_livraison = date('Y-m-d H:i:s');
$nom_produit = $_POST['nomProdAjoutPmd'];
$description = $_POST['descProdAjoutPmd'];
$prix_unite = filter_input(INPUT_POST, 'prixUniteAjoutPmd', FILTER_SANITIZE_NUMBER_INT);
$prix_fournisseur = filter_input(INPUT_POST, 'prixFournisseurAjoutPmd', FILTER_SANITIZE_NUMBER_INT);
$nom_livreur = $_POST['nomFournisseurAjoutPmd'];
$deleted = 0;

$qte_produit = $_POST['quantiteProdAjoutPmd'];
$produitExiste = produitExistant($pdo, $nom_produit);

if($produitExiste){
    $id_produit = $produitExiste['id_produit'];
    insertLivraisonPromundus($pdo, $nom_livreur, $date_livraison, $id_produit, $qte_produit);
    updateStockProduit($pdo, $qte_produit, $id_produit);
    header('Location:../public/index.php?promundus=stockPromundus&success=insertReussi');
}else{
     // Uploadé une image
     if(isset($_FILES['logo']) && $_FILES['logo']['name'] != '') {
         $extensions_valides = array('jpeg', 'JPEG', 'jpg', 'JPG', 'png', 'PNG','webp','WEBP'); // les extensions acceptées
         $extension_upload = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION); // récup de l'extension
         if(in_array($extension_upload, $extensions_valides)) { // si l'extension est bonne
             $dossier = '../public/ressource/img';
             $nom_img = time();
             $nom_img = $nom_img.'.'.$extension_upload;
             $chemin = $dossier."/".$nom_img;
             $publication = date('d-m-y h:i:s');
             if(move_uploaded_file($_FILES['logo']['tmp_name'], $chemin)) {
                 // Inseret le produit en bdd
                 insertProduit($pdo,$nom_produit, $description, $prix_unite, $nom_img, $qte_produit, $deleted);
                 $id_produit = $pdo->lastInsertId();
                 insertLivraisonPromundus($pdo, $nom_livreur, $date_livraison, $id_produit, $qte_produit);
                 // inseret les images en bdd
                 insertImg($pdo, $nom_img, $publication, $id_produit);
                 // Redirection
                 header('Location:../public/index.php?promundus=stockPromundus&sucess=ok');
             }else{
                 // Erreur d'upload
                 header('Location:../public/index.php?promundus=stockPromundus&erreur=erreurUpload');
             }
         }else{
             // Votre fichier n'est pas valide
             header('Location:../public/index.php?promundus=stockPromundus&erreur=fichierInvalide');
         }
     }else{
         // aucun fichier à télécharger
         header('Location:../public/index.php?promundus=stockPromundus&erreur=aucunFichier');
     }
 }       


?>