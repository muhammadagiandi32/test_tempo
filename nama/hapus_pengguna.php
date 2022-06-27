<?php
include 'koneksi.php';
// echo $_GET['id'];
$query = "DELETE FROM pengguna WHERE email = '" . $_GET['id'] . "'";
mysqli_query($conn, $query);
echo "<script>
        alert('Data Berhasil di Hapus');
        location.replace('http://localhost/test_tempo/nama/list_pengguna.php');
        </script>";
