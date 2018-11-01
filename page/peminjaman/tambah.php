<?php 

	if (isset($_SESSION['Admin'])) {

?>

<div class="panel panel-primary">
	<div class="panel-heading">
	    Form Penambahan Data Peminjaman
	</div>
	<div class="panel-body">
		<form role="form" method="post" autocomplete="off" >
          	<div class="form-group">
            	<label for="varchar">No Laptop</label>  
            	<input type="text" class="form-control pencarian"  placeholder="Nomor Laptop" id="textbox" name="no_laptop">          
         	</div>
	        <div class="modal fade" id="myModal" role="dialog">
	            <div class="modal-dialog">
	               	<div class="modal-content">
	                	<div class="modal-header">
	                    	<button type="button" class="close" data-dismiss="modal">&times;</button>
	                    	<h4 class="modal-title">Data Laptop</h4>
	                  	</div>
	                  	<div class="modal-body">
	                    	<table id="example" class="table table-bordered">
	                        	<thead>
		                           	<tr>
		                               <th>#</th>
		                               <th>No Laptop</th>
		                               <th>Baterai</th>
		                               <th>Jaringan</th>
		                               <th>Keterangan</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                         	<?php 

			                            $no = 1;

			                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_laptop WHERE status='Tidak Dipinjam'");
			                            while ($data = mysqli_fetch_assoc($sql)) {
		                                
		                        	?>

		                            <tr id="data" onClick="masuk(this, '<?= $data['no_laptop']; ?>')" href="javascript:void(0)">
		                                <td><?= $no++; ?></td>
		                                <td><?= $data['no_laptop']; ?></td>
		                                <td><?= $data['baterai']; ?></td>
		                                <td><?= $data['jaringan']; ?></td>
		                                <td><?= $data['keterangan']; ?></td>
		                            </tr>

		                            <?php } ?>
		                        </tbody>
	                    	</table>
	                	</div>
	                	<div class="modal-footer">
	                    	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                	</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label>Status</label>
				<input class="form-control" type="text" name="status" value="Dipinjam" readonly/>
			</div>
		    <div class="form-group">
		        <label>Nama Peminjam</label>
		        <input class="form-control" name="nama" />
		    </div>
		    <div class="form-group">
		        <label>Bagian</label>
		        <input class="form-control" name="bagian" />
		    </div>
		    <div class="form-group">
                <label>Posisi</label>
                <select class="form-control" name="posisi">
                    <option value="dalam">Dalam Kantor</option>
                    <option value="luar">Luar Kantor</option>
                </select>
            </div>
		    <div class="form-group">
		    	<label>Tanggal Pinjam</label>
		    	<input class="form-control " type="date" name="tgl_pinjam" value="<?= date('Y-m-d'); ?>">
		    </div>
		    <div class="form-group">
		    	<label>Tanggal Kembali</label>
		    	<input class="form-control " type="date" name="tgl_kembali" value="<?= date('Y-m-d'); ?>">
		    </div>
		    <div class="form-group">
		        <label>Keperluan</label>
		        <textarea class="form-control" name="keperluan" rows="4"></textarea>
		    </div>
		    <div class="form-group">
                <label>Tambahan</label>
                <div>
                    <input type="checkbox" name="tambahan[]" value="Charger" checked /> Charger
                    <input type="checkbox" name="tambahan[]" value="Mouse" /> Mouse
                    <input type="checkbox" name="tambahan[]" value="Tas" /> Tas
                </div>
            </div>
		    <input type="submit" name="simpan" value="Simpan" class="btn btn-info col-md-12">
		</form>
	</div>
</div>

<script type="text/javascript">
	function masuk(txt, data) {
 	document.getElementById('textbox').value = data; // ini berfungsi mengisi value  yang ber id textbox
 	$("#myModal").modal('hide'); // ini berfungsi untuk menyembunyikan modal
	}
</script>

<?php 

	if (isset($_POST['simpan'])) {
	
	$no_laptop = $_POST['no_laptop'];
	$nama = $_POST['nama'];
	$status = $_POST['status'];
	$bagian = $_POST['bagian'];
	$posisi = $_POST['posisi'];
	$tgl_pinjam = $_POST['tgl_pinjam'];
	$tgl_kembali = $_POST['tgl_kembali'];
	$keperluan = $_POST['keperluan'];
	$tambahan = implode($_POST['tambahan'], ', ');
	$simpan = $_POST['simpan'];
	
}

	if ($simpan) {
		
		$sql = mysqli_query($koneksi, "INSERT INTO tb_peminjaman (no_laptop, nama, bagian, posisi, tgl_pinjam, tgl_kembali, tambahan, keperluan) VALUES ('$no_laptop', '$nama', '$bagian', '$posisi', '$tgl_pinjam', '$tgl_kembali', '$tambahan', '$keperluan' )");
		$sql2 = mysqli_query($koneksi, "UPDATE tb_laptop SET status='$status' WHERE no_laptop='$no_laptop'");

		if ($sql&&$sql2) {
			?>
				<script type="text/javascript">
					alert("Data Berhasil Disimpan");
					window.location.href="?page=daftar_peminjaman";
				</script>

			<?php
			}
		}
} else {
?>
	<script type="text/javascript">
		alert("Anda harus Login Sebagai Administrator");
		window.location.href="?page=laptop";
	</script>
<?php } ?>