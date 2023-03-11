<form action="hidden_print2.php" method="post">
Sınıf: <input type="text" name="sinif"><br>
Örgün: <input type="text" name="orgun"><br>
<?php
	$adsoyad = $_POST["adsoyad"];
	$okulno = $_POST["okulno"];
?>
<input type="hidden" name="adsoyad" value="<?php echo $adsoyad; ?>">
<input type="hidden" name="okulno" value="<?php echo $okulno; ?>">
<input type="submit" value="Gönder"> 
</form>