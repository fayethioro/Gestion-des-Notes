<link rel="stylesheet" href="css/annee.css">

<style>
.card-body {
    background: linear-gradient(90deg, rgba(0, 1, 36, 0.37409541453300066) 0%,
            rgba(8, 12, 14, 0.6112570028011204) 0%, rgba(8, 12, 14, 0.812937675070028) 11%),
        url(images/vue-dessus-du-concept-retour-ecole.jpg);
    background-size: cover;
    color: white;
    height: 160px;
    text-align: center;
}
</style>
<div class="contenainers dflex fdc">
    <div class="mb-6">
        <form action="/annee" method="post">
            <div class="erreur dflex jcc aic "></div>
            <div class="monfor dflex   aic">
                <label for="anneeScolaireInput" class="form-label">Année scolaire :</label>
                <input type="text" class="form-control" id="anneeScolaireInput" name="annee_scolaire"
                    pattern="[0-9]{4}-[0-9]{4}" required placeholder="Format : 2021-2022">
                <input name="" id="envoi" class="btn btn-primary" type="submit" value="Ajouter">
            </div>
        </form>
        <?php if (!empty($params['errorMessage'])) : ?>
            <div class="error-message dflex jcc aic"><?php echo $params['errorMessage'] ?></div>
         <?php endif; ?>
    </div>
    <div class="row">
        <?php foreach ($params['posts'] as $annee): ?>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body dflex aic jcc">
                        <h5 class="card-title">
                            <?= $annee->libelle ?>
                        </h5>
                    </div>
                    <div class="dflex jca" style="margin: 10px 10px;" >
                    <?php if ($annee->statut == 0): ?>
                            <a href="/annee/modifier/<?= $annee->id ?>"
                             class="btn btn-primary ">Activer</a>
                         <a href="/annee/delete/<?= $annee->id ?>" class="btn btn-danger" >Supprimer</a>
                        <?php else: ?>
                            <a href="/annee/modifier/<?= $annee->id ?>" 
                            class="btn btn-primary disabled">Désactiver</a>
                         <a href="/annee/delete/<?= $annee->id ?>" class="btn btn-danger disabled" >Supprimer</a>

                        <?php endif; ?>
                        <a href="/annee/edit/<?= $annee->id ?>" class="btn btn-warning" >Modifier</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

    </div>
</div>
<script src="js/annee.js"></script>