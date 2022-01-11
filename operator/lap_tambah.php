<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4>Tambah Produk</h4>
      </div>
      <div class="modal-body">
        
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        <?php
			// membuat kode urut otomatis sebagai id lapangan
						$sql = "SELECT max(id_lap) as terakhir from lapangan";
						$hasil = mysqli_query($koneksi,$sql);
						$data = mysqli_fetch_array($hasil);
						$lastID = $data['terakhir'];
						$lastNoUrut = substr($lastID, 3, 9);
						$nextNoUrut = $lastNoUrut + 1;
						$nextID = "LP".sprintf("%03s",$nextNoUrut);
						?>
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Kode Produk</label>
            <div class="col-sm-8">
               <input type="text" readonly="readonly" value="<?php echo $nextID; ?>" class="form-control" name="id_lap" id="pwd" placeholder="Kode TendaTenda" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Jenis Produk</label>
            <div class="col-sm-8">
              <select class="form-control" name="jenis_rumput"  required>
                <option disabled="disabled">--- Pilih Jenis Produk ---</option>
            	 <option value="sintetis">Tenda</option>
				    <option value="beton/semen">Dekorasi</option>
            <option value="beton/semen">Sound System</option>
            <option value="beton/semen">Kursi</option>
                        </select>
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Nomor Produk</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="pwd" name="no_lap" placeholder="Nomor Tenda">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Harga</label>
            <div class="col-sm-8">
               <input type="text" class="form-control" name="harga" id="pwd" placeholder="Harga Tenda Per Unit">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Foto</label>
            <div class="col-sm-8">
             <label class="btn btn-info" for="my-file-selector2">
                      <input id="my-file-selector2" name="foto" type="file" style="display:none;" onchange="$('#upload-file-foto').html($(this).val());">
                      Upload
                  </label>
                  <p>* Ukuran file maksimal kurang dari 2 MB</p>
                  
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="email"></label>
            <div>
             <span class='label label-danger col-sm-8' id="upload-file-foto"></span>
            </div>
          </div>
          

              <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                  <button type="submit" class="btn btn-primary btn-block" name="simpan">Submit</button>
                </div>
                <div class="col-sm-4"></div>
              </div>

    </form>
		<?php
			require ("../koneksi.php");
			if (session_status() == PHP_SESSION_NONE) {
				session_start();
			}
			if(isset($_SESSION['operator'])){
				$username = $_SESSION['operator'];
			}
			if(isset($_POST['simpan'])){
				//jika tombol simpan ditekan akan menjalankan code bagian ini
				//variabel dengan nilai apa yang telah di inputkan oleh operator
			$id_lap = $_POST['id_lap'];
			$jenis_rumput = $_POST['jenis_rumput'];
			$harga = $_POST['harga'];
			$no_lap = $_POST['no_lap'];
			//simpan foto
			$filename = $_FILES['foto']['name'];
			$lokasi = $_FILES['foto']['tmp_name'];
			copy($lokasi, "assets/foto_lap/".$filename);
			//menyimpan data ke dalam database
			$sql= "insert into lapangan values ('$id_lap','$jenis_rumput', '$filename', '$harga', '$no_lap', '$username')";
			$query = mysqli_query($koneksi,$sql);
			echo "<script language='javascript'>
                    window.location='opt_profil.php';
                    </script>";
			}
			
			?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      </div>
    </div>

  </div>
</div>
