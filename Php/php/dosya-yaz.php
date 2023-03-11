<?php
	$dosya = fopen("iris.txt", "a+") or die("Dosya açılamıyor!");
	fwrite($dosya,"burda yeni bişeyler var\n");
	fwrite($dosya,"nasılsın");
	
	fclose($dosya);
?>