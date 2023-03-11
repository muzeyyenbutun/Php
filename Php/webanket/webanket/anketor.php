<?php
	$adi_soyadi=$_POST['adi_soyadi'];
	$unvan_id=$_POST['unvan_id'];
	$mail=$_POST['mail'];
	$sifre=md5($_POST['sifre']);
		if($_POST["add"]){
		mysql_query("insert into anketor values (NULL,'".$adi_soyadi."','".$unvan_id."','".$mail."','".$sifre."')")or die(mysql_error());
			echo "Anketör Eklendi";
		}
		if($_POST['update']){	
		if($_POST['sifre']){	
		mysql_query("update anketor set adi_soyadi='$adi_soyadi',unvan_id='$unvan_id',mail='$mail',sifre='$sifre' where id='".$_GET["id"]."'")or die(mysql_error());
			}else{
				mysql_query("update anketor set adi_soyadi='$adi_soyadi',unvan_id='$unvan_id',mail='$mail' where id='".$_GET["id"]."'")or die(mysql_error());
			}
			echo "Anketör Guncellendi";
			header("Refresh: 2; url=aindex.php?s=anketor");
}
		if($_GET["del"]){
			mysql_query("delete from anketor where id=$_GET[del]")or die(mysql_error());	
			echo "Anketör Silindi";
		}
if($_GET["id"]){
	$k=mysql_fetch_assoc(mysql_query("select * from anketor where id='".$_GET["id"]."'"));
	$list = mysql_fetch_assoc(mysql_query("select * from unvan where id=".$k["unvan_id"].""));
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
      <div align="center" class="tablobaslik">Anketör Ekle</div>
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
    <th width="193" scope="col">E-Mail</th>
    <th width="165" scope="col">Ünvan</th>
    <th width="61" scope="col">Düzenle</th>
    <th width="69" scope="col">Sil</th>
    </tr>
  
  <?php
  $i=0;
  $s = mysql_query("select * from anketor order by id");
while ($lis = mysql_fetch_array($s)) {
	$list = mysql_fetch_assoc(mysql_query("select * from unvan where id=".$lis["unvan_id"].""));
	$i++;
  ?>
  <tr>
  	<td><?=$i;?></td>
    <td><?=$lis["adi_soyadi"];?></td>
    <td><?=$lis["mail"];?></td>
    <td><?=$list["unvan"];?></td>
    <td><a href="aindex.php?s=anketor&id=<?=$lis["id"];?>">Düzenle</a></td>
    <td><a href="aindex.php?s=anketor&del=<?=$lis["id"];?>">Sil</a></td>
    </tr>
    <?php
  }
   ?>
	
</table>
<p><p></center>