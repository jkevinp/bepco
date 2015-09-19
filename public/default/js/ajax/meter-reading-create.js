$(document).ready(function(){
	$('#do_billing').click(function(){
		if($(this).is(":checked")){
			$('#billtype_container').fadeIn();
			$('#billing_container').fadeIn();
			$('#billtype_id').removeAttr('disabled');
		}
		else{
			$('#billtype_container').fadeOut();
			$('#billing_container').fadeOut();
			$('#billtype_id').attr('disabled', 'disabled'); 
		}
		$('#meter_id').change();
	});
	$('#billtype_id').on('change' , function(){
		 $('#meter_id').change();
	});
	$('#meter_id').on('change', function(){
		$('#tbody_fees').html('');
		var meterid= $('#meter_id').val();
		var billtype = '';
		$('#owner_id').text('');
		$('#owner_name').text('');
		$('#selectedbilltype_id').text('');
		$('#selectedbilltype_name').text('');
		if($('#do_billing').is(":checked"))var billtype = $('#billtype_id').val();
		$.get(page_user + 'meter/ajax/' ,{meterid: meterid , billtype: billtype } , function(data){
			console.log(data);
			if(data.reading != null){ 
				$('#lastreading').val(data.reading.currentreading);
				$('#currentreading').attr('min' , data.reading.currentreading);
			}else {
				$('#lastreading').val(0);
				$('#currentreading').attr('min' , 0);
			}
			$('#owner_id').text(data.user.id);
			$('#owner_name').text(data.user.firstname + " " +data.user.middlename +  " " +data.user.lastname);

			$('#selectedbilltype_id').text(data.billtype.id);
			$('#selectedbilltype_name').text(data.billtype.name);
			$.each(data.fee , function(index,obj){
				$('#tbody_fees').append('<tr width="50%"><td>' +obj['name'] + '<td>' +obj['rate']);
				
			});
		});
	});
	$('#meter_id').change();
});
