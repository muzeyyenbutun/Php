<?php

$klasor="resimler";
$dosya_sayisi = count($_FILES['dosya']['name']);

for($i=0; $i<$dosya_sayisi; $i++){
	if(!empty($_FILES['dosya']['name'][$i])){
		$kalici_yol_ad = $klasor."/".$_FILES['dosya']['name'][$i];
		$gecici_ad = $_FILES['dosya']['tmp_name'][$i];
		move_uploaded_file ($gecici_ad,$kalici_yol_ad);
	
	
	echo "<img src='".$kalici_yol_ad."'>";
	}
}
   
?>