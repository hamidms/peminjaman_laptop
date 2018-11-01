<?php 

    if (@$_SESSION['Admin'] || @$_SESSION['User']) {

?>
<h1>Peminjaman <small>Sortir</small></h1>
<ol class="breadcrumb">
    <li><a href="?page=daftar_peminjaman" style="text-decoration-color: #fff"> Daftar Peminjaman</a></li>
    <li><a href="?page=peminjaman" style="text-decoration-color: #fff"> Rekap Peminjaman</a></li>
    <li class="active"> Sortir Pencarian</li>
</ol>
<div class="panel-heading">
    <div class="panel">
        <div class="panel-body">
            <form method="post" role="form" action="index.php?page=sortir" autocomplete="off" >
                <div class="form-group col-md-3">
                    <label>Laptop</label>
                    <select name="laptop_pinjaman" id="laptop" class="form-control">
                        <option value="semua">Semua</option>
                        <?php

                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_laptop");
                            while ($data = mysqli_fetch_assoc($sql)) {
                            $laptop_list = $data['no_laptop'];

                        ?>

                        <option value="<?= $laptop_list; ?>">
                            <?= $laptop_list; ?>
                        </option>
                            
                       <?php }   ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Opsi Pencarian</label>
                    <select name="opsi" class="form-control" >
                        <option value="tanggal_pinjam" id="tanggal_pinjam">Tanggal Pinjam</option>
                        <option value="tanggal_kembali" id="tanggal_kembali">Tanggal Kembali</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Tanggal Awal</label>
                    <input class="form-control" type="date" name="tanggal_1" id="tanggal_1" value="<?php echo date('Y-m-d'); ?>" />
                </div>
                <div class="form-group col-md-3">
                    <label>Tanggal Akhir</label>
                    <input class="form-control" type="date" name="tanggal_2" id="tanggal_2" value="<?php echo date('Y-m-d') ?>" />
                </div>
                <div>
                    <input class="btn btn-info form-control" style="letter-spacing: 5px; font-weight: bold; font-variant: small-caps; font-size: 15px;" type="submit" value="Filter Table" />
                </div>
            </form>
        </div>
    </div>
</div>
<br>
<div class="panel-body" >
    <div class="panel-heading">
        <h3>Daftar Peminjaman</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table" id="dataTables-example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Laptop</th>
                        <th>Peminjam</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Keperluan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 

                    $no = 1;


                    if(isset($_POST['tanggal_1'], ($_POST['tanggal_2']), ($_POST['laptop_pinjaman']))){

                        $tanggal = $_POST['tanggal_1'];
                        $tanggal2 = $_POST['tanggal_2'];
                        $laptop = $_POST['laptop_pinjaman'];

                        if ($laptop == 'semua') {
                            if (isset($_POST['opsi'])) {
                            $opsi = $_POST['opsi'];

                                if ($opsi = 'tanggal_pinjam') {
                                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_peminjaman WHERE (tgl_pinjam BETWEEN '$tanggal' AND '$tanggal2') ORDER BY id DESC");
                                } elseif ($opsi = 'tanggal_kembali') {
                                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_peminjaman WHERE (tgl_kembali BETWEEN '$tanggal' AND '$tanggal2') ORDER BY id DESC");
                                }
                            }
                        } else {
                            if (isset($_POST['opsi'])) {
                            $opsi = $_POST['opsi'];

                                if ($opsi = 'tanggal_pinjam') {
                                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_peminjaman WHERE (no_laptop = '$laptop') AND (tgl_pinjam BETWEEN '$tanggal' AND '$tanggal2') ORDER BY id DESC");
                                } elseif ($opsi = 'tanggal_kembali') {
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
                        <td><?= $data['tgl_pinjam']; ?></td>
                        <td><?= $data['tgl_kembali']; ?></td>
                        <td><?= $data['keperluan']; ?></td>

                    <?php } ?>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
        <a href="./laporan/laporan_peminjaman_excel_sortir.php" class="btn btn-default"><i class="fa fa-print "></i> ExportToExcel</a>
    </div>
</div>

<?php } else { ?>

    <script type="text/javascript">
        alert("Anda harus Login Terlebih Dahulu");
        window.location.href="index.php";
    </script>

<?php } ?>