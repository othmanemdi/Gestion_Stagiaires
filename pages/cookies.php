<?php

ob_start();
// php
$title = "Cookies";



if (!isset($_COOKIE['stagiaires'])) {
    $new_key = 1;
} else {
    $new_key = max(array_keys(json_decode($_COOKIE['stagiaires'], true))) + 1;
}


if (isset($_POST['btn_ajouter_stagiaire'])) {
    $nom = $_POST['nom'];
    $note = $_POST['note'];
    $age = $_POST['age'];

    $nouvel_stagiaire = [
        $new_key => [
            'nom' => $nom,
            'note' => $note,
            'age' => $age
        ]
    ];
    // dd($nouvel_stagiaire);

    // 1- Ajouter cookie
    $nouvel_stagiaire = json_encode($nouvel_stagiaire);
    $annee = time() + 60 * 60 * 24 * 365;
    setcookie('stagiaires', $nouvel_stagiaire, $annee);



    // 2- Modifier cookie


    $_SESSION['flash']['info'] = 'Bien ajouter';

    header('Location: cookies');
    exit();
}



if (!isset($_COOKIE['stagiaires'])) {

    // $stagiaires_db = [];

    // $stagiaires_db = [
    //     1 => [
    //         'nom' => 'Hind',
    //         'note' => 10,
    //         'age' => 22,
    //     ],
    //     2 => [
    //         'nom' => 'Maryam',
    //         'note' => 10,
    //         'age' => 24,
    //     ],
    //     3  => [
    //         'nom' => 'Youssra',
    //         'note' => 10,
    //         'age' => 18,
    //     ],
    //     4 => [
    //         'nom' => 'Nabila',
    //         'note' => 10,
    //         'age' => 23,
    //     ],
    //     5 => [
    //         'nom' => 'Sara',
    //         'note' => 10,
    //         'age' => 24,
    //     ],
    // ];

    // $stagiaires_json = json_encode($stagiaires_db);
    // $annee = time() + 60 * 60 * 24 * 365;
    // setcookie('stagiaires', $stagiaires_json, $annee);
}


// dd($stagiaires_json);
$stagiaires = [];

if (isset($_COOKIE['stagiaires'])) {
    $get_stagiaire_from_cookie = $_COOKIE['stagiaires'];
    $stagiaires = json_decode($_COOKIE['stagiaires'], true);
}
// dd($stagiaires);
// die();
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
                                <input min="0" max="10" type="number" class="form-control input-sm" id="note" name="note" placeholder="Note:">
                                <label for="note">Note:</label>
                            </div>


                            <div class="form-floating mb-3">
                                <input min="13" max="65" type="number" class="form-control input-sm" id="age" name="age" placeholder="Age:">
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
                                                        <input min="0" max="10" type="number" class="form-control input-sm" id="note" name="note" placeholder="Note:" value="<?= $s['note'] ?>">
                                                        <label for="note">Note:</label>
                                                    </div>


                                                    <div class="form-floating mb-3">
                                                        <input min="13" max="65" type="number" class="form-control input-sm" id="age" name="age" placeholder="Age:" value="<?= $s['age'] ?>">
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