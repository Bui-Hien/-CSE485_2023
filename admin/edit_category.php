<?php
session_start();
if (!isset($_SESSION['isLogined'])) { //Neu chua co the
    header("Location:../login.php"); //Quay ra khai bao
    exit(1);
}
?>
<?php
include("./header.php")
?>

<?php
try {
    $conn = new PDO(dsn: "mysql:host=localhost;dbname=btth01_cse485_ex.sql", username: "root", password: "");
    $catMa = $_GET['id'];
    $sql_ten = 'SELECT ten_tloai FROM theloai WHERE ma_tloai = '.$catMa;

    $stmt = $conn->prepare($sql_ten);
    $stmt->execute();
    $ten = $stmt->fetchColumn();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Sửa thông tin thể loại</h3>
            <form action="process_add_category.php" method="post">
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId">Mã thể loại</span>
                    <input type="text" class="form-control" name="txtCatId" readonly value=<?= $catMa?>>
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên thể loại</span>
                    <input type="text" class="form-control" name="txtCatName" value="<?=$ten?>">
                </div>

                <div class="form-group  float-end ">
                    <input type="submit" value="Lưu lại" class="btn btn-success">
                    <a href="category.php" class="btn btn-warning ">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
include("./footer.php")
?>