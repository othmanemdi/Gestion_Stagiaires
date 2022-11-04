<?php

ob_start();
// php
$title = "Fichier";

$folder = DIRECTORY . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR;
$file_name = 'data.txt';
$file = $folder . $file_name;

// Vérifier si le dossier existe
if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

// Vérifier si le fichier existe
if (!file_exists($file)) {
    touch($file);
}

if (isset($_POST['btn_ajouter_stagiaire'])) {
    $nom = $_POST['nom'];
    $note = $_POST['note'];
    $age = $_POST['age'];

    $nouvel_stagiaire = [
        'nom' => $nom,
        'note' => $note,
        'age' => $age
    ];

    $nouvel_stagiaire = array_to_JSON($nouvel_stagiaire);
    file_put_contents($file, $nouvel_stagiaire . PHP_EOL, FILE_APPEND);

    $_SESSION['flash']['info'] = 'Bien ajouter';

    header('Location: fichiers');
    exit();
}

$file_content = trim(file_get_contents($file));
$stagiaires = [];
if (!empty($file_content)) {
    $lignes = explode(PHP_EOL, $file_content);
    foreach ($lignes as $key => $ligne) {
        $stagiaires[$key + 1] = JSON_to_array($ligne);
    }
}

if (isset($_GET['id'])) {
    $stagiaire_key = $_GET['id'];
    unset($stagiaires[$stagiaire_key]);
    file_put_contents($file, '');

    $new_data = [];
    foreach ($stagiaires as $key => $s) {
        $new_data = array_to_JSON($s);
        file_put_contents($file, $new_data . PHP_EOL, FILE_APPEND);
    }
    $_SESSION['flash']['info'] = 'Bien supprimer';

    header('Location: fichiers');
    exit();
}

if (isset($_POST['btn_modifier_stagiaire'])) {
    $stagiaire_key = $_POST['stagiaire_key'];
    $nom = $_POST['nom'];
    $note = $_POST['note'];
    $age = $_POST['age'];

    $update_stagiaire = [
        'nom' => $nom,
        'note' => $note,
        'age' => $age
    ];

    $stagiaires[$stagiaire_key] = $update_stagiaire;

    file_put_contents($file, '');
    $new_data = [];
    foreach ($stagiaires as $key => $s) {
        $new_data = array_to_JSON($s);
        file_put_contents($file, $new_data . PHP_EOL, FILE_APPEND);
    }

    $_SESSION['flash']['info'] = 'Bien modifier';

    header('Location: fichiers');
    exit();
}



// $stagiaire_reverse = array_reverse($stagiaires);
// dd($stagiaires);

$content_php = ob_get_clean();

ob_start(); ?>

<h3>Gestion des stagiaire avec les fichiers</h3>

<section>
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
                    <div class="modal-content">

                        <form method="post">
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











                                    <a href="fichiers&id=<?= $key ?>" class="btn btn-danger btn-sm">Supprimer</a>
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
</section>


<?php $content_html = ob_get_clean(); ?>