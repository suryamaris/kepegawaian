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
                    <form method="post" action="<?= base_url('admin/updatePegawai'); ?>">
                        <table class="table">
                            <tr>
                                <td>ID</td>
                                <td>:</td>
                                <td>
                                    <p class="card-text"><input type="text" name="id" value="<?= $user['id']; ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>
                                    <p class="card-text"><input type="text" name="name" value="<?= $user['name']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td>:</td>
                                <td>
                                    <p class="card-text"><input type="text" name="jabatan" value="<?= $user['jabatan']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>:</td>
                                <td>
                                    <p class="card-text"><input type="text" name="agama" value="<?= $user['agama']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>
                                    <p class="card-text"><input type="text" name="alamat" value="<?= $user['alamat']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>
                                    <p class="card-text"><input type="text" name="email" value="<?= $user['email']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>No HP</td>
                                <td>:</td>
                                <td>
                                    <p class="card-text"><input type="text" name="hp" value="<?= $user['hp']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->