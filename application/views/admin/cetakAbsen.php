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
<h3>Absen Pegawai Tanggal : ' . $cari . ' </h3>
<br>
<table class="table" border=1 cellpadding="0" cellspacing="0">
    
        <thead class="table-light">
            <tr>
                <th width="50">No</th>
                <th width="250">Nama</th>
                <th width="150">Masuk</th>
                <th width="150">Keluar</th>
            </tr>
        </thead>.';
$no = 0;
$html .= '<tbody>';

foreach ($tanggal as $pegawai) {

    $id = $pegawai["id"];
    $no += 1;
    $html .= '<tr>
        <td scope="row" width="50" style="text-align: center;">' . $no . ' </td>
        <td scope="row" width="280">' . $pegawai["nama"] . '</td>
        <td scope="row" width="170" style="text-align: center;">' . $pegawai["masuk"] . ' </td>
        <td scope="row" width="170" style="text-align: center;">' . $pegawai["keluar"] . ' </td>

    </tr>';
}
$html .= '</tbody>

</table>
</body>

</html>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();
