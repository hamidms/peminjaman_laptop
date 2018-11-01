<?php 

    if (@$_SESSION['Admin'] || @$_SESSION['User']) {

?>

<div class="row">
    <div class="col-md-12">
        <h1>Peminjaman <small>Rekap</small></h1>
        <ol class="breadcrumb">
            <li><a href="?page=daftar_peminjaman" style="text-decoration-color: #fff"> Daftar Peminjaman</a></li>
            <li class="active"> Rekap Peminjaman</li>
            <li><a href="?page=sortir" style="text-decoration-color: #fff"> Sortir Pencarian</a></li>
        </ol>
        <div class="panel panel-primary">
            <div class="panel-heading">Rekap Peminjaman</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Laptop</th>
                                <th>Peminjam</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Aktual Kembali</th>
                                <th>Tambahan</th>
                                <th>Keperluan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $no = 1;

                                $sql = mysqli_query($koneksi, "SELECT * FROM tb_peminjaman ORDER BY tgl_pinjam DESC");
                                while ($data = mysqli_fetch_assoc($sql)) {
                                
                            ?>

                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['no_laptop']; ?></td>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['tgl_pinjam']; ?></td>
                                <td><?= $data['tgl_kembali']; ?></td>
                                <td>
                                    <?php 

                                    $tgl_aktual_kembali = $data['tgl_aktual_kembali'];

                                    if ($tgl_aktual_kembali=='0000-00-00') {
                                        echo "";
                                    } else {
                                        echo $data['tgl_aktual_kembali'];
                                    }

                                    ?>
                                </td>
                                <td><?= $data['tambahan']; ?></td>
                                <td><?= $data['keperluan']; ?></td>
                                <td><?= $data['status']; ?></td>
                            </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <a href="?page=peminjaman&aksi=tambah" class="btn btn-info"><i class="fa fa-edit "></i> Tambah</a>
        <a href="./laporan/laporan_peminjaman_excel.php" class="btn btn-default"><i class="fa fa-print "></i> ExportToExcel</a>
    </div>
</div>

<?php } else { ?>

    <script type="text/javascript">
        alert("Anda harus Login Terlebih Dahulu");
        window.location.href="index.php";
    </script>

<?php } ?>