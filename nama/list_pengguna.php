<?php
include 'koneksi.php';
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
            <div class="col-12">
                <h1>List Pengguna</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">Email</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM pengguna";
                        $result = mysqli_query($conn, $query);
                        $no = 1;
                        foreach ($result as $row) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $row['login']; ?></td>
                                <td><?= $row['pswd']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td><?= $row['deskripsi']; ?></td>
                                <td><a href="edit_pengguna.php?id=<?= $row['email'] ?>" class="btn btn-primary">Ubah</a>
                                    <button class="btn btn-danger" onclick="hapusData('<?= $row['email'] ?>')">Hapus</button>
                                </td>

                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <a class="btn btn-success" href="tambah_pengguna.php">Tambah</a>
                <a class="btn btn-primary" href="login.php">Login</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        const hapusData = (dataId) => {
            // console.log(dataId);
            let confirmBtn = confirm('Apakah data ini ingin di hapus?');
            if (confirmBtn) {
                location.replace('http://localhost/test_tempo/nama/hapus_pengguna.php?id=' + dataId);

            }
        }
    </script>
</body>

</html>