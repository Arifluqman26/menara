<?php
include('header.php');


// get desa
$desa = $kon->query("SELECT * from tb_desa");

// edit pejabat
if (isset($_GET["update"])) {

    $nama = $_POST["namaMenara"];
    $alamat = $_POST["alamatMenara"];
    $idDesa = $_POST["idDesa"];
    $jenisMenara = $_POST["jenisMenara"];
    $zonasi = $_POST["zonasi"];
    $pole = $_POST["pole"];
    $tarifRetribusi = $_POST["tarifRetribusi"];
    $tinggiMenara = $_POST["tinggiMenara"];
    $id = $_GET["update"];

    $sql = "UPDATE `tb_menara` SET `namaMenara` = '" . $nama . "' , `alamatMenara` = '" . $alamat . "', `idDesa` = '" . $idDesa . "', `jenisMenara` = '" . $jenisMenara . "',`tinggiMenara` = '" . $tinggiMenara . "' , `zonasi` = '" . $zonasi . "', `pole` = '" . $pole . "', `tarifRetribusi` = '" . $tarifRetribusi . "' WHERE `idMenara` = '" . $id . "' ";

    $result = mysqli_query($kon, $sql) or die("<script type='text/javascript'>alert(" . mysqli_error($kon) . ");</script>");

    $message = 'Menara berhasil diupdate';
    header("Location: tb_menara.php?message={$message}");
}

// tambah pejabat
elseif (isset($_POST["namaMenara"])) {

    $nama = $_POST["namaMenara"];
    $alamat = $_POST["alamatMenara"];
    $idDesa = $_POST["idDesa"];
    $jenisMenara = $_POST["jenisMenara"];
    $zonasi = $_POST["zonasi"];
    $pole = $_POST["pole"];
    $tarifRetribusi = $_POST["tarifRetribusi"];
    $tinggiMenara = $_POST["tinggiMenara"];

    $sql = "INSERT INTO `tb_menara` (`namaMenara`, `alamatMenara`, `idDesa`, `tinggiMenara`, `jenisMenara`, `zonasi`, `pole`, `tarifRetribusi`) VALUES ('" . $nama . "', '" . $alamat . "', '" . $idDesa . "', '" . $tinggiMenara . "','" . $jenisMenara . "', '" . $zonasi . "', '" . $pole . "', '" . $tarifRetribusi . "')";

    $result = mysqli_query($kon, $sql) or die("<script type='text/javascript'>alert(" . mysqli_error($kon) . ");</script>");

    $message = 'Menara berhasil ditambahkan';
    header("Location: tb_menara.php?message={$message}");
}

// hapus
elseif (isset($_GET["hapus"])) {

    $id = $_GET["hapus"];

    $sql = "DELETE FROM `tb_menara` WHERE idMenara = $id";

    $result = mysqli_query($kon, $sql) or die("<script type='text/javascript'>alert('QUERY Belum Benar');</script>");

    $message = 'Menara berhasil dihapus';
    header("Location: tb_menara.php?message={$message}");
}

