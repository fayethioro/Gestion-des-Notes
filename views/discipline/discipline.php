<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gestion des disciplines</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/../../css/annee.css">
    <link rel="stylesheet" href="/../../css/niveau.css">
    <link rel="stylesheet" href="/../../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <header>
        <div class="entete dflex  ">
            <div class="logo">
                <img src="/../../images/logo.png" alt="">
            </div>
            <div class="info dflex ">
                <div><i class="fa-solid fa-house"></i><span>Breukh’S Cool</span></div>
                <div><i class="fa-solid fa-phone"></i><span>33 123 12 21</span></div>
                <div><i class="fa-solid fa-users"> </i> <span>A-propos de nous</span></div>
                <div> <i class="fas fa-sign-out-alt"></i><span><a href="/">Se deconnecter</a></span></div>
            </div>
        </div>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/annee">Années Scolaires</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/niveau">Cycle</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/discipline/gestion">Gestion des disciplines</a>
                </li>

            </ul>
        </nav>

    </header>
    <div class="container">
        <main>
            <h2>Ajouter une gestion de discipline</h2>
            <form action="" id="gestion-discipline-form" class="formulaire dflex jcc fdc aic">
                <div class="dflex jca form">

                    <div>
                        <label for="cycle">Cycle:</label><br>
                        <select id="cycle" name="cycle">
                            <option value="">Sélectionner un cycle</option>
                        </select>
                    </div>
                    <div>
                        <label for="classe">Classe:</label><br>
                        <select id="classe" name="classe">
                            <option value="">Sélectionner une classe</option>
                        </select>
                    </div>
                </div>
                <div class="dflex jca form">
                    <div>
                        <label for="groupe">Groupe de discipline:</label><br>
                        <select id="groupe" name="groupe">
                            <option value="">Sélectionner un groupe</option>
                            <option value="0" class="mon-groupe">
                                nouveau
                            </option>
                        </select>
                    </div>
                    <div>
                        <label for="discipline">Discipline:</label><br>
                        <input type="text" id="discipline" name="discipline" placeholder="Saisir une discipline"
                            required>
                    </div>
                </div>
                <div class="dflex jcc form">

                    <input type="button" id="add-button" class="btn btn-primary" value="Ajouter">
                </div>
            </form>
            <?php var_dump($params['disciplines']); ?>
            <h2>Les discipline de la classe <a href="#"> <span class="classeDiscipline">

                    </span></a></h2>

            <table id="discipline-table">
                <thead>
                    <tr>
                        <th>Selectionner</th>
                        <th>Libellé</th>
                        <th>Code de la discipline</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <!-- Les lignes du tableau seront générées dynamiquement par JavaScript -->
                </tbody>
            </table>
            <div class="dflex maj">
                <input type="button" id="delete-button" class="btn btn-primary " value="Mette à jour">

            </div>
            <div class="modal-formulaire">
                <form>
                    <label for="discipline">Groupe discipline:</label><br>
                    <input type="text" id="groupediscipline" class="libelle" name="libelle"
                        placeholder="Saisir une groupe" required>
                    <br>
                    <div class="dflex jcc form">

                        <input type="button" id="add-buttonmodal" class="btn btn-primary ajout" value="Ajouter">
                        <input type="button" id="add-buttonf" class="btn btn-danger fermer" value="Fermer">

                    </div>
                </form>
            </div>

    </div>
    </main>
    </div>
</body>
<script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
<script src="/../../js/discipline.js"></script>

</html>