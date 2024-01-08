<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "" ;

if(!empty($_POST['delete_user_validate'])){
    $query = mysqli_query($conn, "DELETE FROM tb_users WHERE id = '$id'");
    if($query){
        $message = '<script>alert("User berhasil dihapus");
        window.location="../user"</script>
        </script>';
    }else{
        $message = '<script>alert("Tidak dapat menghapus user")</script>';
    }
}echo $message;
?>