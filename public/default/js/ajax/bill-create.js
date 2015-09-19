$(document).ready(function(){
	$('#billtype_id').on('change' , function(){
		 ajaxBill();
	});
});
function ajaxBill(){
		$('#tbody_fees').html('');
		$('#owner_id').text('');
		$('#owner_name').text('');
		$('#selectedbilltype_id').text('');
		$('#selectedbilltype_name').text('');
		var billtype_id = $('#billtype_id').val();
		$.get(page_user + 'ajaxify/get/' , 
			{
				param :{
							billtype: {field: 'id' , value : billtype_id},
							fee : {field: 'billtype_id' , value : billtype_id }
						}, 
				type: ['billtype' ,'fee']
			}
			,function(data){
			console.log(data.fee);
			$('#selectedbilltype_id').text(data.billtype[0].id);
			$('#selectedbilltype_name').text(data.billtype[0].name);
			$.each(data.fee , function(index,obj){
				$('#tbody_fees').append('<tr width="50%"><td>' +obj['name'] + '<td>' +obj['rate']);	
			});
		});
}