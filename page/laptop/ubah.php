<?php 

	$id = $_GET['id'];

	$sql = mysqli_query($koneksi, "SELECT * FROM tb_laptop WHERE id='$id'");
	$tampil = mysqli_fetch_assoc($sql);

	$no_laptop = $tampil['no_laptop'];
	$baterai = $tampil['baterai'];
	$jaringan = $tampil['jaringan'];
	$keterangan2 = $tampil['keterangan'];

	if (@$_SESSION['Admin']) {
?>

<div class="panel panel-primary">
	<div class="panel-heading">Ubah Data Laptop</div>
	<div class="panel-body">
		<form role="form" method="post">
		    <div class="form-group">
		        <label>No Laptop</label>
		        <input class="form-control" name="no_laptop" value="<?= $no_laptop; ?>" readonly/>
		    </div>
		    <div class="form-group">
                <label>Keadaan Baterai</label>
                <select class="form-control" name="baterai">
                    <option value="Normal" <?php if ($baterai == 'Normal') {echo "selected";} ?>>Normal</option>
                    <option value="Rusak" <?php if ($baterai == 'Rusak') {echo "selected";} ?>>Rusak</option>
                </select>
            </div>
            <div class="form-group">
                <label>Jaringan yang bisa digunakan</label>
                <select class="form-control" name="jaringan">
                	<option value="Tidak Bisa" <?php if ($jaringan=='Tidak Bisa') {echo "selected";} ?>>Tidak Ada Jaringan yang Bisa Digunakan</option>
                    <option value="WiFi dan LAN" <?php if ($jaringan=='WiFi dan LAN') {echo "selected";} ?>>WiFi dan LAN</option>
                    <option value="LAN" <?php if ($jaringan=='LAN') {echo "selected";} ?>>LAN</option>
                    <option value="WiFi" <?php if ($jaringan=='WiFi') {echo "selected";} ?>>WiFi</option>
                </select>
            </div>
		    <div class="form-group">
		        <label>Keterangan</label>
		        <textarea class="form-control" name="keterangan" rows="5" ><?= ($keterangan2);?></textarea>
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
	$keterangan = $_POST['keterangan'];
	$simpan = $_POST['simpan'];

		$sql = mysqli_query($koneksi, "UPDATE tb_laptop SET no_laptop='$no_laptop', baterai='$baterai', jaringan='$jaringan', keterangan='$keterangan' WHERE id='$id'");

		if ($sql) {
			?>
				<script type="text/javascript">
					alert("Data Berhasil Diubah");
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