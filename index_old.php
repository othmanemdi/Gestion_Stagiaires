<?php
require 'functions.php';
require 'db.php';

if (isset($_GET['id'])) {
    $key_SESSION = $_GET['id'];
    unset($_SESSION['stagiaire'][$key_SESSION]);

    $_SESSION['color'] = "info";
    $_SESSION['message'] = "Bien supprimer";

    header('Location: index.php');
    exit();
}

if (!isset($_SESSION['stagiaire'])) {
    $_SESSION['stagiaire'] = [];
}

if (empty($_SESSION['stagiaire'])) {
    $new_key = 1;
} else {
    $new_key = max(array_keys($_SESSION['stagiaire'])) + 1;
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

    $_SESSION['stagiaire'][$new_key] = $nouvel_stagiaire;

    $_SESSION['color'] = "info";
    $_SESSION['message'] = "Bien ajouter";

    header('Location: index.php');
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

    $_SESSION['stagiaire'][$stagiaire_key] = $update_stagiaire;

    $_SESSION['color'] = "info";
    $_SESSION['message'] = "Joiyeux anniversaire 🎁🎁🎁🎁🎁🎁🎁";

    header('Location: index.php');
    exit();
}





// unset($_SESSION['stagiaire']);
// $_SESSION['stagiaire'] = $stagiaires;

// if (isset($_SESSION['stagiaire'])) {
// unset($_SESSION['stagiaire']);

// $_SESSION['stagiaire'][5] =  [
//     'name' => 'Maryam',
//     'note' => 10,
//     'age' => 24,
// ];


// dd($new_key);


// dd($_SESSION['stagiaire']);
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>




    <div class="container my-5">
        <h1>Liste des stagiaire</h1>

        <?php if (isset($_SESSION['color']) && isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?= $_SESSION['color'] ?>">
                <?= $_SESSION['message'] ?>
            </div>
            <?php unset($_SESSION['message'], $_SESSION['color']); ?>
        <?php endif ?>


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
                            <?php foreach ($_SESSION['stagiaire'] as $key => $s) : ?>
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











                                        <a href="index.php?id=<?= $key ?>" class="btn btn-danger btn-sm">Supprimer</a>
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
        <!-- card -->
    </div>
    <!-- container -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous" defer>
    </script>
</body>

</html>