<?php
session_start();
session_destroy();

// Menggunakan absolute path agar langsung menuju ke halaman login dengan pasti
header("Location: /PEMWEB2/newsportal/auth/login.php");
exit(); // Selalu tambahkan exit setelah header redirect agar kode di bawahnya tidak dieksekusi
?>