<?php

if(isset($_POST["onay"])){
	echo "onayladınız<br>";
	echo $_POST["onay"];
} else {
	echo "onaylamadınız";
}

?>