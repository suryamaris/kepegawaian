<!-- Begin Page Content -->
<div class="container-fluid content-row">
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="card mb-3" style="max-width: 540px; min-height : 540px;" style="padding:1px">
                <div class="row">
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
                                <?php if ($user['role_id'] == 1) { ?>
                                    <tr>
                                        <td>
                                            <a href='<?= base_url('user/edit') ?>'><button class="btn btn-info">Edit</button></a>
                                        </td>
                                        <td></td>
                                        <td>
                                            <a href=""><button class="btn btn-danger" style="margin-left: 1em">Hapus</button></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3" style="min-width: 540px; min-height : 540px; padding: 10px;">
            <div class="row">

                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Absensi</h5>
                        <form action="<?= base_url('user/absensi') ?>" method="POST">
                            <table class="table">
                                <?php if (empty($absensi['tanggal'])) {
                                    $absensi['tanggal'] = '0';
                                } ?>
                                <?php if ($absensi['tanggal'] != date('d F Y', time())) { ?>
                                    <td>
                                        <input type="submit" name="absen" value="Masuk" class="btn btn-success" style="margin-left: 1em; min-width: 180px; min-height: 100px;">
                                    </td>
                                <?php } else { ?>
                                    <td>
                                        <button class="btn btn-success" style=" width: 230px; min-height: 100px;" disabled> Anda sudah absen Masuk hari ini </button>
                                    </td>
                                <?php } ?>
                                <?php if ($absensi['tanggal']) {
                                    if ($absensi['tanggal'] == date('d F Y', time()) && empty($absensi['keluar'])) { ?>
                                        <td>
                                            <input type="submit" name="absen" value="Keluar" class="btn btn-primary" style=" min-width: 180px; min-height: 100px;">
                                        </td>
                                    <?php } else { ?>
                                        <td>
                                            <button class="btn btn-primary" style="width: 230px; min-height: 100px;" disabled> Anda sudah absen Keluar hari ini </button>
                                        </td>
                                <?php }
                                }
                                ?>
                            </table>
                        </form>
                    </div>

                    <?php if ($absensi['tanggal'] != date('d F Y', time())) { ?>
                        <div class="card-body">
                            <h5 class="card-title">Permintaan Izin / Cuti</h5>
                            <form action="<?= base_url('user/perizinan') ?>" method="POST">
                                <table class="table">
                                    <?php if (empty($perizinan)) : ?>
                                        <td>
                                            <input type="submit" name="submit" value="Izin" class="btn btn-warning" style="margin-left: 1em; min-width: 180px; min-height: 100px;">
                                        </td>
                                        <td>
                                            <input type="submit" name="submit" value="Cuti" class="btn btn-secondary" style="min-width: 180px; min-height: 100px;">
                                        </td>
                                    <?php endif; ?>

                                    <?php if ($perizinan == null) echo "";
                                    elseif ($perizinan == 'Izin') { ?>
                                        <tr>
                                            <td>
                                                Alasan Izin
                                            </td>
                                            <td>:</td>
                                            <td><input type="text" name="alasan"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="submit" name="submit" value="Izin" class="btn btn-primary" style="min-width: 180px;"></td>
                                            <td></td>
                                            <td><a href="<?= base_url('user') ?>"><button class="btn btn-danger" style="min-width: 180px;">Batal</button></a></td>
                                        </tr>

                                    <?php } elseif ($perizinan == 'Cuti') { ?>
                                        <tr>
                                            <td>
                                                Alasan Cuti
                                            </td>
                                            <td>:</td>
                                            <td><input type="text" name="alasan"></td>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <td>
                                                Lama Cuti
                                            </td>
                                            <td>:</td>
                                            <td><input type="text" name="alasan" style="max-width: 50px;"> Hari</td>
                                        </tr>
                                        <td><input type="submit" name="submit" value="submit" class="btn btn-primary" style="min-width: 180px;"></td>
                                        <td></td>
                                        <td><a href="<?= base_url('user') ?>"><button class="btn btn-danger" style="min-width: 180px;">Batal</button></a></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->