<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
	
	$sql = mysqli_query($koneksi, "UPDATE member SET ver_code='' WHERE username_member='$_GET[id]'");

	if ($sql == false) {
		
		http_response_code(500);
	}
	
} else {
	
	http_response_code(500);
}