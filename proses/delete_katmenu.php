<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";

if (!empty($_POST['delete_katmenu_validate'])) {
    $select = mysqli_query($conn, "SELECT kategori FROM tb_menu WHERE kategori ='$id'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Upss! Kategori menu sudah digunakan pada daftar menu");
        window.location="../katmenu"</script>';
    } else {
        $query = mysqli_query($conn, "DELETE FROM tb_kategori_menu WHERE id_kat_mn = '$id'");
        if ($query) {
            $message = '<script>alert("Berhasil menghapus kategori menu");
            window.location="../katmenu"</script>';
        } else {
            $message = '<script>alert("Gagal menghapus kategori menu");
            window.location="../katmenu"</script>';
        }
    }
}
echo $message;
?>