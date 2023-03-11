<?php
$baglanti = mysql_connect("localhost", "software_vt", "qaz123qaz") or die(mysql_error());
$baglanti_kur = mysql_select_db("software_vt", $baglanti) or die (mysql_error());
mysql_set_charset('latin5',$baglanti);
?>