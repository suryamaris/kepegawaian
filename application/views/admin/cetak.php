<?php

require_once __DIR__ . '/vendor/autoload.php';

$html = '<html>
<head>
</head>
<body>
<h1 style="text-align: center;">PT Sumatera Kemasindo</h1>
<h3 style="text-align: center;">Jalan Sudirman, No.50, Pekanbaru, Riau</h3>
<h3 style="text-align: center;">No telp. 0822122313</h3>
<p>Nomor : ' .  $data['no'] . '</p>
<p>Lampiran : 1 Berkas</p>
<p>Perihal : Surat Peringatan</p>
<br><br>
<p> Kepada Yth ' . $data['nama'] . ' </p>
<p> ' . $data['jabatan'] . ' di PT Sumatera Kemasindo </p>
<br><br>
<p>' . $data['isi'] . '</br>
<br><br><br>
<p>Demikian surat ini agar dilaksanakan dan disadari semestinya.</p>
<br>
<p>Riau, ' . $data['tanggal'] . '</p>
<p>PT Sumatera Kemasindo</p>
<br><br>
<p>HRD</p>
<p>' . $data['admin'] . '</p>



';

$html .= '</body>
</html>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();
