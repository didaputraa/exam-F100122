
<?php include "adm_adm_tambah.php"; ?>
 <?php 
if(isset($_GET['admin'])){
if($_GET['admin']=="delete"){
  $data = mysqli_query($koneksi, "select * from admin where id = '$_GET[id]'");
  $isi = mysqli_fetch_array($data);
  
  $nama = $isi['foto'];
  unlink('assets/foto/'.$nama);
  mysqli_query($koneksi,"delete from admin where id = '$_GET[id]'") or die (mysqli_error());
  echo "<script language='javascript'>
                    window.location='index.php?url=admin#';
                    </script>";
}}?>
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Anda yakin akan menghapus data Admin ini ?</h4>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Admin    <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#tambahadm"><i class="fa fa-plus"></i> Tambah </a></h2>
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
                     <!-- Tabel Data Admin -->
                      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Foto</th>
                          <th>ID</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Password</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                       <?php 
						require "../koneksi.php"; //menyisipkan file koneksi agar konek ke database
						$query = mysqli_query($koneksi,"select * from admin"); // memilih data di tabel admin pada database untuk ditampilkan dalam tabel
						while($sel = mysqli_fetch_array($query)){ // membuat data menjadi array
						?>
                        <tr>
                         <!-- menampilkan data yang dipilih di database dalam bentuk tabel-->
                          <td><img align="middle" src="images/<?php echo $sel['foto']; ?>" style="width:50px; height:50px;"/></td>
                          <td><?php echo $sel['id']; ?></td>
                          <td><?php echo $sel['nama']; ?></td>
                          <td><?php echo $sel['email']; ?></td>
                          <td><?php echo $sel['password']; ?></td>
                          <td class="center">
                          <a href="#" onClick="confirm_modal('adm_delete.php?&id=<?= $sel['id']; ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#modal_delete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>
        function hapusElemen(idf) {
        $(idf).remove();
    }