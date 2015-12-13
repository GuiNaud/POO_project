/**REQUETE AJAX ENVOYÉE À LA CONNEXION
 *
 * @info  step = start pour la connexion (nouvelle ou ancienne partie)
 * nom : le nom de la ville
 * password : le mot de passe pour se connecter à sa partie
 * race : si nouvelle partie, on envoie la race choisie pour créer la partie en fonction
 *
 * @retour : tableau json result :
 *      event : caractéristique de l'evenement généré
 *      game : infos sur la partie en cours (retour bdd après enregistrement des dernieres
 *      modifications) comprenant un tableau zone avec tous les batiments qu'elles possèdent:
 *          zone : chaque résultat de ce tableau à 4 nombres sous cette forme : [3:1:6]. Le premier
 *          indique le numéro d'id du batiment, le second son niveau, le troisieme sur le numéro de zone
 *          qu'il occupe sur la map, le dernier : 1 batiment en cours, 0 batiment détruit
 *      building : infos sur les caractéristiques de chaque batiments pouvant être créer
 */
$(".submitForm").on('click', function(e) {
    e.preventDefault();
    var info = {
        step: "start",
        nom: $("#nom").val(),
        password: $("#mdp").val()
    };
    if($("#race").val() != '')
        info.race = $("#race").val();
    console.log(JSON.stringify(info));
    $.ajax({
        type: "post",
        datatype: "json",
        url: '/GitHub/POO_project/www/controllers/mainController.php',
        data: info,
        success: function(data) {
            //console.log(JSON.stringify(data));
            data = JSON.parse(data);
            console.log(JSON.stringify(data));
            if(data.event) localStorage.setItem('event', JSON.stringify(data.event));
            if(data.game) localStorage.setItem('game', JSON.stringify(data.game));
            if(data.building) localStorage.setItem('building', JSON.stringify(data.building));
            $(".game-form").hide();
            $(".header").hide();
            $(".header-game").show();

            //echo event
            $("#name-event").text(data.event.nom);
            $("#message-event").html(data.event.message);

            //echo info town
            $("#name-town").text(data.game.nom);
            $("#race").text(data.game.race);
            $("#level").text(data.game.level);
            $("#turn").text(data.game.turn);
            $("#zone").text(data.game.zone);
            $("#pop").text(data.game.pop);
            $("#popmax").text(data.game.popmax);
            $("#popactive").text(data.game.popactive);
            $("#wood").text(data.game.wood);
            $("#stone").text(data.game.stone);
            $("#gold").text(data.game.gold);
            $("#food").text(data.game.food);
            $("#army").text(data.game.army);
            $("#prosp").text(data.game.prosp);

            $('.container').show();
        },
        error : function(error, request) {
            console.log('erreur : ' + error + ' / request : ' + JSON.stringify(request));
        }
    });
});

/*REQUETE AJAX PAR TOUR
* @info step = turn pour signifier un changement de tour
*       game = l'état de la partie au début du tour
*       eventName = le nom du dernier evenement passé
*       action = un objet JS avec les actions qui viennent d'etre efefctuer dans le tour précédent
* @retour data =
*               event : le nouvel evenement si il y a nouvel evenement
*               game : la maj de la partie en cours
*               building : infos sur les caractéristiques de chaque batiments pouvant être créer
* */
$(".endTurn").on('click', function(e) {
    e.preventDefault();
    var game = localStorage.getItem('game') || {};
    var event = localStorage.getItem('event') || {};
    var eventName = event != '' ? event.nom : '';
    var action = localStorage.getItem('action') || {0 : '1:1:1:1'};
    var info = {
        step : "turn",
        game : game,
        event : eventName,
        action : action
    };
    console.log(JSON.stringify(info));
    $.ajax({
        type: "POST",
        datatype: "json",
        url: '/controllers/mainController.php',
        data: info,
        success: function(data) {
            console.log(JSON.stringify(data));
            data = JSON.parse(data);
            if(data.event) localStorage.setItem('event', JSON.stringify(data.event));
            if(data.game) localStorage.setItem('game', JSON.stringify(data.game));
            if(data.building) localStorage.setItem('building', JSON.stringify(data.building));

            $('#result').html('');
            $('#result').append(gameNew + '<br>' + eventNew + '<br>' + buildingNew);

            //echo event
            $("#name-event").text(data.event.nom);
            $("#message-event").html(data.event.message);

            //echo info town
            $("#name-town").text(data.game.nom);
            $("#race").text(data.game.race);
            $("#level").text(data.game.level);
            $("#turn").text(data.game.turn);
            $("#zone").text(data.game.zone);
            $("#pop").text(data.game.pop);
            $("#popmax").text(data.game.popmax);
            $("#popactive").text(data.game.popactive);
            $("#wood").text(data.game.wood);
            $("#stone").text(data.game.stone);
            $("#gold").text(data.game.gold);
            $("#food").text(data.game.food);
            $("#army").text(data.game.army);
            $("#prosp").text(data.game.prosp);
        },
        error : function(error, request) {
            console.log('erreur : ' + error + ' / request : ' + JSON.stringify(request));
        }
    });
});
