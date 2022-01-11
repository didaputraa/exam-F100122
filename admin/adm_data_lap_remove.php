<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
	
	mysqli_query($koneksi, "DELETE FROM lapangan WHERE id_lap='$_GET[id]'")or die(mysqli_error($koneksi));
}

header('location:index.php?url=lap');