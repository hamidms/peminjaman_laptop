<?php 

	$id = $_GET['id'];

	$sql = mysqli_query($koneksi, "SELECT * FROM tb_peminjaman WHERE id='$id'");
	$tampil = mysqli_fetch_assoc($sql);

	$no_laptop = $tampil['no_laptop'];
	$nama = $tampil['nama'];
	$bagian = $tampil['bagian'];
	$posisi = $tampil['posisi'];
	$tgl_pinjam = $tampil['tgl_pinjam'];
	$tgl_kembali = $tampil['tgl_kembali'];
	$keperluan2 = $tampil['keperluan'];
	$checked = explode(', ', $tampil['tambahan']);
	
	if (@$_SESSION['Admin']) {
?>

<div class="panel panel-primary">
	<div class="panel-heading">
	    Form Pegubahan Data Peminjaman
	</div>
	<div class="panel-body">
		<form role="form" method="post" autocomplete="off" >
          	<div class="form-group">
            	<label>No Laptop</label>  
            	<input class="form-control" name="no_laptop" value="<?= $no_laptop; ?>" readonly/>          
         	</div>
			<div class="form-group">
				<label>Status</label>
				<input class="form-control" type="text" name="status" value="Dipinjam" readonly/>
			</div>
		    <div class="form-group">
		        <label>Nama Peminjam</label>
		        <input class="form-control" name="nama" value="<?= $nama; ?>" />
		    </div>
		    <div class="form-group">
		        <label>Bagian</label>
		        <input class="form-control" name="bagian" value="<?= $bagian; ?>" />
		    </div>
		    <div class="form-group">
                <label>Posisi</label>
                <select class="form-control" name="posisi">
                    <option value="dalam" <?php if ($posisi == 'dalam') {echo "selected";} ?>>Dalam Kantor</option>
                    <option value="luar" <?php if ($posisi == 'luar') {echo "selected";} ?>>Luar Kantor</option>
                </select>
            </div>
		    <div class="form-group">
		    	<label>Tanggal Pinjam</label>
		    	<input class="form-control " type="date" name="tgl_pinjam" value="<?= $tgl_pinjam; ?>">
		    </div>
		    <div class="form-group">
		    	<label>Tanggal Kembali</label>
		    	<input class="form-control " type="date" name="tgl_kembali" value="<?= $tgl_kembali; ?>">
		    </div>		    
		    <div class="form-group">
		        <label>Keperluan</label>
		        <textarea class="form-control" name="keperluan" rows="5"><?= ($keperluan2);?></textarea>
		    </div>
		    <div class="form-group">
                <label>Tambahan</label>
                <div readonly>
                    <input type="checkbox" name="tambahan[]" value="Charger" <?php in_array ('Charger', $checked) ? print "checked" : ""; ?>> Charger
                    <input type="checkbox" name="tambahan[]" value="Mouse" <?php in_array ('Mouse', $checked) ? print "checked" : ""; ?>> Mouse
                    <input type="checkbox" name="tambahan[]" value="Tas" <?php in_array ('Tas', $checked) ? print "checked" : ""; ?>> Tas
                </div>
            </div>
		    <input type="submit" name="simpan" value="Ubah" class="btn btn-info col-md-12">
		</form>
	</div>
</div>

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

	if ($simpan) {
		
		$sql = mysqli_query($koneksi, "UPDATE tb_peminjaman SET no_laptop='$no_laptop', nama='$nama', status='$status', bagian='$bagian', posisi='$posisi', tgl_pinjam='$tgl_pinjam', tgl_kembali='$tgl_kembali', keperluan='$keperluan', tambahan='$tambahan' WHERE id='$id'");

		if ($sql) {
			?>
				<script type="text/javascript">
					alert("Data Berhasil Diubah");
					window.location.href="?page=daftar_peminjaman";
				</script>

			<?php
			}
		}
	}
} else {

?>
	<script type="text/javascript">
		alert("Anda harus Login Sebagai Administrator");
		window.location.href="?page=daftar_peminjaman";
	</script>

<?php } ?>