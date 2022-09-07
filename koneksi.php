<?php
// mengkoneksikan ke database
	$kon = new mysqli('localhost','root','','db_perubahan');
	if (!$kon) {
		die('Could not connect: ' . mysqli_error($con));
	}
?>
