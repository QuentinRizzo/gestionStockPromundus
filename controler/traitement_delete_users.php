<?php
session_start();
require "../model/connexion_bdd.php";
require "../model/fonctions.php";
$id_user = $_SESSION['idUser'];
$userExiste = recupUtilisateur($pdo, $id_user);

if($userExiste){

    deleteUser($pdo, $id_user);
    header('Location:../public/index.php?promundus=affichageUtilisateur&sucess=deleteok');
}else{

    header('Location:../public/index.php?promundus=affichageUtilisateur&sucess=deletepasok');
}
?>