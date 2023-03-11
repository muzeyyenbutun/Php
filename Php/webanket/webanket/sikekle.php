<?php
		if($_POST["add"]){
		$i=0;
		$on=2;
			foreach($_POST['sik'] as $sik){
				$siralama = $_POST['siralama'][$i];
				
				if($sik==NULL){
					echo '<html>
<head>    <script type="text/javascript">
function sik(){
alert("Şık kısmını Boş Bıraktınız…")
}
</script></head><body onload="sik()"></body></html>';
					$on=1;
				}else if($siralama==NULL){
					echo '<html>
<head>    <script type="text/javascript">
function siralama(){
alert("Sıralama kısmını Boş Bıraktınız…")
}
</script></head><body onload="siralama()"></body></html>';
					$on=1;
				}else if(!is_numeric($siralama)){
					echo '<html>
<head>    <script type="text/javascript">
function sirn(){
alert("Sıralama kısmına Rakam giriniz")
}
</script></head><body onload="sirn()"></body></html>';
				$on=1;
				}
				if($on==2){
				mysql_query("insert into siklar values (NULL,'".$sik."','".$_GET["tip"]."','".$siralama."','".$_GET["id"]."')")or die(mysql_error());
				$i++;
				}else{
				break;	
				}
			}
			if($on==2){
			echo "<center><img src='images/roller.gif'></center>";
			header("Refresh: 2; url=aindex.php?s=anketson&id=$_GET[id]");
			}
		}
?>
<style type="text/css">
.s {
	text-align: left;
}
</style>

<center>
<p><br><br>
<form method="post" enctype="multipart/form-data" name="form1" action="<?=$PHP_SELF;?>"  onsubmit="return kontrol()">
<table width="453" align="center"  cellpadding="3" 
      cellspacing="0" class="liste" id="tablo" 
      style="BORDER-RIGHT: #d1d9e1 1px solid; BORDER-TOP: medium none; BORDER-LEFT: #d1d9e1 1px solid; BORDER-BOTTOM: #d1d9e1 1px solid">

  <tr>
    <td height="16" colspan="3"><div align="center" class="baslik">
      <div align="center" class="tablobaslik">Şık Ekle</div>
    </div></td>
  </tr>
 <?php
 for($i=1;$i<=$_GET["sik"];$i++){
 ?>
  <tr>
    <td width="125" rowspan="2"><?=$i;?></td>
    <td width="125" height="30">Şık  : </td>
    <td width="289"><input type="text" name="sik[]"></td>
  </tr>
      <tr>
      <td width="125" height="30">Sıralama  : </td>
        <td width="289"><input type="text" name="siralama[]"></td>
    </tr>
 <?php
 }
 ?>
  <tr>
    <td colspan="3"><div align="center">
      <input type="submit" class="buton" name="add" id="add" value="İleri">
      </div></td>
  </tr>
</table></form>
</p>
<p><p></center>