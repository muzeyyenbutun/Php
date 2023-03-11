<?php
include("ayar.php");
	$adi_soyadi=$_POST['adi_soyadi'];
	$unvan_id=$_POST['unvan_id'];
	$mail=$_POST['mail'];
	$sifre=md5($_POST['sifre']);
				if($_POST['update']){
			if($_POST['sifre']){	
		mysql_query("update anketor set adi_soyadi='$adi_soyadi',unvan_id='$unvan_id',mail='$mail',sifre='$sifre' where id='".$_GET["id"]."'")or die(mysql_error());
			}else{
				mysql_query("update anketor set adi_soyadi='$adi_soyadi',unvan_id='$unvan_id',mail='$mail' where id='".$_GET["id"]."'")or die(mysql_error());
			}
			echo "Bilgileriniz Güncellendi";
		}
if($_GET["id"]){
	$k=mysql_fetch_assoc(mysql_query("select * from anketor where id='".$_GET["id"]."'"));
	$list = mysql_fetch_assoc(mysql_query("select * from unvan where id=".$k["unvan_id"].""));
}
?><center>
<p><br><br>
<form method="post" enctype="multipart/form-data" name="example" action="<?=$PHP_SELF;?>">
<table width="453" align="center"  cellpadding="3" 
      cellspacing="0" class="liste" id="tablo" 
      style="BORDER-RIGHT: #d1d9e1 1px solid; BORDER-TOP: medium none; BORDER-LEFT: #d1d9e1 1px solid; BORDER-BOTTOM: #d1d9e1 1px solid">

  <tr>
    <td height="16" colspan="2"><div align="center" class="baslik">
      <div align="center" class="tablobaslik">Bilgileri güncelle</div>
    </div></td>
  </tr>
  <tr>
    <td width="125" height="30">Adı Soyadı  : </td>
    <td width="289"><input type="text" name="adi_soyadi" value="<?=$k["adi_soyadi"];?>"/></td>
  </tr>
    <tr>
      <td width="125" height="30">E-Mail  : </td>
      <td width="289"><input type="text" name="mail" value="<?=$k["mail"];?>"/></td>
    </tr>
      <tr>
    <td width="125" height="30">Şifre  : </td>
    <td width="289"><input type="password" name="sifre"/></td>
  </tr>
      <tr>
    <td width="125" height="30">Ünvan  : </td>
    <td width="289"><select name="unvan_id">
    
   <option value="<?=$list["id"];?>" selected="selected"><?=$list["unvan"];?></option>
<?php
$s = mysql_query("select * from unvan");
while ($lis = mysql_fetch_array($s)) {
?>
      <option value="<?=$lis["id"];?>"><?=$lis["unvan"];?></option>
      
<?
}
?>
</select></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" class="buton" name="update" id="update" value="Guncelle"/>
      </div></td>
  </tr>
</table></form>
</p></center>