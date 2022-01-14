<div class="right_col" id="content_main_admin" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12 bg-white">
			<h3>Member confirmation</h3>
			
			<table class="table">
				<tr>
					<th>#</th>
					<th>Username</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Action</th>
				</tr>
		<?php
		$i=0;
		$sql = mysqli_query($koneksi, "SELECT  * FROM member where ver_code <>''")or die(mysqli_error($koneksi));
		
			while($row = mysqli_fetch_object($sql)) {
				echo "<tr>
						<td>".(++$i)."</td>
						<td>{$row->username_member}</td>
						<td>{$row->nama}</td>
						<td>{$row->email}</td>
						<td>
							<a href='javascript:' onClick=\"prepare('{$row->username_member}')\" class='btn btn-success btn-sm'>Confirm</a>
						</td>
					</tr>";
			}
		?>
			</table>
		</div>
	</div>
</div>
<div id="confirm-modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Confirm</h4>
			</div>
			<div class="modal-body">
				<p>Verifikasi data ini ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button id="verifikasi" class="btn btn-primary">Verifikasi</button>
			</div>
		</div>
	</div>
</div>
<script>
function prepare(id) {
	
	$('#confirm-modal').modal('show');
	$('#verifikasi').data('item', id);
}
$('#verifikasi').on('click', function(evt){
	
	$.ajax({
		url: './adm_data_member_confirm_action.php',
		data:{
			id: $('#verifikasi').data('item')
		}
	}).done(function(){
		
		$('#confirm-modal').modal('hide');
		$('#content_main_admin').append(`
		<div style="position:fixed;left:0;top:0;width:100%;z-index:1111;">
			<div class="alert alert-success">
			  <strong>Success!</strong> Verifikasi berhasil
			  <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			</div>
		</div>`);
		
		setTimeout(function(){
			window.location = window.location.href;
		},2000);
		
	}).fail(function(){
		
		$('#confirm-modal').modal('hide');
		$('#content_main_admin').append(`
		<div style="position:fixed;left:0;top:0;width:100%;z-index:1111;">
			<div class="alert alert-danger">
			  <strong>Error!</strong> Terjadi kesalahan saat verifikasi
			  <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			</div>
		</div>`);
	});
});
</script>