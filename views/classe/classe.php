<style>
    .contenainer {
        height: 60%;
        width: 100%;
        margin-left: 10px;
    }

    .classe {
        gap: 10px;
    }

    .classe span {
        padding-top: 10px;
    }

    main {
        width: 80%;
        height: auto;
        padding: 20px;
        margin: 5px auto;
        background: whitesmoke;
        font-family: system-ui;
        color: #666;
    }

    .header {
        width: 95%;
        height: 50px;
        margin-bottom: 20px;
        justify-content: space-between;
    }

    .items-controller,
    .search {
        flex-shrink: 0;
        align-content: center;
    }

    .items-controller {
        width: 150px;
    }

    .search>input {
        padding: 8px;
        border: none;
        outline: navajowhite;
        margin: 0 0 0 10px;
        background: white;
    }

    .field {
        width: 90%;
        height: auto;
        margin: auto;
    }

    table {
        width: 100%;
        margin: 2px auto;
        table-layout: auto;
        color: #757575;
        background-color: #ffff;
        border-collapse: collapse;
        border-spacing: 0;
        text-align: left;
    }

    table tr th,
    td {
        padding: 10px;
        border: 1px solid #ccc;
    }

    .bottom-field {
        width: 100%;
        padding: 20px;
        margin-top: 20px;
    }

    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .pagination li {
        list-style: none;
        padding: 2px;
        margin: 10px;
        flex-shrink: 0;
        text-align: center;
        border-radius: 5px;
        border: 1px solid #999;
        color: #999;
    }

    .pagination li.active {
        background: #1b7bbb;
        color: white;
        border-color: #1b7bbb;

    }

    .pagination li a {
        text-decoration: none;
        padding: 3px 8px;
        color: inherit;
        display: block;
        font-family: sans-serif;
        font-size: 13px;
    }

    i {
        margin: 2px;
    }

    i.fa-edit {
        color: lime;
    }

    i.fa-trash {
        color: red;
    }

    i.fa-plus {
        padding-top: 5px;
        color: white;
    }

    .jca {
        justify-content: space-around;
    }

    #Enregistrer a {
        color: white;
        text-transform: none;
    }
</style>
<div class="contenainer dflex fdc">
    <main>
        <section class="header dflex jcc">
            <div class="items-controller classe dflex">
                <span>Voir</span>
                <select name="" id="itemperpage">
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="08" selected>08</option>
                </select>
                <span>Par Page</span>
            </div>
            <div class="cycle classe dflex">
                <span>Cycle</span>
                <label>
                    <select>
                        <option value="">Sélectionner</option>
                        <option value="elementaire">Elémentaire</option>
                        <option value="moyen">Moyen</option>
                        <option value="Secondaire">Secondaire</option>
                    </select>
                </label>
            </div>
            <div class="classe dflex">
                <span> Niveau</span>
                <label>
                    <select>
                        <option value="">niveau</option>
                        <option value="CI">CI</option>
                        <option value="CP">CP</option>
                        <option value="CE1">CE1</option>
                        <option value="CE2">CE2</option>
                        <option value="CM1">CM1</option>
                        <option value="CM2">CM2</option>
                        <option value="6eme">6ème</option>
                        <option value="5eme">5ème</option>
                        <option value="4eme">4ème</option>
                        <option value="3eme">3ème</option>
                        <option value="2nde">2nde</option>
                    </select>
                </label>
            </div>

            <div class="search classe dflex">
                <span>Recherche</span>
                <input type="text" name="" id="search" placeholder="recherche" />
            </div>
            <div class="niveau classe dflex">
                <span>Classe</span>
                <!-- Bouton pour ouvrir le modal -->
                <!-- Modal -->
                <div>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        <i class="fa-solid fa-user-plus" style="color: white;" ></i>
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">
                                        Ajouter une classe
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/classe" method="post" class="dflex jcc">
                                        <div>
                                        <label for="id_classe">Niveau:</label><br>
                                        <select id="profil" name="profil" required>
                                            <option value="">Sélectionner un niveau</option>
                                            <option value="CI">CI</option>
                                            <option value="CP">CP</option>
                                            <option value="CE1">CE1</option>
                                            <option value="CE2">CE2</option>
                                            <option value="CM1">CM1</option>
                                            <option value="CM2">CM2</option>
                                            <option value="6eme">6ème</option>
                                            <option value="5eme">5ème</option>
                                            <option value="4eme">4ème</option>
                                            <option value="3eme">3ème</option>
                                            <option value="2nde">2nde</option>
                                        </select>

                                        <br><br> <label for="id_annee">Année scolaire:</label><br>
                                        <input type="text" name="id-classe" id="id-classe" placeholder="2022-2023" ><br>
                                        <br> <label for="id_classe">Classe:</label><br>
                                        <input type="text" name="id-classe" id="id-classe"><br>
                                        </div>
                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        fermer
                                    </button>
                                    <div class="btn btn-primary" id="Enregistrer" a>
                                        <a href="\classe">Ajouter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="field">

            <table>
                <thead>
                    <tr>
                        <th>classe</th>
                        <th>Niveau</th>
                        <th>Annee scolaire</th>
                        <th>effectif</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($params['posts'] as $classe): ?>
                        <tr>
                            <td><?=$classe->nom_classe?></td>
                            <td><?=$classe->nom_niveau?></td>
                            <td><?=$classe->nom_annee?></td>
                            <td><?=$classe->effectif_classe?></td>

                            <td>
                            <a href="#" class="btn btn-warning" >Modifier</a>
                               <a href="#" class="btn btn-danger" >Supprimer</a>
                               <a href="#" class="btn btn-primary" >Voir plus</a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

            <div class="bottom-field">
                <ul class="pagination">
                    <li class="prev"><a href="#" id="prev">&#139;</a></li>
                    <!-- page number here -->
                    <li class="next"><a href="#" id="next">&#155;</a></li>
                </ul>
            </div>
        </section>
    </main>
