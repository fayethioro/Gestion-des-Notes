<link rel="stylesheet" href="/../../css/niveau.css">
<link rel="stylesheet" href="/../../css/style.css">

<div class="contenainer dflex fdc">
    <main>
        <section class="header dflex ">
            <div class="niveau classe dflex">
                <span>Niveau</span>
           </div>
        </section>
        <section class="field">
        <h3>Annee Scolaire <span>
            <?php 
             echo $_SESSION[ 'statut' ] ;
             ?>
        </span></h3>
            <table>
                <thead>
                    <tr>
                        <th>Classe</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($params['classe'] as $niveau): ?>
                        <tr>
                            <td><a href="#"> 
                            <?=$niveau->libelle?>
                        </a></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </section>
    </main>
</div>
















