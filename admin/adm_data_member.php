<div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Member</h2>
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
                       <!-- Tabel Data Member -->
                      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Foto</th>
                          <th>Username</th>
                          <th>Nama</th>
                          <th>Tanggal Lahir</th>
                          <th>Jenis Kelamin</th>
                          <th>Email</th>
                          <th>Password</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                       <?php 
						require "../koneksi.php";
						$query = mysqli_query($koneksi,"select * from member");// Variabel berisi perintah untuk memilih data di tabel lapangan di database
						while($sel = mysqli_fetch_array($query)){//membuat data yang telah di pilih menjadi bentuk array
						?>
                        <tr>
                         <!-- menampilkan data dari tabel member pada database -->
                          <td><img align="middle" src="../member/assets/foto_member/<?php echo $sel['foto']; ?>" style="width:50px;height:50px;object-fit:cover"/></td>
                          <td><?php echo $sel['username_member']; ?></td>
                          <td><?php echo $sel['nama']; ?></td>
                          <td><?php echo $sel['tgl_lahir']; ?></td>
                          <td><?php echo $sel['jk']; ?></td>
                          <td><?php echo $sel['email']; ?></td>
                          <td><?php echo $sel['password']; ?></td>
                          <td>
							<a href="javascript:" onClick="confirm_modal('<?= $sel['username_member'] ?>')" class="btn btn-danger btn-xs">
								<i class="fa fa-trash"></i> Delete
							</a>
						  </td>
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
  document.getElementById('delete_link').setAttribute('href' , "adm_data_member_remove.php?id="+id);
}
</script>