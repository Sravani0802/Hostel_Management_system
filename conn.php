<?php
$db=mysqli_connect('localhost:3306','root','','hostelman');
if($db===false){
	die("Error:connection error.".mysqli_connect_error());
}
?>