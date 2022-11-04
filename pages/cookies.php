<?php

ob_start();
// php
$title = "Cookies";

$stagiaires = [];
$one_year = time() + 60 * 60 * 24 * 365;
if (!isset($_COOKIE['stagiaires'])) {
    setcookie('stagiaires', "[]", $one_year);
    header('Location: cookies');
    exit();
} else {
    $stagiaire_from_cookies = $_COOKIE['stagiaires'];
    $stagiaires = json_decode($_COOKIE['stagiaires'], true);
}

if (count($stagiaires) == 0) {
    $new_key = 1;
} else {
    $new_key = max(array_keys($stagiaires)) + 1;
}

// Supprimer
if (isset($_GET['id'])) {
    $stagiaire_id = (int)$_GET['id'];
    unset($stagiaires[$stagiaire_id]);
    $stagiaires = json_encode($stagiaires);
    setcookie('stagiaires', $stagiaires, $one_year);
    header('Location: cookies');
    exit();
}

// Ajouter

if (isset($_POST['btn_ajouter_stagiaire'])) {

    $nom = $_POST['nom'];
    $note = $_POST['note'];
    $age = $_POST['age'];

    // dd($_POST);
    $new_stagiaire = [
        'nom' => $nom,
        'note' => $note,
        'age' =>  $age,
    ];

    // Add new stagiaire into $stagiaire
    $stagiaires[$new_key] = $new_stagiaire;

    // Transform $stagiaire from array to json

    $stagiaires = json_encode($stagiaires);
    setcookie('stagiaires', $stagiaires, $one_year);

    $_SESSION['flash']['info'] = 'Bien ajouter';
    header('Location: cookies');
    exit();
}


// (Modifier) Detect click into btn update Stagiaire
if (isset($_POST['btn_modifier_stagiaire'])) {
    // Get data from post

    // Get key stagiaire from session
    $stagiaire_id = $_POST['stagiaire_id'];

    // Get new name stagiaire from input
    $new_nom = $_POST['nom'];

    // Get new mark stagiaire from input
    $new_note = $_POST['note'];

    // Get new age stagiaire from input
    $new_age = $_POST['age'];

    // Create array with new information 
    $new_information = [
        'nom' => $new_nom,
        'note' => $new_note,
        'age' =>  $new_age,
    ];

    // Push new information into array stagiaire
    $stagiaires[$stagiaire_id] = $new_information;
    $stagiaires = json_encode($stagiaires);
    setcookie('stagiaires', $stagiaires, $one_year);


    // Send me to gestion_stagiaire_cookies page
    header('Location: cookies');
    exit();
}


$content_php = ob_get_clean();

ob_start(); ?>

<h3>Gestion des stagiaire avec les cookies</h3>



<div class="card">
    <div class="card-header">
        <h4>Liste des stagiaire</h4>
    </div>
    <div class="card-body">

        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#add">
            Ajouter
        </button>

        <div class="modal fade" id="add" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="post">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addLabel">Ajouter un stagiaire</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- modal-header -->
                        <div class="modal-body">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control input-sm" id="nom" name="nom" placeholder="Nom:">
                                <label for="nom">Nom:</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control input-sm" id="note" name="note" placeholder="Note:">
                                <label for="note">Note:</label>
                            </div>


                            <div class="form-floating mb-3">
                                <input type="number" class="form-control input-sm" id="age" name="age" placeholder="Age:">
                                <label for="age">Age:</label>
                            </div>

                        </div>
                        <!-- modal-body -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" name="btn_ajouter_stagiaire" class="btn btn-primary">Enregistrer</button>
                        </div>
                        <!-- modal-footer -->
                    </div>
                    <!-- modal-content -->
                </form>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover table-stripeda">
                <thead class="table-info">
                    <tr>
                        <th>Key</th>
                        <th>Nom</th>
                        <th>Note</th>
                        <th>Age</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($stagiaires as $key => $s) : ?>
                        <tr>
                            <td>
                                <?= $key ?>
                            </td>
                            <td>
                                <?= $s['nom'] ?>
                            </td>
                            <td>
                                <?= $s['note'] ?>
                            </td>

                            <td>
                                <?= $s['age'] ?>
                            </td>

                            <td>



                                <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#update_<?= $key ?>">
                                    Modifier
                                </button>

                                <div class="modal fade" id="update_<?= $key ?>" tabindex="-1" aria-labelledby="update_<?= $key ?>Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <form method="post">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="update_<?= $key ?>Label">Modifier</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <!-- modal-header -->
                                                <div class="modal-body">

                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control input-sm" id="nom" name="nom" placeholder="Nom:" value="<?= $s['nom'] ?>">
                                                        <label for="nom">Nom:</label>
                                                    </div>

                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control input-sm" id="note" name="note" placeholder="Note:" value="<?= $s['note'] ?>">
                                                        <label for="note">Note:</label>
                                                    </div>


                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control input-sm" id="age" name="age" placeholder="Age:" value="<?= $s['age'] ?>">
                                                        <label for="age">Age:</label>
                                                    </div>

                                                    <input type="hidden" name="stagiaire_key" value="<?= $key ?>">

                                                </div>
                                                <!-- modal-body -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                    <button type="submit" name="btn_modifier_stagiaire" class="btn btn-success">Modifier</button>
                                                </div>
                                                <!-- modal-footer -->
                                        </div>
                                        <!-- modal-content -->
                                        </form>
                                    </div>
                                </div>



                                <a href="cookies&id=<?= $key ?>" class="btn btn-danger btn-sm">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach ?>


                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- responsive -->
    </div>
    <!-- card-body -->
</div>



<?php $content_html = ob_get_clean(); ?>