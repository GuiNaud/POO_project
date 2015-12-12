<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Utopia</title>
</head>
<body>

<form class="formStart" method="post">
    <label for="nom">Nom de la ville</label>
    <input type="text" name="nom" id="nom" value=""/><br>
    <label for="mdp">Mot de passe</label>
    <input type="password" name="mdp" id="mdp" value=""/><br>
    <label for="race">Civilisation</label>
    <select name="race" id="race">
        <option value=""></option>
        <option value="1">Celte</option>
        <option value="2">Gaëlique</option>
        <option value="3">Romaine</option>
        <option value="4">Viking</option>
    </select><br>
    <button class="submitForm" type="submit">Envoyer</button>
</form>

<section class="container" style="display : none">
    <p></p>
    <button class="endTurn" type="submit">Fin du tour</button>
</section>


<script type="text/javascript" src="bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript" src="controllers/ajax/ajax.js"></script>

</body>
</html>

