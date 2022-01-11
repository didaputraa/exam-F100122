<?php
include ("../koneksi.php");

$data = mysqli_query($koneksi, "select * from admin where id = '$_GET[id]' limit 1");
$isi  = mysqli_fetch_array($data);

	//memanggil data dari database
	$nama = $isi['foto']; // variabel dengan nilai nama foto
	if (!empty($nama) && file_exists("images/{$nama}")){
		unlink('images/'.$nama); //menghapus foto di dalam folder
	}
	
	mysqli_query($koneksi,"delete from admin where id = '$_GET[id]'") or die (mysqli_error()); 
	
	//menghapus data pada database
	echo "<script language='javascript'>
			window.location='index.php?url=admin#';
		</script>";