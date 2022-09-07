<?php
include('header.php');

// edit desa
if (isset($_GET["update"])) {


    $nama = $_POST["namaKecamatan"];
    $jarak = $_POST["jarak"];
    $id = $_GET["update"];
  
    $sql = "UPDATE `tb_kecamatan` SET `namaKecamatan` = '" . $nama . "' , `jarak` = '" . $jarak . "' WHERE `idKecamatan` = '" . $id . "' ";
  
    $result = mysqli_query($kon, $sql) or die("<script type='text/javascript'>alert(" . mysqli_error($kon) . ");</script>");
  
    $message = 'Kecamatan berhasil diupdate';
    header("Location: tb_kecamatan.php?message={$message}");
  }
  
  // tambah desa
  elseif (isset($_POST["namaKecamatan"])) {
  
    $nama = $_POST["namaKecamatan"];
    $jarak = $_POST["jarak"];
  
    $sql = "INSERT INTO `tb_kecamatan` (`namaKecamatan`, `jarak`) VALUES ('" . $nama . "', '" . $jarak . "')";
  
    $result = mysqli_query($kon, $sql) or die("<script type='text/javascript'>alert('QUERY Belum Benar');</script>");
  
    $message = 'Kecamatan berhasil ditambahkan';
    header("Location: tb_kecamatan.php?message={$message}");
  }
  
  // hapus
  elseif (isset($_GET["hapus"])) {
  
    $id = $_GET["hapus"];
  
    $sql = "DELETE FROM `tb_kecamatan` WHERE idKecamatan = $id";
  
    $result = mysqli_query($kon, $sql) or die("<script type='text/javascript'>alert('QUERY Belum Benar');</script>");
  
    $message = 'Kecamatan berhasil dihapus';
    header("Location: tb_kecamatan.php?message={$message}");
  }
  
?>
<div class="container">
    <div class="card my-5">
        <div class="card-body">
        <?php
    if (isset($_GET["edit"])) :
      $id = $_GET["edit"];
      // Mengambil data yang akan diedit
      $sql = "SELECT * FROM `tb_kecamatan` WHERE idKecamatan = $id";

      $result = mysqli_query($kon, $sql) or die("<script type='text/javascript'>alert('QUERY Belum Benar');</script>");

      foreach ($result as $data) :
    ?>
        <form class="needs-validation" method="POST" action="kecamatan.php?update=<?=$data['idKecamatan']?>" novalidate>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Nama Kecamatan</label>
                        <input type="text" class="form-control" value="<?=$data['namaKecamatan']?>" name="namaKecamatan" id="validationCustom01" placeholder="First name" value="" required>
                        <div class="invalid-feedback">invalid input</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="validationCustom01">Jarak</label>
                    <select class="custom-select" name="jarak" required>
                    <option value="<?=$data['jarak']?>"><?=$data['jarak']?></option>
                        <option value="JAUH">JAUH</option>
                        <option value="DEKAT">DEKAT</option>
                    </select>
                    <div class="invalid-feedback">invalid input</div>
                </div>

                <button class="btn btn-primary" type="submit">Submit form</button>
            </form>
            <?php
      endforeach;
    else : ?>
            <form class="needs-validation" method="POST" action="kecamatan.php" novalidate>
            <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Nama Kecamatan</label>
                        <input type="text" class="form-control" value="" name="namaKecamatan" id="validationCustom01" placeholder="First name" value="" required>
                        <div class="invalid-feedback">invalid input</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="validationCustom01">Jarak</label>
                    <select class="custom-select" name="jarak" required>
                    <option value="" selected disabled>Select One</option>
                        <option value="JAUH">JAUH</option>
                        <option value="DEKAT">DEKAT</option>
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