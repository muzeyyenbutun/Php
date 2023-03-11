<?php

	if(isset($_POST["arabalar"])){
		$arabalar = $_POST["arabalar"];
		foreach($arabalar as $araba){
			echo   $araba."<br>";
		}
	} else {
		echo "Bir seçim yapmadınız.";
	}
	
	
?>