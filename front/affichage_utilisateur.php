<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";
$userExiste = recupListePUtilisateurs($pdo);

?>

<div class="container">

    <div class="row">
        <div class="col-lg-12 d-flex align-items-center justify-content-between mt-5">
            <h1>Affichage des utilisateurs enregistré</h1>
            <a class="btn btnDesAjouts" href="../public/index.php?promundus=creerUserPromundus">Créer un utilisateur</a>
        </div>
    </div>
</div>

<section class="intro mt-5 mb-5">
        <div class="container-fluid">
            <?php
            if (isset($_GET['sucess'])) {

                if ($_GET['sucess'] == 'deleteok') {
                    echo '<p class="text-success text-center">l\'utilisateur à été supprimer avec succès</p>';
                }
                
                if ($_GET['sucess'] == 'userMAj') {
                    echo '<p class="text-success text-center">Le stock du user à été Mis a jour avec succès ! </p>';
                }
            }

            if (isset($_GET['erreur'])) {

                if ($_GET['erreur'] == 'deletepasok') {
                    echo '<p class="text-success text-center">Erreur lors de la suppression de l\'utilisateur </p>';
                }
            }
            ?>
            <div class="row">
                <div class="col-12">
                    <div class="card bg-white">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">mail</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach ($userExiste as $indice=>$user) {
                                            $indice++;
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $indice; ?></th>
                                                <td><?php echo $user['nom'].' '.$user['prenom'] ?></td>
                                                <td><?php echo $user['mail'] ?></td>
                                                <td class="d-flex align-items-center">
                                                    <form action="../controler/traitement_delete_users.php" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer cette utilisateur ?');">
                                                        <input type="hidden" name="id_user" value="<?php echo $user['id_user']; ?>">
                                                        <input type="hidden" name="action" value="suprimeruser">
                                                        <button type="submit" class="btn btnDesAjouts  btn-sm me-1" data-mdb-toggle="tooltip" title="Supprimer l'utilisateur">
                                                            <i class="bi bi-trash-fill fs-4"></i>
                                                        </button>
                                                    </form>

                                                    <form action="../public/index.php?promundus=detailUtilisateur" method="post">
                                                        <input type="hidden" name="id_user" value="<?php echo $user['id_user']; ?>">
                                                        <input type="hidden" name="action" value="Afficheruser">
                                                        <button type="submit" class="btn btnDesAjouts  btn-sm" title="Afficher l'utilisateur">
                                                            <i class="bi bi-eye fs-4"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>