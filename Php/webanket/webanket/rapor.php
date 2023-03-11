<?php
include("ayar.php");
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

<table width="221" border="1">
  <tr>
    <td width="19"></td>
    <td width="96"><b><?=$a_al["adi"];?></b></td>
    <td></td>
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
  <th colspan="6" scope="col">Anketler</th>
  </tr>
  <tr class="s">
  <th width="27" scope="col"></th>
    <th width="248" class="s" scope="col">Anket</th>
    <th width="314" class="s" scope="col">Açıklama</th>
    <th width="119" class="s" scope="col">Kategori</th>
    <th width="114" class="s" scope="col">tarih</th>
    <th width="59" scope="col">&nbsp;</th>
    </tr>
  
<?php
$sor = mysql_query("select * from anket where anketor_id='".$u_al["danisman_id"]."'");
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
    <td><a href="uindex.php?s=rapor&id=<?=$listele["id"];?>">Göster</a></td>
    <?php
  }
   ?>
	
</table></center>
<?php
}
?>
<p><p></center>