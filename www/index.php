<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Utopia</title>
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="layout/css/style.css" rel="stylesheet">
</head>
<body>

<section id="game">
    <div class="container">
        <div class="header">
            <h1 class="uppercase text-center">Utopia</h1>
        </div>
        <div class="header-game" style="display : none">
            <h1 class="uppercase">Utopia</h1>
        </div>
    </div>
    <div class="game-form text-center">
        <form class="formStart" method="post">
            <table>
                <tr>
                    <td><label for="nom">Nom de la ville</label></td>
                    <td><input type="text" name="nom" id="nom" value=""/></td>
                </tr>
                <tr>
                    <td><label for="mdp">Mot de passe</label></td>
                    <td><input type="password" name="mdp" id="mdp" value=""/></td>
                </tr>
                <tr>
                    <td><label for="race">Civilisation</label></td>
                    <td>
                        <select name="race" id="race">
                            <option value=""></option>
                            <option value="1">Celte</option>
                            <option value="2">Gaëlique</option>
                            <option value="3">Romaine</option>
                            <option value="4">Viking</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">
                        <button class="submitForm" type="submit">Envoyer</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <section class="container" style="display : none">
        <div class="info-town">
            <div class="row">
                <div class="col-xs-1">
                    <p>Ville</p>
                    <span id="name-town"></span>
                </div>
                <div class="col-xs-1">
                    <p>Race</p>
                    <span id="race"></span>
                </div>
                <div class="col-xs-1">
                    <p>Niveau</p>
                    <span id="level"></span>
                </div>
                <div class="col-xs-1">
                    <p>Tour</p>
                    <span id="turn"></span>
                </div>
                <div class="col-xs-1">
                    <p>Zone</p>
                    <span id="zone"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1">
                    <p>Population</p>
                    <span id="pop"></span>
                </div>
                <div class="col-xs-1">
                    <p>Population max</p>
                    <span id="popmax"></span>
                </div>
                <div class="col-xs-1">
                    <p>Population active</p>
                    <span id="popactive"></span>
                </div>
                <div class="col-xs-1">
                    <p>Bois</p>
                    <span id="wood"></span>
                </div>
                <div class="col-xs-1">
                    <p>Pierre</p>
                    <span id="stone"></span>
                </div>
                <div class="col-xs-1">
                    <p>Or</p>
                    <span id="gold"></span>
                </div>
                <div class="col-xs-1">
                    <p>Nourriture</p>
                    <span id="food"></span>
                </div>
                <div class="col-xs-1">
                    <p>Armée</p>
                    <span id="army"></span>
                </div>
                <div class="col-xs-1">
                    <p>Prospérité</p>
                    <span id="prosp"></span>
                </div>
            </div>
        </div>

        <div class="event">
            <h4 id="name-event" class="text-center"></h4>
            <p id="message-event" class="text-center"></p>
        </div>

        <p id="result"></p>
        <button class="endTurn" type="submit">Fin du tour</button>
    </section>
</section>




<script type="text/javascript" src="bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript" src="controllers/ajax/ajax.js"></script>

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>

