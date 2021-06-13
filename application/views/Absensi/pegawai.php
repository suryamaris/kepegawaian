<h1>Absensi Pegawai</h1>
<table class="table table-sm">
    <form>
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Menu</th>
            </tr>
        </thead>
        <?php $no = 0; ?>
        <tbody>
            <?php
            foreach ($absen as $pegawai) {

                $id = $pegawai['id']; ?>

                <tr>
                    <td scope="row"><?php echo $no += 1; ?></td>
                    <td scope="row"><?php echo $pegawai['tanggal']; ?></td>
                    <td scope="row"><?php echo $pegawai['masuk']; ?></td>
                    <td scope="row"><?php echo $pegawai['keluar']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </form>
</table>