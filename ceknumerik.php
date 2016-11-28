<?php
$input = $_GET['q'];
if (is_numeric($input)) {
	echo '<span style="color:green">Angka</span>';
}else{
	echo '<span style="color:red">Bukan Angka</span>';
}
?>