<?php
include("ayar.php");
if($_GET["del"]){
mysql_query("DELETE FROM siklar WHERE id='".$_GET["del"]."'");
	echo "Şık Silindi.";
}
$soru = mysql_fetch_assoc(mysql_query("select * from sorular where id='".$_GET["id"]."'"));
$soru_adi=$soru["soru"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>Anket Doldur</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="css/stil.css" type="text/css" media="screen" />
</head>
<body>
<h2><?php echo $soru_adi;?></h2>
<table width="221" border="1">
  <tr>
    <td width="19"></td>
    <td width="96"><b>Şıklar</b></td>
    <td><b>Oylanan</b></td>
  </tr>
<?php
$sor = mysql_query("select * from siklar where soru_id='$_GET[id]'");
while ($listele = mysql_fetch_array($sor)) {
	$i++;
	$a_sonuc = mysql_fetch_assoc(mysql_query("SELECT Count(*) as sonuc FROM anket_sonuclari where sik_id='$listele[id]'"));
?>
<tr>
<td><?=$i;?></td>
<td><?=$listele["adi"];?></td>
    <td><?=$a_sonuc["sonuc"];?></td>
  </tr>
<?php
}
?></td>
</table>
<table>
<tr>
<td>
<img src="grafiksonuc.php?id=<?=$_GET["id"];?>">
</td>
</tr>
</table>
</body>
</html>