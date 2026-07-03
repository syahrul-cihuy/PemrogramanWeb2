<?php
require_once "../config/koneksi.php";

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = password_hash(
    $_POST['password'],
    PASSWORD_DEFAULT
);
$role = $_POST['role'];
mysqli_query(
    $koneksi,
    "INSERT INTO users
(nama,email,password,role)
VALUES
('$nama','$email','$password','$role')"
);
header("Location:user.php?pesan=tambah");
?>