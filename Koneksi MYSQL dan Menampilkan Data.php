<!DOCTYPE html>
<html>
<head>
	<title>Koneksi ke MySQL</title>
</head>
<body>
	<?php
	//Connecting, selecting database
	$link = mysql_connect('localhost', 'root', '') or die('Could not connect:'. msql_error());
	echo 'Connected Succesfully';
	mysql_select_db('showroommobil') or die('Could not select database');
	//Perfomance SQL query
	$query = 'SELECT * FROM mobil';
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	//Printing result in HTML
	echo"<table>\n";
	while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
	{
		echo "\t<tr>\n";
		foreach ($line as $col_value) {
			echo "\t\t<td>$col_value</td>\n";
		}
		echo "\t</tr>\n";
	}
	echo "</table>\n";
	//Free resultset
	mysql_free_result($result);
	//Closing connection
	mysql_close($link);
	?>
</body>
</html>
