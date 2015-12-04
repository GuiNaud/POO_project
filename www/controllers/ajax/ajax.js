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
        },
        error : function(error, request) {
            console.log('erreur : ' + error + ' / request : ' + JSON.stringify(request));
        }
    });
});
