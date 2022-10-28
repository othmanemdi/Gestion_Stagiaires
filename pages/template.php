<?php

ob_start();
// php
$title = "Template";

$content_php = ob_get_clean();


ob_start(); ?>

<h3>Template page</h3>

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
                        <tr>
                            <td>
                                1 </td>
                            <td>
                                Maryam </td>
                            <td>
                                5 </td>
                            <td>
                                23 </td>
                            <td>





                                <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#update_1">
                                    Modifier
                                </button>

                                <div class="modal fade" id="update_1" tabindex="-1" aria-labelledby="update_1Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <form method="post">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="update_1Label">Modifier</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <!-- modal-header -->
                                                <div class="modal-body">

                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control input-sm" id="nom" name="nom" placeholder="Nom:" value="Maryam">
                                                        <label for="nom">Nom:</label>
                                                    </div>

                                                    <div class="form-floating mb-3">
                                                        <input min="0" max="10" type="number" class="form-control input-sm" id="note" name="note" placeholder="Note:" value="5">
                                                        <label for="note">Note:</label>
                                                    </div>


                                                    <div class="form-floating mb-3">
                                                        <input min="13" max="65" type="number" class="form-control input-sm" id="age" name="age" placeholder="Age:" value="23">
                                                        <label for="age">Age:</label>
                                                    </div>

                                                    <input type="hidden" name="stagiaire_key" value="1">

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











                                <a href="sessions&id=1" class="btn btn-danger btn-sm">Supprimer</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                2 </td>
                            <td>
                                Nabila </td>
                            <td>
                                5 </td>
                            <td>
                                23 </td>
                            <td>





                                <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#update_2">
                                    Modifier
                                </button>

                                <div class="modal fade" id="update_2" tabindex="-1" aria-labelledby="update_2Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <form method="post">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="update_2Label">Modifier</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <!-- modal-header -->
                                                <div class="modal-body">

                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control input-sm" id="nom" name="nom" placeholder="Nom:" value="Nabila">
                                                        <label for="nom">Nom:</label>
                                                    </div>

                                                    <div class="form-floating mb-3">
                                                        <input min="0" max="10" type="number" class="form-control input-sm" id="note" name="note" placeholder="Note:" value="5">
                                                        <label for="note">Note:</label>
                                                    </div>


                                                    <div class="form-floating mb-3">
                                                        <input min="13" max="65" type="number" class="form-control input-sm" id="age" name="age" placeholder="Age:" value="23">
                                                        <label for="age">Age:</label>
                                                    </div>

                                                    <input type="hidden" name="stagiaire_key" value="2">

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











                                <a href="sessions&id=2" class="btn btn-danger btn-sm">Supprimer</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                3 </td>
                            <td>
                                Youssra </td>
                            <td>
                                8 </td>
                            <td>
                                20 </td>
                            <td>





                                <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#update_3">
                                    Modifier
                                </button>

                                <div class="modal fade" id="update_3" tabindex="-1" aria-labelledby="update_3Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <form method="post">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="update_3Label">Modifier</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <!-- modal-header -->
                                                <div class="modal-body">

                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control input-sm" id="nom" name="nom" placeholder="Nom:" value="Youssra">
                                                        <label for="nom">Nom:</label>
                                                    </div>

                                                    <div class="form-floating mb-3">
                                                        <input min="0" max="10" type="number" class="form-control input-sm" id="note" name="note" placeholder="Note:" value="8">
                                                        <label for="note">Note:</label>
                                                    </div>


                                                    <div class="form-floating mb-3">
                                                        <input min="13" max="65" type="number" class="form-control input-sm" id="age" name="age" placeholder="Age:" value="20">
                                                        <label for="age">Age:</label>
                                                    </div>

                                                    <input type="hidden" name="stagiaire_key" value="3">

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











                                <a href="sessions&id=3" class="btn btn-danger btn-sm">Supprimer</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                4 </td>
                            <td>
                                Hind </td>
                            <td>
                                5 </td>
                            <td>
                                20 </td>
                            <td>





                                <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#update_4">
                                    Modifier
                                </button>

                                <div class="modal fade" id="update_4" tabindex="-1" aria-labelledby="update_4Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <form method="post">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="update_4Label">Modifier</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <!-- modal-header -->
                                                <div class="modal-body">

                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control input-sm" id="nom" name="nom" placeholder="Nom:" value="Hind">
                                                        <label for="nom">Nom:</label>
                                                    </div>

                                                    <div class="form-floating mb-3">
                                                        <input min="0" max="10" type="number" class="form-control input-sm" id="note" name="note" placeholder="Note:" value="5">
                                                        <label for="note">Note:</label>
                                                    </div>


                                                    <div class="form-floating mb-3">
                                                        <input min="13" max="65" type="number" class="form-control input-sm" id="age" name="age" placeholder="Age:" value="20">
                                                        <label for="age">Age:</label>
                                                    </div>

                                                    <input type="hidden" name="stagiaire_key" value="4">

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











                                <a href="sessions&id=4" class="btn btn-danger btn-sm">Supprimer</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                5 </td>
                            <td>
                                Sara </td>
                            <td>
                                5 </td>
                            <td>
                                25 </td>
                            <td>





                                <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#update_5">
                                    Modifier
                                </button>

                                <div class="modal fade" id="update_5" tabindex="-1" aria-labelledby="update_5Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <form method="post">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="update_5Label">Modifier</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <!-- modal-header -->
                                                <div class="modal-body">

                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control input-sm" id="nom" name="nom" placeholder="Nom:" value="Sara">
                                                        <label for="nom">Nom:</label>
                                                    </div>

                                                    <div class="form-floating mb-3">
                                                        <input min="0" max="10" type="number" class="form-control input-sm" id="note" name="note" placeholder="Note:" value="5">
                                                        <label for="note">Note:</label>
                                                    </div>


                                                    <div class="form-floating mb-3">
                                                        <input min="13" max="65" type="number" class="form-control input-sm" id="age" name="age" placeholder="Age:" value="25">
                                                        <label for="age">Age:</label>
                                                    </div>

                                                    <input type="hidden" name="stagiaire_key" value="5">

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











                                <a href="sessions&id=5" class="btn btn-danger btn-sm">Supprimer</a>
                            </td>
                        </tr>

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