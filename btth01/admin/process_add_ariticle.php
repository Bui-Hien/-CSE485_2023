<?php
session_start();
if (!isset($_SESSION['isLogined'])) { //Neu chua co the
    header("Location:../login.php"); //Quay ra khai bao
    exit(1);
}
?>
<?php
require_once '../Database.php';
require_once '../command_sql.php';


$db = new \Database();
$command_sql = new \Command_sql($db);


try {
    if (
        isset($_POST['ma_bviet']) &&
        isset($_POST['tieude']) &&
        isset($_POST['ten_bhat']) &&
        isset($_POST['ma_tloai']) &&
        isset($_POST['tomtat']) &&
        isset($_POST['noidung']) &&
        isset($_POST['ma_tgia']) &&
        isset($_POST['ngayviet']) &&
        isset($_POST['hinhanh'])
    ) {
        $command_sql->updateArticle($_POST['ma_bviet'],
            $_POST['tieude'],
            $_POST['ten_bhat'],
            $_POST['ma_tloai'],
            $_POST['tomtat'],
            $_POST['noidung'],
            $_POST['ma_tgia'],
            $_POST['ngayviet'],
            $_POST['hinhanh']);
    }

    if (
        !isset($_POST['ma_bviet']) &&
        isset($_POST['tieude']) &&
        isset($_POST['ten_bhat']) &&
        isset($_POST['ma_tloai']) &&
        isset($_POST['tomtat']) &&
        isset($_POST['noidung']) &&
        isset($_POST['ma_tgia']) &&
        isset($_POST['ngayviet']) &&
        isset($_POST['hinhanh'])
    ) {
        $command_sql->insertArticle(
            $_POST['tieude'],
            $_POST['ten_bhat'],
            $_POST['ma_tloai'],
            $_POST['tomtat'],
            $_POST['noidung'],
            $_POST['ma_tgia'],
            $_POST['ngayviet'],
            $_POST['hinhanh']
        );
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
