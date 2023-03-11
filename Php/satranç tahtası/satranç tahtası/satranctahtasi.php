<?php
header("Content-type: image/png");
$resim = imagecreatetruecolor(500,500);//resim cerceve kenarlarını belirledim.

$beyaz = imagecolorallocate($resim, 255, 255, 255);
$siyah = imagecolorallocate($resim, 0, 0, 0);
$mavi = imagecolorallocate($resim, 0, 0, 255);
$sayac=0;

for($y=10;$y<=360;$y=$y+50)
	{
		for($x=60;$x<=410;$x=$x+50)
		{
		    if($sayac%2==0)
			  imagefilledrectangle ($resim,$x,$y,$x+50,$y+50,$beyaz );
			  else
			  imagefilledrectangle ($resim,$x,$y,$x+50,$y+50,$mavi);
			  $sayac++;
			  
		}
		$sayac++;
	}

	imagepng($resim);
			  imagedestroy($resim);
   imagefill($resim, 0, 0, $siyah );
   

?>
