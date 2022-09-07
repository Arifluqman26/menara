<?php
include('header.php');

// get kecamatan
$kecamatan = $kon->query("SELECT * from tb_kecamatan");

// edit desa
if (isset($_GET["update"])) {


    $nama = $_POST["namaDesa"];
    $kecamatan = $_POST["idKecamatan"];
    $id = $_GET["update"];
  
    $sql = "UPDATE `tb_desa` SET `namaDesa` = '" . $nama . "' , `idKecamatan` = '" . $kecamatan . "' WHERE `idDesa` = '" . $id . "' ";
  
    $result = mysqli_query($kon, $sql) or die("<script type='text/javascript'>alert(" . mysqli_error($kon) . ");</script>");
  
    $message = 'desa berhasil diupdate';
    header("Location: tb_desa.php?message={$message}");
  }
  
  // tambah desa
  elseif (isset($_POST["namaDesa"])) {
  
    $nama = $_POST["namaDesa"];
    $kecamatan = $_POST["idKecamatan"];
  
    $sql = "INSERT INTO `tb_desa` (`namaDesa`, `idKecamatan`) VALUES ('" . $nama . "', '" . $kecamatan . "')";
  
    $result = mysqli_query($kon, $sql) or die("<script type='text/javascript'>alert('QUERY Belum Benar');</script>");
  
    $message = 'desa berhasil ditambahkan';
    header("Location: tb_desa.php?message={$message}");
  }
  
  // hapus
  elseif (isset($_GET["hapus"])) {
  
    $id = $_GET["hapus"];
  
    $sql = "DELETE FROM `tb_desa` WHERE idDesa = $id";
  
    $result = mysqli_query($kon, $sql) or die("<script type='text/javascript'>alert('QUERY Belum Benar');</script>");
  
    $message = 'desa berhasil dihapus';
    header("Location: tb_desa.php?message={$message}");
  }
  
?>
<div class="container">
    <div class="card my-5">
        <div class="card-body">
        <?php
    if (isset($_GET["edit"])) :
      $id = $_GET["edit"];
      // Mengambil data yang akan diedit
      $sql = "SELECT * FROM `tb_desa` WHERE idDesa = $id";

      $result = mysqli_query($kon, $sql) or die("<script type='text/javascript'>alert('QUERY Belum Benar');</script>");

      foreach ($result as $data) :
    ?>
        <form class="needs-validation" method="POST" action="desa.php?update=<?=$data['idDesa']?>" novalidate>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Nama Desa</label>
                        <input type="text" class="form-control" value="<?=$data['namaDesa']?>" name="namaDesa" id="validationCustom01" placeholder="First name" value="" required>
                        <div class="invalid-feedback">invalid input</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="validationCustom01">Kecamatan</label>
                    <select class="custom-select" name="idKecamatan" required>
                        <option value="<?=$data['idKecamatan']?>" selected disabled><?=$data['idKecamatan']?></option>
                        <?php
                                    while ($rs = $kecamatan->fetch_array(MYSQLI_ASSOC)) {
                                    ?>
                        <option value="<?=$rs['idKecamatan']?>"><?=$rs['namaKecamatan']?></option>
                        <?php } ?>
                    </select>
                    <div class="invalid-feedback">invalid input</div>
                </div>

                <button class="btn btn-primary" type="submit">Submit form</button>
            </form>
            <?php
      endforeach;
    else : ?>
            <form class="needs-validation" method="POST" action="desa.php" novalidate>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Nama Desa</label>
                        <input type="text" class="form-control" name="namaDesa" id="validationCustom01" placeholder="First name" value="" required>
                        <div class="invalid-feedback">invalid input</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="validationCustom01">Kecamatan</label>
                    <select class="custom-select" name="idKecamatan" required>
                        <option value="" selected disabled>Open this select menu</option>
                        <?php
                                    while ($rs = $kecamatan->fetch_array(MYSQLI_ASSOC)) {
                                    ?>
                        <option value="<?=$rs['idKecamatan']?>"><?=$rs['namaKecamatan']?></option>
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