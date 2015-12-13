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
    <div class="header">
        <h1 class="uppercase text-center">Utopia</h1>
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
        <p></p>
        <button class="endTurn" type="submit">Fin du tour</button>
    </section>
</section>




<script type="text/javascript" src="bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript" src="controllers/ajax/ajax.js"></script>

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>

