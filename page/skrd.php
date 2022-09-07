<?php
include('header.php');


// get menara
$menara = $kon->query("SELECT * from tb_menara");
// get pejabat
$pejabat = $kon->query("SELECT * from tb_pejabat where `status` = 'AKTIF' ");

// edit pejabat
if (isset($_GET["update"])) {

    $idMenara = $_POST["idMenara"];
    $tahun = $_POST["tahun"];
    $tanggal = $_POST["tanggal"];
    $nomorSkrd = $_POST["nomorSkrd"];
    $idPejabat = $_POST["idPejabat"];
    $id = $_GET["update"];
  
    $sql = "UPDATE `tb_skrd` SET `idMenara` = '" . $idMenara . "' , `tahun` = '" . $tahun . "', `tanggal` = '" . $tanggal . "', `nomorSkrd` = '" . $nomorSkrd . "',`idPejabat` = '" . $idPejabat . "' WHERE `idSkrd` = '" . $id . "' ";
  
    $result = mysqli_query($kon, $sql) or die("<script type='text/javascript'>alert(" . mysqli_error($kon) . ");</script>");
  
    $message = 'SKRD berhasil diupdate';
    header("Location: tb_skrd.php?message={$message}");
  }
  
  // tambah pejabat
  elseif (isset($_POST["tahun"])) {
  
    $idMenara = $_POST["idMenara"];
    $tahun = $_POST["tahun"];
    $tanggal = $_POST["tanggal"];
    $nomorSkrd = $_POST["nomorSkrd"];
    $idPejabat = $_POST["idPejabat"];
  
    $sql = "INSERT INTO `tb_skrd` (`idMenara`, `tahun`, `tanggal`, `nomorSkrd`, `idPejabat`) VALUES ('" . $idMenara . "', '" . $tahun . "', '" . $tanggal . "', '" . $nomorSkrd . "','" . $idPejabat . "')";
  
    $result = mysqli_query($kon, $sql) or die("<script type='text/javascript'>alert('QUERY Belum Benar');</script>");
  
    $message = 'SKRD berhasil ditambahkan';
    header("Location: tb_skrd.php?message={$message}");
  }
  
  // hapus
  elseif (isset($_GET["hapus"])) {
  
    $id = $_GET["hapus"];
  
    $sql = "DELETE FROM `tb_skrd` WHERE idSkrd = $id";
  
    $result = mysqli_query($kon, $sql) or die("<script type='text/javascript'>alert('QUERY Belum Benar');</script>");
  
    $message = 'SKRD berhasil dihapus';
    header("Location: tb_skrd.php?message={$message}");
  }
  
?>
<div class="container">
    <div class="card my-5">
        <div class="card-body">
        <?php
    if (isset($_GET["edit"])) :
      $id = $_GET["edit"];
      // Mengambil data yang akan diedit
      $sql = "SELECT * FROM `tb_skrd` WHERE idSkrd = $id";

      $result = mysqli_query($kon, $sql) or die("<script type='text/javascript'>alert('QUERY Belum Benar');</script>");

      foreach ($result as $data) :
    ?>
        <form class="needs-validation" method="POST" action="skrd.php?update=<?=$data['idSkrd']?>" novalidate>
        <div class="form-group">
                    <label for="validationCustom01">Menara</label>
                    <select class="custom-select" name="idMenara" required>
                        <option value="<?=$data['idMenara']?>" selected><?=$data['idMenara']?></option>
                        <?php
                                    while ($rs = $menara->fetch_array(MYSQLI_ASSOC)) {
                                    ?>
                        <option value="<?=$rs['idMenara']?>"><?=$rs['namaMenara']?> | <?=$rs['alamatMenara']?></option>
                        <?php } ?>
                    </select>
                    <div class="invalid-feedback">invalid input</div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Tahun</label>
                        <input type="number" class="form-control" value="<?=$data['tahun']?>" name="tahun" id="validationCustom01" required>
                        <div class="invalid-feedback">invalid input</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Tanggal</label>
                        <input type="date" class="form-control" value="<?=$data['tanggal']?>" name="tanggal" id="validationCustom01" required>
                        <div class="invalid-feedback">invalid input</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Nomor SKRD</label>
                        <input type="text" class="form-control" value="<?=$data['nomorSkrd']?>" name="nomorSkrd" id="validationCustom01" required>
                        <div class="invalid-feedback">invalid input</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="validationCustom01">Pejabat</label>
                    <select class="custom-select" name="idPejabat" required>
                        <option value="<?=$data['idPejabat']?>" selected><?=$data['idPejabat']?></option>
                        <?php
                                    while ($rs = $pejabat->fetch_array(MYSQLI_ASSOC)) {
                                    ?>
                        <option value="<?=$rs['idPejabat']?>"><?=$rs['namaPejabat']?></option>
                        <?php } ?>
                    </select>
                    <div class="invalid-feedback">invalid input</div>
                </div>

                <button class="btn btn-primary" type="submit">Submit form</button>
            </form>
            <?php
      endforeach;
    else : ?>
            <form class="needs-validation" method="POST" action="skrd.php" novalidate>
            <div class="form-group">
                    <label for="validationCustom01">Menara</label>
                    <select class="custom-select" name="idMenara" required>
                        <option value="" selected disabled>select one</option>
                        <?php
                                    while ($rs = $menara->fetch_array(MYSQLI_ASSOC)) {
                                    ?>
                        <option value="<?=$rs['idMenara']?>"><?=$rs['namaMenara']?> | <?=$rs['alamatMenara']?></option>
                        <?php } ?>
                    </select>
                    <div class="invalid-feedback">invalid input</div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Tahun</label>
                        <input type="number" class="form-control" value="" name="tahun" id="validationCustom01" required>
                        <div class="invalid-feedback">invalid input</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Tanggal</label>
                        <input type="date" class="form-control" value="" name="tanggal" id="validationCustom01" required>
                        <div class="invalid-feedback">invalid input</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Nomor SKRD</label>
                        <input type="text" class="form-control" value="" name="nomorSkrd" id="validationCustom01" required>
                        <div class="invalid-feedback">invalid input</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="validationCustom01">Pejabat</label>
                    <select class="custom-select" name="idPejabat" required>
                        <option value="" selected disabled>select one</option>
                        <?php
                                    while ($rs = $pejabat->fetch_array(MYSQLI_ASSOC)) {
                                    ?>
                        <option value="<?=$rs['idPejabat']?>"><?=$rs['namaPejabat']?></option>
                        <?php } ?>
                    </select>
                    <div class="invalid-feedback">invalid input</div>
                </div>

                <button class="btn btn-primary" type="submit">Submit form</button>
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
</script>