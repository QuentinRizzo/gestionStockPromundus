<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";
$RecupObjets = recupObjetsContact($pdo);
if (isset($_GET['sucess'])) {

    if ($_GET['sucess'] == 'compteCree') {
        echo '<p class="text-success fs-2">CLe compte à été créer avec succès ! </p>';
    }
}

if (isset($_GET['erreur'])) {

    if ($_GET['erreur'] == 'MsgEnvoyer') {
        echo '<p class="text-danger fs-2">Le Message à été envoyer avec succès </p>';
    }
    if ($_GET['erreur'] == 'ErreurEnvoiMsg') {
        echo '<p class="text-danger fs-2">Une erreur est survenue lors de l\'envoi du message veuillez réessayer ! </p>';
    }
}
?>


<div class="container mt-5 box-contact">
    <div class="row row-oval">
        <div class="col-lg-6 contact-form background-formulaire">
            <img class="img-fluid mx-auto logoContact d-flex align-items-center mt-5" src="../public/ressource/img/logo-promundus.webp" alt="logo-plaisirceleste">
        </div>
        <div class="col-lg-6 form-content p-4 formulaire-box-bg text-light">

            <h1 class=" mt-2">Nous Contacter :</h1>

            <form action="../controler/traitement_contact.php" method="post">
                <div>
                    <label for="">Nom :</label>
                    <input type="text" name="nomContact" class="form-control" placeholder="Nom" required>
                </div>
                <div>
                    <label for="">Prénom :</label>
                    <input type="text" name="prenomContact" class="form-control" placeholder="Prenom" required>
                </div>
                <div>
                    <label for="">Mail :</label>
                    <input type="email" name="mailContact" class="form-control" placeholder="Mail" required>
                </div>
                <div>
                    <label for="">Objet :</label>
                    <div class="col-md-12 form-group mb-3">

                        <select class="form-select" name="objetContact" id="objetContact">
                                <option value="">Choisir l'objet...</option>
                            <?php foreach ($RecupObjets as $objet) { ?>
                                <option value="<?php echo $objet['objet_categ_message']?>"><?php echo $objet['objet_categ_message']?></option>
                            <?php } ?>

                        </select>
                    </div>
                </div>
                <div>
                    <label for="">Message :</label>
                    <textarea class="form-control" name="msgContact" rows="5" placeholder="Message" required></textarea>
                </div>
                <input type="hidden" name="id_categ_message" value="<?php echo $objet['id_categ_message']?>">
                <input type="submit" name="Envoyer" class="btn btnDesAjouts mt-2 float-end"></input>
            </form>
        </div>
    </div>
</div>