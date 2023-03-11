<?php
	echo "<b>Yüklenen dosyanın adı:</b>".$_FILES["dosya"]["name"]."<br>";
	echo "<b>Yüklenen dosyanın geçici adı:</b>".$_FILES["dosya"]["tmp_name"]."<br>";
	echo "<b>Yüklenen dosyanın türü:</b>".$_FILES["dosya"]["type"]."<br>";
	echo "<b>Yüklenen dosyanın boyutu:</b>".$_FILES["dosya"]["size"]."<br>";
	echo "<b>Varsa yüklerken oluşan hata:</b>".$_FILES["dosya"]["error"]."<br>";


?>