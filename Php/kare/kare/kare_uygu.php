<?php
header ("Content-type: image/png");
$resim = imagecreatetruecolor(600,600);//resim cerceve kenarlarýný belirledim.
$kirmizi= imagecolorallocate($resim, 255, 0, 0);//elimde oluþturdugum renkler.
$mavi = imagecolorallocate($resim, 0, 0, 255);
$yesil = imagecolorallocate($resim, 0, 255, 0);

$siyah = imagecolorallocate($resim, 0, 0, 0);
$beyaz = imagecolorallocate($resim, 255, 255, 255);

imagefilledrectangle ( $resim, 200,0,400,200,$mavi );
imagefilledrectangle ( $resim, 0,200,200,400,$yesil );
imagefilledrectangle ( $resim, 400,200,600,400,$kirmizi);
imagefilledrectangle ( $resim, 200,400,400,600,$mavi );


imagefill($resim, 0,0, $siyah);
imagepng($resim);
imagedestroy($resim);
?>