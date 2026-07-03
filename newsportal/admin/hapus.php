<?php
require_once "../config/koneksi.php";

$id = $_GET['id'];

mysqli_query(
    $koneksi,
    "DELETE FROM users
WHERE id='$id'"
);
header("Location:user.php?pesan=hapus");
?>