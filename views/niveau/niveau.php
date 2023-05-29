<link rel="stylesheet" href="css/niveau.css">

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
              <form action="/niveau" method="post">
                <label>libelle</label>
                <input type="text" name="niveau" id="niveau">
                <input name="" id="envoi" class="btn btn-primary" type="submit" value="Ajouter">
              </form>
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
          </tr>
        </thead>
        <tbody>

          <?php foreach ($params['post'] as $niveau): ?>
            <tr>
              <td><a href="/niveau/classe/<?= $niveau->id ?>">
                  <?= $niveau->libelle ?>
                </a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>
  </main>
</div>