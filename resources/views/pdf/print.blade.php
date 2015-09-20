<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
		td{
			 line-height: 1.5;
			 table-layout: fixed;
			 margin: auto;
			 padding: auto;page-break-inside: auto;

		}
		</style>
	</head>
	<body>
		
		<?php	
			if(isset($files))
			foreach ($files as $file ) 
			{
				echo '<table CELLPADDING=10><tr>     ';
				for($x =0 ; $x < $count; $x++){
					echo '<td><img src="'.$file.'" /></td>';
				}
				echo '</table></tr>    ';
				
			}
		?>
		
	</body>
</html>