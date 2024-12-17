<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";
$commandeEnValider =recupCommanValider($pdo);
?>
<section class="intro mt-5 mb-5">

    <div class="container-fluid">
    <h1 class="">Les commandes Accepter</h1>
        <?php
        if (isset($_GET['sucess'])) {

            if ($_GET['sucess'] == 'ok') {
                echo '<p class="text-success text-center">Le Message à été ajouter avec succès ! </p>';
            }
            if ($_GET['sucess'] == 'produitMAj') {
                echo '<p class="text-success text-center">Le Message à été Mis a jour avec succès ! </p>';
            }
        }
        if (isset($_GET['erreur'])) {

            if ($_GET['erreur'] == 'FigurineExiste') {
                echo '<p class="Error text-center text-danger">Le Message existe déja ! </p>';
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
                                        <th scope="col">date_commande</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($commandeEnValider as $indice => $cmdValider) {
                                        $indice++;
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $indice; ?></th>
                                            <td><?php echo $cmdValider['date_commande'] ?></td>
                                            <td>Valider</td>
                                            <td class="d-flex align-items-center">
                                                <form action="../controler/traitement_message_archiver.php" method="post" onsubmit="return confirm('Voulez-vous vraiment Accepter la Commande ?');">
                                                    <input type="hidden" name="id_commande" value="<?php echo $cmdValider['id_commande']; ?>">
                                                    <input type="hidden" name="action" value="archiverMessage">
                                                    <button type="submit" class="btn btnDesAjouts btn-sm me-1" data-mdb-toggle="tooltip" title="Archiver le Message">
                                                        <i class="bi bi-check fs-4"></i>
                                                    </button>
                                                </form>
                                                <form action="../controler/traitement_message_archiver.php" method="post" onsubmit="return confirm('Voulez-vous vraiment Refuser la Commande ?');">
                                                    <input type="hidden" name="id_commande" value="<?php echo $cmdValider['id_commande']; ?>">
                                                    <input type="hidden" name="action" value="archiverMessage">
                                                    <button type="submit" class="btn btnDesAjouts btn-sm me-1" data-mdb-toggle="tooltip" title="Archiver le Message">
                                                        <i class="bi bi-x fs-4"></i>
                                                    </button>
                                                </form>

                                                <form action="../public/index.php?promundus=DetailMessageRecuPromundus" method="post">
                                                    <input type="hidden" name="id_commande" value="<?php echo $cmdValider['id_commande']; ?>">
                                                    <input type="hidden" name="action" value="afficher le Message">
                                                    <button type="submit" class="btn btnDesAjouts btn-sm" title="Afficher le Message">
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