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
                    <p>Niveau</p>
                    <span id="level"></span>
                </div>
                <div class="col-xs-1">
                    <p>Tour</p>
                    <span id="turn"></span>
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

        <div class="town">
            <table id="town-zone">
                <tr>
                    <td class="zone" id="zone1">
                        <select name="batiment" id="1">
                            <option value=""></option><option value="1">Hotel de ville</option><option value="2">Château</option><option value="3">Maisons</option><option value="4">Eglise</option><option value="5">Mine d'or</option><option value="6">Scierie</option><option value="7">Carrière</option><option value="8">Champs</option><option value="9">Caserne</option><option value="10">Forge</option><option value="11">Académie</option><option value="12">Etable</option><option value="13">Marché</option><option value="14">Charpentier</option><option value="15">Boucherie</option><option value="16">Tanneur</option>
                        </select>
                    </td>
                    <td class="zone" id="zone2">
                        <select name="batiment" id="2">
                            <option value=""></option><option value="1">Hotel de ville</option><option value="2">Château</option><option value="3">Maisons</option><option value="4">Eglise</option><option value="5">Mine d'or</option><option value="6">Scierie</option><option value="7">Carrière</option><option value="8">Champs</option><option value="9">Caserne</option><option value="10">Forge</option><option value="11">Académie</option><option value="12">Etable</option><option value="13">Marché</option><option value="14">Charpentier</option><option value="15">Boucherie</option><option value="16">Tanneur</option>
                        </select>
                    </td>
                    <td class="zone" id="zone3">
                        <select name="batiment" id="3">
                            <option value=""></option><option value="1">Hotel de ville</option><option value="2">Château</option><option value="3">Maisons</option><option value="4">Eglise</option><option value="5">Mine d'or</option><option value="6">Scierie</option><option value="7">Carrière</option><option value="8">Champs</option><option value="9">Caserne</option><option value="10">Forge</option><option value="11">Académie</option><option value="12">Etable</option><option value="13">Marché</option><option value="14">Charpentier</option><option value="15">Boucherie</option><option value="16">Tanneur</option>
                        </select>
                    </td>
                    <td class="zone" id="zone4">
                        <select name="batiment" id="4">
                            <option value=""></option><option value="1">Hotel de ville</option><option value="2">Château</option><option value="3">Maisons</option><option value="4">Eglise</option><option value="5">Mine d'or</option><option value="6">Scierie</option><option value="7">Carrière</option><option value="8">Champs</option><option value="9">Caserne</option><option value="10">Forge</option><option value="11">Académie</option><option value="12">Etable</option><option value="13">Marché</option><option value="14">Charpentier</option><option value="15">Boucherie</option><option value="16">Tanneur</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="zone" id="zone5">
                        <select name="batiment" id="5">
                            <option value=""></option><option value="1">Hotel de ville</option><option value="2">Château</option><option value="3">Maisons</option><option value="4">Eglise</option><option value="5">Mine d'or</option><option value="6">Scierie</option><option value="7">Carrière</option><option value="8">Champs</option><option value="9">Caserne</option><option value="10">Forge</option><option value="11">Académie</option><option value="12">Etable</option><option value="13">Marché</option><option value="14">Charpentier</option><option value="15">Boucherie</option><option value="16">Tanneur</option>
                        </select>
                    </td>
                    <td class="zone" id="zone6">
                        <select name="batiment" id="6">
                            <option value=""></option><option value="1">Hotel de ville</option><option value="2">Château</option><option value="3">Maisons</option><option value="4">Eglise</option><option value="5">Mine d'or</option><option value="6">Scierie</option><option value="7">Carrière</option><option value="8">Champs</option><option value="9">Caserne</option><option value="10">Forge</option><option value="11">Académie</option><option value="12">Etable</option><option value="13">Marché</option><option value="14">Charpentier</option><option value="15">Boucherie</option><option value="16">Tanneur</option>
                        </select>
                    </td>
                    <td class="zone" id="zone7">
                        <select name="batiment" id="7">
                            <option value=""></option><option value="1">Hotel de ville</option><option value="2">Château</option><option value="3">Maisons</option><option value="4">Eglise</option><option value="5">Mine d'or</option><option value="6">Scierie</option><option value="7">Carrière</option><option value="8">Champs</option><option value="9">Caserne</option><option value="10">Forge</option><option value="11">Académie</option><option value="12">Etable</option><option value="13">Marché</option><option value="14">Charpentier</option><option value="15">Boucherie</option><option value="16">Tanneur</option>
                        </select>
                    </td>
                    <td class="zone" id="zone8">
                        <select name="batiment" id="8">
                            <option value=""></option><option value="1">Hotel de ville</option><option value="2">Château</option><option value="3">Maisons</option><option value="4">Eglise</option><option value="5">Mine d'or</option><option value="6">Scierie</option><option value="7">Carrière</option><option value="8">Champs</option><option value="9">Caserne</option><option value="10">Forge</option><option value="11">Académie</option><option value="12">Etable</option><option value="13">Marché</option><option value="14">Charpentier</option><option value="15">Boucherie</option><option value="16">Tanneur</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="zone" id="zone9">
                        <select name="batiment" id="9">
                            <option value=""></option><option value="1">Hotel de ville</option><option value="2">Château</option><option value="3">Maisons</option><option value="4">Eglise</option><option value="5">Mine d'or</option><option value="6">Scierie</option><option value="7">Carrière</option><option value="8">Champs</option><option value="9">Caserne</option><option value="10">Forge</option><option value="11">Académie</option><option value="12">Etable</option><option value="13">Marché</option><option value="14">Charpentier</option><option value="15">Boucherie</option><option value="16">Tanneur</option>
                        </select>
                    </td>
                    <td class="zone" id="zone10">
                        <select name="batiment" id="10">
                            <option value=""></option><option value="1">Hotel de ville</option><option value="2">Château</option><option value="3">Maisons</option><option value="4">Eglise</option><option value="5">Mine d'or</option><option value="6">Scierie</option><option value="7">Carrière</option><option value="8">Champs</option><option value="9">Caserne</option><option value="10">Forge</option><option value="11">Académie</option><option value="12">Etable</option><option value="13">Marché</option><option value="14">Charpentier</option><option value="15">Boucherie</option><option value="16">Tanneur</option>
                        </select>
                    </td>
                    <td class="zone" id="zone11">
                        <select name="batiment" id="11">
                            <option value=""></option><option value="1">Hotel de ville</option><option value="2">Château</option><option value="3">Maisons</option><option value="4">Eglise</option><option value="5">Mine d'or</option><option value="6">Scierie</option><option value="7">Carrière</option><option value="8">Champs</option><option value="9">Caserne</option><option value="10">Forge</option><option value="11">Académie</option><option value="12">Etable</option><option value="13">Marché</option><option value="14">Charpentier</option><option value="15">Boucherie</option><option value="16">Tanneur</option>
                        </select>
                    </td>
                    <td class="zone" id="zone12">
                        <select name="batiment" id="12">
                            <option value=""></option><option value="1">Hotel de ville</option><option value="2">Château</option><option value="3">Maisons</option><option value="4">Eglise</option><option value="5">Mine d'or</option><option value="6">Scierie</option><option value="7">Carrière</option><option value="8">Champs</option><option value="9">Caserne</option><option value="10">Forge</option><option value="11">Académie</option><option value="12">Etable</option><option value="13">Marché</option><option value="14">Charpentier</option><option value="15">Boucherie</option><option value="16">Tanneur</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="zone" id="zone13">
                        <select name="batiment" id="13">
                            <option value=""></option><option value="1">Hotel de ville</option><option value="2">Château</option><option value="3">Maisons</option><option value="4">Eglise</option><option value="5">Mine d'or</option><option value="6">Scierie</option><option value="7">Carrière</option><option value="8">Champs</option><option value="9">Caserne</option><option value="10">Forge</option><option value="11">Académie</option><option value="12">Etable</option><option value="13">Marché</option><option value="14">Charpentier</option><option value="15">Boucherie</option><option value="16">Tanneur</option>
                        </select>
                    </td>
                    <td class="zone" id="zone14">
                        <select name="batiment" id="14">
                            <option value=""></option><option value="1">Hotel de ville</option><option value="2">Château</option><option value="3">Maisons</option><option value="4">Eglise</option><option value="5">Mine d'or</option><option value="6">Scierie</option><option value="7">Carrière</option><option value="8">Champs</option><option value="9">Caserne</option><option value="10">Forge</option><option value="11">Académie</option><option value="12">Etable</option><option value="13">Marché</option><option value="14">Charpentier</option><option value="15">Boucherie</option><option value="16">Tanneur</option>
                        </select>
                    </td>
                    <td class="zone" id="zone15">
                        <select name="batiment" id="15">
                            <option value=""></option><option value="1">Hotel de ville</option><option value="2">Château</option><option value="3">Maisons</option><option value="4">Eglise</option><option value="5">Mine d'or</option><option value="6">Scierie</option><option value="7">Carrière</option><option value="8">Champs</option><option value="9">Caserne</option><option value="10">Forge</option><option value="11">Académie</option><option value="12">Etable</option><option value="13">Marché</option><option value="14">Charpentier</option><option value="15">Boucherie</option><option value="16">Tanneur</option>
                        </select>
                    </td>
                    <td class="zone" id="zone16">
                        <select name="batiment" id="16">
                            <option value=""></option><option value="1">Hotel de ville</option><option value="2">Château</option><option value="3">Maisons</option><option value="4">Eglise</option><option value="5">Mine d'or</option><option value="6">Scierie</option><option value="7">Carrière</option><option value="8">Champs</option><option value="9">Caserne</option><option value="10">Forge</option><option value="11">Académie</option><option value="12">Etable</option><option value="13">Marché</option><option value="14">Charpentier</option><option value="15">Boucherie</option><option value="16">Tanneur</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>

        <div class="result-class text-center">
            <p id="result"></p>
            <button class="endTurn" type="submit">Fin du tour</button>
        </div> 
    </section>
</section>




<script type="text/javascript" src="bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript" src="controllers/ajax/ajax.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="layout/js/script.js"></script>

</body>
</html>

