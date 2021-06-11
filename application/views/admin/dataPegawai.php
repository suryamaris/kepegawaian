<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"></h1>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['name']; ?></h5>
                    <p class="card-text"><small class="text-muted">Member since <?= date('d F Y ', $user['date_created']); ?></small></p>
                    <table class="table">
                        <tr>
                            <td>Jabatan</td>
                            <td>:</td>
                            <td>
                                <p class="card-text"><?= $user['jabatan']; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>:</td>
                            <td>
                                <p class="card-text"><?= $user['agama']; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>
                                <p class="card-text"><?= $user['alamat']; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>
                                <p class="card-text"><?= $user['email']; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>No HP</td>
                            <td>:</td>
                            <td>
                                <p class="card-text"><?= $user['hp']; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href='<?= base_url('admin/editPegawai') ?>/<?= $user['id']; ?>'><button class="btn btn-info">Edit</button></a>
                            </td>
                            <td></td>
                            <td>
                                <a href=""><button class="btn btn-danger" style="margin-left: 1em">Hapus</button></a>
                                <a href='<?= base_url('admin') ?>'><button class="btn btn-info">Kembali</button></a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->