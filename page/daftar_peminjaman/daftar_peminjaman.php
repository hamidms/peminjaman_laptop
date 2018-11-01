<?php 

    if (@$_SESSION['Admin'] || @$_SESSION['User']) {

?>

<div class="row">
    <div class="col-md-12">
        <h1>Peminjaman <small>Daftar</small></h1>
        <ol class="breadcrumb">
            <li class="active">Daftar Peminjaman</a></li>
            <li><a href="?page=peminjaman" class="noactive" style="text-decoration-color: #fff"> Rekap Peminjaman</a></li>
            <li><a href="?page=sortir" style="text-decoration-color: #fff"> Sortir Pencarian</a></li>
        </ol>
        <div class="panel panel-primary">
            <div class="panel-heading">
                Daftar Peminjaman
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover table-condensed" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Laptop</th>
                                <th>Peminjam</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Tambahan</th>
                                <th>Terlambat</th>
                                <th>Keperluan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $no = 1;
                                $sql = mysqli_query($koneksi, "SELECT * FROM tb_peminjaman WHERE status='Dipinjam' ORDER BY tgl_pinjam DESC");
                                while ($data = mysqli_fetch_assoc($sql)) {
                                
                            ?>

                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['no_laptop']; ?></td>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['tgl_pinjam']; ?></td>
                                <td><?= $data['tgl_kembali']; ?></td>
                                <td><?= $data['tambahan']; ?></td>
                                <td>
                                	<?php

                                    	$tgl_dateline = $data['tgl_kembali'];
                                    	$tgl_kembali = date('Y-m-d');
                                    	$lambat = terlambat($tgl_dateline, $tgl_kembali);

                                    	if ($lambat>0) {
                                    	 	echo "<font color='red'>$lambat hari</font>";
                                    	} else {
                                    	 	echo $lambat ." Hari";
                                    	}

                                	?>
                                </td>
                                <td><?= $data['keperluan']; ?></td>
                                <td>
                                    <a href="?page=daftar_peminjaman&aksi=ubah&id=<?php echo $data['id']; ?>&no_laptop=<?php echo $data['no_laptop']; ?>" class="btn btn-info">Ubah</a>
                                    <a onclick="return confirm('Konfirmasi jika laptop telah kembali')" href="?page=daftar_peminjaman&aksi=kembali&id=<?php echo $data['id']; ?>&no_laptop=<?php echo $data['no_laptop']; ?>" class="btn btn-warning">Kembali</a>
                                    <a onclick="return confirm('Anda yakin akan membatalkan peminjaman?')" href="?page=daftar_peminjaman&aksi=batal&id=<?php echo $data['id']; ?>&no_laptop=<?php echo $data['no_laptop']; ?>" class="btn btn-danger">Batal</a>
                                    <a href="?page=daftar_peminjaman&aksi=lihat&id=<?php echo $data['id']; ?>" class="btn btn-default">Lihat</a>
                                </td>
                            </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <a href="?page=peminjaman&aksi=tambah" class="btn btn-info"><i class="fa fa-edit "></i> Tambah</a>
        <a href="./laporan/laporan_peminjaman_excel2.php" class="btn btn-default"><i class="fa fa-print "></i> ExportToExcel</a>
    </div>
</div>

<?php } else { ?>

    <script type="text/javascript">
        alert("Anda harus Login Terlebih Dahulu");
        window.location.href="index.php";
    </script>

<?php } ?>