<?php
mysql_connect("localhost","root",""); 
mysql_select_db("user"); 

$prop = $_GET['s'];
$query = mysql_query("SELECT kabupaten.id_kab , kabupaten.kab FROM kabupaten , provinsi WHERE kabupaten.id_prop = provinsi.id_prop AND provinsi.id_prop=$prop"); 
if(mysql_num_rows($query)>0){
    echo "<select class='form-control'>";
    echo "<option value='0'>Pilih<br>";
    while($row=mysql_fetch_array($query))
    {
        echo "<option value='$row[0]'>$row[1]</option>";
    }
    echo "</select>";
    }
   else
   {
   	echo "tidak ada kota yang cocok dengan $prop";
   }
?>


