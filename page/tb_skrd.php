<?php
include('header.php');

// get
$result = $kon->query("SELECT * from vwskrd");

// rupiah format
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
?>
<div class="main-content-inner">
    <div class="row">
        <!-- table primary start -->
        <div class="col-lg-12 mt-5">
        <?php
            if (isset($_GET['message'])) { ?>
                <div class="alert alert-primary" role="alert">
                    <p><?= $_GET['message'] ?></p>
                </div>
            <?php } ?>
            <div class="card">
                <div class="card-body">
                    <a href="skrd.php" class="ml-auto text-right float-right my-2 btn btn-primary">tambah data</a>
                    <h4 class="header-title">Data Retribusi Pengendalian Menara Telekomunikasi</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-hover text-center" id="data">
                                <thead class="text-uppercase bg-primary">
                                    <tr class="text-white">
                                    <th scope="col">action</th>
                                        <th scope="col">Nomor SKRD</th>
                                        <th scope="col">Tahun</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Menara</th>
                                        <th scope="col">Alamat Menara</th>
                                        <th scope="col">Desa</th>
                                        <th scope="col">Kecamatan</th>
                                        <th scope="col">Tinggi Menara</th>
                                        <th scope="col">Jenis Menara</th>
                                        <th scope="col">Zonasi</th>
                                        <th scope="col">Tarif Retribusi</th>
                                        <th scope="col">Jarak</th>
                                        <th scope="col">Pejabat</th>
                                        <th scope="col">NIP</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    while ($rs = $result->fetch_array(MYSQLI_ASSOC)) {
                                    ?>
                                    <tr>
                                    <td>
                                        <a href="skrd.php?hapus=<?=$rs['idSkrd']?>"><i class="ti-trash"></i></a>
                                            <a href="skrd.php?edit=<?=$rs['idSkrd']?>"><i class="ti-pencil ml-2"></i></a>
                                            <a href="printSkrd.php?print=<?=$rs['idSkrd']?>"><i class="ti-printer ml-2"></i></a></td>
                                        <th scope="row"><?=$rs['nomorSkrd']?></th>
                                        <td><?=$rs['tahun']?></td>
                                        <td><?=$rs['tanggal']?></td>
                                        <td><?=$rs['namaMenara']?></td>
                                        <td><?=$rs['alamatMenara']?></td>
                                        <td><?=$rs['namaDesa']?></td>
                                        <td><?=$rs['namaKecamatan']?></td>
                                        <td><?=$rs['tinggiMenara']?></td>
                                        <td><?=$rs['jenisMenara']?></td>
                                        <td><?=$rs['zonasi']?></td>
                                        <td><?=rupiah($rs['tarifretribusi'])?></td>
                                        <td><?=$rs['jarak']?></td>
                                        <td><?=$rs['namaPejabat']?></td>
                                        <td><?=$rs['nip']?></td>
                                        
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- table primary end -->
    </div>
</div>
<?php
include('footer.php');
?>
<script>
    $(document).ready(function() {
    $('#data').DataTable( {
        dom: 'Bfrltip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>