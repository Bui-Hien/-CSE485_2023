<?php
require_once '../Database.php';
require_once '../Command_sql.php';


$db = new \conn\Database();
$command_sql = new \conn\Command_sql($db);


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
