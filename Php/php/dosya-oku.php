<?php
	$dosya = fopen("iris.txt", "a+") or die("Dosya açılamıyor!");
	
	while(!feof($dosya))
		echo fgets($dosya)."<br>";
	
	fclose($dosya);
?>