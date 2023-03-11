<?php
	$ip = $_SERVER['REMOTE_ADDR'];
ob_start();
	if($_POST["onay"]){
	$s = mysql_query("select * from sorular where anket_id='".$_GET["sa"]."'");
	while ($lis = mysql_fetch_array($s)){
		$i=1;	
		$sik = mysql_query("select * from siklar where soru_id='".$lis["id"]."' and tip=2 order by siralama");
		while ($siklis = mysql_fetch_array($sik)){
	    $i++;
		$ss_lis=$lis["id"]."-".$i;
		$sik_id=$_POST[$ss_lis];
		mysql_query("insert into anket_sonuclari values (NULL,'".$sik_id."','".$u_al["id"]."','".$siklis["adi"]."')")or die(mysql_error());
		}
		$sik = mysql_fetch_assoc(mysql_query("select * from siklar where soru_id='".$lis["id"]."' order by siralama"));
		if($sik["tip"]!=2){
		$sik_id=$_POST[$lis["id"]];
	mysql_query("insert into anket_sonuclari values (NULL,'".$sik_id."','".$u_al["id"]."','".$sik["adi"]."')")or die(mysql_error());
		}
	}
	echo "<center>Anket Sonucu Gönderilmiştir.</center>";
	mysql_query("insert into ip_kontrol values (NULL,'".$ip."','".$_GET["sa"]."')")or die(mysql_error());
	$ip_sn=1;
}
?>
<style type="text/css">
.s {
	text-align: left;
}
</style>

<p><br><br>
<?php
$anket_sn = mysql_fetch_assoc(mysql_query("SELECT * FROM anket where id='".$_GET["sa"]."'"));
if($_GET["sa"] && $anket_sn){
	$ip_kn = mysql_fetch_assoc(mysql_query("SELECT * FROM ip_kontrol where anket_id='".$_GET["sa"]."' and ip='".$ip."'"));
	if(!$ip_kn || $ip_sn==1){
	$a_al = mysql_fetch_assoc(mysql_query("SELECT * FROM anket where id='$_GET[sa]'"));
if($ip_sn!=1){
?>
<div id="anaKapsayici">
	<div id="ust">
		<div class="ortala">
		  <div class="temizle"></div>
		</div>
	</div>
	<div class="golge"></div>
	<div id="orta" class="ortala">
    <form method="post" enctype="multipart/form-data" name="example" action="<?=$PHP_SELF;?>">
	  <table><tr><td><div class="sayfaAciklamasi">
<h3 class="genelBaslik"><?=$a_al["adi"];?></h3>
				<p><?=$a_al["aciklama"];?></p>
	  </div></td></tr>
      <?php
	  $s = mysql_query("select * from sorular where anket_id='".$_GET["sa"]."' order by siralama");
while ($lis = mysql_fetch_array($s)) {
	  ?>
      <tr><td>
<h3 class="genelBaslik"><?=$lis["soru"];?></h3>
				<?php
              $sik = mysql_query("select * from siklar where soru_id=$lis[id] order by siralama");
			  $i=1;
        	   while ($siklis = mysql_fetch_array($sik)) {
				  
				   if($siklis["tip"]==1){
                ?>
				<p><input type="radio" name="<?=$lis["id"];?>" value="<?=$siklis["id"];?>"> <?=$siklis["adi"];?></p>
                <?php
				   }else if($siklis["tip"]==2){ 
				   $i++;
				?>
               <p><input type="checkbox" name="<?=$lis["id"]."-".$i;?>" value="<?=$siklis["id"];?>"> <?=$siklis["adi"];?></p>
                <?php
                	}else if($siklis["tip"]==4){
				?>
               <p><input type="text" name="<?=$lis["id"];?>" value="<?=$siklis["id"];?>"> <?=$siklis["adi"];?></p>
                <?php
                	}else if($siklis["tip"]==9){
				?>
               <p><TEXTAREA NAME="<?=$lis["id"];?>" COLS=40 ROWS=6></TEXTAREA> <?=$siklis["adi"];?></p>
                <?php
                	}	   
				}
				?>
	 </td></tr>
     <?php
	}
	 ?>
     <tr><td><p><input type="submit" class="buton" name="onay" id="onay" value="Onayla" /></p></td></tr>
     </table></form>

  </div>
	
</div>
    <?php
}
	}else{
		echo "<center>Daha onceden bu anketi Doldurdunuz.</center>";
	}
}else{
?>
    
    
  <center> <table width="856" height="102" border="1" align="center">
<tr>
  <th colspan="6" scope="col">Doldurulmaya Hazır Anketler</th>
  </tr>
  <tr class="s">
  <th width="27" scope="col"></th>
    <th width="96" class="s" scope="col">Kimden</th>
    <th width="126" class="s" scope="col">Anket</th>
    <th width="243" class="s" scope="col">Açıklama</th>
    <th width="167" class="s" scope="col">tarih</th>
    <th width="27" class="s" scope="col">Kategori</th>
    </tr>
  
  <?php
  $i=0;
  $s = mysql_query("select * from anket where anketor_id='".$u_al["danisman_id"]."' order by id");
while ($lis = mysql_fetch_array($s)) {
	$list = mysql_fetch_assoc(mysql_query("select * from anketor where id=".$lis["anketor_id"].""));
	$liste = mysql_fetch_assoc(mysql_query("select * from kategori where id=".$lis["kategori_id"].""));
	$i++;
  ?>
  <tr>
  	<td><?=$i;?></td>
    <td><?=$list["adi_soyadi"];?></td>
    <td><a href="uindex.php?s=anketdoldur&sa=<?=$lis["id"];?>"><?=$lis["anket"];?></a></td>
    <td><?=$lis["aciklama"];?></td>
    <td><?=$lis["tarih"];?></td>
    <td><?=$liste["kategori"];?></td>
    </tr>
    <?php
  }
   ?>
</table> </center>
<?php		
}
	?>
  
<p>