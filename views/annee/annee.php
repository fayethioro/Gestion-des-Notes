<style>
    .contenainers {
        height: auto;
        width: 100%;
        margin-left: 10px;
        background: #f5f5f5;
        margin-top: 7px;
    }

    .monfor {
        width: 40%;
        margin: auto;
        justify-content: space-around;
        border-bottom: 1px solid gray;
        box-shadow: 4px 4px 5px 0px rgba(0, 0, 0, 0.75);
        -webkit-box-shadow: 4px 4px 5px 0px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 4px 4px 5px 0px rgba(0, 0, 0, 0.75);
        color: #1b7bbb;
    }

    #anneeScolaireInput {
        width: 40%;
    }

    .row {
        margin: 10px 10px 10px 10px;

    }

    .fa-calendar-pen {
        color: red;
    }

    .card-body {
        background: linear-gradient(90deg, rgba(0, 1, 36, 0.37409541453300066) 0%,
                rgba(8, 12, 14, 0.6112570028011204) 0%, rgba(8, 12, 14, 0.812937675070028) 11%),
            url(images/vue-dessus-du-concept-retour-ecole.jpg);
        background-size: cover;
        color: white;
        height: 160px;
        text-align: center;
    }

    i.fa-pen-to-square {
        color: lime;
    }

    i.fa-trash {
        color: red;
    }

    #statut {
        border-radius: 20px;
        margin-top: 2px;
        border: 1px solid green;
        width: 80px;
        height: auto;
        padding: 5px;
        text-align: center;
        color: #1b7bbb;
        background: aliceblue;
    }

    .jca {
        justify-content: space-around;
        gap: 10px;
    }

    button {
        border-radius: 20px;
        border: none;
        width: 20%;
        height: 20px;
    }

    .bouton {
        margin-top: 5px;
        font-size: 10px;
        font-family: 'Poppins';
    }

    #statut {
        background: #1b7bbb;
        color: black;
    }

    #edit {
        background: green;
    }

    #sup {
        background: red;
    }

    #infos {
        background: blue;
    }
    .error-message{
        color: red;
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
                            <?= $annee->nom_annee ?>
                        </h5>
                        <p class="card-text"></p>
                    </div>
                </div>
                <div class="dflex jca aic bouton">
                    <button onclick="disableButtons()" id="statut">Statut</button>
                    <button id="edit">modifier</button>
                    <button id="sup">supprimer</button>
                    <button id="infos">plus</button>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
    <script>
        const erreur = document.querySelector('.erreur');

        let bloc = document.createElement('div');

        bloc.classList.add("notif");
        erreur.appendChild(bloc);
        function notification(texte) {
            let chg = document.createElement('div');
            bloc.appendChild(chg);
            chg.classList.add('dive');
            chg.innerHTML = texte;
            chg.style.color = 'red';

            setTimeout(function () {
                chg.style.display = 'none';
            }, 2500);

        }
        const errorMessage =document.querySelector('.error-message');
        setTimeout(function () {
            errorMessage.style.display = 'none';
            }, 2500);

        function validateForm() {
            var anneeScolaireInput = document.getElementById("anneeScolaireInput").value;
            var annees = anneeScolaireInput.split("-");
            var regex = /^(\d{4}-\d{4})$/;


            if (anneeScolaireInput.length === 0) {
                notification("ce champs est obligatoire.");
                return false;
            }
            else {
                if (!regex.test(anneeScolaireInput)) {
                    notification("Le format de date doit être dddd-mmmm (ex. 2021-2022).");
                    return false;
                }
            }

            return true;
        }
        let envoi = document.getElementById("envoi");
        envoi.addEventListener("click", validateForm)

        // const toggleButtons = document.querySelectorAll("#statut");
        const toggleButton = document.querySelector("#statut");
        const edit = document.getElementById("edit");
        const sup = document.getElementById("sup");
        const infos = document.getElementById("infos");
        // toggleButtons.forEach(toggleButton => {
        toggleButton.addEventListener("click", function () {
            let isDisabled = edit.disabled;

            if (isDisabled) {
                toggleButton.innerHTML = "Active";
                edit.disabled = false;
                sup.disabled = false;
                infos.disabled = false;
            } else {
                toggleButton.innerHTML = "Desactive";
                edit.disabled = true;
                sup.disabled = true;
                infos.disabled = true;
            }
            updateTitleStyle();
        });
        // });
        function updateTitleStyle() {
            let isDisabled = sup.disabled;
            const title = document.querySelector('.card-title');
            if (isDisabled) {
                title.style.color = "red";
            } else {
                title.style.color = "white";
            }
        }
    </script>