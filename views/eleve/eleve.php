<link rel="stylesheet" href="/../../css/annee.css">
<link rel="stylesheet" href="/../../css/niveau.css">
<link rel="stylesheet" href="/../../css/style.css">

<div class="contenainer dflex fdc">
    <main>
        <section class="header dflex ">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <i class="fa-solid fa-plus"></i>
            </button>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Ajouter un cycle</h5>
                            <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <form method="POST" action="/niveau/classe/eleve/ajouter">
                                    <div class="dflex fdc">
                                        <div> <label for="prenom">Prénom :</label>
                                            <input type="text" name="prenom" id="prenom" required>
                                            <br>

                                            <label for="nom">Nom :</label>
                                            <input type="text" name="nom" id="nom" required>
                                            <br>

                                            <label for="photo">Photo :</label>
                                            <input type="text" name="photo" id="photo">
                                            <br>

                                            <label for="date_naissance">Date de naissance :</label>
                                            <input type="text" name="date_naissance" id="date_naissance">
                                            <br>

                                            <label for="profil">Profil :</label>
                                            <input type="text" name="profil" id="profil" required>
                                            <br>

                                            <label for="sexe">Sexe :</label>
                                            <input type="radio" name="sexe" id="sexe_masculin" value="Masculin"
                                                required>
                                            <label for="sexe_masculin">Masculin</label>
                                            <input type="radio" name="sexe" id="sexe_feminin" value="Féminin" required>
                                            <label for="sexe_feminin">Féminin</label>
                                            <br>

                                            <label for="id_classe">ID de la classe :</label>
                                            <input type="text" name="id_classe" id="id_classe" value=" <?php
                                            echo $params['id'];
                                            ?>" required>
                                            <br>
                                        </div>
                                        <div class="niveaueleve">
                                            <?php
                                            echo $params['niveau']->id_cycle;
                                            ?>
                                        </div>
                                        <div><input class="btn btn-primary" type="submit" value="Ajouter"></div>
                                    </div>
                                </form>


                            </div>
                            <?php if (!empty($params['errorMessage'])): ?>
                                <div class="error-message dflex jcc aic">
                                    <?php echo $params['errorMessage'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
        </section>

        <section class="field">
            <h3>Annee Scolaire <span>
                    <?php
                    echo $_SESSION['statut'];
                    ?>
                </span></h3>

            <table>
                <thead>
                    <tr>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Date de naissance</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($params['eleve'] as $niveau): ?>
                        <tr>
                            <td>
                                <?= $niveau->prenom_eleve ?>
                            </td>
                            <td>
                                <?= $niveau->nom_eleve ?>
                            </td>
                            <td>
                                <?= $niveau->date_de_naissance ?>
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary ">Voir</a>
                                <a href="#" class="btn btn-danger disabled ">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
</div>
<script src="/../../js/annee.js"></script>