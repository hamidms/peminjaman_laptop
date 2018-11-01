<?php 

// include autoloader
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
// reference the Dompdf namespace
$no_laptop = $_POST['no_laptop'];
$nama = $_POST['nama'];
$bagian = $_POST['bagian'];
$posisi = $_POST['posisi'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];
$keperluan2 = $_POST['keperluan'];
$tambahan = implode($_POST['tambahan'], ', ');


$html = '

<style>

img {
    float: right;
    height: 60px; 
    width: 240px; 
}

.kop {
    font-size: 10px;
}

.kop2 {
	font-size: 15px;
}
</style>
</head>
<body>
	<div>
		<img src="assets/img/4.png"><br>
	    <h3>PT. KUBOTA INDONESIA</h3>
	    <table style="width:40%; float: left;" class="kop">
	        <tr>
	            <td colspan="2">Taman Industri Bukit Semarang Baru (BSB) Blok D.1 Kav.8</td>
	        </tr>
	        <tr>
	            <td colspan="2">Kel. Jatibarang - Kec. Mijen - Kota Semarang</td>
	        </tr>
	        <tr>
	            <td>Telp</td>
	            <td>: +(62) - 24 - 7472849 ( Hunting ) </td> 
	        </tr>
	        <tr>
	            <td>Fax</td>
	            <td>: +(62) - 24 - 7472865, 7474266 </td> 
	        </tr>
	        <tr>
	            <td>Email</td>
	            <td>: ptki_g.layanan@kubota.com</td> 
	        </tr>
	        <tr>
	            <td>Website</td>
	            <td>: www.ptkubota.co.id</td> 
	        </tr>
	    </table>
	    <table style="width:30%; float: right;" class="kop2">
	        <tr>
	            <td colspan="2">Semarang, '.date('d-M-y'). '</td>
	        </tr>
	        <tr>
	            <td colspan="2">Kepada Yth.</td>
	        </tr>
	        <tr>
	            <td colspan="2">'.$nama.'</td>
	        </tr>
	        <tr>
	            <td colspan="2">'.$bagian.'</td>
	        </tr>
	    </table><br>
    </div><br /><br />
    <div style="font-size: 15px;">
    	<table align="center">
    		<tr>
	            <td colspan="2"><u>SURAT PENGANTAR</u></td>
	        </tr>
	        <tr>
	            <td colspan="2">NO.</td>
	        </tr>
    	</table>
    	
    </div>
    <div>
    	<p style="margin-bottom: 2px">Bersama ini kami kirimkan:</p>
    	<table border="1" style="margin: 0px">
    		<tr>
	    		<th width="30px">No.</th>
	    		<th width="300px">Jenis Barang</th>
	    		<th width="80px">Jumlah</th>
	    		<th width="300px">Keterangan</th>
    		</tr>

    		<tr>
	    		<td height="100px">1</td>
	    		<td height="100px">'.$no_laptop.', '.$tambahan.'</td>
	    		<td height="100px">1 Set</td>
	    		<td height="100px">digunakan untuk '.$keperluan2.' dari tanggal '.$tgl_pinjam.' s/d '.$tgl_kembali.'</td>
    		</tr>
    	</table>
    </div>
    <p style="margin: 3px">Mohon diterima dengan baik, terima kasih</p>
    <div>
    	<table style="width: 30%; text-align: center; float: left;">
    		<tr>
    			<td>Penerima</td>
    		</tr>
    		<tr>
    			<td height="40px"></td>
    		</tr>
    		<tr>
    			<td>'.$nama.'</td>
    		</tr>
    	</table>
    </div>
    <div>
    	<table style="width: 30%; text-align: center; float: right;">
    		<tr>
    			<td>Hormat Kami</td>
    		</tr>
    		<tr>
    			<td height="40px"></td>
    		</tr>
    		<tr>
    			<td>Petugas</td>
    		</tr>
    	</table>
    </div>
</body>
';

$document = new Dompdf();
$document->load_html($html);
$document->render();
$document->stream('Data_Peminjaman_'.$nama.'.pdf');

?>