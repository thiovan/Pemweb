<?php
	//Connecting, selecting database
	$link = mysql_connect('localhost', 'root', '') or die('Could not connect:'. msql_error());
	mysql_select_db('showroommobil') or die('Could not select database');

	//Menetapkan nama dari button
	$button_name = "btn-tambah";
	$button = "Tambah Data";
	
	//Proses yang dijalankan ketika button edit di klik 
	if (isset($_POST['btn-edit'])) {
			$editt_id = $_POST['0'];
    	$editt_merk = $_POST['1'];
    	$editt_model = $_POST['2'];
    	$editt_tipe = $_POST['3'];
    	$editt_pintu = $_POST['4'];
    	$editt_tahun_produksi = $_POST['5'];
    	$editt_negara_pembuat = $_POST['6'];
    	$editt_jenis_produksi = $_POST['7'];
	  	$editt_query = "UPDATE mobil SET Id_Mobil='$editt_id',Merk='$editt_merk',Model='$editt_model',Tipe='$editt_tipe',Pintu='$editt_pintu',Tahun_Produksi='$editt_tahun_produksi',Negara_Pembuat='$editt_negara_pembuat',Jenis_Produksi='$editt_jenis_produksi' WHERE Id_Mobil='$editt_id'";
	  	$result_editt = mysql_query($editt_query) or die('Query failed: ' . mysql_error());
			if ($result_editt) {
  			echo "Data Berhasil Diedit";
  			header("refresh:0");
  		} else {
  			echo "Data Gagal Diedit";
  			header("refresh:0");
  		}
	}

	//Proses yang dijalankan ketika button tambah di klik 
	if (isset($_POST['btn-tambah'])) {
			$tambah_id = $_POST['0'];
    	$tambah_merk = $_POST['1'];
    	$tambah_model = $_POST['2'];
    	$tambah_tipe = $_POST['3'];
    	$tambah_pintu = $_POST['4'];
    	$tambah_tahun_produksi = $_POST['5'];
    	$tambah_negara_pembuat = $_POST['6'];
    	$tambah_jenis_produksi = $_POST['7'];
    	$tambah_query = "INSERT INTO mobil(Id_Mobil,Merk,Model,Tipe,Pintu,Tahun_Produksi,Negara_Pembuat,Jenis_Produksi)
			VALUES ('$tambah_id','$tambah_merk','$tambah_model','$tambah_tipe','$tambah_pintu','$tambah_tahun_produksi','$tambah_negara_pembuat','$tambah_jenis_produksi')";
  		$result_tambah = mysql_query($tambah_query) or die('Query failed: ' . mysql_error());
  		if ($result_tambah) {
  			echo "Data Berhasil Ditambah";
  			header("refresh:0");
  		} else {
  			echo "Data Gagal Ditambah";
  			header("refresh:0");
  		}
			}		

	if (isset($_POST['action']) && isset($_POST['id'])) {
		//Proses yang dijalankan ketika button Edit di klik 
  	if ($_POST['action'] == 'Edit') {
  		$id_data = $_POST['id'];
  		$edit_query = "SELECT * FROM mobil WHERE Id_Mobil = '$id_data'";
  		$result_edit = mysql_query($edit_query) or die('Query failed: ' . mysql_error());
			$get_edit = mysql_fetch_array($result_edit, MYSQL_NUM);
    	$edit_id = $get_edit[0];
    	$edit_merk = $get_edit[1];
    	$edit_model = $get_edit[2];
    	$edit_tipe = $get_edit[3];
    	$edit_pintu = $get_edit[4];
    	$edit_tahun_produksi = $get_edit[5];
    	$edit_negara_pembuat = $get_edit[6];
    	$edit_jenis_produksi = $get_edit[7];
    	$button_name = "btn-edit";
    	$button = "Edit Data";
  } elseif ($_POST['action'] == 'Delete') {
  		//Proses yang dijalankan ketika button Delete di klik 
  		$id_data = $_POST['id'];
  		$delete_query = "DELETE FROM mobil WHERE Id_Mobil = '$id_data'";
  		$result_delete = mysql_query($delete_query) or die('Query failed: ' . mysql_error());
			if ($result_delete) {
  			echo "Data Berhasil Dihapus";
  			header("refresh:0");
  		} else {
  			echo "Data Gagal Dihapus";
  			header("refresh:0");
  		}
  }
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Koneksi ke MySQL</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
  <h2>Data Mobil</h2>
	<hr>
  <form id="edit" method="POST">

		    <div class="form-group col-md-6">
		      <label>ID Mobil:</label>
		      <input name="0" type="text" class="form-control" placeholder="ID Mobil" value="<?php if (isset($edit_id)) { echo "$edit_id"; } ?>">
		    </div>
		    <div class="form-group col-md-6">
		      <label>Merk:</label>
		      <input name="1" type="text" class="form-control" placeholder="Merk" value="<?php if (isset($edit_merk)) { echo "$edit_merk"; } ?>">
		    </div>
		     <div class="form-group col-md-6">
		      <label>Model:</label>
		      <input name="2" type="text" class="form-control" placeholder="Model" value="<?php if (isset($edit_model)) { echo "$edit_model"; } ?>">
		    </div>
		     <div class="form-group col-md-6">
		      <label>Tipe:</label>
		      <input name="3" type="text" class="form-control" placeholder="Tipe" value="<?php if (isset($edit_tipe)) { echo "$edit_tipe"; } ?>">
		    </div>
		     <div class="form-group col-md-6">
		      <label>Pintu:</label>
		      <input name="4" type="text" class="form-control" placeholder="Pintu" value="<?php if (isset($edit_pintu)) { echo "$edit_pintu"; } ?>">
		    </div>
		     <div class="form-group col-md-6">
		      <label>Tahun Produksi:</label>
		      <input name="5" type="text" class="form-control" placeholder="Tahun Produksi" value="<?php if (isset($edit_tahun_produksi)) { echo "$edit_tahun_produksi"; } ?>">
		    </div>
		     <div class="form-group col-md-6">
		      <label>Negara Pembuat:</label>
		      <input name="6" type="text" class="form-control" placeholder="Negara Pembuat" value="<?php if (isset($edit_negara_pembuat)) { echo "$edit_negara_pembuat"; } ?>">
		    </div>
		    <div class="form-group col-md-6">
		      <label>Jenis Produksi:</label>
		      <input name="7" type="text" class="form-control" placeholder="Jenis Produksi" value="<?php if (isset($edit_jenis_produksi)) { echo "$edit_jenis_produksi"; } ?>">
		    </div>
		    <button name="<?php if (isset($button_name)) { echo "$button_name"; } ?>" type="submit" class="btn btn-success col-md-offset-4 col-md-4"><?php if (isset($button)) { echo "$button"; } ?></button>
  		</form>
</div>
<br>

<form method="POST">
<div class="form-inline pull-right">
		<input name="cari" type="text" class="form-control" placeholder="Cari Data Berdasarkan Merk">
		<button name="btn-cari" type="submit" class="btn">Cari</button>
</div>

	<?php
	//Printing result in HTML
	echo"<table class='table table-striped'>\n";
	echo "<th>ID MOBIL</th><th>MERK</th><th>MODEL</th><th>TIPE</th><th>PINTU</th><th>TAHUN PRODUKSI</th><th>NEGARA PEMBUAT</th><th>JENIS PRODUKSI</th><th>OPERASI</th>";
	$query = 'SELECT * FROM mobil';
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	while ($get = mysql_fetch_array($result, MYSQL_NUM))
	{
			$id = $get[0];
			$merk = $get[1];
			$model = $get[2];
			$tipe = $get[3];
			$pintu = $get[4];
			$tahun_produksi = $get[5];
			$negara_pembuat = $get[6];
			$jenis_produksi = $get[7];
			echo "<tr>";
				echo "<td>$id</td><td>$merk</td><td>$model</td><td>$tipe</td><td>$pintu</td><td>$tahun_produksi</td><td>$negara_pembuat</td><td>$jenis_produksi</td>";
				echo "<form method='post' action=''>";
        echo "<td><input class='btn btn-primary' type='submit' name='action' value='Edit'/> ";
        echo "<input class='btn btn-danger' type='submit' name='action' value='Delete'/></td>";
        echo "<input type='hidden' name='id' value='$get[0]'/>";
      echo "</form>";
			echo "</tr>";
		}
	echo "</table>";
	//Free resultset
	mysql_free_result($result);
	//Closing connection
	mysql_close($link);
	?>
	</form>

</body>
</html>
