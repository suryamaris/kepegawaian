<?php
require_once __DIR__ . '/vendor/autoload.php';


$html = '<html>
<head>
</head>
<body>
<h1 style="text-align: center;">PT Sumatera Kemasindo</h1>
<h3 style="text-align: center;">Jalan Sudirman, No.50, Pekanbaru, Riau</h3>
<h3 style="text-align: center;">No telp. 0822122313</h3>
<br>
<h3>Data Tindakan Bulan : ' . $bulan . ' </h3>
<br>
<table class="table" border=1 cellpadding="0" cellspacing="0" >
    
        <thead class="table-light" style="padding: 3px;">
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Tindakan</th>
            <th scope="col">Jabatan Lama</th>
            <th scope="col">Jabatan Baru</th>
            <th scope="col">Bagian Lama</th>
            <th scope="col">Bagian Baru</th>
            </tr>
        </thead>.';
$no = 0;
$html .= '<tbody>';

foreach ($pencarian as $pegawai) {

    $id = $pegawai["id"];
    $no += 1;
    $html .= '<tr>
        <td scope="row" width="20" style="text-align: center;" style="padding: 3px;">' . $no . ' </td>
        <td scope="row" style="padding: 3px;">' . $pegawai['nama'] . '</td>
        <td scope="row" style="padding: 3px;">' . $pegawai['tanggal'] . '</td>
        <td scope="row" style="padding: 3px;">' . $pegawai['jenis'] . '</td>
        <td scope="row" style="padding: 3px;">' . $pegawai['jabatan1'] . '</td>
        <td scope="row" style="padding: 3px;">' . $pegawai['jabatan2'] . '</td>
        <td scope="row" style="padding: 3px;">' . $pegawai['bagian1'] . '</td>
        <td scope="row" style="padding: 3px;">' . $pegawai['bagian2'] . '</td>

    </tr>';
}
$html .= '</tbody>

</table>
</body>

</html>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();
