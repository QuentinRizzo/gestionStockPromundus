<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Génère les caractère aléatoire pour le mot de passe \\
function kodex_random_string($length=2){
    $chars = '@!^:?;%$~&*';
    $number = '0123456789';
    $string = '';
    $chiffre = '';
    for($i=0; $i<$length; $i++){
        $string .= $chars[rand(0, strlen($chars)-1)];

    }
    for($j=0; $j<$length; $j++){
        $chiffre .= $number[rand(0, strlen($number)-1)];
    }

    return $string.$chiffre;
}

// Déclaration des Variables :
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mailUtilisateur = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL); // Adresse e-mail de l'utilisateur
$tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_INT);
$adresse = $_POST['adresse'];

// Génération du mot de passe
$string = kodex_random_string(); // Utilisation de la fonction pour générer une chaîne aléatoire
$mdp = $nom.$string.$chiffre;

$id_departement = filter_input(INPUT_POST, 'departement', FILTER_SANITIZE_NUMBER_INT);

// Récupération des villes
$ville = $_POST['ville'];
$tabville = explode('-', $ville);
$id_ville = $tabville[0];
$code_postal = $tabville[1];

// Vérification de l'existence de l'utilisateur
$userExiste = verifUserExiste($pdo, $mailUtilisateur, $mdp); // Correction de l'appel de fonction en passant le bon nombre d'arguments


if ($userExiste){
    header('location:../public/index.php?page=3&erreur=emailExiste');
    
} else {
    $hashMdp = password_hash($mdp, PASSWORD_DEFAULT);
    // Insertion de l'utilisateur dans la base de données
    inserUser($pdo, $nom, $prenom, $mailUtilisateur, $tel, $hashMdp);
    $id_user = $pdo->lastInsertId();
    insertAdressUser($pdo, $adresse, $id_ville, $id_user);
    // Envoi de l'e-mail à l'utilisateur
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'revoriadeveloppement@gmail.com';
    $mail->Password = 'lhkpxelshcvtlyhg';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);
    $mail->setFrom('direction@promundus.fr', 'Promundus Propreté'); // Remplacez par votre adresse e-mail et le nom de l'expéditeur
    $mail->addAddress($mailUtilisateur); // Adresse e-mail de l'utilisateur
    $mail->Subject = "Accès à votre compte Promundus";
    // Chemin absolu vers l'image
    $cheminImage = 'www.promundus.fr/services-proprete/wp-content/uploads/2020/06/logo-promundus.png';
    $mail->Body = "Bonjour $nom $prenom,<br> Voici les identifiants de votre compte : <br> Adresse Email : $mailUtilisateur <br> Mot de passe : <strong> $mdp </strong> <br> <strong style=\"color:red; font-size: 20px;\">N'oubliez pas de modifier votre mot de passe en allant sur votre profil</strong> <br> Pour vous connecter, cliquez ici : <a href='https://www.google.com'>Lien de connexion</a><br> A très vite sur Promundus Propreté<br> <img src=\"$cheminImage\" alt=\"img test\">";

    if ($mail->send()) {
        // En-tête de redirection après l'envoi de l'e-mail
        header('location:../public/index.php?promundus=affichageUtilisateur&success=compteCree');
    } else {
        // Gestion de l'erreur d'envoi d'e-mail
        echo "Erreur lors de l'envoi de l'email : " . $mail->ErrorInfo;
    }
}
?>
