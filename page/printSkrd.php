<?php
include('../koneksi.php');

function penyebut($nilai) {
	$nilai = abs($nilai);
	$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	$temp = "";
	if ($nilai < 12) {
		$temp = " ". $huruf[$nilai];
	} else if ($nilai <20) {
		$temp = penyebut($nilai - 10). " belas";
	} else if ($nilai < 100) {
		$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
	} else if ($nilai < 200) {
		$temp = " seratus" . penyebut($nilai - 100);
	} else if ($nilai < 1000) {
		$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
	} else if ($nilai < 2000) {
		$temp = " seribu" . penyebut($nilai - 1000);
	} else if ($nilai < 1000000) {
		$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
	} else if ($nilai < 1000000000) {
		$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
	} else if ($nilai < 1000000000000) {
		$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
	} else if ($nilai < 1000000000000000) {
		$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
	}     
	return $temp;
}

function terbilang($nilai) {
	if($nilai<0) {
		$hasil = "minus ". trim(penyebut($nilai));
	} else {
		$hasil = trim(penyebut($nilai));
	}     		
	return $hasil;
}

// rupiah format
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}

	$id = $_GET["print"];
	// Mengambil data yang akan diprint
	$sql = "SELECT * FROM `vwskrd`  WHERE idSkrd = $id";

	$result = mysqli_query($kon, $sql) or die("<script type='text/javascript'>alert('QUERY Belum Benar');</script>");

	foreach ($result as $data) :

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="" xml:lang="">

<head>
	<title></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<br />
	<style type="text/css">

		p {
			margin: 0;
			padding: 0;
		}

		.ft10 {
			font-size: 10px;
			font-family: Times;
			color: #000000;
		}

		.ft11 {
			font-size: 10px;
			font-family: Times;
			color: #000000;
		}

		.ft12 {
			font-size: 10px;
			font-family: Times;
			color: #000000;
		}

		.ft13 {
			font-size: 10px;
			font-family: Times;
			color: #000000;
		}

		.ft14 {
			font-size: 12px;
			font-family: Times;
			color: #000000;
		}

		.ft15 {
			font-size: 12px;
			font-family: Times;
			color: #000000;
		}

		.ft16 {
			font-size: 10px;
			line-height: 14px;
			font-family: Times;
			color: #000000;
		}

		.ft17 {
			font-size: 10px;
			line-height: 14px;
			font-family: Times;
			color: #000000;
		}

		.ft18 {
			font-size: 12px;
			line-height: 16px;
			font-family: Times;
			color: #000000;
		}
		@media print {
* {
    -webkit-print-color-adjust: exact !important; /*Chrome, Safari */
    color-adjust: exact !important;  /*Firefox*/
  }
}
	</style>
</head>

