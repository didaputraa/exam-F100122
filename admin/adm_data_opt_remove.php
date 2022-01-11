<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
	mysqli_query($koneksi, "DELETE FROM operator WHERE username='$_GET[id]'")or die(mysqli_error($koneksi));
}

header('location:index.php?url=opt');