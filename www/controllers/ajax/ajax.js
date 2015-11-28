$( ".getTown" ).click(function(){
    $.ajax({
        type     : "post",
        dataType : "json",
        url      : "http://localhost:8888/POO_project/www/model/getBDD.php",
        data     : {nomTable: "town"},
        error    : function(request, error) {
            alert("Erreur : responseText: "+request.responseText);
        },
        success  : function(data) {
            //alert(data);
            result = data;
            $(".content").html(result);
        }
    });
});

$( ".getBuilding" ).click(function(){
    $.ajax({
        type     : "post",
        dataType : "json",
        url      : "http://localhost:8888/POO_project/www/model/getBDD.php",
        data     : {nomTable: "buidings"},
        cache    : false,
        error    : function(request, error) {
            alert("Erreur : responseText: "+request.responseText);
        },
        success  : function(data) {
            //alert(data);
            result = data;
            $(".content").html(result);
        }
    });
});

$(".submitForm").on('click', function(e) {
    e.preventDefault();
    console.log('Ajax in');
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
            console.log(JSON.stringify(data));
            $(".formStart").hide();
            $('body').html('<p>'+ data +'</p>');
        },
        error : function(error, request) {
            console.log('erreur : ' + error + ' / request : ' + JSON.stringify(request));
        }
    });
});
