<h1 style="text-decoration: underline;">Absensi Izin</h1>
<br>
<table>
    <form action="izin" method="POST">
        <tr>
            <td>
                <h5 style="color:darkslategrey;">Iizn pada tanggal : </h5>
            </td>
            <td><input type="text" name="tanggal" style="max-width: 50px; min-height: 40px;"> &nbsp;&nbsp;</td>
            <td><select class="form-select" name="bulan" style="min-height: 40px;">
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
                </select>&nbsp;&nbsp;&nbsp;</td>
            <td><input type="text" name="tahun" placeholder="Tahun" style="max-width: 70px;min-height: 40px;"></td>
            <td><input type="submit" name="absen" value="Cari" class="btn btn-primary" style=" width: 50px;"></td>

    </form>
    <td><a href="<?= base_url('admin/cetakAbsenIzin/' . $cari) ?>" target="_blank"><button class="btn btn-info" style="margin-left: 500px; height:50px">Cetak Laporan</button></a></td>
    </tr>
</table>
<br>
<h4>Tanggal : <?= $cari ?></h4>
<br>
<table class="table table-sm">
    <form>
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Menu</th>
            </tr>
        </thead>
        <?php $no = 0; ?>
        <tbody>
            <?php
            foreach ($tanggal as $pegawai) {

                $id = $pegawai['id']; ?>

                <tr>
                    <td scope="row"><?php echo $no += 1; ?></td>
                    <td scope="row"><?php echo $pegawai['nama']; ?></td>
                    <td scope="row"><?php echo $pegawai['masuk']; ?></td>
                    <td scope="row"><?php echo $pegawai['keluar']; ?></td>
                    <td scope="row"><a href="<?= base_url('absensi/absenPegawai/' . $pegawai['nama']) ?>" style="color: #ffffff"><button class="btn btn-info">Lihat </a></button></td>

                </tr>
            <?php } ?>
        </tbody>
    </form>
</table>