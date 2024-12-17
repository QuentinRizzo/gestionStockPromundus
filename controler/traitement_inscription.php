<?php
session_start();

require "../model/connexion_bdd.php";
require "../model/fonctions.php";
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Déclaration des Variables :
$nom = $_POST['nomInscription'];
$prenom = $_POST['prenomInscription'];
$mailUser = filter_input(INPUT_POST, 'mailInscription', FILTER_SANITIZE_EMAIL);
$tel = filter_input(INPUT_POST, 'telInscription', FILTER_SANITIZE_NUMBER_INT);
$adresse = $_POST['adresse'];
$id_departement = $_POST['departement'];
$mdp = $_POST['mdpInscription'];
$confirmationMdp = $_POST['mdpInscriptionConfirm'];

// Récupération des villes \\
$ville = $_POST['ville']; // La valeur de $ville est de la forme suivante :  id_ville-cp
$tabville = explode('-', $ville); //explode fait la même chose que split en js il donne donc le résultat suivant : [id_ville, cp]
$id_ville = $tabville[0]; // premier element du tableau
$code_postal = $tabville[1]; // deuxième element du tableau




if($mdp == $confirmationMdp){
    $userExiste = verifUserExiste($pdo, $mailUser);

    if($userExiste){
        header('location:../public/index.php?erreur=emailExiste');
        
    }else{
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
            $mail->addAddress($mailUser); // Adresse e-mail de l'utilisateur
            $mail->Subject = "Création du compte";
            // Chemin absolu vers l'image
            $cheminImage = 'www.promundus.fr/services-proprete/wp-content/uploads/2020/06/logo-promundus.png';
            $mail->Body = "Bonjour $nom, $prenom,<br>Votre compte a été créé avec succès !:<br>Voici vos identifiants de connexion<br> :<strong>adresse email :  $mailUser ,<br>mot de passe : $mdp</strong><br>A très vite sur Promundus Propreté.<br><img src=\"$cheminImage\" alt=\"img test\">";


            if ($mail->send()) {
                $hashMdp = password_hash($mdp, PASSWORD_DEFAULT);
                inserUser($pdo, $nom, $prenom, $mailUser, $tel, $hashMdp);
                $id_user = $pdo->lastInsertId();
                
                insertAdressUser($pdo, $adresse, $id_ville, $id_user);
                header('location:../public/index.php?sucess=compteCree');
            } else {
                // Gestion de l'erreur d'envoi d'e-mail
                echo "Erreur lors de la création du compte" . $mail->ErrorInfo;
            }

    }
}else{
    header('location:../public/index.php?erreur=mdpConfirm');
}

