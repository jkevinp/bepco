<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<?php

	foreach ($files as $file ) 
	    	{
	    		echo '<tr>';
	    		echo '<td>'."<img src='".$file."'/></td>";
	    		echo "</tr>";
	    		//$TotalQty += $book->quantity;
	    	}
?>
</body>
</html>