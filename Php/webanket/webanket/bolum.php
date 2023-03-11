<?php
	$bolum=$_POST['bolum'];
		if($_POST["add"]){
		mysql_query("insert into bolum values (NULL,'".$bolum."')")or die(mysql_error());
			echo "Bölüm Eklendi";
		}
		if($_POST['update']){	
		mysql_query("update bolum set bolum='$bolum' where id='".$_GET["id"]."'")or die(mysql_error());
			echo "Bölüm Guncellendi";
			header("Refresh: 2; url=aindex.php?s=bolum");
}
		if($_GET["del"]){
			mysql_query("delete from bolum where id=$_GET[del]")or die(mysql_error());	
			echo "Bölüm Silindi";
		}
if($_GET["id"]){
	$k=mysql_fetch_assoc(mysql_query("select * from bolum where id='".$_GET["id"]."'"));
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
      <div align="center" class="tablobaslik">Bölüm Ekle</div>
    </div></td>
  </tr>
  <tr>
    <td width="125" height="30">Bölüm   : </td>
    <td width="289"><input type="text" name="bolum" value="<?=$k["bolum"];?>"/></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" class="buton" <?= $_GET["id"] ? 'name="update" id="update" value="Guncelle"' : 'name="add" id="add" value="Ekle"'?> />
      </div></td>
  </tr>
</table></form>
</p>
<table width="514" height="102" border="1">
<tr>
  <th colspan="5" scope="col">Bölümler</th>
  </tr>
  <tr class="s">
  <th width="45" scope="col"></th>
    <th width="318" scope="col">Bölüm</th>
    <th width="55" scope="col">Düzenle</th>
    <th width="68" scope="col">Sil</th>
    </tr>
  
  <?php
  $i=0;
  $s = mysql_query("select * from bolum order by id");
while ($lis = mysql_fetch_array($s)) {
	$i++;
  ?>
  <tr>
  	<td><?=$i;?></td>
    <td><?=$lis["bolum"];?></td>
    <td><a href="aindex.php?s=bolum&id=<?=$lis["id"];?>">Düzenle</a></td>
    <td><a href="aindex.php?s=bolum&del=<?=$lis["id"];?>">Sil</a></td>
    </tr>
    <?php
  }
   ?>
	
</table>
<p><p></center>