
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
        <option value="celtic">Celte</option>
        <option value="gallic">Gaëlique</option>
        <option value="roman">Romaine</option>
        <option value="Viking">Viking</option>
    </select><br>
    <button class="submitForm" type="submit">Envoyer</button>
</form>


<script type="text/javascript" src="bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript" src="controllers/ajax/ajax.js"></script>

</body>
</html>


