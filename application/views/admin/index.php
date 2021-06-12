<!-- Begin Page Content -->
<div class="container-fluid">
    <h3 class="mt-3">Data Pegawai</h3>

    <div class="row">
        <div class="col-md-6">
            <form action="<?= base_url('admin') ?>" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari data pegawai" name="keyword" autocomplete="off" autofocus>
                    <input class="btn btn-primary" type="submit" id="button-addon2" name="submit">
                </div>
            </form>
            <h5>Result : <?= $total_rows; ?> </h5>
        </div>
    </div>

    <table class="table">
        <form>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Cuti</th>
                <th scope="col">Izin</th>
            </tr>
            <?php foreach ($data as $pegawai) {
                $id = $pegawai['id'] ?>

                <tr>
                    <td scope="row"><?php echo $pegawai['id']; ?></td>
                    <td scope="row"><?php echo $pegawai['name']; ?></td>
                    <td scope="row"><?php echo $pegawai['jabatan']; ?></td>
                    <td scope="row"><?php echo $pegawai['cuti']; ?></td>
                    <td scope="row"><?php echo $pegawai['izin']; ?></td>
                    <td scope="row"><a href="<?= base_url('admin/dataPegawai') ?>/<?= $pegawai['id']; ?>" style="color: #ffffff"><button class="btn btn-info">Edit </a></button></td>
                </tr>
            <?php } ?>
        </form>
        <?php if (empty($pegawai)) : ?>
            <tr>
                <td colspan="4">
                    <div class="alert alert-danger" role="alert">
                        Data tidak ditemukan !!
                    </div>
                </td>
            </tr>
        <?php endif; ?>
    </table>
    <?= $this->pagination->create_links(); ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->