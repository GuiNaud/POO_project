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
        url: '/controllers/mainController.php',
        data: info,
        success: function(data) {
            data = JSON.parse(data);
            console.log(JSON.stringify(data));
            localStorage.setItem('event', data.event);
            var event = localStorage.getItem(JSON.stringify('event'));
            localStorage.setItem('game', data.game);
            var game = localStorage.getItem(JSON.stringify('game'));
            localStorage.setItem('building', data.building);
            var building = localStorage.getItem(JSON.stringify('building'));
            $(".formStart").hide();
            $('.container').show();
            $('.container p').append(game+ '<br>' + event + '<br>' + building);
        },
        error : function(error, request) {
            console.log('erreur : ' + error + ' / request : ' + JSON.stringify(request));
        }
    });
});

$(".endTurn").on('click', function(e) {
    e.preventDefault();
    var game = JSON.stringify(localStorage.getItem('game'));
    var event = JSON.stringify(localStorage.getItem('event'));
    var action = ["1:1:1", "2:1:3", "6:1:8"];
    var info = {
        step : "turn",
        game : game,
        event : event.nom,
        action : action
    }
    console.log(JSON.stringify(info));
    $.ajax({
        type: "POST",
        datatype: "json",
        url: '/controllers/mainController.php',
        data: info,
        success: function(data) {
            data = JSON.parse(data);
            console.log(JSON.stringify(data));
            localStorage.setItem('event', data.event);
            var event = localStorage.getItem(JSON.stringify('event'));
            localStorage.setItem('game', data.game);
            var game = localStorage.getItem(JSON.stringify('game'));
            var building = localStorage.getItem(JSON.stringify('building'));
            $('.container p').html('');
            $('.container p').append(game+ '<br>' + event + '<br>' + building);
        },
        error : function(error, request) {
            console.log('erreur : ' + error + ' / request : ' + JSON.stringify(request));
        }
    });
});
