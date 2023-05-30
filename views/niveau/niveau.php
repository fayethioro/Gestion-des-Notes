<link rel="stylesheet" href="css/niveau.css">
<link rel="stylesheet" href="css/annee.css">


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
              <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="/niveau" method="post" class="monform">
                <div class="erreur dflex jcc aic "></div>
                <div>
                  <label>libelle</label>
                  <input type="text" name="niveau" id="anneeScolaireInput" required>
                  <input name="" id="envoi" class="btn btn-primary" type="submit" value="Ajouter">
                </div>
              </form>
              <?php if (!empty($params['errorMessage'])): ?>
                <div class="error-message dflex jcc aic">
                  <?php echo $params['errorMessage'] ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <h3>Annee Scolaire <span>
        <?php
        echo $_SESSION['statut'];
        ?>

      </span></h3>
    <section class="field">
      <table>
        <thead>
          <tr>
            <th>Cycle</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($params['post'] as $niveau): ?>
            <tr>
              <td>
                <?= $niveau->libelle ?>
              </td>
              <td>
                <a href="/niveau/classe/<?= $niveau->id ?>" class="btn btn-primary ">Voir</a>
                <a href="/niveau/delete/<?= $niveau->id ?>" class="btn btn-danger ">Supprimer</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>
  </main>
</div>
<script src="js/annee.js"></script>