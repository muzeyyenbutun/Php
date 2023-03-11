<?php
include("ayar.php");
if($_GET["ssl"]){
	mysql_query("DELETE FROM sorular WHERE id='".$_GET["ssl"]."'");
	mysql_query("DELETE FROM siklar WHERE soru_id='".$_GET["ssl"]."'");
	echo "Soru Silindi.";
}
if($_GET["sl"]){
	mysql_query("DELETE FROM anketler WHERE id='".$_GET["id"]."'");
	$sor = mysql_query("select * from sorular where anket_id='".$_GET["id"]."'");
while ($listele = mysql_fetch_array($sor)) {
	mysql_query("DELETE FROM siklar WHERE soru_id='".$listele["id"]."'");
}

	mysql_query("DELETE FROM sorular WHERE anket_id='".$_GET["id"]."'");
	mysql_query("DELETE FROM anket WHERE id='".$_GET["id"]."'");
	if($sil){	
	
	header("Refresh: 1; url=aindex.php?s=arapor");
}
if($_GET["id"]){
	$a_al = mysql_fetch_assoc(mysql_query("SELECT * FROM anket where id='$_GET[id]'"));
?>
<style type="text/css">
.s {
	text-align: left;
}
.s {
	text-align: left;
}
</style>
<script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=500,width=550,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
<center>
<p><br><br>

<table width="410" border="1">
  <tr>
    <td width="20"></td>
    <td width="88"><b><?=$a_al["adi"];?></b></td>
    <td width="74"></td>
     <td width="98"></td>
    <td width="64"><a href="aindex.php?s=soruekle&id=<?=$_GET["id"];?>">Soru Ekle</a></td>
    </tr>
<?php
$sor = mysql_query("select * from sorular where anket_id='".$_GET["id"]."'");
while ($listele = mysql_fetch_array($sor)) {
	$i++;
?>
<tr>
<td><?=$i;?></td>
<td><?=$listele["soru"];?></td>
    <td><a href="JavaScript:newPopup('sonuc.php?id=<?=$listele["id"]?>');">Göster</a></td>
    <td><a href="aindex.php?s=soruduzenle&id=<?=$listele["id"]?>&a_id=<?=$_GET["id"]?>">Düzenle</a></td>
    <td><a href="aindex.php?s=arapor&id=<?=$_GET["id"];?>&ssl=<?=$listele["id"]?>">Sil</a></td>
    </tr>
<?
}
?>
</table>
<?php
}else{
?><center>
<table width="921" height="102" border="1">
  <tr>
  <th colspan="10" scope="col">Anketler</th>
  </tr>
  <tr class="s">
  <th width="27" scope="col"></th>
    <th width="248" class="s" scope="col">Anket</th>
    <th width="314" class="s" scope="col">Açıklama</th>
    <th width="119" class="s" scope="col">Kategori</th>
    <th width="114" class="s" scope="col">tarih</th>
    <th width="59" scope="col">&nbsp;</th>
    <th width="59" scope="col">&nbsp;</th>
    <th width="59" scope="col">&nbsp;</th>
    <th width="59" scope="col">&nbsp;</th>
    <th width="59" scope="col">&nbsp;</th>
    
    </tr>
  
<?php
$sor = mysql_query("select * from anket where anketor_id='".$y_al["id"]."'");
while ($listele = mysql_fetch_array($sor)) {
		$list = mysql_fetch_assoc(mysql_query("select * from kategori where id=".$listele["kategori_id"].""));
	$i++;
?>
   <tr>
  	<td class="s"><?=$i;?></td>
    <td class="s"><?=$listele["anket"];?></td>
    <td class="s"><?=$listele["aciklama"];?></td>
    <td class="s"><?=$list["kategori"];?></td>
    <td class="s"><?=$listele["tarih"];?></td>
    <td><a href="aindex.php?s=arapor&id=<?=$listele["id"];?>">Göster</a></td>
    <td><a target="_blank" href="http://www.facebook.com/sharer.php?u=http://softwareeulproject.com/webanket/index.php">Paylaş</a></td>
        <td><a target="_blank" href="aindex.php?s=gonder&u=<?=$listele["id"]?>">E-Mail Gönder</a></td>
    <td><a href="aindex.php?s=anketduzenle&id=<?=$listele["id"]?>">Düzenle</a></td>
    <td><a href="aindex.php?s=arapor&id=<?=$listele["id"]?>&sl=1">Sil</a></td>
    <?php
  }
   ?>
	
</table></center>
<?php
}
?>
<p><p></center>