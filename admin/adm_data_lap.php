<div class="right_col" role="main">
  <?php 
  include ("adm_produk_tambah.php");
  ?>
  <?php 
if(isset($_GET['lap'])){
if($_GET['lap']=="delete"){
  $data = mysqli_query($koneksi, "select * from lapangan where id_lap = '$_GET[id_lap]'");
  $isi = mysqli_fetch_array($data);
  
  $nama = $isi['foto'];
  unlink('assets/foto/'.$nama);
  mysqli_query($koneksi,"delete from lapangan where id_lap = '$_GET[id_lap]'") or die (mysqli_error());
  echo "<script language='javascript'>
                    window.location='index.php?url=lap';
                    </script>";
}}?>
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h2>Data Produk</h2>&nbsp;<a class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span>  Tambah</a>
                        </div>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  		<!-- Isi disini -->
                      <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_content">
                   <!-- Tabel Lapangan -->
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                        <th>Foto</th>
                         <th>ID Produk</th>
                        <th>Jenis Produk</th>
                        
                        <th>Harga</th>
                        <th>No Produk</th>
                        <th>Operator</th>
                        <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                       <?php 
		$sql_sel = "select * from lapangan"; // Variabel berisi perintah untuk memilih data di tabel lapangan di database
		$query_sel = mysqli_query($koneksi,$sql_sel); // merubah menjadi bahasa sql untuk memilih data
		while($sql_res = mysqli_fetch_array($query_sel)){ //membuat data yang telah di pilih menjadi bentuk array
											
	?>
          <tr>
          <!-- menampilkan data dari tabel lapangan pada database -->
          	<td><img src="../operator/assets/foto_lap/<?php echo $sql_res['foto']; ?>" width="50px" height="50px"  /></td>
             <td><?php echo $sql_res['id_lap']; ?></td>
             <td><?php echo $sql_res['jenis_rumput']; ?></td>
             
             <td><?php echo $sql_res['harga']; ?></td>
             <td><?php echo $sql_res['no_lap']; ?></td>
             <td><?php echo $sql_res['username']; ?></td>
			 <td style="text-align:center">
				<a class="btn btn-primary" href="?url=lap-edit&id=<?= $sql_res['id_lap'] ?>">Edit</a>
				<a class="btn btn-danger" href="javascript:" onClick="confirm_modal('<?= $sql_res['id_lap']; ?>')">hapus</a>
			 </td>
             
             
                 
             </tr>
    <?php }?>
                      </tbody>
                    </table>
                     </div>
                </div>
              </div>
            </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Anda yakin akan menghapus data ini ?</h4>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<script>
function confirm_modal(id) {
  $('#modal_delete').modal('show', {backdrop: 'static'});
  document.getElementById('delete_link').setAttribute('href' , "adm_data_lap_remove.php?id="+id);
}
</script>