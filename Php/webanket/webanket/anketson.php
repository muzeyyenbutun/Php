<?php
	$sik_sayisi=$_POST['sik_sayisi'];
	$tip=$_POST['tip'];
	$a_al = mysql_fetch_assoc(mysql_query("SELECT * FROM sorular where id='$_GET[id]'"));
		if($_POST["add"]){
			echo "<center><img src='images/roller.gif'></center>";
			header("Refresh: 2; url=aindex.php?s=sikekle&id=$_GET[id]&tip=$tip&sik=$sik_sayisi");
		}
?>
<style type="text/css">
.s {
	text-align: left;
}
</style>
<script language="javascript">
function kontrol(){
if(document.form1.sik_sayisi.value==""){alert("Şık Adeti kısmını Boş Bıraktınız…");document.form1.sik_sayisi.focus();return false;}
if(isNaN(document.form1.sik_sayisi.value)){
alert("Şık Sayısında Rakam Kullanmalısınız.");
return false;}
}</script>
<center>
<p><br><br>
<form method="post" enctype="multipart/form-data" name="form1" action="<?=$PHP_SELF;?>" onsubmit="return kontrol()">
<table width="453" align="center"  cellpadding="3" 
      cellspacing="0" class="liste" id="tablo" 
      style="BORDER-RIGHT: #d1d9e1 1px solid; BORDER-TOP: medium none; BORDER-LEFT: #d1d9e1 1px solid; BORDER-BOTTOM: #d1d9e1 1px solid; text-align: center;">
       <tr>
    <td colspan="2"><a href="aindex.php?s=soruekle&id=<?=$a_al["anket_id"];?>">Yeni Soruya Geç</a></td>
  </tr>
  <tr>
    <td colspan="2"><a href="aindex.php?s=gonder&u=<?=$a_al["anket_id"];?>">Anketi Yayına Ver</a></td>
  </tr>
  <tr>
    <td height="16" colspan="2"><div align="center" class="baslik">
      <div align="center" class="tablobaslik">Yeni Şık Ekle</div>
    </div></td>
  </tr>
   <tr>
     <td width="125" height="30">Şık Adeti  : </td>
     <td width="289"><input type="text" name="sik_sayisi" value="<?=$k["sik_sayisi"];?>"/></td>
   </tr>
     <tr>
    <td width="125" height="30">Şıkların Türü  : </td>
    <td width="289"><select name="tip">
<?php
$s = mysql_query("select * from tipler");
while ($lis = mysql_fetch_array($s)) {
?>
      <option value="<?=$lis["id"];?>"><?=$lis["tip"];?></option>
      
<?
}
?>
</select></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" class="buton" name="add" id="add" value="İleri">
      </div></td>
  </tr>
</table>
</form>
</p>
<p><p></center>