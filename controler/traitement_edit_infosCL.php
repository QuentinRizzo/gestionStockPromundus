<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";
$id_sites_clients = $_POST['id_sites_clients'];
$clientExiste = recupInfosClient($pdo, $id_sites_clients);
$nom_site = $_POST['nomClEdit'];
$adresse_site = $_POST['adClientEdit'];
$ville_site = $_POST['villeClEdit'];
$cp_site = $_POST['cpClEdit'];
if($clientExiste){
    updateInfosClient($pdo, $nom_site, $adresse_site, $ville_site, $cp_site, $id_sites_clients);
    header('Location:../public/index.php?promundus=stockClientPromundus&sucess=EditerAvecSuccess');
}else{
    header('../../public/index.php?promundus=stockClientPromundus&erreur=erreurEdit');
}
?>