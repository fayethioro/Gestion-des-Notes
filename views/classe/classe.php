<link rel="stylesheet" href="/../../css/annee.css">
<link rel="stylesheet" href="/../../css/niveau.css">
<link rel="stylesheet" href="/../../css/style.css">

<div class="contenainer dflex fdc">
    <main>
        <section class="header dflex  jca">
            <div>
                <p>
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                        semestre en cours
                    </a>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body semeste ">
                        <div class="row">
                            <?php foreach ($params['semestre'] as $semes): ?>
                                <div class="col-sm-4 dflex seme">
                                    <div class="card-body-semestre ">
                                        <div class="card-title" style="color: white;
                                         margin: 5px; text-align: center; font-weight:900;">
                                            <?= $semes->libelle ?>
                                        </div>
                                        <div class="dflex jca semestre">
                                            <?php if ($semes->etat == 0): ?>
                                                <a href="/annee/modifie/<?= $semes->id ?>" class="btn btn-primary ">
                                                    Activer</a>
                                            <?php else: ?>
                                                <a href="/annee/modifie/<?= $semes->id ?>"
                                                    class="btn btn-danger disabled">Désactiver</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Button trigger modal -->
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
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
                                <form action="/niveau/classe/ajouter" method="post">
                                    <div class="erreur dflex jcc aic "></div>
                                    <div class="dflex jca ">
                                        <div class="cycle">
                                            <?php
                                            echo $params['name']->libelle; ?>
                                        </div>
                                        <div>
                                            <input type="hidden" name="id_cycle" value="<?php
                                            echo $params['id']
                                                ?>">
                                            <label for="libelle">Libellé :</label>
                                            <input type="text" name="libelle" id="anneeScolaireInput" required>
                                            <input type="submit" value="Ajouter" class="btn btn-primary">
                                        </div>
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
                        <th>Classe</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($params['classe'] as $niveau): ?>
                        <tr>
                            <td>
                                <?= $niveau->libelle ?>
                            </td>
                            <td>
                                <a href="/classe/liste/<?= $niveau->id ?>" class="btn btn-primary ">Eleve</a>
                                <a href="/classe/coef/<?= $niveau->id ?>" class="btn btn-info ">Discipline</a>
                                <a href="/niveau/classe/delete/<?= $niveau->id_cycle ?>"
                                    class="btn btn-danger disabled ">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
</div>
<script src="/../../js/annee.js"></script>