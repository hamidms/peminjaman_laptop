<?php 

    $koneksi = mysqli_connect("localhost","root","","db_peminjaman");
	$filename = "peminjaman_laptop_excel-(".date('d-m-y').").xls";
	header("content-disposition: attachment; filename='$filename'");
	header("content-type: application/vnd.ms-excel");

?>

<h2>Laporan Data Peminjaman Laptop</h2>
<table border="1">
	<tr>
        <th>#</th>
        <th>Nomor Laptop</th>
        <th>Nama Peminjam</th>
        <th>Bagian</th>
        <th>Lokasi</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Tanggal Aktual Kembali</th>
        <th>Tambahan</th>
        <th>Keperluan</th>
    </tr>

    <?php 
        $no = 1;
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_peminjaman");
        while ($data = mysqli_fetch_assoc($sql)) {
    ?>

    <tr>
        <td><?= $no++; ?></td>
        <td><?= $data['no_laptop']; ?></td>
        <td><?= $data['nama']; ?></td>
        <td><?= $data['bagian']; ?></td>
        <td><?= $data['posisi']; ?></td>
        <td><?= $data['tgl_pinjam']; ?></td>
        <td><?= $data['tgl_kembali']; ?></td>
        <td><?= $data['tgl_aktual_kembali']; ?></td>
        <td><?= $data['tambahan']; ?></td>
        <td><?= $data['keperluan']; ?></td>
    </tr>

    <?php } ?>
</table>