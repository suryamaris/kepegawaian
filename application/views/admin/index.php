<!-- Begin Page Content -->
<div class="container-fluid">


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
    </table>
    <?= $this->pagination->create_links(); ?>
    <div id="down">
        <a href="<?php echo base_url(''); ?>"><button class="btn btn-primary">Tambah</button></a></td>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->