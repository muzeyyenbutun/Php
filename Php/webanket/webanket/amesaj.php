<?php
include("ayar.php");
	$konu=$_POST['konu'];
	$mesaj=$_POST['mesaj'];
	$kime=$_POST['kime'];
		if($_POST['gonder']){	
		mysql_query("insert into mesaj values (NULL,'".$konu."','".$mesaj."','".$_GET["id"]."','".$kime."',NOW(),'1')")or die(mysql_error());	
		echo "Mesajınız İletildi.";
		}
		if($_GET["del"]){
mysql_query("delete from mesaj where id=$_GET[del]")or die(mysql_error());	
echo "Mesaj Silindi";
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
      <div align="center" class="tablobaslik">Mesaj Gönder</div>
    </div></td>
  </tr>
  <tr>
    <td width="125" height="30">Kime  : </td>
    <td width="289"><select name="kime">
  
<?php
$s = mysql_query("select * from anketor where id<>'".$_GET["id"]."'");
while ($lis = mysql_fetch_array($s)) {
?>
      <option value="<?=$lis["id"];?>"><?=$lis["adi_soyadi"];?></option>
      
<?
}
?>
</select></td>
  </tr>
  <tr>
    <td width="125" height="30">Konu  : </td>
    <td width="289"><input type="text" name="konu"/></td>
  </tr>
  <tr>
    <td width="125" height="30">Mesaj  : </td>
    <td width="289"><textarea name="mesaj" cols="30" rows="3"></textarea></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" class="buton" name="gonder" id="gonder" value="Gönder"/>
      </div></td>
  </tr>
</table></form>
</p>
<table width="726" height="102" border="1">
<tr>
  <th colspan="5" scope="col">Gelen Mesajlar</th>
  </tr>
  <tr class="s">
  <th width="27" scope="col"></th>
    <th width="96" scope="col">Kimden</th>
    <th width="126" scope="col">Konu</th>
    <th width="243" scope="col">Mesaj</th>
    <th width="167" scope="col">tarih</th>
    <th width="27" scope="col">Sil</th>
    </tr>
  
  <?php
  $i=0;
  $s = mysql_query("select * from mesaj where kime='".$_GET["id"]."' order by id");
while ($lis = mysql_fetch_array($s)) {
	$list = mysql_fetch_assoc(mysql_query("select * from anketor where id=".$lis["kimden"].""));
	$i++;
	
  ?>
  <tr>
  	<td><?=$i;?></td>
    <td><?=$list["adi_soyadi"];?></td>
    <td><?=$lis["konu"];?></td>
    <td><?=$lis["mesaj"];?></td>
    <td><?=$lis["tarih"];?></td>
    <td><a href="aindex.php?s=amesaj&id=<?=$_GET["id"];?>&del=<?=$lis["id"];?>">Sil</a></td>
    </tr>
    <?php
  }
   ?>
	
</table>
<p><p></center>