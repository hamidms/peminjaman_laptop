<?php 

	if (@$_SESSION['Admin']) {

	$id = $_GET['id'];
	mysqli_query($koneksi, "DELETE FROM tb_laptop WHERE id='$id'");

} else {
?>
	<script type="text/javascript">
		alert("Anda harus Login Sebagai Administrator");
		window.location.href="?page=laptop";
	</script>
<?php } ?>