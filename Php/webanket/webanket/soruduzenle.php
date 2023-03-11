<?php
include("ayar.php");
	$soru_adi=$_POST['soru_adi'];
	$siralama=$_POST['siralama'];
if($_GET["id"]){
	$k = mysql_fetch_assoc(mysql_query("SELECT * FROM sorular where id='$_GET[id]'"));
	if($_POST["id"]){
		if($_POST["update"]){
		mysql_query("update sorular set soru='".$soru_adi."',siralama='".$siralama."' where id='$_POST[id]'")or die(mysql_error());
			echo "<center><img src='images/roller.gif'></center>";
			header("Refresh: 2; url=aindex.php?s=arapor&id=$_POST[a_id]");
		}
	}
?>
<script language="javascript">
function kontrol(){
if(document.form1.soru_adi.value==""){alert("Soru Adı kısmını Boş Bıraktınız…");document.form1.soru_adi.focus();return false;}
if(document.form1.sik_sayisi.value==""){alert("Şık Adeti kısmını Boş Bıraktınız…");document.form1.sik_sayisi.focus();return false;}
if(isNaN(document.form1.sik_sayisi.value)){
alert("Şık Adetinde Rakam Kullanmalısınız.");
return false;}
if(isNaN(document.form1.siralama.value)){
alert("Sıralamada Rakam Kullanmalısınız.");
return false;}


}</script>
<center>
<p><br><br>
<form method="post" enctype="multipart/form-data" name="form1" action="<?=$PHP_SELF;?>"  onsubmit="return kontrol()">
<table width="453" align="center"  cellpadding="3" 
      cellspacing="0" class="liste" id="tablo" 
      style="BORDER-RIGHT: #d1d9e1 1px solid; BORDER-TOP: medium none; BORDER-LEFT: #d1d9e1 1px solid; BORDER-BOTTOM: #d1d9e1 1px solid">

  <tr>
    <td height="16" colspan="2"><div align="center" class="baslik">
      <div align="center" class="tablobaslik">Soru Düzenle</div>
    </div></td>
  </tr>
  <tr>
    <td width="125" height="30">Soru Adı : </td>
    <td width="289"><input type="text" name="soru_adi" value="<?=$k["soru"];?>"/></td>
  </tr>
      <tr>
        <td width="125" height="30">Sıralama  : </td>
        <td width="289"><input type="text" name="siralama" value="<?=$k["siralama"];?>"></td>
    </tr>
  <tr>
    <td colspan="2"><div align="center"><input type="hidden" name="id" value="<?=$_GET["id"];?>" />
    <input type="hidden" name="a_id" value="<?=$_GET["a_id"];?>" />
      <input type="submit" class="buton" name="update" id="update" value="Güncelle" />
      </div></td>
  </tr>
</table></form>
<?php
}
?>
<p><p></center>