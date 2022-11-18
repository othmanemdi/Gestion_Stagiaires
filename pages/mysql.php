<?php

ob_start();
// php
$title = "MySql";


// Insert fake data

// for ($i = 1; $i <= 20; $i++) {
//     $db->query("INSERT INTO stagiaires SET nom = 'Stagiare $i', age = 24, note = 5");
// }




if (isset($_POST['ajouter_stagiaire'])) {

    $nom = $_POST['nom'];
    $age = (int)$_POST['age'];
    $note = (int) $_POST['note'];
    $stagiaire = $db->query("INSERT INTO stagiaires SET nom = '$nom', age = $age, note = $note");

    if ($stagiaire) {
        $_SESSION['flash']['info'] = 'Bien ajouter';
    } else {
        $_SESSION['flash']['danger'] = 'Error !!!';
    }

    header('Location: mysql');
    exit();
}


if (isset($_POST['modifier_stagiaire'])) {

    $nom = $_POST['nom'];
    $age = (int)$_POST['age'];
    $note = (int) $_POST['note'];
    $stagiaire_id = (int) $_POST['stagiaire_id'];

    $stagiaire = $db->query("UPDATE stagiaires SET nom = '$nom', age = $age, note = $note WHERE id = $stagiaire_id");

    if ($stagiaire) {
        $_SESSION['flash']['info'] = 'Bien modifier';
    } else {
        $_SESSION['flash']['danger'] = 'Error !!!';
    }

    header('Location: mysql');
    exit();
}



if (isset($_POST['supprimer_stagiaire'])) {

    $stagiaire_id = (int) $_POST['stagiaire_id'];

    // $stagiaire = $db->query("DELETE FROM stagiaires WHERE id = $stagiaire_id");

    // $stagiaire = $db->query("UPDATE stagiaires SET is_active = 0 WHERE id = $stagiaire_id");

    $stagiaire = $db->query("UPDATE stagiaires SET deleted_at = NOW() WHERE id = $stagiaire_id");

    if ($stagiaire) {
        $_SESSION['flash']['info'] = 'Bien supprimer';
    } else {
        $_SESSION['flash']['danger'] = 'Error !!!';
    }

    header('Location: mysql');
    exit();
}

$filter = '';

if (isset($_POST['rechercher_stagiaire'])) {
    $filter =  " AND nom LIKE '%" . trim($_POST['s']) . "%'";
}

