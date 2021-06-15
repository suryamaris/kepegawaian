<?php

require_once __DIR__ . '/vendor/autoload.php';

$html = '<html>
<head>
</head>
<body>
<style>
p    {line-height: 1.5;
margin:0;}
</style>
<h1 style="text-align: center;">PT Sumatera Kemasindo</h1>
<h3 style="text-align: center;">Jalan Sudirman, No.50, Pekanbaru, Riau</h3>
<h3 style="text-align: center;">No telp. 0822122313</h3>
<p>Nomor : ' .  $data['no'] . '</p>
<p>Lampiran : 1 Berkas</p>
<p>Perihal : ' . $data['perihal'] . '</p>
<br>
<p>Yang bertanda tangan di bawah ini </p>
<p>' . $data['admin'] . ' </p>
<p> Jabatan : HRD </p>
<br>
<p> Yang dengan ini bertindak atas nama PT Suamtera Kemasindo Memutuskan untuk melakukan' . $data['tujuan'] . ' terhadap :</p>
<br>
<p>Nama     :' . $data['nama'] . '</p>
<p>Bagian   :' . $data['bagian1'] . '</p>      
<p>Jabatan  :' . $data['jabatan1'] . '</p>
<br>
<p>Dengan jabatan / bagian baru : </p>
<p>Jabatan  :' . $data['jabatan2'] . '</p>
<p>Bagian   :' . $data['bagian2'] . '</p>    
<br>
<p>&emsp;&emsp;&emsp;' . $data['isi'] . '</p></br>
<br>
<p>Demikian surat ini agar dilaksanakan dan disadari semestinya.</p>
<br>
<p>Riau, ' . $data['tanggal'] . '</p>
<p>PT Sumatera Kemasindo</p>
<br><br><br>
<p>HRD</p>
<p>' . $data['admin'] . '</p>



';

$html .= '</body>
</html>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();
