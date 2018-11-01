<?php  

	if (isset($_SESSION['Admin'])) {
	$id = $_GET['id'];
	$no_laptop = $_GET['no_laptop'];

	$sql = mysqli_query($koneksi, "UPDATE tb_peminjaman SET status='Kembali', tgl_aktual_kembali=current_date() WHERE id='$id'");
	$sql2 = mysqli_query($koneksi, "UPDATE tb_laptop SET status='Tidak Dipinjam' WHERE no_laptop='$no_laptop'");

?>
	<script type="text/javascript">
		alert("Pengembalian berhasil");
		window.location.href="?page=daftar_peminjaman";
	</script>

<?php } else { ?>

	<script type="text/javascript">
		alert("Anda harus Login Sebagai Administrator");
		window.location.href="?page=daftar_peminjaman";
	</script>
	
<?php } ?>