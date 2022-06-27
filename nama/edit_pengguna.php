<?php
// print_r();
include 'koneksi.php';
$id = $_GET['id'];
$query = "SELECT * FROM pengguna WHERE `email` ='$id'";
$result = mysqli_query($conn, $query);
// print_r($result);
if (isset($_POST['ubah'])) {
    // print_r($_POST);
    $login = $_POST['id_user'];
    $password = password_hash($_POST['password'], PASSWORD_ARGON2I);

    $email = $_POST['email'];
    $deskripsi = $_POST['deskripsi'];

    $query_update = "UPDATE pengguna SET `pswd` = '$password', `deskripsi` = '$deskripsi' WHERE `email` ='$email'";
    $result_update = mysqli_query($conn, $query_update);

    // print_r($result_update);
    if ($result_update > 0) {
        echo "<script>
        alert('Data Berhasil diRubah');
        location.replace('http://localhost/test_tempo/nama/list_pengguna.php');
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <h1>Tambah Pengguna</h1>
                <?php
                if ($result->num_rows > 0) {
                    foreach ($result as $row) {

                ?>

                        <form action="" method="POST">
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">ID User</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly name="id_user" class="form-control" id="staticEmail" value="<?= $row['login']; ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" required id="staticEmail">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">email</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly name="email" class="form-control" id="staticEmail" value="<?= $row['email']; ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <input type="text" name="deskripsi" class="form-control" id="inputPassword" value="<?= $row['deskripsi']; ?>">
                                </div>
                            </div>
                            <button class="btn btn-primary" name="ubah">Tambah</button>
                            <button class="btn btn-danger" onclick="checkBatal()">Batal</button>
                        </form>
                <?php  }
                } ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        const checkBatal = () => {
            let param = confirm("Apakah Proses Tambah Ingin dibatalkan?");
            if (param) {

                location.replace('http://localhost/test_tempo/nama/list_pengguna.php');
            } else {
                // alert('haha');
            }
        }
    </script>
</body>

</html>