<?php 

    $koneksi = mysqli_connect("localhost","root","","db_peminjaman");
	$filename = "peminjaman_laptop_excel-(".date('d-m-y').").xls";
	header("content-disposition: attachment; filename='$filename'");
	header("content-type: application/vdn.ms-excel");

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
        <th>Keperluan</th>
    </tr>

    <?php 

    $no = 1;


    if(isset($_POST['tanggal_1'], $_POST['tanggal_2'], $_POST['laptop_pinjaman'])){

        $tanggal = $_POST['tanggal_1'];
        $tanggal2 = $_POST['tanggal_2'];
        $laptop = $_POST['laptop_pinjaman'];

        if ($laptop == 'semua') {
            if (isset($_POST['opsi'])) {
            $opsi = $_POST['opsi'];

                if ($opsi == 'tanggal_pinjam') {
                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_peminjaman WHERE (tgl_pinjam BETWEEN '$tanggal' AND '$tanggal2') ORDER BY id DESC");
                } elseif ($opsi == 'tanggal_kembali') {
                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_peminjaman WHERE (tgl_kembali BETWEEN '$tanggal' AND '$tanggal2') ORDER BY id DESC");
                }
            }
        } else {
            if (isset($_POST['opsi'])) {
            $opsi = $_POST['opsi'];

                if ($opsi == 'tanggal_pinjam') {
                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_peminjaman WHERE (no_laptop = '$laptop') AND (tgl_pinjam BETWEEN '$tanggal' AND '$tanggal2') ORDER BY id DESC");
                } elseif ($opsi == 'tanggal_kembali') {
                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_peminjaman WHERE (no_laptop = '$laptop') AND  (tgl_kembali BETWEEN '$tanggal' AND '$tanggal2') ORDER BY id DESC");
                }
            }
        }
    } else {
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_peminjaman ORDER BY id DESC");
    }
    
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
        <td><?= $data['keperluan']; ?></td>
    </tr>

    <?php } ?>
</table>