<?php
	$unvan=$_POST['unvan'];
		if($_POST["add"]){
		mysql_query("insert into unvan values (NULL,'".$unvan."')")or die(mysql_error());
			echo "Ünvan Eklendi";
		}
		if($_POST['update']){	
		mysql_query("update unvan set unvan='$unvan' where id='".$_GET["id"]."'")or die(mysql_error());
			echo "Ünvan Guncellendi";
			header("Refresh: 2; url=aindex.php?s=unvan");
}
		if($_GET["del"]){
			mysql_query("delete from unvan where id=$_GET[del]")or die(mysql_error());	
			echo "Ünvan Silindi";
		}
if($_GET["id"]){
	$k=mysql_fetch_assoc(mysql_query("select * from unvan where id='".$_GET["id"]."'"));
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
      <div align="center" class="tablobaslik">Ünvan Ekle</div>
    </div></td>
  </tr>
  <tr>
    <td width="125" height="30">Ünvan   : </td>
    <td width="289"><input type="text" name="unvan" value="<?=$k["unvan"];?>"/></td>
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
  <th colspan="5" scope="col">Ünvanlar</th>
  </tr>
  <tr class="s">
  <th width="106" scope="col"></th>
    <th width="120" scope="col">Ünvan</th>
    <th width="97" scope="col">Düzenle</th>
    <th width="163" scope="col">Sil</th>
    </tr>
  
  <?php
  $i=0;
  $s = mysql_query("select * from unvan order by id");
while ($lis = mysql_fetch_array($s)) {
	$i++;
  ?>
  <tr>
  	<td><?=$i;?></td>
    <td><?=$lis["unvan"];?></td>
    <td><a href="aindex.php?s=unvan&id=<?=$lis["id"];?>">Düzenle</a></td>
    <td><a href="aindex.php?s=unvan&del=<?=$lis["id"];?>">Sil</a></td>
    </tr>
    <?php
  }
   ?>
	
</table>
<p><p></center>