<body bgcolor="#A0A0A0" vlink="blue" link="blue">
	<div id="page1-div" style="position:relative;width:918px;height:1100px;">
	<div class="bg" style="background-image: url('print.jpg') !important; background-size:cover;height: 1200px;">

	</div>
		<!-- <img width="918" height="1404" style="max-height: 1200px;" src="print.jpg" alt="background image" /> -->
		<p style="position:absolute;top:1055px;left:516px;white-space:nowrap" class="ft10">(nama lengkap, tanda tangan
			dan stempel)</p>
		<p style="position:absolute;top:1055px;left:189px;white-space:nowrap" class="ft10">(nama lengkap dan tanda
			tangan)</p>
		<p style="position:absolute;top:935px;left:587px;white-space:nowrap" class="ft10">Diterima oleh</p>
		<p style="position:absolute;top:945px;left:570px;white-space:nowrap" class="ft10">Tempat Pembayaran</p>
		<p style="position:absolute;top:955px;left:536px;white-space:nowrap" class="ft10">Tanggal &#160; &#160;
			.......................................</p>
		<p style="position:absolute;top:920px;left:160px;white-space:nowrap" class="ft10">
			................................. &#160; &#160; tanggal &#160; ............................</p>
		<p style="position:absolute;top:935px;left:206px;white-space:nowrap" class="ft10">Wajib Retribusi / Penyetor
		</p>
		<p style="position:absolute;top:334px;left:412px;white-space:nowrap" class="ft10"><?=$data['namaMenara']?></p>
		<p style="position:absolute;top:359px;left:412px;white-space:nowrap" class="ft10"><?=$data['alamatMenara']?></p>
		<p style="position:absolute;top:380px;left:412px;white-space:nowrap" class="ft10">Desa/Kelurahan</p>
		<p style="position:absolute;top:380px;left:526px;white-space:nowrap" class="ft10"><?=$data['namaDesa']?></p>
		<p style="position:absolute;top:380px;left:516px;white-space:nowrap" class="ft10">:</p>
		<p style="position:absolute;top:402px;left:526px;white-space:nowrap" class="ft10"><?=$data['namaKecamatan']?></p>
		<p style="position:absolute;top:402px;left:516px;white-space:nowrap" class="ft10">:</p>
		<p style="position:absolute;top:402px;left:412px;white-space:nowrap" class="ft10">Kecamatan</p>
		<p style="position:absolute;top:423px;left:526px;white-space:nowrap" class="ft10">Grobogan</p>
		<p style="position:absolute;top:423px;left:516px;white-space:nowrap" class="ft10">:</p>
		<p style="position:absolute;top:423px;left:412px;white-space:nowrap" class="ft10">Kabupaten</p>
		<p style="position:absolute;top:448px;left:435px;white-space:nowrap" class="ft10"><?=$data['tinggiMenara']?> m</p>
		<p style="position:absolute;top:476px;left:412px;white-space:nowrap" class="ft10"><?=$data['pole']?></p>
		<p style="position:absolute;top:505px;left:440px;white-space:nowrap" class="ft10">Jumlah Indeks Variabel</p>
		<p style="position:absolute;top:505px;left:564px;white-space:nowrap" class="ft10">x</p>
		<p style="position:absolute;top:505px;left:582px;white-space:nowrap" class="ft10">Tarif Retribusi</p>
		<p style="position:absolute;top:530px;left:458px;white-space:nowrap" class="ft10">jumlah variabel</p>
		<p style="position:absolute;top:606px;left:501px;white-space:nowrap" class="ft10"><?=rupiah($data['tarifretribusi']/1.05)?></p>
		<p style="position:absolute;top:606px;left:491px;white-space:nowrap" class="ft10">x</p>
		<p style="position:absolute;top:606px;left:450px;white-space:nowrap" class="ft10">1,05</p>
		<p style="position:absolute;top:635px;left:433px;white-space:nowrap" class="ft10"><?=rupiah($data['tarifretribusi'])?></p>
		<p style="position:absolute;top:334px;left:402px;white-space:nowrap" class="ft10">:</p>
		<p style="position:absolute;top:359px;left:402px;white-space:nowrap" class="ft10">:</p>
		<p style="position:absolute;top:448px;left:402px;white-space:nowrap" class="ft10">:</p>
		<p style="position:absolute;top:476px;left:402px;white-space:nowrap" class="ft10">:</p>
		<p style="position:absolute;top:501px;left:402px;white-space:nowrap" class="ft10">:</p>
		<p style="position:absolute;top:334px;left:220px;white-space:nowrap" class="ft10">Nama Menara</p>
		<p style="position:absolute;top:359px;left:220px;white-space:nowrap" class="ft10">Lokasi Alamat Bangunan</p>
		<p style="position:absolute;top:448px;left:220px;white-space:nowrap" class="ft10">Tinggi Menara</p>
		<p style="position:absolute;top:476px;left:220px;white-space:nowrap" class="ft10">Jenis Menara</p>
		<p style="position:absolute;top:501px;left:220px;white-space:nowrap" class="ft10">Retribusi setiap tahun</p>
		<p style="position:absolute;top:334px;left:201px;white-space:nowrap" class="ft10">1.</p>
		<p style="position:absolute;top:359px;left:201px;white-space:nowrap" class="ft10">2.</p>
		<p style="position:absolute;top:448px;left:201px;white-space:nowrap" class="ft10">3.</p>
		<p style="position:absolute;top:476px;left:201px;white-space:nowrap" class="ft10">4.</p>
		<p style="position:absolute;top:501px;left:201px;white-space:nowrap" class="ft10">5.</p>
		<p style="position:absolute;top:682px;left:202px;white-space:nowrap" class="ft16">Retribusi dibayar melalui Bank
			Jateng Cabang Purwodadi dengan Rekening penerimaan Kas Daerah<br />No. 1.017.00701-3</p>
		<p style="position:absolute;top:726px;left:201px;white-space:nowrap" class="ft11"><i>Dengan angka</i></p>
		<p style="position:absolute;top:747px;left:222px;white-space:nowrap" class="ft12"><i><b><?=rupiah($data['tarifretribusi'])?></b></i></p>
		<p style="position:absolute;top:747px;left:402px;white-space:nowrap" class="ft17"><i><b><?=terbilang($data['tarifretribusi'])?></b></i></p>
		<p style="position:absolute;top:747px;left:199px;white-space:nowrap" class="ft12"><i><b>Rp.</b></i></p>
		<p style="position:absolute;top:726px;left:402px;white-space:nowrap" class="ft11"><i>Dengan huruf</i></p>
		<p style="position:absolute;top:780px;left:521px;white-space:nowrap" class="ft10">Purwodadi,
			..............................</p>
		<p style="position:absolute;top:795px;left:500px;white-space:nowrap" class="ft10">KEPALA DISKOMINFO KAB.
			GROBOGAN</p>
		<p style="position:absolute;top:865px;left:527px;white-space:nowrap" class="ft13"><b><?=$data['namaPejabat']?></b>
		</p>
		<p style="position:absolute;top:880px;left:537px;white-space:nowrap" class="ft10"><?=$data['nip']?></p>
		<p style="position:absolute;top:556px;left:564px;white-space:nowrap" class="ft10">x</p>
		<p style="position:absolute;top:556px;left:582px;white-space:nowrap" class="ft10">Tarif Retribusi</p>
		<p style="position:absolute;top:581px;left:493px;white-space:nowrap" class="ft10">2</p>
		<p style="position:absolute;top:556px;left:458px;white-space:nowrap" class="ft10">1,1</p>
		<p style="position:absolute;top:553px;left:404px;white-space:nowrap" class="ft10">:</p>
		<p style="position:absolute;top:556px;left:519px;white-space:nowrap" class="ft10">1</p>
		<p style="position:absolute;top:556px;left:490px;white-space:nowrap" class="ft10">+</p>
		<p style="position:absolute;top:556px;left:437px;white-space:nowrap" class="ft10">(</p>
		<p style="position:absolute;top:556px;left:547px;white-space:nowrap" class="ft10">)</p>
		<p style="position:absolute;top:606px;left:404px;white-space:nowrap" class="ft10">:</p>
		<p style="position:absolute;top:635px;left:404px;white-space:nowrap" class="ft10">:</p>
		<p style="position:absolute;top:1100px;left:121px;white-space:nowrap" class="ft18">Catatan :<br />1. Lembar
			warna putih untuk pemilik menara<br />2. Lembar warna biru untuk bank<br />3. Lembar warna kuning untuk
			BPPKAD Kab. Grobogan<br />4. Lembar warna hijau untuk Diskominfo Kab. Grobogan<br />5. Lembar warna merah
			untuk arsip</p>
		<p style="position:absolute;top:53px;left:347px;white-space:nowrap" class="ft15"><b>PEMERINTAH KABUPATEN
				GROBOGAN</b></p>
		<p style="position:absolute;top:71px;left:342px;white-space:nowrap" class="ft15"><b>DINAS KOMUNIKASI DAN
				INFORMATIKA</b></p>
		<p style="position:absolute;top:102px;left:328px;white-space:nowrap" class="ft14">SURAT KETETAPAN RETRIBUSI
			DAERAH (SKRD)</p>
		<p style="position:absolute;top:120px;left:334px;white-space:nowrap" class="ft14">PENGENDALIAN MENARA
			TELEKOMUNIKASI</p>
		<p style="position:absolute;top:138px;left:312px;white-space:nowrap" class="ft14">NOMOR :
			...................................................................</p>
		<p style="position:absolute;top:166px;left:386px;white-space:nowrap" class="ft14">BERFUNGSI JUGA SEBAGAI</p>
		<p style="position:absolute;top:184px;left:335px;white-space:nowrap" class="ft14">SURAT SETORAN RETRIBUSI DAERAH
			(SSRD)</p>
		<p style="position:absolute;top:230px;left:148px;white-space:nowrap" class="ft10">Dasar &#160; :</p>
		<p style="position:absolute;top:230px;left:201px;white-space:nowrap" class="ft10">1.</p>
		<p style="position:absolute;top:260px;left:201px;white-space:nowrap" class="ft10">2.</p>
		<p style="position:absolute;top:230px;left:230px;white-space:nowrap" class="ft16">
			Peraturan&#160;Daerah&#160;Kabupaten&#160;Grobogan&#160;Nomor&#160;7&#160;Tahun&#160;2018&#160;tentang&#160;Perubahan&#160;Ketiga&#160;Atas&#160;Peraturan&#160;Daerah<br />Kabupaten&#160;Grobogan&#160;Nomor&#160;2&#160;Tahun&#160;2012&#160;Tentang&#160;Retribusi&#160;Jasa&#160;Umum<br />Peraturan&#160;Bupati&#160;Grobogan&#160;Nomor&#160;10&#160;Tahun&#160;2018&#160;Tentang&#160;Pengendalian&#160;Menara
		</p>
		<p style="position:absolute;top:276px;left:202px;white-space:nowrap" class="ft16">
			Ditetapkan&#160;besaran&#160;Retribusi&#160;Pengendalian&#160;Menara&#160;Telekomunikasi&#160;berdasarkan&#160;Tingkat&#160;Penggunaan&#160;Jasa&#160;(TP)&#160;x&#160;Tarif<br />Retribusi&#160;(TR)&#160;dengan&#160;formula&#160;:
		</p>
		<p style="position:absolute;top:309px;left:337px;white-space:nowrap" class="ft13"><b>Tarif Retribusi = Tarif per
				Kunjungan x ((IZ+ IKM+ IJM+IJT)/2)</b></p>
	</div>
	<script>
		window.print();
	</script>
</body>

</html>
<?php
endforeach;
?>