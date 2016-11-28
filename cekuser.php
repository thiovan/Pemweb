<?php
mysql_connect("localhost","root","");
mysql_select_db("user");
$id = $_GET['q'];
$query = mysql_query("SELECT userid FROM tabeluser WHERE username='$id'");
if(mysql_num_rows($query)==0){
echo '<span style="color:green">'.$id.' belum ada yang pakai</span>';
}else{
echo '<span style="color:red">'.$id.' sudah ada yang pakai</span>';
}
?>