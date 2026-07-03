<?php
include "config/koneksi.php";

$nama = "sipul";
$email = "ketua@gmail.com";
$password = password_hash("12345", PASSWORD_DEFAULT);
$role = "ketua";

$query = mysqli_query($koneksi, "INSERT INTO users
(
    nama,
    email,
    password,
    role
)
VALUES
(
    '$nama',
    '$email',
    '$password',
    '$role'
)");

if ($query) {
    echo "User berhasil dibuat";
} else {
    echo "User gagal dibuat";
}
?>