</div>
<script>
    let tbody = document.querySelector('tbody')
    let pageUl = document.querySelector('.pagination')
    let itemShow = document.querySelector('#itemperpage')
    let tr = tbody.querySelectorAll('tr')
    let emptyBox = []
    let index = 1
    let itemPerPage = 8

    for (let i = 0; i < tr.length; i++) {
        emptyBox.push(tr[i])
    }

    itemShow.onchange = giveTrPerPage

    function giveTrPerPage() {
        itemPerPage = Number(this.value)
        displayPage(itemPerPage)
        pageGenerator(itemPerPage)
        getpagElement(itemPerPage)
    }

    function displayPage(limit) {
        tbody.innerHTML = ''
        for (let i = 0; i < limit; i++) {
            tbody.appendChild(emptyBox[i])
        }
        const pageNum = pageUl.querySelectorAll('.list')
        pageNum.forEach(n => n.remove())
    }
    displayPage(itemPerPage)

    function pageGenerator(getem) {
        const num_of_tr = emptyBox.length
        if (num_of_tr <= getem) {
            pageUl.style.display = 'none'
        } else {
            pageUl.style.display = 'flex'
            const num_Of_Page = Math.ceil(num_of_tr / getem)
            for (i = 1; i <= num_Of_Page; i++) {
                const li = document.createElement('li')
                li.className = 'list'
                const a = document.createElement('a')
                a.href = '#'
                a.innerText = i
                a.setAttribute('data-page', i)
                li.appendChild(a)
                pageUl.insertBefore(li, pageUl.querySelector('.next'))
            }
        }
    }
    pageGenerator(itemPerPage)
    let pageLink = pageUl.querySelectorAll('a')
    let lastPage = pageLink.length - 2

    function pageRunner(page, items, lastPage, active) {
        for (button of page) {
            button.onclick = e => {
                const page_num = e.target.getAttribute('data-page')
                const page_mover = e.target.getAttribute('id')
                if (page_num != null) {
                    index = page_num
                } else {
                    if (page_mover === 'next') {
                        index++
                        if (index >= lastPage) {
                            index = lastPage
                        }
                    } else {
                        index--
                        if (index <= 1) {
                            index = 1
                        }
                    }
                }
                pageMaker(index, items, active)
            }
        }
    }
    let pageLi = pageUl.querySelectorAll('.list')
    pageLi[0].classList.add('active')
    pageRunner(pageLink, itemPerPage, lastPage, pageLi)

    function getpagElement(val) {
        let pagelink = pageUl.querySelectorAll('a')
        let lastpage = pagelink.length - 2
        let pageli = pageUl.querySelectorAll('.list')
        pageli[0].classList.add('active')
        pageRunner(pagelink, val, lastpage, pageli)
    }

    function pageMaker(index, item_per_page, activePage) {
        const start = item_per_page * index
        const end = start + item_per_page
        const current_page = emptyBox.slice(
            start - item_per_page,
            end - item_per_page
        )
        tbody.innerHTML = ''
        for (let j = 0; j < current_page.length; j++) {
            let item = current_page[j]
            tbody.appendChild(item)
        }
        Array.from(activePage).forEach(e => {
            e.classList.remove('active')
        })
        activePage[index - 1].classList.add('active')
    }

    // search content
    let search = document.getElementById('search')
    search.onkeyup = e => {
        const text = e.target.value
        for (let i = 0; i < tr.length; i++) {
            const matchText = tr[i].querySelectorAll('td')[3].innerText
            if (matchText.toLowerCase().indexOf(text.toLowerCase()) > -1) {
                tr[i].style.visibility = 'visible'
            } else {
                tr[i].style.visibility = 'collapse'
            }
        }
    }
    // Fonction pour valider le formulaire
    function validerFormulaire() {
        // Récupérer les valeurs des champs
        var cycle = document.querySelector('select[name="cycle"]').value;
        var niveau = document.getElementById('id-niveau').value;

        // Vérifier si les champs sont vides
        if (cycle === '' || niveau === '') {
            alert('Veuillez remplir tous les champs obligatoires.');
            return false; // Empêcher l'envoi du formulaire
        }

        // Ajoutez ici d'autres validations si nécessaire

        return true; // Autoriser l'envoi du formulaire
    }

</script>