<?php
require("commandSql.php");
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
        updateArticle(
            $_POST['ma_bviet'],
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
        insertArticle(
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
