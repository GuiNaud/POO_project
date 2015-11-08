
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
		dataType : "json",
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
