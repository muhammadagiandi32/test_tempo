<?php
include 'koneksi.php';
if (isset($_POST['tambah'])) {
    $login = $_POST['id_user'];
    $password = password_hash($_POST['password'], PASSWORD_ARGON2I);
    $email = $_POST['email'];
    $deskripsi = $_POST['deskripsi'];


    $query = "INSERT INTO pengguna (`login` , `pswd`, `email`, `deskripsi`) VALUE ('$login',  '$password','$email','$deskripsi') ";
    $query_cek = "SELECT * FROM pengguna WHERE `login` = '$login' AND `email` = '$email'";
    $result_cek = mysqli_query($conn, $query_cek);
    if ($result_cek->num_rows > 0) {
        echo "<script>alert('account sudah di gunakan')</script>";
    } else {
        $result =  mysqli_query($conn, $query);
        if ($result > 0) {
            echo "<script>alert('Data Berhasil di tambah')</script>";
        } else {
            echo "<script>alert('Data Gagal di tambah')</script>";
        }
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
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">ID User</label>
                        <div class="col-sm-10">
                            <input type="text" name="id_user" class="form-control" id="staticEmail">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="staticEmail">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="staticEmail">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" name="deskripsi" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <button class="btn btn-primary" name="tambah">Tambah</button>
                    <button class="btn btn-danger" onclick="checkBatal()">Batal</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        const checkBatal = () => {
            confirm("Apakah Proses Tambah Ingin dibatalkan?");
        }
    </script>
</body>

</html>