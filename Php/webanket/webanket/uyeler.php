<?php
	$adi_soyadi=$_POST['adi_soyadi'];
	$numara=$_POST['numara'];
	$bolum_id=$_POST['bolum_id'];
	$yas=$_POST['yas'];
	$mail=$_POST['mail'];
	$sifre=md5($_POST['sifre']);
	$danisman_id=$_POST['danisman_id'];
		if($_POST["add"]){
		mysql_query("insert into uyelik values (NULL,'".$adi_soyadi."','".$numara."','".$bolum_id."','".$yas."','".$mail."','".$sifre."',1,'".$danisman_id."')")or die(mysql_error());
			echo "Üye Eklendi";
		}
		if($_POST['update']){	
		if($_POST['sifre']){	
		mysql_query("update uyelik set adi_soyadi='$adi_soyadi',numara='$numara',bolum_id='$bolum_id',yas='$yas',mail='$mail',sifre='$sifre',danisman_id='$danisman_id' where id='".$_GET["id"]."'")or die(mysql_error());
			}else{
				mysql_query("update uyelik set adi_soyadi='$adi_soyadi',numara='$numara',bolum_id='$bolum_id',yas='$yas',mail='$mail',danisman_id='$danisman_id' where id='".$_GET["id"]."'")or die(mysql_error());
			}
			echo "Üye Guncellendi";
			header("Refresh: 2; url=aindex.php?s=uyeler");
}
		if($_GET["del"]){
			mysql_query("delete from uyelik where id=$_GET[del]")or die(mysql_error());	
			echo "Üye Silindi";
		}
if($_GET["id"]){
	$k=mysql_fetch_assoc(mysql_query("select * from uyelik where id='".$_GET["id"]."'"));
	$list = mysql_fetch_assoc(mysql_query("select * from bolum where id=".$k["bolum_id"].""));
	$listi = mysql_fetch_assoc(mysql_query("select * from anketor where id=".$lis["danisman_id"].""));
}
?>
<style type="text/css">
.s {
	text-align: left;
}
</style>
<center>
<p><br><br>
<form method="post" enctype="multipart/form-data" name="example" action="<?=$PHP_SELF;?>">
<table width="453" align="center"  cellpadding="3" 
      cellspacing="0" class="liste" id="tablo" 
      style="BORDER-RIGHT: #d1d9e1 1px solid; BORDER-TOP: medium none; BORDER-LEFT: #d1d9e1 1px solid; BORDER-BOTTOM: #d1d9e1 1px solid">

  <tr>
    <td height="16" colspan="2"><div align="center" class="baslik">
      <div align="center" class="tablobaslik">Üye Ekle</div>
    </div></td>
  </tr>
 <tr>
    <td width="125" height="30">Adı Soyadı  : </td>
    <td width="289"><input type="text" name="adi_soyadi" value="<?=$k["adi_soyadi"];?>"/></td>
  </tr>
  <tr>
    <td width="125" height="30">Numara  : </td>
    <td width="289"><input type="text" name="numara" value="<?=$k["numara"];?>"/></td>
  </tr>
  <tr>
    <td width="125" height="30">Bölüm  : </td>
    <td width="289"><select name="bolum_id">
    
   <option value="<?=$list["id"];?>" selected="selected"><?=$list["bolum"];?></option>
<?php
$s = mysql_query("select * from bolum");
while ($lis = mysql_fetch_array($s)) {
?>
      <option value="<?=$lis["id"];?>"><?=$lis["bolum"];?></option>
      
<?
}
?>
</select></td>
  </tr>
  <tr>
      <td width="125" height="30">Yaş  : </td>
      <td width="289"><input type="text" name="yas" value="<?=$k["yas"];?>"/></td>
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
    <td width="125" height="30">Danışman  : </td>
    <td width="289"><select name="danisman_id">
    
   <option value="<?=$listi["id"];?>" selected="selected"><?=$listi["danisman"];?></option>
<?php
$s = mysql_query("select * from anketor");
while ($lis = mysql_fetch_array($s)) {
?>
      <option value="<?=$lis["id"];?>"><?=$lis["adi_soyadi"];?></option>
      
<?
}
?>
</select></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" class="buton" <?= $_GET["id"] ? 'name="update" id="update" value="Guncelle"' : 'name="add" id="add" value="Ekle"'?> />
      </div></td>
  </tr>
</table></form>
</p>
<table width="822" height="93" border="1">
<tr>
  <th colspan="5" scope="col">Anketörler</th>
  </tr>
  <tr class="s">
  <th width="42" scope="col"></th>
    <th width="252" scope="col">Adı Soyadı</th>
    <th width="252" scope="col">Numara</th>
    <th width="252" scope="col">Bölüm</th>
    <th width="252" scope="col">Yaş</th>
    <th width="193" scope="col">E-Mail</th>
    <th width="165" scope="col">Danışman</th>
    <th width="61" scope="col">Düzenle</th>
    <th width="69" scope="col">Sil</th>
    </tr>
  
  <?php
  $i=0;
  $s = mysql_query("select * from uyelik where danisman_id='".$y_al["id"]."' order by id");
while ($lis = mysql_fetch_array($s)) {
	$list = mysql_fetch_assoc(mysql_query("select * from bolum where id=".$lis["bolum_id"].""));
	$listi = mysql_fetch_assoc(mysql_query("select * from anketor where id=".$lis["danisman_id"].""));
	$i++;
  ?>
  <tr>
  	<td><?=$i;?></td>
    <td><?=$lis["adi_soyadi"];?></td>
    <td><?=$lis["numara"];?></td>
    <td><?=$list["bolum"];?></td>
    <td><?=$lis["yas"];?></td>
    <td><?=$lis["mail"];?></td>
    <td><?=$listi["adi_soyadi"];?></td>
    <td><a href="aindex.php?s=uyeler&id=<?=$lis["id"];?>">Düzenle</a></td>
    <td><a href="aindex.php?s=uyeler&del=<?=$lis["id"];?>">Sil</a></td>
    </tr>
    <?php
  }
   ?>
	
</table>
<p><p></center>