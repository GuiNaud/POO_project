/**
 * Created by guillaumerannaud on 13/10/15.
 */


jQuery(document).ready(function(){
	$( ".zone select" ).change(function() {
		var value = $(this).val();
		console.log(value);
	});
});