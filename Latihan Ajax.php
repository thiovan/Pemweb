<?php
	$link = mysql_connect('localhost', 'root', '') or die('Could not connect:'. msql_error());
	mysql_select_db('user') or die('Could not select database');

	$query_prop = 'SELECT * FROM provinsi';
	$result_prop = mysql_query($query_prop) or die('Query failed: ' . mysql_error());

?>
<!DOCTYPE html>
<html>
<head>
	<title>Latihan Ajax</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<script type="text/javascript">
	//Cek Username
	var drz, kata, x;
	function cekuser(){
		kata = document.getElementById("username").value;
		if(kata.length>0){
			document.getElementById("txtusername").innerHTML = "checking...";
			drz = buatajax();
			var url="cekuser.php";
			url=url+"?q="+kata;
			url=url+"&sid="+Math.random();
			drz.onreadystatechange=stateChanged;
			drz.open("GET",url,true);
			drz.send(null);
		}else{
			fokus();
		}
	}
	function buatajax(){
	if (window.XMLHttpRequest){
		return new XMLHttpRequest();
	}
	if (window.ActiveXObject){
		return new ActiveXObject("Microsoft.XMLHTTP");
	}
	return null;
	}
	function stateChanged(){
		var data;
		if (drz.readyState==4){
			data=drz.responseText;
			document.getElementById("txtusername").innerHTML = data;
		}
	}
	function fokus(){
	document.getElementById("username").focus();
	}


	//Cek Numerik
	var drz, kata, x;
	function cek_numerik(){
		kata = document.getElementById("umur").value;
		if(kata.length>0){
			drz = buatajax();
			var url="ceknumerik.php";
			url=url+"?q="+kata;
			url=url+"&sid="+Math.random();
			drz.onreadystatechange=stateChanged_numerik;
			drz.open("GET",url,true);
			drz.send(null);
		}
	}

	function stateChanged_numerik(){
		var data;
		if (drz.readyState==4){
			data=drz.responseText;
			document.getElementById("txtumur").innerHTML = data;
		}
	}


	//Cek Kabupaten
	var drz, kata, x;
	function cek_kec(){ 
    kec = document.getElementById("prop").value; 
	    if(kec.length>0){ 
	        drz = buatajax(); 
	        var url="cekprop.php"; 
	        url=url+"?s="+kec; 
	        url=url+"&sid="+Math.random(); 
	        drz.onreadystatechange=stateChanged_kab; 
	        drz.open("GET",url,true); 
	        drz.send(null); 
	    }
	} 
	function stateChanged_kab(){ 
	var data; 
	    if (drz.readyState==4){ 
	        data=drz.responseText; 
	        document.getElementById("kabupaten").innerHTML = data; 
	    } 
	} 

	function cek_empty(){
		empty = document.getElementById("nama").value;
		if(empty.length==0){
			document.getElementById("txtnama").innerHTML = "<span style='color:red'>Field Ini Tidak Boleh Kosong</span>";
			fokus();
		}
	}

	function fokus_empty(){
	document.getElementById("nama").focus();
	}

	</script>

</head>
<body>
<form>
<div class="col-md-4 form-group">
	Username : 
	<input class="form-control" type=text name=username id=username onkeypress=cekuser()>
	<span id=txtusername></span> <br>
	Umur : 
	<input class="form-control" type="text" name=umur id=umur onkeypress=cek_numerik()>
	<span id=txtumur></span> <br>
	Nama Lengkap : 
	<input class="form-control" type="text" name=nama id=nama onblur=cek_empty()>
	<span id=txtnama></span> <br>
	Provinsi : 
	<?php
		if (mysql_num_rows($result_prop)) {
			echo "<select class='form-control' name='prop' id='prop' onchange=cek_kec()>";
			echo "<option value='0'>Pilih<br>";
			while ($row = mysql_fetch_array($result_prop)) {
				echo "<option value='$row[0]'>$row[1]</option>";
			}
			echo "</select><br>";
		}
	?>
	Kabupaten :
	<div class="form-group" id="kabupaten"></div>
	</div>
	</form>
</body>
</html>