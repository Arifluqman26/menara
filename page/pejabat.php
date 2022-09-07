<?php
include('header.php');

// edit pejabat
if (isset($_GET["update"])) {


    $nama = $_POST["namaPejabat"];
    $nip = $_POST["nip"];
    $jabatan = $_POST["jabatan"];
    $status = $_POST["status"];
    $id = $_GET["update"];
  
    $sql = "UPDATE `tb_pejabat` SET `namaPejabat` = '" . $nama . "' , `jabatan` = '" . $jabatan . "', `nip` = '" . $nip . "', `status` = '" . $status . "' WHERE `idPejabat` = '" . $id . "' ";
  
    $result = mysqli_query($kon, $sql) or die("<script type='text/javascript'>alert(" . mysqli_error($kon) . ");</script>");
  
    $message = 'Pejabat berhasil diupdate';
    header("Location: tb_pejabat.php?message={$message}");
  }
  
  // tambah pejabat
  elseif (isset($_POST["namaPejabat"])) {
  
    $nama = $_POST["namaPejabat"];
    $nip = $_POST["nip"];
    $jabatan = $_POST["jabatan"];
    $status = $_POST["status"];
  
    $sql = "INSERT INTO `tb_pejabat` (`namaPejabat`, `jabatan`, `nip`, `status`) VALUES ('" . $nama . "', '" . $jabatan . "', '" . $nip . "', '" . $status . "')";
  
    $result = mysqli_query($kon, $sql) or die("<script type='text/javascript'>alert('QUERY Belum Benar');</script>");
  
    $message = 'Pejabat berhasil ditambahkan';
    header("Location: tb_pejabat.php?message={$message}");
  }
  
  // hapus
  elseif (isset($_GET["hapus"])) {
  
    $id = $_GET["hapus"];
  
    $sql = "DELETE FROM `tb_pejabat` WHERE idPejabat = $id";
  
    $result = mysqli_query($kon, $sql) or die("<script type='text/javascript'>alert('QUERY Belum Benar');</script>");
  
    $message = 'Pejabat berhasil dihapus';
    header("Location: tb_pejabat.php?message={$message}");
  }
  
?>
<div class="container">
    <div class="card my-5">
        <div class="card-body">
        <?php
    if (isset($_GET["edit"])) :
      $id = $_GET["edit"];
      // Mengambil data yang akan diedit
      $sql = "SELECT * FROM `tb_pejabat` WHERE idPejabat = $id";

      $result = mysqli_query($kon, $sql) or die("<script type='text/javascript'>alert('QUERY Belum Benar');</script>");

      foreach ($result as $data) :
    ?>
        <form class="needs-validation" method="POST" action="pejabat.php?update=<?=$data['idPejabat']?>" novalidate>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Nama Pejabat</label>
                        <input type="text" class="form-control" value="<?=$data['namaPejabat']?>" name="namaPejabat" id="validationCustom01" value="" required>
                        <div class="invalid-feedback">invalid input</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Jabatan</label>
                        <input type="text" class="form-control" value="<?=$data['jabatan']?>" name="jabatan" id="validationCustom01" value="" required>
                        <div class="invalid-feedback">invalid input</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">NIP</label>
                        <input type="text" class="form-control" value="<?=$data['nip']?>" name="nip" id="validationCustom01" value="" required>
                        <div class="invalid-feedback">invalid input</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="validationCustom01">Status</label>
                    <select class="custom-select" name="status" required>
                    <option value="<?=$data['status']?>"><?=$data['status']?></option>
                        <option value="AKTIF">AKTIF</option>
                        <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                    </select>
                    <div class="invalid-feedback">invalid input</div>
                </div>

                <button class="btn btn-primary" type="submit">Submit form</button>
            </form>
            <?php
      endforeach;
    else : ?>
            <form class="needs-validation" method="POST" action="pejabat.php" novalidate>
            <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Nama Pejabat</label>
                        <input type="text" class="form-control" value="" name="namaPejabat" id="validationCustom01" value="" required>
                        <div class="invalid-feedback">invalid input</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Jabatan</label>
                        <input type="text" class="form-control" value="" name="jabatan" id="validationCustom01" value="" required>
                        <div class="invalid-feedback">invalid input</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">NIP</label>
                        <input type="text" class="form-control" value="" name="nip" id="validationCustom01" value="" required>
                        <div class="invalid-feedback">invalid input</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="validationCustom01">Status</label>
                    <select class="custom-select" name="status" required>
                    <option value="" selected disabled>Select One</option>
                        <option value="AKTIF">AKTIF</option>
                        <option value="TIDAK AKTIF">TIDAK AKTIF</option>
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