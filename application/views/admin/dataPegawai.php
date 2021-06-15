<!-- Begin Page Content -->
<div class="container-fluid content-row">
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="card mb-3" style="max-width: 540px; height:520px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" style="max-width: 200px;">
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
                                    <td>Bagian</td>
                                    <td>:</td>
                                    <td>
                                        <p class="card-text"><?= $user['bagian']; ?></p>
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
        <div class="col-sm-12 col-lg-6">
            <div class="card mb-3" style="max-width: 540px; height : 520px; padding: 10px;">
                <div class="row">

                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Tindakan</h5>

                            <form action="<?= base_url('admin/tindakan/' . $user['id']) ?>" method="POST">
                                <table class="table">
                                    <?php if (empty($tindakan)) : ?>
                                        <td>
                                            <input type="submit" name="tindakan" value="Peringatan" class="btn btn-warning" style="margin-left: 1em; min-width: 180px; min-height: 100px;">
                                        </td>
                                        <td>
                                            <input type="submit" name="tindakan" value="Mutasi" class="btn btn-primary" style=" min-width: 180px; min-height: 100px;">
                                        </td>
                                    <?php endif; ?>
                                </table>
                            </form>

                            <!-- Buat surat Peringatan -->
                            <?php if ($tindakan == "Peringatan") { ?>
                                <table>
                                    <form action="<?= base_url('admin/tindakan/' . $user['id']) ?>" method="POST" target="_blank">
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td><input type="text" name="nama1" value="<?= $user['name']; ?>" readonly></td>
                                        </tr>
                                        <tr>
                                            <td>Jabatan</td>
                                            <td>:</td>
                                            <td><input type="text" name="jabatan1" value="<?= $user['jabatan']; ?>" readonly></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 100px;">NO. Surat</td>
                                            <td>:</td>
                                            <td><input type="text" name="no"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 100px;">Perihal</td>
                                            <td>:</td>
                                            <td><input type="text" name="perihal"></td>
                                        </tr>
                                        <tr>
                                            <td style="width:200px;">Isi Surat</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><textarea name="isi" style="width: 500px; height:250px" style="text-align: left;" wrap="hard"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td><input type="submit" name="submit" value="Kirim" class="btn btn-primary" style="min-width: 180px;" target="_blank"></td>
                                            <td></td>
                                    </form>
                                    <td> <a href="<?= base_url('admin/dataPegawai/' . $user['id']) ?>"><button class="btn btn-danger" style="min-width: 180px;">Batal</button></a>
                                    </td>
                                    </tr>
                                </table>
                            <?php }  ?>

                            <!-- Buat Surat Mutasi -->
                            <?php if ($tindakan == "Mutasi" || $tindakan == "Promosi" || $tindakan == "Demosi") { ?>
                                <table>
                                    <form action="<?= base_url('admin/tindakan/' . $user['id']) ?>" method="POST" target="_blank">
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td><input type="text" name="nama1" value="<?= $user['name']; ?>" style="width: 120px;" readonly></td>
                                            <td>Bagian</td>
                                            <td>:</td>
                                            <td><input type="text" name="bagian1" value="<?= $user['bagian'];  ?>" style="width: 150px;" readonly></td>
                                        </tr>
                                        <tr>
                                            <td>Jabatan</td>
                                            <td>:</td>
                                            <td><input type="text" name="jabatan1" value="<?= $user['jabatan']; ?>" style="width: 120px;" readonly></td>
                                            <td>Bagian Baru</td>
                                            <td>:</td>
                                            <td><input type="text" name="bagian2" style="width: 150px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 100px;">Jabatan Baru</td>
                                            <td>:</td>
                                            <td><input type="text" name="jabatan2" style="width: 120px;"></td>
                                            <td style="width: 100px;">NO. Surat</td>
                                            <td>:</td>
                                            <td><input type="text" name="no" style="width: 150px;"></td>

                                        </tr>
                                        <tr>
                                            <td style="width: 100px;">Perihal</td>
                                            <td>:</td>
                                            <td><input type="text" name="perihal" style="width: 120px;"></td>
                                            <td>Tujuan Surat</td>
                                            <td>:</td>
                                            <td><input type="text" name="tujuan" style="width: 150px;"></td>
                                        <tr>
                                            <td style="width:200px;" colspan="2">Isi Surat</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"><textarea name="isi" style="width: 500px; height:200px" style="text-align: left;" wrap="hard"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><input type="submit" name="submit" value="Submit" class="btn btn-primary" style="min-width: 180px;" target="_blank"></td>
                                            <td></td>
                                    </form>
                                    <td colspan="3"> <a href="<?= base_url('admin/dataPegawai/' . $user['id']) ?>"><button class="btn btn-danger" style="min-width: 180px;">Batal</button></a>
                                    </td>
                                    </tr>
                                </table>
                            <?php }  ?>
                        </div>
                        <?php if (empty($tindakan)) : ?>
                            <div class="card-body">
                                <h5 class="card-title">Perubahan Jabatan</h5> <?php endif; ?>
                            <form action="<?= base_url('admin/tindakan/' . $user['id']) ?>" method="POST">
                                <table class="table">
                                    <?php if (empty($tindakan)) : ?>
                                        <tr>
                                            <td>
                                                <input type="submit" name="tindakan" value="Promosi" class="btn btn-success" style="margin-left: 1em; min-width: 180px; min-height: 100px;">
                                            </td>
                                            <td>
                                                <input type="submit" name="tindakan" value="Demosi" class="btn btn-secondary" style="min-width: 180px; min-height: 100px;">
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </table>
                            </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>