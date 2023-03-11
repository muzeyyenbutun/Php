<?php
$gecici_ad = $_FILES["dosya"]["tmp_name"];
// dosya kendi adıyla upload dizinine kaydedilecek hedef veyol birleştiriliyor
 $kalici_yol_ad="dosyalar/".$_FILES["dosya"]["name"]; 

if (move_uploaded_file($gecici_ad,$kalici_yol_ad)) 
// eğer dosya kaydedilirse
  echo "Dosya '$kalici_yol_ad' olarak başarı ile yüklendi.";
else
   echo "Yükleme başarısız!"; 
   
?>