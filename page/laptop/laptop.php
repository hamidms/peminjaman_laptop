<?php 

    if (@$_SESSION['Admin'] || @$_SESSION['User']) {
?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Daftar Laptop Pinjaman</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No Laptop</th>
                                <th>Baterai</th>
                                <th>Jaringan</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Peminjam</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                <td><?= $data['status']; ?></td>
                                <td>
                                    <?php

                                    $sql2 = mysqli_query($koneksi, "SELECT * FROM tb_peminjaman WHERE (no_laptop = '".$data['no_laptop']."') AND (status = 'Dipinjam') ORDER BY no_laptop");
                                    $data2 = mysqli_fetch_assoc($sql2);
                                    echo $data2['nama'];
                                    ?>
                                </td>
                                <td>
                                    <a href="?page=laptop&aksi=ubah&id=<?= $data['id']; ?>" class="btn btn-info">Ubah</a>
                                    <a onclick="return confirm('Anda yakin akan menghapus data ini?')" href="?page=laptop&aksi=hapus&id=<?= $data['id']; ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <a href="?page=laptop&aksi=tambah" class="btn btn-info"><i class="fa fa-edit "></i> Tambah</a>
        <a href="./laporan/laporan_laptop_excel.php" class="btn btn-default" target="blank"><i class="fa fa-print "></i> ExportToExcel</a>
    </div>
</div>

<?php } else { ?>

    <script type="text/javascript">
        alert("Anda harus Login Terlebih Dahulu");
        window.location.href="index.php";
    </script>

<?php } ?>