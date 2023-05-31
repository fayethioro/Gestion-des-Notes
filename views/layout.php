<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Gestion des Notes</title>

    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'app.css' ?>">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <div class="entete dflex  ">
            <div class="logo">
                <img src="images/logo.png" alt="">
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
                    <a class="nav-link" href="#">Liste des eleves</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liste des classes</a>
                </li>

            </ul>
        </nav>

    </header>

    <div class="container">
        <?= $content ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>