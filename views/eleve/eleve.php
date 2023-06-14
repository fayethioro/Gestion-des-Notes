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
                                <form method="POST" action="/classe/liste/ajouter">
                                    <div class="dflex fdc">
                                        <div>
                                            <div>
                                                <label for="photo">Photo :</label>
                                                <input type="text" name="photo" id="photo">
                                                <br>
                                            </div>
                                            <div class="dflex jcc">
                                                <div> <label for="prenom">Prénom :</label>
                                                    <input type="text" name="prenom" id="prenom" required>
                                                    <br>
                                                </div>

                                                <div>
                                                    <label for="nom">Nom :</label>
                                                    <input type="text" name="nom" id="nom" required>
                                                    <br>
                                                </div>
                                            </div>

                                            <div class="dflex jcc">
                                                <div><label for="date_naissance">Date de naissance :</label>
                                                    <input type="text" name="date_naissance" id="date_naissance">
                                                    <br>
                                                </div>

                                                <div>
                                                    <label for="profil">Profil :</label>
                                                    <input type="text" name="profil" id="profil" required>
                                                    <br>
                                                </div>
                                            </div>

                                            <div class="dflex jcc">

                                                <div>
                                                    <label for="sexe">Sexe :</label>
                                                    <input type="radio" name="sexe" id="sexe_masculin" value="Masculin"
                                                        required>
                                                    <label for="sexe_masculin">Masculin</label>
                                                    <input type="radio" name="sexe" id="sexe_feminin" value="Féminin"
                                                        required>
                                                    <label for="sexe_feminin">Féminin</label>
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="dflex jcc">
                                                <div>

                                                    <label for="id_classe"> classe :</label>
                                                    <input class="disabled" type="button" name="id_classe"
                                                        id="id_classe" value=" <?php
                                                        echo $params['name']->libelle;
                                                        ?>" required>
                                                    <br>

                                                </div>
                                                <div class="niveaueleve">
                                                    <?php
                                                    echo $params['niveau']->id_cycle;
                                                    ?>
                                                </div>
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
            <div class="dflex jcc">
                <h5>
                    <a href="/niveau/classe/<?= $params['niveau']->id_cycle ?>">
                        <?php echo $params['name']->libelle; ?>
                    </a> <span>
                        <?php
                        echo $_SESSION['statut'];
                        echo "<br/>";
                        ?>
                    </span>
                    <span>Effectif :
                        <?php echo $params['effectif']; ?>
                    </span>
                    <br>
                    <span>Moyenne : 13</span>
                </h5>
            </div>
            <div class="selection dflex jca">
                <div>
                    <div class="btn btn-primary">
                        <a href="/niveau/classe/<?= $params['niveau']->id_cycle ?>"> Retour</a>
                    </div>
                </div>
                <div>
                    <div class="btn btn-info">
                        <a href="/classe/coef/<?= $params['id'] ?>"> Coef</a>

                    </div>
                </div>
                <div>
                    <label for="groupe">Disciplines:</label><br>
                    <select id="groupe" name="groupe">
                        <option value="">Choisir</option>
                        <?php foreach ($params['disciplines'] as $discipline): ?>

                            <option value="<?= $discipline['id'] ?>">
                                <?php echo $discipline['libelle'] ?>
                            </option>
                        <?php endforeach; ?>

                    </select>
                </div>
                <div>
                    <label for="groupe">Semestre:</label><br>
                    <div style="border : solid 0.5px black; padding: 2px;">
                        <input type="hidden" name="semestre" value="<?php echo $params['semestre'][0]->id ?>">
                        <?php echo $params['semestre'][0]->libelle ?>
                    </div>
                </div>
                <div>
                    <label for="groupe">Notes:</label><br>
                    <select id="groupe" name="groupe">
                        <option value="">Choisir</option>
                        <?php foreach ($params['notes'] as $note): ?>
                            <option value="<?= $note->id ?>">
                                <?php echo $note->libelle ?>
                            </option>

                        <?php endforeach; ?>

                    </select>
                </div>
            </div>
            <!-- <?php print_r($params['eleve']); ?> -->
            <table>
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Prenoms & Nom</th>
                        <th>Note</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($params['eleves'] as $eleve): ?>
                        <tr>
                            <td> <img src="/../../images/logo.png" alt="" style="height: 50px;width: 50px;"></td>

                            <td>
                                <?php echo $eleve->prenom_eleve ?>
                                <?php echo $eleve->nom_eleve ?>
                            </td>

                            <td> <input type="number" name="note" id="note" value="10"
                                    style="height: 30px;width: 40px;"><span>/30</span></td>

                            <td> <button class="btn-primary">Voir</button> </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
</div>
<script src="/../../js/eleve.js"></script>