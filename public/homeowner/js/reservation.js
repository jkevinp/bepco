$(document).ready(function(){
	$('#cno').keypress(function(e){
		if(!isNumberKey(e))
		{
			e.preventDefault();
		}
	});
});