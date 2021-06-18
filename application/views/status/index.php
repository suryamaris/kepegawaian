<h1 style="text-decoration: underline;">Data Tindakan</h1>
<table>
    <form action="status" method="POST">
        <tr>
            <td>
                <h5 style="color: black;">Data tindakan pada Bulan</h5>
            </td>
            <td>&nbsp;&nbsp;&nbsp; : &nbsp;</td>
            <td><select class="form-select" name=" bulan" style="min-height: 40px;">
                    <option selected>Bulan</option>
                    <option value="January">Januari</option>
                    <option value="February">Februari</option>
                    <option value="March">Maret</option>
                    <option value="April">April</option>
                    <option value="Mai">Mei</option>
                    <option value="June">Juni</option>
                    <option value="July">Juli</option>
                    <option value="August">Agustus</option>
                    <option value="September">September</option>
                    <option value="October">Oktober</option>
                    <option value="November">November</option>
                    <option value="December">Desember</option>
                </select></td>
            <td><input type="submit" name="submit" value="Cari" class="btn btn-primary" style=" width: 50px;"></td>

    </form>
</table>
<br><br><br>
<div class="container-fluid content-row">
    <div class="row">
        <?php if (empty($cari)) : ?>
            <div class="col-sm-12 col-lg-6" style="text-align: center;">
                <div class="card" style="width: 18rem; background-color:goldenrod; color:floralwhite">
                    <div class="card-body">
                        <h1><?= $peringatan ?></h1>
                        <h5 class="card-title">Peringatan</h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-6">
                <div class="card" style="width: 18rem; background-color:darkkhaki; color:floralwhite">
                    <div class="card-body" style="text-align: center;">
                        <h1><?= $Mutasi ?></h1>
                        <h5 class="card-title">Mutasi</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6" style="padding-top:50px; ">
                <div class="card" style="width: 18rem; background-color:skyblue   ; color:floralwhite">
                    <div class="card-body" style="text-align: center;">
                        <h1><?= $Promosi ?></h1>
                        <h5 class="card-title">Promosi</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6" style="padding-top:50px">
                <div class="card" style="width: 18rem; background-color:gray; color:floralwhite">
                    <div class="card-body" style="text-align: center;">
                        <h1><?= $Demosi ?></h1>
                        <h5 class="card-title">Demosi</h5>
                    </div>
                </div>
            </div>

        <?php endif; ?>

        <?php if ($cari) { ?>
            <a href="<?= base_url('status') ?>" style="color:honeydew"><button name="kembali" class="btn btn-info">Kembali</a></button>
            <td><a href="<?= base_url('admin/cetakTindakan/' . $bulan); ?>" target="_blank"><button class="btn btn-primary" style="margin-left: 500px;">Cetak Laporan</button></a></td>
            <table class="table">
                <form>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Tindakan</th>
                        <th scope="col">Jabatan Lama</th>
                        <th scope="col">Jabatan Baru</th>
                        <th scope="col">Bagian Lama</th>
                        <th scope="col">Bagian Baru</th>
                    </tr>
                    <?php foreach ($pencarian as $pegawai) {
                    ?>

                        <tr>
                            <td scope="row"><?php echo $pegawai['nama']; ?></td>
                            <td scope="row"><?php echo $pegawai['tanggal']; ?></td>
                            <td scope="row"><?php echo $pegawai['jenis']; ?></td>
                            <td scope="row"><?php echo $pegawai['jabatan1']; ?></td>
                            <td scope="row"><?php echo $pegawai['jabatan2']; ?></td>
                            <td scope="row"><?php echo $pegawai['bagian1']; ?></td>
                            <td scope="row"><?php echo $pegawai['bagian2']; ?></td>
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
            <?php endif;
            } ?>
            </table>

    </div>
</div>