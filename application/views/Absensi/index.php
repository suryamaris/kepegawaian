<h1>Absensi Pegawai</h1>
<h3>Tanggal : <?= date('d F Y', time()) ?></h3>
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