<?php
session_start();
//Importez les classes PHPMailer dans l'espace de noms global 
//Celles-ci doivent être en haut de votre script, pas à l'intérieur d'une fonction 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "../model/connexion_bdd.php";
require "../model/fonctions.php";
require '../vendor/autoload.php';

// Ajout de l'instanciation de PHPMailer
if(isset($_SESSION['idUser'])){
    if(isset($_POST['Envoyer'])){
        $id_user = $_SESSION['idUser'];
        $nom_envoyeur = htmlentities($_POST['nomContact']);
        $prenom_envoyeur = htmlentities($_POST['prenomContact']);
        $mail_envoyeur = htmlentities($_POST['mailContact']);
        $objet_message = $_POST['objetContact'];
        $contenue_message = htmlentities($_POST['msgContact']);
        $status = 'EnAttente';
        date_default_timezone_set('Europe/Paris');
        $date_message = date('Y-m-d H:i:s');
        $id_categ_message = $_POST['id_categ_message'];
        $mail = new PHPMailer(true); #nouvelle objet PHPMailer sur vrai
        $mail->isSMTP();// (Simple Mail Transfer Protocol). SMTP est un protocole standard utilisé pour l'envoi de courriers électroniques.
        $mail->Host = 'smtp.gmail.com';//Adresse IP ou DNS du serveur SMTP par exemple 'ssl0.ovh.net';
        $mail->SMTPAuth = true;//Utiliser l'identification
        $mail->Username = 'revoriadeveloppement@gmail.com'; //pour générer le mdp https://myaccount.google.com/u/2/apppasswords?pli=1&rapt=AEjHL4OfqNuU7GFeDQgPxS_GMrPpOUdj6d40h-MT9f0jm-n_kasrcGKMyap2tFJ6cXmoJIRIxaGjKodNVv0jOWASD204AapQwod-lid0Uv6IHEaI27FByaE
        $mail->Password = 'lhkpxelshcvtlyhg';// enlever les espaces du mdp
        $mail->Port = 465;//Port TCP du serveur SMTP 465 car nous sommes en local
        $mail->SMTPSecure = 'ssl'; //Protocole de sécurisation des échanges avec le SMTP
        $mail->CharSet = 'UTF-8'; //Format d'encodage à utiliser pour les caractères
        $mail->isHTML(true);// en faulse ça nous devrions Préciser qu'il faut utiliser le texte brut
        $mail->setFrom($mail_envoyeur, $mail_envoyeur); // Information de l'envoyeur
        $mail->addAddress('revosoftwarepro@gmail.com'); //Adresse mail a qui envoyer le message
        $mail->Subject = ("$mail_envoyeur ($objet_message)"); // Sujet du mail il sera afficher comme ça dans la boite de reception :
        $mail->Body = $contenue_message; // ici on récupère le message a envoyer
        $mail->send(); //Permet d'envoyer le mail

        insertMessageEnvoyer($pdo,$nom_envoyeur, $prenom_envoyeur, $mail_envoyeur, $objet_message, $contenue_message, $id_user, $status, $date_message, $id_categ_message);
        header('Location:../public/index.php?promundus=contactPromundus&sucess=MsgEnvoyer');
    }else{
        header('Location:../public/index.php?promundus=contactPromundus&erreur=ErreurEnvoiMsg');
    }
}
?>
