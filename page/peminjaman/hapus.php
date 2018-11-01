<?php 

	if (@$_SESSION['Admin']) {

	$id = $_GET['id'];
	$no_laptop = $_GET['no_laptop'];

	$sql = mysqli_query($koneksi, "DELETE from tb_peminjaman where id='$id'");
	$sql2 = mysqli_query($koneksi, "UPDATE tb_laptop SET status='Tidak Dipinjam' WHERE no_laptop='$no_laptop'");

	} else {
?>

	<script type="text/javascript">
		alert("Anda harus Login Sebagai Administrator");
		window.location.href="?page=peminjaman";
	</script>

<?php } ?>