<?php 

	if (@$_SESSION['Admin']) {

?>

<div class="panel panel-primary">
	<div class="panel-heading">Tambah Data Laptop</div>
	<div class="panel-body">
		<form role="form" method="post">
		    <div class="form-group">
		        <label>No Laptop</label>
		        <input class="form-control" name="no_laptop" placeholder="example : NB-01" autocomplete="off" />
		    </div>
		    <div class="form-group">
                <label>Keadaan Baterai</label>
                <select class="form-control" name="baterai">
                    <option value="Normal">Normal</option>
                    <option value="Rusak">Rusak</option>
                </select>
            </div>
            <div class="form-group">
                <label>Jaringan yang bisa digunakan</label>
                <select class="form-control" name="jaringan">
                	<option value="Tidak Bisa">Tidak Ada Jaringan yang Bisa Digunakan</option>
                    <option value="WiFi dan LAN">WiFi dan LAN</option>
                    <option value="LAN">LAN</option>
                    <option value="WiFi">WiFi</option>
                </select>
            </div>
            <div class="form-group">
            	<label>Status</label>
            	<input class="form-control" type="text" name="status" value="Tidak Dipinjam" readonly>
            </div>
		    <div class="form-group">
		        <label>Keterangan</label>
		        <textarea class="form-control" name="keterangan" rows="5"></textarea>
		    </div>
		    <input type="submit" name="simpan" value="Simpan" class="btn btn-info col-md-12">
		</form>
	</div>
</div>

<?php 

if (isset($_POST['simpan'])) {

	$no_laptop = $_POST['no_laptop'];
	$baterai = $_POST['baterai'];
	$jaringan = $_POST['jaringan'];
	$status = $_POST['status'];
 	$keterangan = $_POST['keterangan'];
	$simpan = $_POST['simpan'];
		
	$sql = mysqli_query($koneksi, "INSERT INTO tb_laptop (no_laptop, baterai, jaringan, status, keterangan) VALUES ('$no_laptop', '$baterai', '$jaringan', '$status', '$keterangan' )");
	
		if ($sql) {
			?>

				<script type="text/javascript">
					alert("Data Berhasil Disimpan");
					window.location.href="?page=laptop";
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