<?php
ob_start();
session_start();
if($_GET["u"]){
unset($_SESSION["u_id"]);
header("Refresh: 1; url=ugiris.html");
}else if($_GET["y"]){
unset($_SESSION["y_id"]);
header("Refresh: 1; url=agiris.html");
}
echo "cikis yapiliyor...";
?>