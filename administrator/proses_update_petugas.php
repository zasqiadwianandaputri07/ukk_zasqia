<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$id_user = $_POST['id_user'];
$nama= $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];
 
// update data ke database
if (!password) {
	mysqli_query($koneksi,"update user set nama='$nama', username='$username', level='$level' where id_user='$id_user'");
} else {
	mysqli_query($koneksi,"update user set nama='$nama', username='$username', password='$password', level='$level' where id_user='$id_user'");
}

 
// mengalihkan halaman kembali ke index.php
header("location:data_pengguna.php?pesan=update");
 
?>