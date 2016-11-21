<!DOCTYPE html>
<html>
<head>
	<title>Koneksi ke MySQL</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<h2>Metode MYSQL_BOTH</h2>
	<hr>

	<?php
	//Connecting, selecting database
	$link = mysql_connect('localhost', 'root', '') or die('Could not connect:'. msql_error());
	mysql_select_db('showroommobil') or die('Could not select database');

	//Perfomance SQL query
	$query = 'SELECT * FROM mobil';
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
    
	//Printing result in HTML
	echo '<div class="col-md-6">';
	echo"<table class='table table-striped'>";
	echo "<th>ID MOBIL</th><th>MERK</th><th>MODEL</th><th>TIPE</th><th>PINTU</th><th>TAHUN PRODUKSI</th><th>NEGARA PEMBUAT</th><th>JENIS PRODUKSI</th>";
	while ($row = mysql_fetch_array($result, MYSQL_BOTH))
	{
		$id = $row['Id_Mobil'];
	    $merk = $row['Merk'];
	    $model = $row['Model'];
	    $tipe = $row['Tipe'];
	    $pintu = $row['Pintu'];
	    $tahun_produksi = $row['Tahun_Produksi'];
	    $negara_pembuat = $row['Negara_Pembuat'];
	    $jenis_produksi = $row['Jenis_Produksi'];
		echo "<tr>";
			echo "<td>$id</td><td>$merk</td><td>$model</td><td>$tipe</td><td>$pintu</td><td>$tahun_produksi</td><td>$negara_pembuat</td><td>$jenis_produksi</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo '</div>';

	//Free resultset
	mysql_free_result($result);

	//Closing connection
	mysql_close($link);
	?>

</body>
</html>
