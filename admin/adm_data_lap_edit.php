<?php
ob_start();
include '../koneksi.php';

$sql 	= "select * from lapangan where id_lap='{$_GET['id']}'";
$query	= mysqli_query($koneksi, $sql)or die(mysqli_error($koneksi));
$result = mysqli_fetch_object($query);

?>
<div class="right_col" role="main">
	<div class="row">
		<div class="col">
		<h1>Edit data Product</h1>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Jenis product</label>
				<select class="form-control" name="jenis">
					<option disabled="disabled">--- Pilih Jenis Produk ---</option>
					<option value="sintetis" <?= $result->jenis_rumput == 'tenda'? 'selected' : ''?>>
						Tenda
					</option>
					<option value="beton/semen" <?= $result->jenis_rumput == 'dekorasi'? 'selected' : ''?>>
						Dekorasi
					</option>
					<option value="beton/semen" <?= $result->jenis_rumput == 'soundsystem'? 'selected' : ''?>>
						Sound System
					</option>
					<option value="beton/semen" <?= $result->jenis_rumput == 'kursi'? 'selected' : ''?>>
						Kursi
					</option>
				</select>
			</div>
			<div class="form-group">
				<label>Nomor product</label>
				<input type="text" name="nomor" value="<?= $result->no_lap ?>" class="form-control" required />
			</div>
			<div class="form-group">
				<label>Harga product</label>
				<input type="number" name="harga" value="<?= $result->harga ?>" class="form-control" required />
			</div>
			<div class="form-group">
				<label>Foto product</label>
				<input type="file" name="foto" class="form-control" />
			</div>
			<div>
				<a class="btn btn-primary" href="?url=lap">Batal</a>
				<button name="simpan" class="btn btn-primary">Simpan</button>
			</div>
		</form>
		</div>
	</div>
</div>

<?php
if (isset($_POST['simpan'])) {
	
	$sqltmp = "jenis_rumput='{$_POST['jenis']}', harga='{$_POST['harga']}', no_lap='{$_POST['nomor']}'";
	
	 $filename = @$_FILES['foto']['name'];
     $lokasi   = @$_FILES['foto']['tmp_name'];
	 $foto	   = '';
	 
	if(move_uploaded_file($lokasi, "../operator/assets/foto_lap/{$filename}")) {
		$foto = ",foto='{$filename}'";
	}
	
	mysqli_query($koneksi, "UPDATE lapangan SET {$sqltmp}{$foto} where id_lap='{$_GET['id']}'")or die(mysqli_error($koneksi));
	
	echo "<script>window.location='index.php?url=lap'</script>";
}