?>
<div class="container">
    <div class="card my-5">
        <div class="card-body">
            <?php
            if (isset($_GET["edit"])) :
                $id = $_GET["edit"];
                // Mengambil data yang akan diedit
                $sql = "SELECT * FROM `tb_menara` WHERE idMenara = $id";

                $result = mysqli_query($kon, $sql) or die("<script type='text/javascript'>alert('QUERY Belum Benar');</script>");

                foreach ($result as $data) :
            ?>
                    <form class="needs-validation" method="POST" action="menara.php?update=<?= $data['idMenara'] ?>" novalidate>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Nama Menara</label>
                                <input type="text" class="form-control" value="<?= $data['namaMenara'] ?>" name="namaMenara" id="validationCustom01" value="" required>
                                <div class="invalid-feedback">invalid input</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">alamat Menara</label>
                                <input type="text" class="form-control" value="<?= $data['alamatMenara'] ?>" name="alamatMenara" id="validationCustom01" value="" required>
                                <div class="invalid-feedback">invalid input</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Jenis Menara</label>
                                <select class="custom-select" name="jenisMenara" required>
                                <option value="<?= $data['jenisMenara'] ?>" selected><?= $data['jenisMenara'] ?></option>
                                <option value="Menara Tunggal">Menara Tunggal</option>
                                <option value="Menara Bersama">Menara Bersama</option>
                            </select>
                            <div class="invalid-feedback">invalid input</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Tinggi Menara</label>
                                <input type="number" class="form-control" value="<?= $data['tinggiMenara'] ?>" name="tinggiMenara" id="validationCustom01" value="" required>
                                <div class="invalid-feedback">invalid input</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="validationCustom01">Desa</label>
                            <select class="custom-select" name="idDesa" required>
                                <option value="<?= $data['idDesa'] ?>" selected><?= $data['idDesa'] ?></option>
                                <?php
                                while ($rs = $desa->fetch_array(MYSQLI_ASSOC)) {
                                ?>
                                    <option value="<?= $rs['idDesa'] ?>"><?= $rs['namaDesa'] ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">invalid input</div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Zonasi</label>
                                <select class="custom-select" name="zonasi" required>
                                    <option value="<?= $data['zonasi'] ?>"><?= $data['zonasi'] ?></option>
                                    <option value="Perkotaan">Perkotaan</option>
                                    <option value="Pedesaan">Pedesaan</option>
                                    <option value="Hutan/Perkebunan/Sawah/Pemukiman">Hutan/Perkebunan/Sawah/Pemukiman</option>
                                </select>
                                <div class="invalid-feedback">invalid input</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Pole</label>
                                <select class="custom-select" id="pole" name="pole" required>
                                    <option value="<?= $data['pole'] ?>" selected><?= $data['pole'] ?></option>
                                    <option value="Menara pole">Menara pole</option>
                                    <option value="Menara 3 kaki">Menara 3 kaki</option>
                                    <option value="Menara 4 kaki">Menara 4 kaki</option>
                                </select>
                                <div class="invalid-feedback">invalid input</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-10 mb-3">
                                <label for="validationCustom01">Tarif Retribusi</label>
                                <input type="number" class="form-control" readonly value="<?= $data['tarifRetribusi'] ?>" id="tarif" name="tarifRetribusi" id="validationCustom01" value="" required>
                                <div class="invalid-feedback">invalid input</div>
                            </div>
                            <div class="col-md-2" style="    align-self: center;    margin-top: 10px !important;">
                            <a class="btn btn-info mt-auto text-white" id="calculate">Hitung tarif retribusi</a>
                        </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                <?php
                endforeach;
            else : ?>
                <form class="needs-validation" method="POST" action="menara.php" novalidate>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Nama Menara</label>
                            <input type="text" class="form-control" value="" name="namaMenara" id="validationCustom01" value="" required>
                            <div class="invalid-feedback">invalid input</div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">alamat Menara</label>
                            <input type="text" class="form-control" value="" name="alamatMenara" id="validationCustom01" value="" required>
                            <div class="invalid-feedback">invalid input</div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Jenis Menara</label>
                            <select class="custom-select" name="jenisMenara" required>
                                <option value="" disabled selected>select one</option>
                                <option value="Menara Tunggal">Menara Tunggal</option>
                                <option value="Menara Bersama">Menara Bersama</option>
                            </select>
                            <div class="invalid-feedback">invalid input</div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Tinggi Menara</label>
                            <input type="number" class="form-control" value="" name="tinggiMenara" id="validationCustom01" value="" required>
                            <div class="invalid-feedback">invalid input</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom01">Desa</label>
                        <select class="custom-select" name="idDesa" required>
                            <option value="" selected disabled>select one</option>
                            <?php
                            while ($rs = $desa->fetch_array(MYSQLI_ASSOC)) {
                            ?>
                                <option value="<?= $rs['idDesa'] ?>"><?= $rs['namaDesa'] ?></option>
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback">invalid input</div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Zonasi</label>
                            <select class="custom-select" name="zonasi" required>
                                <option value="" disabled selected>select one</option>
                                <option value="Perkotaan">Perkotaan</option>
                                <option value="Pedesaan">Pedesaan</option>
                                <option value="Hutan/Perkebunan/sawah">Hutan/Perkebunan/sawah</option>
                            </select>
                            <div class="invalid-feedback">invalid input</div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Pole / Kaki menara</label>
                            <select class="custom-select" id="pole" name="pole" required>
                                <option value="" disabled selected>select one</option>
                                <option value="Menara pole">Menara pole</option>
                                <option value="Menara 3 kaki">Menara 3 kaki</option>
                                <option value="Menara 4 kaki">Menara 4 kaki</option>
                            </select>
                            <div class="invalid-feedback">invalid input</div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-10 mb-3">
                            <label for="validationCustom01">Tarif Retribusi</label>
                            <input type="number" class="form-control" readonly id="tarif" value="0" name="tarifRetribusi" id="validationCustom01" required>
                            <div class="invalid-feedback">invalid input</div>
                        </div>
                        <div class="col-md-2" style="    align-self: center;    margin-top: 10px !important;">
                            <a class="btn btn-info mt-auto text-white" id="calculate">Hitung tarif retribusi</a>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit" id="submit">Submit form</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    $('#calculate').click(function() {
        var pole = $('#pole').val();
        if (pole === 'Menara pole') {
            var fee = 1546500;
            $('#tarif').val(1546500);
        } else if (pole === 'Menara 3 kaki') {
            var fee = 1623825;
            $('#tarif').val(1623825);
        } else if (pole === 'Menara 4 kaki') {
            var fee = 1701150;
            $('#tarif').val(1701150);
        } else {
            alert('input required');
        }

    });

    $('#submit').click(function() {
                if ($('#tarif').val() === '0') {
                    alert('HITUNG TARIF !');
                    return false;
                }
            });
</script>