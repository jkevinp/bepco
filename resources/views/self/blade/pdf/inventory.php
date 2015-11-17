<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style>
	.page-break {
	    page-break-after: always;
	}
	table{
		width: 100%;
	}
	th,td{
		text-align: center;
	}
	</style>
</head>
<body>

<?php $count = 0;foreach ($data as $d) {?>
<center><b><?= $reporttype." Report for " .$d->name; ?></b></center>
<br/>
<br/>
<table border="1">
	<thead>
		<tr>
			<th>Date</th>
			<th>Action</th>
			<th>Beginning Inventory</th>
			<th>Quantity Deposited</th>
			<th>Quantity Withdrawn</th>
			<th>Remaning Inventory</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$total = 0; 
		$withdrawals = 0;
		$deposits = 0;
		$totaldepositqty = 0;
		$totalwithdrawalsqty =0;
		foreach ($log[$d->id] as $logentry=>$v) {
			
			 echo "<tr>";
			 echo "<td>".$v['created_at']."</td>";
			 echo "<td>".$v['action']."</td>";
			 echo "<td>".$v['start_quantity']."</td>";
			 if($v['action'] == 'deposit'){
			 	$deposits +=1;
			 	$totaldepositqty += $v['param_value'];
			 	echo "<td>".$v['param_value']."</td>";
			 	echo "<td>0</td>";
			 }else{
			 	$withdrawals +=1;
			 	$totalwithdrawalsqty += $v['param_value'];
			 	echo "<td>0</td>";
			 	echo "<td>".$v['param_value']."</td>";
			 }
			 echo "<td>".$v['end_quantity']."</td>";
			 echo "</tr>";
		}	
		?>
	</tbody>
</table>
<br/><br/><br/>
<table>
<tr>
<td style="text-align:left;">TOTAL DEPOSITS: <?= $deposits ?></td>
<td style="text-align:left;">TOTAL DEPOSITED QUANTITY: <?= $totaldepositqty ?></td>
</tr>
<tr>
<td style="text-align:left;">TOTAL WITHDRAWALS: <?= $withdrawals ?></td>
<td style="text-align:left;">TOTAL WITHDRAWN QUANTITY: <?= $totalwithdrawalsqty ?></td>
</tr>
</table>
<?php if(count($count) <= count($data)-1){?>
<div class="page-break"/>
<?php }?>

<?php $count++; }?>



</body>
</html>
