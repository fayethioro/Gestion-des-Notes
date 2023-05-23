<style>
    header {
        height: 20%;
        background-color: aliceblue;
        display: none;
    }

    .cadre {
        margin-top: 20px;
        width: 100%;
        background: url(/images/bacckgroundconnexion.jpg);
        height: 100%;
    }

    .containere {
        width: 50%;
        height: 90%;
    }

    .login {
        border-bottom: 1px solid gray;
        margin-bottom: 20px;
        text-align: center;
        font-family: 'Poppins';
    }

    .connexion {
        width: 60%;
        height: 80%;
        margin-top: 5px;
    }

    input {
        margin-bottom: 20px;
        margin-top: 10px;
    }

    .forget {
        justify-content: end;
        font-size: 0.8em;
    }

    button {
        background: #1b7bbb;
        margin-top: 15px;
        width: 150px;
        outline: none;
        color: azure;
    }
</style>

<div class="cadre dflex jcc aic">

    <div class="containere dflex jcc aic fdc ">
        <h2>Content de vous revoir !</h2>
        <div class="connexion shadow-lg p-3 mb-8 bg-body rounded  dflex  fdc ">
            <div class="login">
                Login
            </div>
            <div class="formulaire  dflex jcc">
                <form action="/login" method="post">
                    <label for="telephone">Téléphone:</label><br>
                    <input type="tel" id="telephone" name="telephone" placeholder="Numéro de téléphone" required><br>
                    <label for="password">Mot de passe :</label><br>
                    <input type="password" id="password" name="password" placeholder="mot de passe" required><br>
                    <div class="forget  dflex ">
                        <a href=""> Mot de passe oublié </a>
                    </div>
                    <div class="dflex jcc aic "><button type="submit">
                        <a href="\" style="text-transform: none; color: white;"  >Se connecter</a>
                    </button></div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>
