<?php
header ("Content-type: image/png");
$resim = imagecreatetruecolor(750, 600);//resim cerceve kenarlarýný belirledim.
$kirmizi= imagecolorallocate($resim, 255, 0, 0);
$yesil = imagecolorallocate($resim, 0, 255, 0);
$mavi = imagecolorallocate($resim, 0, 0, 255);
$beyaz = imagecolorallocate($resim, 255, 255, 255);
$siyah = imagecolorallocate($resim, 0, 0, 0);
imageline ( $resim, 0,150,150,0,$mavi);
imageline ( $resim, 150,0,300,150,$mavi );
imageline ( $resim, 300,150,450,0,$mavi );
imageline ( $resim, 450,0,600,150,$mavi );
imageline ( $resim, 600,150,750,0,$mavi );
imagefilledellipse ($resim,300,75,50,50,$mavi);//daire cizme  imagefilledellipse ( $resim, $x,$y,$W,$H,$renk );
imageline ( $resim, 75,250,150,150,$yesil );
imageline ( $resim, 150,150,225,250,$yesil );
imageline ( $resim, 75,250,225,250,$yesil );
imagefilledrectangle ( $resim, 75,250,225,400,$kirmizi );// dikdortgen cizdir  ..imagefilledrectangle ( $resim, $x1,$y1,$x2,$y2,$renk );
imagefilledrectangle ( $resim, 100,275,125,310,$siyah );//penc1
imagefilledrectangle ( $resim,  175,275,200,310,$siyah);//pnc2
imagefilledrectangle ( $resim, 130,350,170,400,$siyah );//kapý
imagefilledrectangle ( $resim, 450,320,500,400,$beyaz );
imagefilledellipse ($resim,475,300,110,125,$mavi);
imagefilledellipse ($resim,460,275,10,10,$kirmizi);
imagefilledellipse ($resim,480,280,10,10,$kirmizi);
imagefilledellipse ($resim,490,325,10,10,$kirmizi);
imagefilledellipse ($resim,465,310,10,10,$kirmizi);
imagefilledellipse ($resim,440,300,10,10,$kirmizi);
imagefilledellipse ($resim,520,300,10,10,$kirmizi);
imagefilledellipse ($resim,445,340,10,10,$kirmizi);

imageline ( $resim, 130,400,300,600,$yesil );
imageline ( $resim, 170,400,450,600,$yesil );


imagefill($resim, 0, 0, $siyah );
imagepng($resim);
imagedestroy($resim);
?>