<?php 

    $koneksi = mysqli_connect("localhost","root","","db_peminjaman");
	$filename = "laptop_excel-(".date('d-m-y').").xls";
	header("content-disposition: attachment; filename='$filename'");
	header("content-type: application/vdn.ms-excel");

?>

<h2>Laporan Data Laptop</h2>
<table border="1">
	<tr>
		<th>#</th>
		<th>No Laptop</th>
		<th>Baterai</th>
		<th>Jaringan</th>
		<th>Keterangan</th>
    </tr>

    <?php 
        $no = 1;
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_laptop");
        while ($data = mysqli_fetch_assoc($sql)) {
    ?>

    <tr>
        <td><?= $no++; ?></td>
        <td><?= $data['no_laptop']; ?></td>
        <td><?= $data['baterai']; ?></td>
        <td><?= $data['jaringan']; ?></td>
        <td><?= $data['keterangan']; ?></td>
    </tr>

    <?php } ?>
</table>