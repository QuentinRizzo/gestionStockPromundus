<?php
session_start();
require "../model/connexion_bdd.php";
require "../model/fonctions.php";
$userExiste = recupInfosUsers($pdo, $_SESSION['idUser']);

if($userExiste){
    $id_user = $_SESSION['idUser'];
    $nom = $_POST['nameProfil'];
    $prenom = $_POST['prenomProfil'];
    $mail = $_POST['mailProfil'];
    $tel = $_POST['telProfil'];
    $adresse = $_POST['adresseProfil'];
    $id_departement = $_POST['departement'];
    $ville = $_POST['ville'];          // La valeur de $ville est de la forme suivante :  id_ville-cp
    $tabville = explode('-', $ville); //explode fait la même chose que split en js il donne donc le résultat suivant : [id_ville, cp]
    $id_ville = $tabville[0];        // premier element du tableau
    $code_postal = $tabville[1];    // deuxième element du tableau

    updateInfosUser($pdo, $nom,$prenom, $mail, $tel, $id_user);
    updateAdresseInfosUser($pdo, $adresse,$id_ville, $id_user);
    
    header('location:../public/index.php?promundus=monProfilPromundus&sucess=InformationModifier');
}else{
    header('location:../public/index.php?promundus=monProfilPromundus&erreur=ModifInfoErreur');
}


