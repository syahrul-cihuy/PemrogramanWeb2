<?php
require_once "../config/koneksi.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$role = $_POST['role'];

mysqli_query(
    $koneksi,
    "UPDATE users
SET
nama='$nama',
email='$email',
role='$role'
WHERE id='$id'"
);
header("Location:user.php?pesan=edit");
?>