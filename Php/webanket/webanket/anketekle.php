<?php
	$anket=$_POST['anket'];
	$aciklama=$_POST['aciklama'];
	$kategori=$_POST['kategori'];
	$anketor_id=$y_al["id"];
		if($_POST["add"]){
		mysql_query("insert into anket values (NULL,'".$anket."','".$aciklama."','".$kategori."',CURDATE(),'".$anketor_id."')")or die(mysql_error());
			$anket_id=mysql_insert_id();
			echo "<center><img src='images/roller.gif'></center>";
			header("Refresh: 2; url=aindex.php?s=soruekle&id=$anket_id");
		}
		if($_POST["update"]){
		mysql_query("update anket SET anket='".$anket."',aciklama='".$aciklama."',kategori_id='".$kategori."',tarih=CURDATE() where id='$_POST[id]'")or die(mysql_error());
			echo "<center><img src='images/roller.gif'></center>";
			header("Refresh: 2; url=aindex.php?s=anketekle&id=$_POST[id]");
		}
		if($_GET["del"]){
			mysql_query("DELETE FROM anket WHERE id='".$_GET["del"]."'");
	$sor = mysql_query("select * from sorular where anket_id='".$_GET["del"]."'");
while ($listele = mysql_fetch_array($sor)) {
	mysql_query("DELETE FROM siklar WHERE soru_id='".$listele["id"]."'");
}
	mysql_query("DELETE FROM sorular WHERE anket_id='".$_GET["del"]."'");	
	echo "Anket Silindi.";
	header("Refresh: 1; url=aindex.php?s=anketekle");
		}
if($_GET["id"]){
	$anket_b = mysql_fetch_assoc(mysql_query("SELECT * FROM anket where id='$_GET[id]'"));
	$kat = mysql_fetch_assoc(mysql_query("select * from kategori where id='$anket_b[kategori]'"));
}
?>
<style type="text/css">
.s {
	text-align: left;
}
</style>
<script language="javascript">
function kontrol(){
if(document.form1.anket_baslik.value==""){alert("Anket Başlığı kısmını Boş Bıraktınız…");document.form1.anket_baslik.focus();return false;}
}</script>
<center>
<p><br><br>
<form method="post" enctype="multipart/form-data" name="example" action="<?=$PHP_SELF;?>">
<table width="453" align="center"  cellpadding="3" 
      cellspacing="0" class="liste" id="tablo" 
      style="BORDER-RIGHT: #d1d9e1 1px solid; BORDER-TOP: medium none; BORDER-LEFT: #d1d9e1 1px solid; BORDER-BOTTOM: #d1d9e1 1px solid">

  <tr>
    <td height="16" colspan="2"><div align="center" class="baslik">
      <div align="center" class="tablobaslik">Anket Ekle</div>
    </div></td>
  </tr>
  <tr>
    <td width="125" height="30">Anket Başlığı   : </td>
    <td width="289"><input type="text" name="anket" value="<?=$anket_b["anket"];?>"></td>
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
      <input type="submit" class="buton" <?= $_GET["id"] ? 'name="update" id="update" value="Guncelle"' : 'name="add" id="add" value="Ekle"'?> />
      </div></td>
  </tr>
</table></form>
</p>
<table width="834" height="102" border="1">
<tr>
  <th colspan="7" scope="col">Anketler</th>
  </tr>
  <tr class="s">
  <th width="34" scope="col"></th>
    <th width="173" scope="col">Anket</th>
    <th width="268" scope="col">Açıklama</th>
    <th width="115" scope="col">Kategori</th>
    <th width="99" scope="col">Tarih</th>
    <th width="55" scope="col">Düzenle</th>
    <th width="44" scope="col">Sil</th>
    </tr>
  
  <?php
  $i=0;
  $s = mysql_query("select * from anket where anketor_id='".$anketor_id."' order by id");
while ($lis = mysql_fetch_array($s)) {
	$list = mysql_fetch_assoc(mysql_query("select * from kategori where id=".$lis["kategori_id"].""));
	$i++;
  ?>
  <tr>
  	<td><?=$i;?></td>
    <td><?=$lis["anket"];?></td>
    <td><?=$lis["aciklama"];?></td>
    <td><?=$list["kategori"];?></td>
    <td><?=$lis["tarih"];?></td>
    <td><a href="aindex.php?s=anketekle&id=<?=$lis["id"];?>">Düzenle</a></td>
    <td><a href="aindex.php?s=anketekle&del=<?=$lis["id"];?>">Sil</a></td>
    </tr>
    <?php
  }
   ?>
	
</table>
<p><p></center>