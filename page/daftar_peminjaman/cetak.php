<?php 

// include autoloader
session_start(); // mulai session
include "function.php";


require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace

use Dompdf\Dompdf;

// initialize dompdf class

$document = new Dompdf();

if (isset($_SESSION['Admin'])) {

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
	font-size: 12px;
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
	            <td colspan="2"></td>
	        </tr>
	        <tr>
	            <td colspan="2"></td>
	        </tr>
	    </table><br>
    </div><br /><br /><br /><br /><br />
    <div style="font-size: 15px;">
    	<table align="center">
    		<tr>
	            <td colspan="2"><u>SURAT PENGANTAR</u></td>
	        </tr>
	        <tr>
	            <td colspan="2">NO.</td>
	        </tr>
    	</table>
    	<p>Bersama ini kami kirimkan:</p>
    </div>
    <div>
    	<table border="1">
    		<tr>
	    		<th width="30px">No.</th>
	    		<th width="400px">Jenis Barang</th>
	    		<th width="80px">Jumlah</th>
	    		<th width="200px">Keterangan</th>
    		</tr>
    		<tr>
	    		<td height="150px">No.</td>
	    		<td height="150px">Jenis Barang</td>
	    		<td height="150px">Jumlah</td>
	    		<td height="150px">Keterangan</td>
    		</tr>
    	</table>
    </div>
    <p>Mohon diterima dengan baik, terima kasih</p>
    <div>
    	<table style="width: 30%; text-align: center; float: left;">
    		<tr>
    			<td>Penerima</td>
    		</tr>
    		<tr>
    			<td height="25px"></td>
    		</tr>
    		<tr>
    			<td>Penerima</td>
    		</tr>
    	</table>
    </div>
    <div>
    	<table style="width: 30%; text-align: center; float: right;">
    		<tr>
    			<td>Hormat Kami</td>
    		</tr>
    		<tr>
    			<td height="25px"></td>
    		</tr>
    		<tr>
    			<td>Penerima</td>
    		</tr>
    	</table>
    </div>
</body>
';

$document->loadHtml($html);

// set page sixe and orientation
$document->setPaper('A4'. 'landscape');

// Render the HTML as PDF
$document->render();

// Get output of generated pdf in browser
$document->stream();

} else { ?>

	<script type="text/javascript">
		alert("Anda harus Login Sebagai Administrator");
		window.location.href="?page=daftar_peminjaman";
	</script>
	
<?php } ?>