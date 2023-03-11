<?php
include("ayar.php");
	$anket_baslik=$_POST['anket_baslik'];
	$aciklama=$_POST['aciklama'];
	$kategori=$_POST['kategori'];
if($_GET["id"]){
	$anket_b = mysql_fetch_assoc(mysql_query("SELECT * FROM anket where id='$_GET[id]'"));
	$kat = mysql_fetch_assoc(mysql_query("select * from kategori where id='$anket_b[kategori_id]'"));
	if($_POST["id"]){
		if($_POST["update"]){
		mysql_query("update anket SET anket='".$anket_baslik."',aciklama='".$aciklama."',kategori_id='".$kategori."',tarih=CURDATE() where id='$_POST[id]'")or die(mysql_error());
			echo "<center><img src='images/roller.gif'></center>";
			header("Refresh: 2; url=aindex.php?s=arapor&id=$_POST[id]");
		}
	}
?>
<script language="javascript">
function kontrol(){
if(document.form1.anket_baslik.value==""){alert("Anket Başlığı kısmını Boş Bıraktınız…");document.form1.anket_baslik.focus();return false;}
}</script><style type="text/css">
.s {
	text-align: left;
}
</style>
<center>
<p><br><br>
<form method="post" enctype="multipart/form-data" name="form1" action="<?=$PHP_SELF;?>" onsubmit="return kontrol()">
<table width="453" align="center"  cellpadding="3" 
      cellspacing="0" class="liste" id="tablo" 
      style="BORDER-RIGHT: #d1d9e1 1px solid; BORDER-TOP: medium none; BORDER-LEFT: #d1d9e1 1px solid; BORDER-BOTTOM: #d1d9e1 1px solid">

  <tr>
    <td height="16" colspan="2"><div align="center" class="baslik">
      <div align="center" class="tablobaslik">Anket Düzenle</div>
    </div></td>
  </tr>
  <tr>
    <td width="125" height="30">Anket Başlığı   : </td>
    <td width="289"><input type="text" name="anket_baslik" value="<?=$anket_b["anket"];?>"></td>
  </tr>
   <tr>
    <td width="125" height="30">Açıklama   : </td>
    <td width="289">
      <textarea name="aciklama" cols="45" rows="5"><?=$anket_b["aciklama"];?></textarea></td>
  </tr>
      <tr>
        <td width="125" height="30">Kategori  : </td>
        <td width="289"><select name="kategori">
        <option value="<?=$kat["id"];?>"><?=$kat["kategori"];?></option>
  <?php
$s = mysql_query("select * from kategori");
while ($lis = mysql_fetch_array($s)) {
?>
          <option value="<?=$lis["id"];?>"><?=$lis["kategori"];?></option>
          
  <?
}
?>
  </select></td>
    </tr>
  <tr>
    <td colspan="2"><div align="center">
    <input type="hidden" name="id" value="<?=$_GET["id"];?>" />
      <input type="submit" class="buton" name="update" id="update" value="Güncelle" />
      </div></td>
  </tr>
</table></form>
<?php
}
?><p><p></center>