<?php
include('header.php');

// get desa
$result = $kon->query("SELECT * from vwdesa");
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
                    <a href="desa.php" class="ml-auto text-right float-right my-2 btn btn-primary">tambah data</a>
                    <h4 class="header-title">Data Desa/Kelurahan</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-hover text-center" id="data">
                                <thead class="text-uppercase bg-primary">
                                    <tr class="text-white">
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama desa</th>
                                        <th scope="col">Kecamatan</th>
                                        <th scope="col">Jarak</th>
                                        <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($rs = $result->fetch_array(MYSQLI_ASSOC)) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $rs['idDesa'] ?></th>
                                            <td><?= $rs['namaDesa'] ?></td>
                                            <td><?= $rs['namaKecamatan'] ?></td>
                                            <td><?= $rs['jarak'] ?></td>
                                            <td>
                                                <a href="desa.php?hapus=<?= $rs['idDesa'] ?>"><i class="ti-trash"></i></a>
                                                <a href="desa.php?edit=<?= $rs['idDesa'] ?>"><i class="ti-pencil ml-2"></i></a>
                                            </td>
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
        $('#data').DataTable({
            dom: 'Bfrltip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>