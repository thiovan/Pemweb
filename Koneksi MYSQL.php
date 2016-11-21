<html>
<head>
<title>Koneksi ke MySQL</title>
</head>
<body>
<?php
//Connecting, selecting database
$link = mysql_connect('localhost', 'root', '')
or die('Could not connect: ' . mysql_error());
echo 'Connected Successfully';
mysql_select_db('showroommobil') or die ('Could not select database');
?>
</body>
</html>
