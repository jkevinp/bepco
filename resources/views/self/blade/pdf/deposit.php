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
			<th>Quantity</th>
			<th>Withdrawn By</th>
			<th>Purpose</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$total = 0; 
		foreach ($log[$d->id] as $logentry=>$v) {
			$total += $v['param'];
			 echo "<tr>";
			 echo "<td>".$v['created_at']."</td>";
			 echo "<td>".$v['param']."</td>";
			 echo "<td>".$v['user_name']."</td>";
			 echo "<td>".$v['message']."</td>";
			 echo "</tr>";
		}	
		?>
	</tbody>
</table>
<br/><br/><br/>
TOTAL: <?= $total ?>
<?php if(count($count) <= count($data)-1){?>
<div class="page-break"/>
<?php }?>

<?php $count++; }?>



</body>
</html>
