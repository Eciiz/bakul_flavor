<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "" ;
$name = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "" ;
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "" ;
$level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : "" ;
$nohp = (isset($_POST['nohp'])) ? htmlentities($_POST['nohp']) : "" ;
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "" ;
$password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "" ;

if(!empty($_POST['edit_user_validate'])){
    $select = mysqli_query($conn, "SELECT * FROM tb_users WHERE username ='$username'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Data username tidak berubah");
        window.location="../user"</script>
        </script>';
    }else{
        $query = mysqli_query($conn, "UPDATE tb_users SET nama='$name', username='$username', level='$level', nohp='$nohp', alamat='$alamat' WHERE id='$id'");
        if($query){
            $message = '<script>alert("Berhasil mengubah informasi user");
            window.location="../user"</script>';
        }else{
            $message = '<script>alert("Gagal mengubah informasi user");
            window.location="../user"</script></script>';
        }
    }
}echo $message;
?>