$stagiaires = $db->query("SELECT * FROM stagiaires 
WHERE 
deleted_at IS NULL 
$filter
ORDER BY id DESC")->fetchAll();


// $stagiaires = $db->query("SELECT * FROM stagiaires WHERE is_active = 1 ORDER BY id DESC")->fetchAll();

// $stagiaires = $db->query("SELECT * FROM stagiaires WHERE deleted_at IS NOT NULL ORDER BY id DESC")->fetchAll();

// $stagiaires = $db->query("SELECT * FROM stagiaires WHERE deleted_at IS NULL ORDER BY id DESC")->fetchAll();

$content_php = ob_get_clean();

ob_start(); ?>

<h3>Gestion des stagiaire avec MySql</h3>



<div class="card">
    <div class="card-header">
        <h5>Liste des stagiaires</h5>
    </div>
    <!-- cord-header -->

    <div class="card-body">








        <div class="d-flex justify-content-between mb-3">
            <div class="me-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_stagiaire">
                    Ajouter
                </button>
            </div>
            <?php if (isset($_POST['s'])) : ?>
                <div class="me-5">
                    <h4>La liste des stagiaires est filtré par le mot
                        <b>
                            (<?= trim($_POST['s']) ?>)
                        </b>
                    </h4>
                </div>
            <?php endif ?>

            <div>

                <form method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Rechercher:" name="s" value="<?= trim($_POST['s']) ?? '' ?>">
                        <button class="btn btn-outline-secondary" type="submit" name="rechercher_stagiaire">Rechercher</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="add_stagiaire" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Ajouter un nouveu stagiaire</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post">
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">Nom:</label>
                                        <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom:">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="age" class="form-label">Age:</label>
                                        <input min="15" max="45" type="number" class="form-control" name="age" id="age" placeholder="Age:">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="note" class="form-label">Note:</label>
                                        <input min="4" max="10" type="number" class="form-control" name="note" id="note" placeholder="Note:">
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" name="ajouter_stagiaire" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="table-responsive">

            <table class="table table-border table-hover table-sm">
                <thead>
                    <tr class="table-info">
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Age</th>
                        <th>Note</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($stagiaires as $key => $s) : ?>
                        <tr>
                            <td>
                                <?= $s['id'] ?>
                            </td>
                            <td>
                                <?= $s['nom'] ?>
                            </td>
                            <td>
                                <?= $s['age'] ?>
                            </td>
                            <td>
                                <?= $s['note'] ?>
                            </td>

                            <td>

                                <!-- Modale Afficher -->

                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#show_stagiaire<?= $s['id'] ?>">
                                    afficher
                                </button>

                                <div class="modal fade" id="show_stagiaire<?= $s['id'] ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5">
                                                    Stagiaire Details:
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">



                                                <dl class="row">
                                                    <dt class="col-sm-3">Nom:</dt>
                                                    <dd class="col-sm-9">
                                                        <?= $s['nom'] ?>
                                                    </dd>

                                                    <dt class="col-sm-3">Note:</dt>
                                                    <dd class="col-sm-9">
                                                        <?= $s['note'] ?>
                                                    </dd>

                                                    <dt class="col-sm-3">Age:</dt>
                                                    <dd class="col-sm-9">
                                                        <?= $s['age'] ?>
                                                    </dd>

                                                </dl>



                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- fin modal afficher -->





                                <!-- modal update -->



                                <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#update_stagiaire_<?= $s['id'] ?>">
                                    Modifier
                                </button>

                                <div class="modal fade" id="update_stagiaire_<?= $s['id'] ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5">Modifier stagiaire</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="post">
                                                <div class="modal-body">

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="nom" class="form-label">Nom:</label>
                                                                <input type="text" class="form-control" name="nom" id="nom" value="<?= $s['nom'] ?>" placeholder="Nom:">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="age" class="form-label">Age:</label>
                                                                <input type="number" class="form-control" name="age" id="age" value="<?= $s['age'] ?>" placeholder="Age:">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="note" class="form-label">Note:</label>
                                                                <input type="number" class="form-control" name="note" id="note" value="<?= $s['note'] ?>" placeholder="Note:">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <input type="hidden" name="stagiaire_id" value="<?= $s['id'] ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                    <button type="submit" name="modifier_stagiaire" class="btn btn-primary">Modifier</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- fin modal update -->


                                <!-- Modale Afficher -->

                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_stagiaire<?= $s['id'] ?>">
                                    Supprimer
                                </button>

                                <div class="modal fade" id="delete_stagiaire<?= $s['id'] ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5">
                                                    Voulez vous vraiment supprimer <?= $s['nom'] ?> ?
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">



                                                <dl class="row">
                                                    <dt class="col-sm-3">Nom:</dt>
                                                    <dd class="col-sm-9">
                                                        <?= $s['nom'] ?>
                                                    </dd>

                                                    <dt class="col-sm-3">Note:</dt>
                                                    <dd class="col-sm-9">
                                                        <?= $s['note'] ?>
                                                    </dd>

                                                    <dt class="col-sm-3">Age:</dt>
                                                    <dd class="col-sm-9">
                                                        <?= $s['age'] ?>
                                                    </dd>

                                                </dl>



                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>


                                                <form method="post">
                                                    <input type="hidden" name="stagiaire_id" value="<?= $s['id'] ?>">
                                                    <button type="submit" name="supprimer_stagiaire" class="btn btn-danger">Supprimer</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- fin modal delete -->


                            </td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
        <!-- table-responsive -->
    </div>
    <!-- cord-body -->
</div>
<!-- card -->


<?php $content_html = ob_get_clean(); ?>