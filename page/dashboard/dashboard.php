<meta http-equiv="refresh" content="5"/>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Daftar Laptop Pinjaman
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No Laptop</th>
                                <th>Status</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Rencana Kembali</th>
                                <th>Nama Peminjam</th>
                                <th>Keperluan</th>
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
                                <td><?= $data['status']; ?></td>
                                <td>
                                    <?php 

                                        $sql2 = mysqli_query($koneksi, "SELECT * FROM tb_peminjaman WHERE (no_laptop = '".$data['no_laptop']."') AND (status = 'Dipinjam') ");
                                        $data = mysqli_fetch_assoc($sql2);
                                        echo $data['tgl_pinjam'];
                                    ?>
                                </td>
                                <td><?= $data['tgl_kembali']; ?></td>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['keperluan']; ?></td>
                            </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>