<link rel="stylesheet" href="/../../css/annee.css">
<link rel="stylesheet" href="/../../css/niveau.css">
<link rel="stylesheet" href="/../../css/style.css">
<div class="container">

    <main>
        <h2>Les disciplines de la classe <a href="../../niveau/classe/<?= $params['name']->id; ?>">
                <?php
                echo $params['name']->libelle;
                ?>
            </a></h2>


        <form id="update-form">
            <br>
            <table id="discipline-table">
                <thead>
                    <tr>
                        <th scope="col">Disciplines</th>
                        <th scope="col">Ressources</th>
                        <th scope="col">Examen</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($params['disciplines'] as $niveau): ?>
                        <tr>
                            <td class="thioro">
                                <input type="hidden" name="" value="<?= $niveau['id'] ?>" class="lib">
                                <?= $niveau['libelle'] ?>
                            </td>
                            <td class="thioro">
                                <input type="number" name="ressource" id="ressource_<?= $niveau['id'] ?>"
                                    value="<?= $niveau['ressource'] ?>" class="ressource">
                            </td>
                            <td class="thioro">
                                <input type="number" name="examen" id="examen_<?= $niveau['id'] ?>"
                                    value="<?= $niveau['examen'] ?>" class="examen">
                            </td>
                            <td>
                                <a href=" /classe/coef/<?= $niveau['id_classe'] ?>"
                                    class="btn btn-danger supprimer disabled"><i class="fa-regular fa-trash-can   "
                                        style="color: white;"></i>

                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <!-- Tableau des disciplines -->
            </table>

            <br>
            <div class="dflex jcc ">
                <input type="submit" class="btn btn-primary  ajouter" value="Mettre à jour">
            </div>
        </form>
    </main>
</div>
<script src="/../../js/classe.js"></script>