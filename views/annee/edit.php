<link rel="stylesheet" href="/../../css/annee.css">
<link rel="stylesheet" href="/../../css/style.css">

<div class="contenainers dflex fdc">
<h2>Modifier l'annee <?= $params['post']->libelle?> </h2>
<div class="mb-6">
        <form action="/annee/edit/<?= $params['post']->id?>" method="post">
            <div class="erreur dflex jcc aic "></div>
            <div class="monfor dflex   aic">
                <label for="anneeScolaireInput" class="form-label">Année scolaire :</label>
                <input type="text" class="form-control" id="anneeScolaireInput" name="annee_scolaire"
                    pattern="[0-9]{4}-[0-9]{4}" required  value="<?= $params['post']->libelle?>">
                <input name="" id="envoi" class="btn btn-primary" type="submit" value="Modifier">
            </div>
        </form>
        <?php if (!empty($params['errorMessage'])) : ?>
            <div class="error-message dflex jcc aic"><?php echo $params['errorMessage'] ?></div>
         <?php endif; ?>
    </div>
</div>
<script src="js/annee.js"></script>
